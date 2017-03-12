function showDetail(tab) {
    tab.querySelector('.tab-detail').style.opacity = "1";
}

function hideDetail(tab) {
    tab.querySelector('.tab-detail').style.opacity = "0";
}

function loadFunction() {
    var barArray = document.getElementsByClassName("bar");
    for(var i = 0; i < barArray.length; i+=1) {
        var percent = barArray[i].innerHTML;
        barArray[i].style.width = percent;
    }
}