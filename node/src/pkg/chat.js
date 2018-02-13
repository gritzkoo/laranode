const MakeRequest = require('../requester');
module.exports = Chat;

function Chat(socket, io) {
    socket.on('new_message', function (obj) {
        MakeRequest('ChatService', 'newMessage', obj, function (rep) {
            io.to(socket.room).sockets.broadcast.emit('new_message_success', resp);
        });
    });

}