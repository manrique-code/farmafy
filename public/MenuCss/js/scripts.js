let showOptions = false;
document.getElementById("pfp-button").addEventListener("click", ()=>{
    showOptions = !showOptions;
    if (showOptions) {
        document.getElementById("options").classList.add("show");
    } else {
        document.getElementById("options").classList.remove("show");
    }
});