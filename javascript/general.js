const login_form = document.getElementById("login_form");
const close_btn = document.getElementsByClassName("close");
const login_btn = document.getElementById("login_btn");

console.log(close_btn);
login_btn.addEventListener("click", () => {
    login_form.style.display = "flex";
    document.body.style.overflowY = "hidden";
    // location.href = "./admin.php";
});
close_btn[0].addEventListener("click", () => {
    login_form.style.display = "none";
    document.body.style.overflowY = "auto";
    // location.href = "./admin.php";
});
