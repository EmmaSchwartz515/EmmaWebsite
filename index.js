function toggleSectionOld(id) {
    var region = document.getElementById(id);
    var btn = region.childNodes[1];
    var sect = region.childNodes[3];
    var plusminus = btn.childNodes[1].childNodes[1].childNodes[1];

    sect.classList.toggle("show");
    btn.classList.toggle("open-btn");
    plusminus.classList.toggle("fa-plus");
    plusminus.classList.toggle("fa-minus");
}

function toggleSection(btn) {
    var region = btn.parentNode.parentNode;
    var sect = region.childNodes[3];
    var plusminus = btn.childNodes[1].childNodes[1].childNodes[1];

    sect.classList.toggle("show");
    btn.classList.toggle("open-btn");
    plusminus.classList.toggle("fa-plus");
    plusminus.classList.toggle("fa-minus");
}