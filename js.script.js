function toggleBursar() {
    var officeSelect = document.getElementById("office");
    var bursarFields = document.getElementById("bursar-fields");
    if (officeSelect.value === "Bursar") {
        bursarFields.style.display = "block";
    } else {
        bursarFields.style.display = "none";
    }
}
