// TODO: change event and eventdispatch for select and table search in student and staff view

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
        searchs[1].value = selected_value;
        searchs[1].dispatchEvent(changeEvent);
});
const searchs = document.getElementsByClassName("dt-input");
console.log(searchs);