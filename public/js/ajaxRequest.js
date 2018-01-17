function ajaxRequest(setup, succes, error) {
    var httpRequest = new XMLHttpRequest();
    var url = setup.url;
    var type = 'GET';
    if (setup.hasOwnProperty('type')) {
        type = setup.type;
    }
    
    if (setup.hasOwnProperty('data')) {
        var data = setup.data;
        for (var param in data) {
            if (data.hasOwnProperty(param)) {
                var sign = (url.indexOf('?') === -1) ? '?' : '&';
                url += sign + param + '=' + data[param];
            }
        }
    }

    httpRequest.onreadystatechange = function (event) {
        if (this.readyState === 4) {
            if (this.status === 200) {
                if (typeof succes === 'function') {
                    succes(this.response);
                }
            }
            if (this.status !== 200) {
                if (typeof error === 'function') {
                    error(this.status + ' ' + this.statusText);
                }
            }
        }
    };
    //console.log('and the url is: ', url)
    httpRequest.responseType = 'json';
    httpRequest.open(type, url, true);
    httpRequest.send();
}