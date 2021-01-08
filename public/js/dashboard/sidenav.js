var sidenav=document.getElementById("mySidenav")

function openNav() {
    document.getElementById("mySidenav").style.width = "80%";
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("closeSideNav").style.display = "block";
    // document.getElementsByTagName("body")[0].style.background = "grey";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("closeSideNav").style.display = "none";
    document.body.style.backgroundColor = "#fdfdfdfc";
}

window.onclick = function(event) {
    if (event.target == sidenav) {
        closeNav();
    }
}