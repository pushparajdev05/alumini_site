const login_form = document.getElementById("login_form");
const close_btn = document.getElementById("close");
const admin_btn = document.getElementsByClassName("admin_btn");
console.log(close_btn)
admin_btn[0].addEventListener("click", () => {
    login_form.style.display = "flex";
    document.body.style.overflowY = "hidden";
    // location.href = "./admin.php";
});
close_btn.addEventListener("click", () => {
    login_form.style.display = "none";
    document.body.style.overflowY = "auto";
    // location.href = "./admin.php";
});