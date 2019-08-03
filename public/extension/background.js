chrome.runtime.onInstalled.addListener(function () {
  chrome.storage.sync.set({ color: '#3aa757' }, function () {
    console.log("The color is green.");
  });

  chrome.declarativeContent.onPageChanged.removeRules(undefined, function () {
    chrome.declarativeContent.onPageChanged.addRules([{
      conditions: [new chrome.declarativeContent.PageStateMatcher({
        pageUrl: { hostEquals: 'www.urban-rivals.com' },
      }),
      ],
      actions: [new chrome.declarativeContent.ShowPageAction()],
    }]);
  });

  let requests = {};

  chrome.webRequest.onBeforeRequest.addListener(
    function (details) {
      if (details.method === 'POST') {
        requests[details.requestId] = details;

        let request = JSON.parse(details.requestBody.formData.request[0]);
        request.forEach(call => {
          // console.log(details.requestId, call.call, call.params);
        });
      }
    },
    {
      urls: ["https://api.urban-rivals.com/api/"],
      types: ["xmlhttprequest"],
    },
    [
      "requestBody"
    ]
  );

  chrome.webRequest.onSendHeaders.addListener(
    function (details) {
      if (details.method === 'POST') {
        requests[details.requestId].requestHeaders = details.requestHeaders;

        // console.log(details.requestId, details.requestHeaders);
      }
    },
    {
      urls: ["https://api.urban-rivals.com/api/"],
      types: ["xmlhttprequest"],
    },
    [
      "requestHeaders"
    ]
  );

  chrome.webRequest.onCompleted.addListener(
    function (details) {
      if (details.method === 'POST') {
        var request = requests[details.requestId];
        delete requests[details.requestId];

        console.log('onCompleted', details.requestId, request);
        // var xhr = new XMLHttpRequest();
        // xhr.open('POST', "https://api.urban-rivals.com/api/");
        // request.requestHeaders.forEach(header => {
        //   xhr.setRequestHeader(header.name, header.value);
        // });
        // xhr.addEventListener("load", function () {
        //   console.log('onLoad', this.responseText);
        // });
        // xhr.send();
      }
    },
    {
      urls: ["https://api.urban-rivals.com/api/"],
      types: ["xmlhttprequest"],
    }
  )
});