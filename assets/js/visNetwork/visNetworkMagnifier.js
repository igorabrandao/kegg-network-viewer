
function elem(id) {
    return document.getElementById(id);
}

const magSize = 300; // diameter of loupe
const magnification = 3; // magnification
const halfMagSize = magSize / 2.0;

setTimeout(() => {
    let iframe = elem("networkIframe");
    let innerDoc = iframe.contentDocument || iframe.contentWindow.document;
    const main =  innerDoc.getElementById('graphhtmlwidget-9f3dce727bfdb9be6aeb')
    
    console.log(iframe);
    console.log(innerDoc);
    console.log(main);

    let mainRect = main.getBoundingClientRect();

    console.log(mainRect);

    let magnifier = document.createElement("canvas");
    magnifier.width = magSize;
    magnifier.height = magSize;
    magnifier.className = "magnifier";
    let magnifierCtx = magnifier.getContext("2d");
    magnifierCtx.fillStyle = "white";
    main.appendChild(magnifier);
    let bigNetPane = null;
    let bigNetwork = null;
    let bigNetCanvas = null;
    let netPaneCanvas = container.firstElementChild.firstElementChild;
}, 2500);

window.addEventListener("keydown", (e) => {
    if (e.shiftKey) createMagnifier();
});
window.addEventListener("mousemove", (e) => {
    if (e.shiftKey) showMagnifier(e);
});
window.addEventListener("keyup", (e) => {
    if (e.key == "Shift") closeMagnifier();
});

function showMagnifier(e) {
    e.preventDefault();
    if (bigNetCanvas == null) createMagnifier(e);
    magnifierCtx.fillRect(0, 0, magSize, magSize);
    magnifierCtx.drawImage(
        bigNetCanvas,
        ((e.clientX - mainRect.x) * bigNetCanvas.width) /
        netPaneCanvas.clientWidth -
        halfMagSize,
        ((e.clientY - mainRect.y) * bigNetCanvas.height) /
        netPaneCanvas.clientHeight -
        halfMagSize,
        magSize,
        magSize,
        0,
        0,
        magSize,
        magSize
    );
    magnifier.style.top = e.clientY - halfMagSize + "px";
    magnifier.style.left = e.clientX - halfMagSize + "px";
    magnifier.style.display = "block";
}

function createMagnifier() {
    if (bigNetPane) {
        bigNetwork.destroy();
        bigNetPane.remove();
    }
    network.storePositions();
    bigNetPane = document.createElement("div");
    bigNetPane.id = "big-net-pane";
    bigNetPane.style.position = "absolute";
    bigNetPane.style.top = "-9999px";
    bigNetPane.style.left = "-9999px";
    bigNetPane.style.width = `${main.offsetWidth * magnification}px`;
    bigNetPane.style.height = `${main.offsetHeight * magnification}px`;
    main.appendChild(bigNetPane);
    bigNetwork = new vis.Network(bigNetPane, data, {
        physics: { enabled: false }
    });
    bigNetCanvas = bigNetPane.firstElementChild.firstElementChild;
    bigNetwork.moveTo({
        position: network.getViewPosition(),
        scale: network.getScale() * magnification,
        animation: false
    });
    main.style.cursor = "none";
    magnifier.style.display = "none";
}
function closeMagnifier() {
    if (bigNetPane) {
        bigNetwork.destroy();
        bigNetPane.remove();
    }
    main.style.cursor = "default";
    magnifier.style.display = "none";
}
