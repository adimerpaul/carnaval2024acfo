const express = require('express');
const app = express();
require('dotenv').config();
const axios = require('axios');
const http = require('http').createServer(app);
const cors = require('cors');
const fs = require('fs');
const path = require('path');
const redis = require('redis');
const redisClient = redis.createClient();

redisClient.on('error', (err) => console.error('Error en Redis:', err));

const io = require("socket.io")(http, {
    cors: {
        origin: "*", // Permite cualquier origen
        methods: ["GET", "POST"], // Permite solo estos métodos
        allowedHeaders: ["*"], // Permite cualquier encabezado
        credentials: true // Permite el envío de cookies y autenticación
    }
});

// app.use(cors({
//     origin: function (origin, callback) {
//         if (!origin) return callback(null, true);
//         if (allowedOrigins.indexOf(origin) === -1) {
//             const msg = 'La política CORS no permite el acceso desde el origen: ' + origin;
//             return callback(new Error(msg), false);
//         }
//         return callback(null, true);
//     }
// }));

const imageCache = {};

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
// app.get('/dance/:id/:lat/:lng', (req, res) => {
//     const { id, lat, lng } = req.params;
//     io.emit('danceOne', { id, lat, lng });
//     db.query('UPDATE `dancers` SET lat = ?, lng = ? WHERE id = ?', [lat, lng, id], (err, result) => {
//         if (err) {
//             console.error('Error al ejecutar la consulta:', err);
//             res.status(500).send('Error al actualizar la posición del dancer');
//             return;
//         }
//         const Id = parseInt(id);
//         res.json({ id:Id, lat, lng });
//     });
// });

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
            // actulizar cog aumnetar un cog
            db.query('UPDATE `cogs` SET value = value + 1 WHERE id = 1', (err, result) => {
                if (err) {
                    console.error('Error al ejecutar la consulta:', err);
                    return;
                }
                db.query('SELECT `value` FROM `cogs` WHERE id = 1', async (err, results) => {
                    if (err) {
                        console.error('Error al ejecutar la consulta:', err);
                        return;
                    }
                    const cog = results[0];
                    db.query('SELECT `id`,`name`,`imagen`,`lat`,`lng`,`video`,`history` FROM `dancers` where deleted_at is null ', async (err, results) => {
                        if (err) {
                            console.error('Error al ejecutar la consulta:', err);
                            return;
                        }

                        // const dancers = await Promise.all(results.map(async (row) => {
                        //     // const imageUrl = `${URL_BACK}${row.imagen}`;
                        //     const imagePath = path.join(__dirname, 'uploads', row.imagen);
                        //
                        //     let base64Image = null;
                        //     try {
                        //         const imageBuffer = fs.readFileSync(imagePath);
                        //         base64Image = imageBuffer.toString('base64');
                        //     } catch (error) {
                        //         console.error(`Error al leer la imagen ${imagePath}:`, error);
                        //     }
                        //
                        //     return {
                        //         ...row,
                        //         image: base64Image,  // Agregar la imagen en base64
                        //     };
                        // }));
                        const dancers = await Promise.all(results.map(async (row) => {
                            // const imagePath = path.join(__dirname, 'uploads', row.imagen);
                            //
                            // if (!imageCache[row.imagen]) {
                            //     try {
                            //         const imageBuffer = fs.readFileSync(imagePath);
                            //         imageCache[row.imagen] = imageBuffer.toString('base64'); // Guardar en caché
                            //     } catch (error) {
                            //         console.error(`Error al leer la imagen ${imagePath}:`, error);
                            //         imageCache[row.imagen] = null; // Evita intentos fallidos repetidos
                            //     }
                            // }

                            return {
                                ...row,
                                // image: imageCache[row.imagen],  // Obtener desde caché
                            };
                        }));

                        io.emit('danceAll', { cog, dancers });
                    });

                });
            });
        } catch (error) {
            console.error('Error al procesar las imágenes:', error);
        }
    });

    socket.on('danceOne', (data) => {
        try {
            db.query('SELECT value FROM cogs', (err, results) => {
                if (err) {
                    console.error('Error al ejecutar la consulta:', err);
                    return;
                }
                const cog = results[0];
                db.query('UPDATE `dancers` SET lat = ?, lng = ? WHERE id = ?', [data.lat, data.lng, data.id], (err, result) => {
                    if (err) {
                        console.error('Error al ejecutar la consulta:', err);
                        return;
                    }
                    io.emit('danceOne', { cog, id: data.id, lat: data.lat, lng: data.lng });
                });
            });
        } catch (error) {
            console.error('Error al actualizar la posición del dancer:', error);
        }
    });
    socket.on('cogsMore', (data) => {
        try {
            db.query('UPDATE `cogs` SET value = value + 1 WHERE id = 1', (err, result) => {
                if (err) {
                    console.error('Error al ejecutar la consulta:', err);
                    return;
                }
                // db.query('SELECT * FROM `cogs` WHERE id = 1', (err, results) => {
                //     if (err) {
                //         console.error('Error al ejecutar la consulta:', err);
                //         return;
                //     }
                //     const cog = results[0];
                //     io.emit('cogsMore', { cog });
                // });
            });
        } catch (error) {
            console.error('Error al actualizar la cantidad de cogs:', error);
        }
    });
    // se salio un usuario
    socket.on('disconnect', () => {
        console.log('Usuario desconectado');
    });
});

const PORT = process.env.PORT || 3000;
http.listen(PORT, "0.0.0.0", () => {
    console.log(`Servidor escuchando en http://localhost:${PORT}`);
});
