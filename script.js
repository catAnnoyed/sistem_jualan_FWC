// Fungsi untuk mengubah saiz
function UbahSaizFont (saiz) {
    txt = document.getElementsByClassName("teks");
    for (let i= 0; i< txt.length; i++){
        style = window.getComputedStyle(txt[i],null).getPropertyValue("font-size");
        saizSekarang  = parseFloat(style);
        txt[i].style.fontSize = (saizSekarang + saiz) + "px";
    }    
}