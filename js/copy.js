/*jslint browser: true*/
/*global Clipboard, window*/
function initClipboard() {
    "use strict";
    new Clipboard(".copy-btn");
}

window.addEventListener("load", initClipboard, false);
