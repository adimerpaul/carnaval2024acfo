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

io.on("connection", (socket) => {
    console.log('Usuario conectado');

    // Al recibir el evento "dance", se consultan ambas tablas: "dancers" y "cogs"
    socket.on('dance', (msg) => {
        io.emit('dance', msg);
    });
    socket.on('danceAll', (msg) => {
        db.query('SELECT * FROM `dancers`', (err, dancers) => {
            if (err) {
                console.error('Error al ejecutar la consulta en dancers:', err);
                socket.emit('dance', { error: 'Error al obtener los dancers' });
                return;
            }
            db.query('SELECT * FROM `cogs`', (err, cogs) => {
                if (err) {
                    console.error('Error al ejecutar la consulta en cogs:', err);
                    socket.emit('dance', { error: 'Error al obtener los cogs' });
                    return;
                }
                // Envía ambos resultados juntos en un solo objeto
                io.emit('dance', { dancers, cogs });
            });
        });
    });
});

const PORT = process.env.PORT || 3000;
http.listen(PORT, () => {
    console.log(`Servidor escuchando en http://localhost:${PORT}`);
});
