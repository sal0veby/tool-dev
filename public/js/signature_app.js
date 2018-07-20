var wrapper = document.getElementById("signature-pad");
var clearButton = wrapper.querySelector("[data-action=clear]");
var savePNGButton = wrapper.querySelector("[data-action=save-png]");
var canvas = wrapper.querySelector("canvas");
var signaturePad = new SignaturePad(canvas, {backgroundColor: 'rgb(255, 255, 255)'});

// Adjust canvas coordinate space taking into account pixel ratio,
// to make it look crisp on mobile devices.
// This also causes canvas to be cleared.
function resizeCanvas() {
    var ratio = Math.max(window.devicePixelRatio || 1, 1);

    // This part causes the canvas to be cleared
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
    signaturePad.clear();
}

// On mobile devices it might make more sense to listen to orientation change,
// rather than window resize events.
window.onresize = resizeCanvas;
resizeCanvas();

function download(dataURL, filename) {
    var blob = dataURLToBlob(dataURL);
    var url = window.URL.createObjectURL(blob);

    var a = document.createElement("a");
    a.style = "display: none";
    a.href = url;
    a.download = filename;

    document.body.appendChild(a);
    a.click();

    window.URL.revokeObjectURL(url);
}

// One could simply use Canvas#toBlob method instead, but it's just to show
// that it can be done using result of SignaturePad#toDataURL.
function dataURLToBlob(dataURL) {
    // Code taken from https://github.com/ebidel/filer.js
    var parts = dataURL.split(';base64,');
    var contentType = parts[0].split(":")[1];
    var raw = window.atob(parts[1]);
    var rawLength = raw.length;
    var uInt8Array = new Uint8Array(rawLength);

    for (var i = 0; i < rawLength; ++i) {
        uInt8Array[i] = raw.charCodeAt(i);
    }

    return new Blob([uInt8Array], {type: contentType});
}

clearButton.addEventListener("click", function (event) {
    signaturePad.clear();
});

//undoButton.addEventListener("click", function (event) {
//  var data = signaturePad.toData();
//
//  if (data) {
//    data.pop(); // remove the last dot or line
//    signaturePad.fromData(data);
//  }
//});


savePNGButton.addEventListener("click", function (event) {
    if (signaturePad.isEmpty()) {
        alert("Please provide a signature first.");
    } else {
        var dataURL = signaturePad.toDataURL();
        console.log(dataURL);
//        download(dataURL, "signature.png");
    }
});

//saveJPGButton.addEventListener("click", function (event) {
//    if (signaturePad.isEmpty()) {
//        alert("Please provide a signature first.");
//    } else {
//        var dataURL = signaturePad.toDataURL("image/jpeg");
//        download(dataURL, "signature.jpg");
//    }
//});
