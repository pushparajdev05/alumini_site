const switch_btn = document.getElementById("switch_btn");
const table1 = document.getElementById("table1");
const table2 = document.getElementById("table2");
const form2 = document.getElementsByClassName("form2");
var flag = 0;
switch_btn.addEventListener("click", () => {
    if (flag == 0)
    {
        table1.style.display = "none";
        table2.style.display = "block";
        flag = 1;
    }
    else
    {
        table2.style.display = "none";
        table1.style.display = "block";
        flag = 0;
    }
})
    //TODO:close button for alumini form field
const close_btn = document.getElementsByClassName("close_btn");
const add_btn = document.getElementById("add_btn");
const form_field = document.getElementsByClassName("form_field");
console.log(close_btn);
close_btn[0].addEventListener("click", () => {
    form_field[0].style.display = "none";
    form2[0].reset();
});
close_btn[1].addEventListener("click", () => {
    form_field[1].style.display = "none";
       form2[1].reset();
});
add_btn.addEventListener("click", () => {
    if (flag == 0)
    {
        form_field[0].style.display = "flex";
     }
    else
    {
        form_field[1].style.display = "flex";
     }
});

// TODO: change event and eventdispatch for select and table search
const filter_select = document.querySelectorAll(".selection select");
console.log(filter_select[0]);
const filter1 = filter_select[0];
const filter2 = filter_select[1];
filter1.addEventListener("change", () => {
    let selected_value = filter1.options[filter1.selectedIndex].value;
    switch (selected_value) {
        case "batch":
            filter2.innerHTML = `
               <option value="">--Select--</option>
                <option value="2013-2015">2013-2015</option>
                <option value="2014-2016">2014-2016</option>
                <option value="2015-2017">2015-2017</option>
            `;
            break;
        case "company":
            filter2.innerHTML = `
               <option value="">--Select--</option>
                <option value="TCS">TCS</option>
                <option value="Cogniznat">Cognizant</option>
                <option value="Accenture">Accenture</option>
                <option value="Entrepreneur">Entrepreneur</option>
            `;
            break;
        case "contribution":
            filter2.innerHTML = `
                    <option value="">--Select--</option>
                    <option value="Workshops">Workshops</option>
                    <option value="Seminar">Seminar</option>
                    <option value="Placement Reference">Placement Reference</option>
                    <option value="Event Jury">Event Jury</option>
            `;
            break;


    }
    
});
filter2.addEventListener("change", () => {
    const changeEvent = new Event("keyup");
    let selected_value = filter2.options[filter2.selectedIndex].value;
    const searchs = document.getElementsByClassName("dt-input");
     if (flag == 0)
     {

        searchs[0].value = selected_value;
        searchs[0].dispatchEvent(changeEvent);
    }
    else
     {
        searchs[1].value = selected_value;
        searchs[1].dispatchEvent(changeEvent);
    }
});


