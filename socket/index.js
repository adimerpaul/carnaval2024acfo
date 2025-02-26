const express = require('express');
const app = express();
require('dotenv').config();
const axios = require('axios');
const http = require('http').createServer(app);
const cors = require('cors');

const allowedOrigins = ["http://localhost:9000", "https://centenariocentral.com/", "http://192.168.1.3:9000"];
const io = require("socket.io")(http, {
    cors: {
        origin: allowedOrigins,
        methods: ["GET", "POST"]
    },
});

app.use(cors({
    origin: function (origin, callback) {
        if (!origin) return callback(null, true);
        if (allowedOrigins.indexOf(origin) === -1) {
            const msg = 'La política CORS no permite el acceso desde el origen: ' + origin;
            return callback(new Error(msg), false);
        }
        return callback(null, true);
    }
}));

const mysql = require('mysql2');
const db = mysql.createConnection({
    host: process.env.DB_HOST,      // Ej: 127.0.0.1
    port: process.env.DB_PORT,      // Ej: 3306
    user: process.env.DB_USERNAME,  // Ej: root
    password: process.env.DB_PASSWORD,
    database: process.env.DB_DATABASE, // Ej: carnaval
});

const URL_BACK = process.env.URL_BACK;
// Conectar a la base de datos MySQL
db.connect(err => {
    if (err) {
        console.error('Error al conectar con MySQL:', err);
        return;
    }
    console.log('Conectado a MySQL');
});

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});
app.get('/dance/:id/:lat/:lng', (req, res) => {
    const { id, lat, lng } = req.params;
    io.emit('danceOne', { id, lat, lng });
    db.query('UPDATE `dancers` SET lat = ?, lng = ? WHERE id = ?', [lat, lng, id], (err, result) => {
        if (err) {
            console.error('Error al ejecutar la consulta:', err);
            res.status(500).send('Error al actualizar la posición del dancer');
            return;
        }
        const Id = parseInt(id);
        res.json({ id:Id, lat, lng });
    });
});

io.on("connection", (socket) => {
    console.log('Usuario conectado');

    // Al recibir el evento "dance", se consultan ambas tablas: "dancers" y "cogs"
    socket.on('dance', (msg) => {
        io.emit('dance', msg);
    });
    socket.on('danceIO', (msg) => {
        io.emit('danceIO', msg);
    });
    const axios = require('axios');

    socket.on('danceAll', async (msg) => {
        try {
            db.query('SELECT * FROM `cogs` WHERE id = 1', async (err, results) => {
                if (err) {
                    console.error('Error al ejecutar la consulta:', err);
                    return;
                }
                const cog = results[0];
                db.query('SELECT * FROM `dancers`', async (err, results) => {
                    if (err) {
                        console.error('Error al ejecutar la consulta:', err);
                        return;
                    }

                    const dancers = await Promise.all(results.map(async (row) => {
                        const imageUrl = `${URL_BACK}${row.imagen}`;

                        let base64Image = null;
                        try {
                            const response = await axios.get(imageUrl, {
                                responseType: 'arraybuffer'
                            });
                            base64Image = `${Buffer.from(response.data, 'binary').toString('base64')}`;
                        } catch (error) {
                            console.error(`Error al convertir la imagen ${imageUrl}:`, error);
                        }

                        return {
                            ...row,
                            image: base64Image,  // Agregar la imagen en base64
                        };
                    }));

                    io.emit('danceAll', { cog, dancers });
                });

            });
        } catch (error) {
            console.error('Error al procesar las imágenes:', error);
        }
    });

    socket.on('danceOne', (msg) => {
        io.emit('danceOne', msg);
    });
});

const PORT = process.env.PORT || 3000;
http.listen(PORT, () => {
    console.log(`Servidor escuchando en http://localhost:${PORT}`);
});
