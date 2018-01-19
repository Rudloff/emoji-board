/*jslint browser: true*/
/*global Clipboard, window*/
function initClipboard() {
    "use strict";
    new Clipboard(".copy-btn");
}

if (typeof window === "object") {
    window.addEventListener("load", initClipboard, false);
}
