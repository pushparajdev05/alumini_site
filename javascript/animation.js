
const option1={
    distance: '350px',
    duration: 2000,
    origin: 'left',
};
const option2={
    distance: '350px',
    duration: 2000,
    origin: 'right',
};
const option3={
    distance: '150px',
    duration: 2000,
    origin: 'top',
};
ScrollReveal().reveal("#section2 .left",option1);
ScrollReveal().reveal("#section2 .right",option2);
ScrollReveal().reveal("#section3 .quotes",option1);
ScrollReveal().reveal("#section3 #discussion",option3);
ScrollReveal().reveal("#section4 .scroll_left",option1);
ScrollReveal().reveal("#section4 .scroll_right",option2);
ScrollReveal().reveal("#section5 .quotes",option2);
ScrollReveal().reveal("#section5 #discussion",option3);
ScrollReveal().reveal("#section6 .left",option2);
ScrollReveal().reveal("#section6 .right",option1);
ScrollReveal().reveal("#section10 .quotes",option2);
ScrollReveal().reveal("#section10 #discussion", option3);
ScrollReveal().reveal("#section3",);


//alumni scroll animation hover animation

const lists = document.getElementById("list_items");
const items = document.getElementsByClassName("item");
console.log(lists);
let clicked = 0;
lists.addEventListener("click", () => {
    if (clicked % 2 == 0)
    {
        for (i = 0; i < items.length; i++) {
            items[i].style.animationPlayState = "paused";
        }
        clicked++;
    }
    else
    {
        for (i = 0; i < items.length; i++) {
            items[i].style.animationPlayState = "running";
        }
        clicked++;
        }
});