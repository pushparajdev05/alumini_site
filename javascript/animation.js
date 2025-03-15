
// const option1={
//     distance: '350px',
//     duration: 2000,
//     origin: 'left',
//         viewFactor: 0.9
    
// };
// const option2={
//     distance: '350px',
//     duration: 2000,
//     origin: 'right',
//         viewFactor: 0.9

// };
// const option3={
//     distance: '150px',
//     duration: 2000,
//     origin: 'top',
//         viewFactor: 0.9

// };
ScrollReveal().reveal("#section2 .left",{
    distance: '350px',
    duration: 2000,
    origin: 'left',
        viewFactor: 0.9
    
});
ScrollReveal().reveal("#section2 .right",{
    distance: '350px',
    duration: 2000,
    origin: 'right',
        viewFactor: 0.9

});
ScrollReveal().reveal("#section3 .quotes",{
    distance: '350px',
    duration: 2000,
    origin: 'left',
        viewFactor: 0.9
    
});
ScrollReveal().reveal("#section3 #discussion",{
    distance: '150px',
    duration: 2000,
    origin: 'top',
        viewFactor: 0.9

});
ScrollReveal().reveal("#section4 .scroll_left",{
    distance: '350px',
    duration: 2000,
    origin: 'left',
        viewFactor: 0.9
    
});
ScrollReveal().reveal("#section4 .scroll_right",{
    distance: '350px',
    duration: 2000,
    origin: 'right',
        viewFactor: 0.9

});
ScrollReveal().reveal("#section5 .quotes",{
    distance: '350px',
    duration: 2000,
    origin: 'right',
        viewFactor: 0.9

});
ScrollReveal().reveal("#section5 #discussion",{
    distance: '150px',
    duration: 2000,
    origin: 'top',
        viewFactor: 0.9

});
ScrollReveal().reveal("#section6 .left",{
    distance: '350px',
    duration: 2000,
    origin: 'right',
        viewFactor: 0.9

});
ScrollReveal().reveal("#section6 .right",{
    distance: '350px',
    duration: 2000,
    origin: 'left',
        viewFactor: 0.9
    
});
ScrollReveal().reveal("#section10 .quotes",{
    distance: '350px',
    duration: 2000,
    origin: 'right',
        viewFactor: 0.9

});
ScrollReveal().reveal("#section10 #discussion", {
    distance: '150px',
    duration: 2000,
    origin: 'top',
        viewFactor: 0.9

});
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