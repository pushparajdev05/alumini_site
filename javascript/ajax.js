$(document).ready(() => {
    $("#myTable").on("click", ".view", function (e) {
        var id = $(this).closest("tr").find("td:eq(0)").text();
        $("#pop_up").css("display", "grid");
        $.ajax({
						type:'POST',
						url:'contribution_data.php',
						data:{rollno:id},
						// beforeSend:function(){
						// 	$("#save2").text("Wait...");
						// },
						success:function(res){
                            $("#data").html(res);
						}
					});
    });
    $("#contribution_close").click(function (e) {
        $("#pop_up").css("display", "none");
        $("#data").html(`<h1 class="font_style">
                Loading...
            </h1>`);
    });
});

