function captureXMLHttpRequest(recorder) {
  var XHR = XMLHttpRequest.prototype;

  var open = XHR.open;
  var send = XHR.send;
  var setRequestHeader = XHR.setRequestHeader;

// Collect data:
  XHR.open = function(method, url) {
    this._method = method;
    this._url = url;
    this._requestHeaders = {};
    this._startTime = (new Date()).toISOString();
    return open.apply(this, arguments);
  };

  XHR.setRequestHeader = function(header, value) {
    this._requestHeaders[header] = value;
    return setRequestHeader.apply(this, arguments);
  };

  XHR.send = function(postData) {
    this.addEventListener('load', function() {
      var endTime = (new Date()).toISOString();

      if (recorder) {
        var myUrl = this._url ? this._url.toLowerCase() : this._url;
        if(myUrl) {

          var requestModel = {
            'uri': convertToFullUrl(this._url),
            'verb': this._method,
            'time': this._startTime,
            'headers': this._requestHeaders
          };

          if (postData) {
            if (typeof postData === 'string') {
              console.log('request post data is string');
              console.log(postData);
              requestModel['body'] = JSON.parse(postData);
            } else {
              requestModel['body'] = postData;
            }
          }

          var responseModel = {
            'status': this.status,
            'time': endTime,
            'headers': this.getAllResponseHeaders()
          };

          if (this.responseText) {
            responseModel['body'] = JSON.parse(this.responseText);
          }

          var event = {
            'request': requestModel,
            'response': responseModel
          };

          recorder(event);
        }
      }
    });
    return send.apply(this, arguments);
  };

  return function () {
    XHR.open = open;
    XHR.send = send;
    XHR.setRequestHeader = setRequestHeader;
  };
// so caller have a handle to undo the patch if needed.
}

function undoCaptureXMLHttpRequest(undoPatch) {
  var XHR = XMLHttpRequest.prototype;

  XHR.open = undoPatch.open;
  XHR.send = undoPatch.send;
  XHR.setRequestHeader = undoPatch.setRequestHeader;
}

var undoPatch = captureXMLHttpRequest(function (event) {
  console.debug('captureXMLHttpRequest recorder', event);
});

