        const menu = document.getElementsByClassName("menu");
        console.log(menu[0]);
const navigation = document.getElementsByClassName("navigation");
        menu[0].addEventListener("click",() => {
    navigation[0].classList.toggle("add_scale");
});