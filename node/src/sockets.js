const sk = require('socket.io');
const MaqueRequest = require('../src/requester');
var connections = 0;
module.exports = initSK;

function initSK(server) {
	const io = sk.listen(server);
	io.on('connection', function (socket) {
		/*----------------------- default configurations of socket -----------------------*/
		connections++;
		console.log('Some one has connected. There are %s connections', connections);
		socket.on('disconnect', function () {
			connections--;
			console.log('Some one has leave. There are %s connetions', connections);
		});
		/* ------------------------------------------------------------------------------ */
		socket.on('HI', function (msg) {
			io.to(socket.id).emit('HELLO', 'You are connected');
		});
		socket.on('test', function (obj) {
			MaqueRequest('MyClass', 'ola', {
				msg: obj
			}, function (response) {
				socket.emit('test_response', response);
			});
		});
	});
};