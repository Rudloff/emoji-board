/*jslint browser: true*/
/*global Clipboard, window*/
function initClipboard() {
    "use strict";
    return new Clipboard(".copy-btn");
}

if (typeof window === "object") {
    window.addEventListener("load", initClipboard, false);
}
