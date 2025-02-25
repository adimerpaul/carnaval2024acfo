const express = require('express');
const app = express();
require('dotenv').config();

const http = require('http').createServer(app);
const io = require("socket.io")(http, {
    cors: {
        origin: "*",
    },
});

const mysql = require('mysql2');
const db = mysql.createConnection({
    host: process.env.DB_HOST,      // Ej: 127.0.0.1
    port: process.env.DB_PORT,      // Ej: 3306
    user: process.env.DB_USERNAME,  // Ej: root
    password: process.env.DB_PASSWORD,
    database: process.env.DB_DATABASE, // Ej: carnaval
});

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
    socket.on('danceOne', (msg) => {
        io.emit('danceOne', msg);
    });
});

const PORT = process.env.PORT || 3000;
http.listen(PORT, () => {
    console.log(`Servidor escuchando en http://localhost:${PORT}`);
});
