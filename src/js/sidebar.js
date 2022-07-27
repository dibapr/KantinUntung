function Open() {
    document.getElementById("sidebar").classList.toggle("NoSidebar");
     document.getElementById("sidebar").classList.toggle("Sidebar");
    document.querySelector(".button").classList.toggle("fixed");
    document.querySelector(".button").classList.toggle("hidden");
}

function Close() {
    document.getElementById("sidebar").classList.toggle("NoSidebar");
    document.getElementById("sidebar").classList.toggle("Sidebar");
    document.querySelector(".button").classList.toggle("fixed");
    document.querySelector(".button").classList.toggle("hidden");
}