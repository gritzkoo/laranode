/*=============================== server configurations ===============================*/
const app = require('express')();
const http = require('http').Server(app);
const app_port = 3000;
const socket = require('./src/sockets');
/*=============================== end server configurations ===========================*/
// iniciate http port listening
http.listen(app_port, function () {
	console.log('listening port:' + app_port);
});
// create a default get response on server
app.get('/', function (request, response) {
	response.send('The http server is running well!!!');
});
// init socket
socket(http);