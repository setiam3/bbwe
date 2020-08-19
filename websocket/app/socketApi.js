let socket_io = require('socket.io');
let io = socket_io();
let socketApi = {};
//Your socket logic here
socketApi.io = io;
socketApi.io.on('connection', (socket) => {
    console.log('a user connected');

    socket.on('hello', (id,msg) => {
        // socket.emit('hello',msg);
        socketApi.io.emit('hello',msg);
        console.log(msg);
    });

});
module.exports = socketApi;