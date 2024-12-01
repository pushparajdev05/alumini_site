const menu = document.getElementsByClassName("checkmark");
const logo_name = document.getElementById("logo_name");
const profile = document.getElementById("profile");
const log_out = document.getElementById("log_out");
logo_name.addEventListener("click", () =>
{
        location.href = "./index.php?page=1";
})
const navigation = document.getElementsByClassName("navigation");
menu[0].addEventListener("click", () => {
        navigation[0].classList.toggle("add_scale");
        console.log("clicked menu");
                
});
// logout show up event button
profile.addEventListener("click", (e) => {
        e.stopPropagation();
        log_out.style.display = "block";
        log_out.style.animationName = "logout";
        
});
document.addEventListener("click", (e) => {
        e.stopPropagation();
        log_out.style.animationName="logout_reverse"
        
});

// get the url stuff to get separate things

const url = new URL(window.location.href);

// Get query parameters
const queryParams = new URLSearchParams(url.search);
const page_no = queryParams.get("page");
const anchor_tag = document.querySelectorAll("nav ul li");

switch (page_no) {
        case "2":
                anchor_tag[1].className = "line";
                console.log("page no 2");

                break;
        case "3":
                anchor_tag[2].className = "line";
                console.log("page no 3");

                break;
        case "4":
                anchor_tag[3].className = "line";
                console.log("page no 4");

                break;
}
console.log("loaded");
