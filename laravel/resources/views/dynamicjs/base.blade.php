<?php $str = env('APP_SOCKET'); ?>
const backendurl = "{{$str}}";
const socket = io(backendurl, {
    'reconnection': true,
    'reconnectionDelay': 5000,
    'reconnectionDelayMax': 10000,
    'reconnectionAttempts': Infinity
});

function base() {
    [native / code]
};

base.socket_online = ko.observable(false);

socket.on('connect', function () {
    base.socket_online(true);
    console.log('socket online');
});

socket.on('disconnect', function () {
    base.socket_online(false);
    console.log('socket offline');
})