
const option1={
    distance: '350px',
    duration: 2000,
    origin: 'left',
        viewFactor: 0.7
    
};
const option2={
    distance: '350px',
    duration: 2000,
    origin: 'right',
        viewFactor: 0.7

};
const option3={
    distance: '150px',
    duration: 2000,
    origin: 'top',
        viewFactor: 0.7

};

//scroll reveals animation instantiation
const sr = ScrollReveal();

// javascript media query handling here
const mediaQuery = window.matchMedia('(min-width: 1024px)');

function handleMediaQueryChange(event) {

    if (event.matches) {
        sr.reveal("#section2 .left", option1);
        sr.reveal("#section2 .right", option2);
        sr.reveal("#section3 .quotes", option1);
        sr.reveal("#section3 #discussion", option3);
        sr.reveal("#section4 .scroll_left", option1);
        sr.reveal("#section4 .scroll_right", option2);
        sr.reveal("#section5 .quotes", option2);
        sr.reveal("#section5 #discussion", option3);
        sr.reveal("#section6 .left", option2);
        sr.reveal("#section6 .right", option1);
        sr.reveal("#section10 .quotes", option2);
        sr.reveal("#section10 #discussion", option3);

    } else {
        sr.clean();
    }
}

// Add a listener for changes in the media query
mediaQuery.addListener(handleMediaQueryChange);

// Initial check
handleMediaQueryChange(mediaQuery);



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