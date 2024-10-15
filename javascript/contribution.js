$(document).ready(() => {
    $("#myTable").on("click", ".head", func );
    $("#myTable").on("click", ".up_down", func );
    // $("#contribution_close").click(function (e) {
    //     $("#pop_up").css("display", "none");
    //     $("#data").html(`<h1 class="font_style">
    //             Loading...
    //         </h1>`);
    // });
});



const func = function () {
        
    // $("#pop_up").css("display", "grid");
            const currentElement = $(this);
    const header = currentElement.closest(".header");
    const count = header.attr("count");
    const arrow = header.children(".up_down");
    const element = header.next();
    if (('0' === count)) {

        const id = $(this).closest("tr").attr("rollno");
        console.log(element);
            $.ajax({
                type: 'POST',
                url: 'backend/contribution/contribution_student.php',
                data: { rollno: id },
                // beforeSend:function(){
                // 	$("#save2").text("Wait...");
                // },
                success: function (res) {
                    console.log(res);
                    element.append(res);
                    header.attr("count", "1");
                    arrow.toggleClass("down");
                    element.toggleClass("details");
                }
            });
        }
        else {
            arrow.toggleClass("down");
            element.toggleClass("details");
        }
};