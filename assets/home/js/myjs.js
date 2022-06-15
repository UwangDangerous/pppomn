window.onscroll = function() {scrollFunction()};
    
function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "0"; //30px 10px
    document.getElementById("logo").style.fontSize = "0";
    document.getElementById("head").style.height = "0";
    document.getElementById("batas").style.padding = "70px";
    document.getElementById("btn").style.height = "35px";
} else {
    document.getElementById("batas").style.padding = "70px";
    document.getElementById("head").style.height = "70px";
    document.getElementById("navbar").style.padding = "20px 0 0 0"; //80px 10px
    document.getElementById("logo").style.fontSize = "10pt";
    document.getElementById("btn").style.height = "0";
    }
}