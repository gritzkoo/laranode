const rp = require('request-promise');
const backend_url = 'http://localhost:806/rest';

module.exports = MakeRequest;

function MakeRequest(Service, Method, Params, callback) {
    var protocol = {
        'Request': {
            'Service': Service,
            'Method': Method,
            'Params': Params || {}
        }
    };
    var options = {
        method: 'POST',
        uri: backend_url,
        form: protocol,
        headers: {
            'Content-Type': 'application/json' // Is set automatically
        }
    };

    rp(options)
        .then(function (parsedBody) {
            callback(JSON.parse(parsedBody));
        })
        .catch(function (err) {
            console.log(err);
        });
}