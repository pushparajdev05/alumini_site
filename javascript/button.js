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
const save1 = document.getElementById("save1");
const save2 = document.getElementById("save2");
console.log(save1.value);
close_btn[0].addEventListener("click", () => {
    form_field[0].style.display = "none";
     save1.innerHTML = `<span></span>
                <span></span>
                <span></span>
                <span></span>
                Save`;
    form2[0].reset();
});
close_btn[1].addEventListener("click", () => {
    form_field[1].style.display = "none";
     save2.innerHTML = `<span></span>
                <span></span>
                <span></span>
                <span></span>
                Save`;
       form2[1].reset();
});
add_btn.addEventListener("click", () => {
    if (flag == 0)
    {
        save1.innerHTML = `<span></span>
                <span></span>
                <span></span>
                <span></span>
                Save`;
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
                          <option value="2002-2005">2002-2005</option>
          <option value="2003-2006">2003-2006</option>
          <option value="2004-2007">2004-2007</option>
          <option value="2005-2008">2005-2008</option>
          <option value="2006-2009">2006-2009</option>
          <option value="2007-2010">2007-2010</option>
          <option value="2008-2011">2008-2011</option>
          <option value="2009-2012">2009-2012</option>
          <option value="2010-2013">2010-2013</option>
          <option value="2011-2014">2011-2014</option>
          <option value="2012-2015">2012-2015</option>
          <option value="2013-2016">2013-2016</option>
          <option value="2014-2017">2014-2017</option>
          <option value="2015-2018">2015-2018</option>
          <option value="2016-2019">2016-2019</option>
          <option value="2017-2020">2017-2020</option>
          <option value="2019-2021">2019-2021</option>
          <option value="2020-2022">2020-2022</option>
          <option value="2021-2023">2021-2023</option>
          <option value="2022-2024">2022-2024</option>
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
        case "empstatus":
            filter2.innerHTML = `
                    <option value="">--Select--</option>
                    <option value="Employed">Employed</option>
                    <option value="Self Employed">Self Employed</option>
                    <option value="Self Employed-Technology">Self Employed-Technology</option>
                    <option value="NA">NA</option>
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


