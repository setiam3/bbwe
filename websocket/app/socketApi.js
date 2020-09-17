let models = require('./../models/index');

let socket_io = require('socket.io');
let io = socket_io();
let socketApi = {};
//Your socket logic here
socketApi.io = io;
socketApi.io.on('connection', async (socket) => {
    console.log('a user connected');
    try {
        let groups = await models.Groups.findAll({
            attributes: ['id', 'group_name']
        });

        groups.forEach((group) => {
            socket.on(group.dataValues.id, (data) => {
                socketApi.io.emit(group.dataValues.id, data);
            });

        });

    }
    catch (err) {
        console.log(err);
    }

});
module.exports = socketApi;