document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        document.getElementById("loadingDiv").style.display = "none";
        document.getElementById("thankYouMessage").style.display = "block";
    }, 3000); // 3000ms = 3 segundos
});
