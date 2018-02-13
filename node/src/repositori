const moment = require('moment');

module.export = Room;
module.export = User;
module.export = Message;

class Room {
    constructor(room) {
        this.name = room.name || '';
        this.identifyier = room.identifyier || '';
        this.users = [];
        this.messages = [];
    }
    addUser(user) {
        if (this.users.indexOf(users) == -1) this.users.push(new User(user));
    }
    addMessage(message) {
        this.messages.push(new Message(message));
    }
}
class User {
    constructor(user) {
        this.id = id;
        this.name = name;
        this.logintime = moment();
    }
}
class Message {
    constructor(message) {
        this.id = message.id || '';
        this.text = message.text || '';
        this.owner = message.owner || '';
        this.time = moment();
    }
}