$(document).ready(() => {
//contribution table
    	//Insert and update using jQuery ajax
			$("#form_data2").submit(function(e){
				e.preventDefault();
				var sno=$("#sno2").val();
				
				//Check All Fields are filled
				// var required=true;
				// $("#frm").find("[required]").each(function(){
				// 	if($(this).val()==""){
				// 		alert($(this).attr("placeholder"));
				// 		$(this).focus();
				// 		required=false;
				// 		return false;
				// 	}
				// });
					$.ajax({
						type:'POST',
						url:'backend/contribution/action.php',
						data:$("#form_data2").serialize(),
						beforeSend:function(){
							$("#save2").text("Wait...");
						},
						success:function(res){
							if (sno == "0") {
								let taken = parseInt(res)
								if (taken == 1)
								{
									Swal.fire({
										icon: "error",
										title: "Oops...",
										text: "Something went wrong while inserting , the error might be related to inserting data to table in database",
									});
								}
								else {
									
									$("#myTable2").find("tbody").append(res);
									document.getElementById("form_data2").reset();
									Swal.fire({
										icon: "success",
										text: "Successfully inserted the contribution to table",
									});
								}
							} else {
								// console.log(res);
								let taken = parseInt(res);
								if (taken == 1)
								{
									Swal.fire({
										icon: "error",
										title: "Oops...",
										text: "Something went wrong while updating , the error might be related to updating data in table",
									});
								}
								else {
									$("#myTable2").find("."+sno).html(res);
									document.getElementById("form_data2").reset();
									$("#contribution_form").css("display", "none");
									Swal.fire({
										icon: "success",
										text: "Successfully updated the contribution in table",
									});
								}
							}
							
							$("#save2").html(`<span></span>
                <span></span>
                <span></span>
                <span></span>
                Save`);
						}
					});
				
            });
            
            //Delete row using jQuery ajax
			$("#myTable2").on("click",".del",function(e){
				var sno=$(this).attr("sno");
				var btn=$(this);
				Swal.fire({
					title: "Are you sure to delete alumini contribution",
					showDenyButton: true,
					confirmButtonText: "Yes",
					denyButtonText: `no`
				}).then((result) => {
					/* Read more about isConfirmed, isDenied below */
					if (result.isConfirmed) {
						$.ajax({
							type: 'POST',
							url: 'backend/contribution/delete.php',
							data: { action: sno },
							beforeSend: function () {
								$(btn).text("Deleting...");
							},
							success: function (res) {
								let taken = parseInt(res);
								if (taken == 0) {
									btn.closest("tr").remove();
									Swal.fire({
										icon: "success",
										text: "Successfully deleted the contribution from table",
									});
								}
								else
								{
									Swal.fire({
										icon: "error",
										title: "Oops...",
										text: res,
									});
									}
							}
						});
					}
				});
            });
            
            //fill all fields from table values #but
			$("#myTable2").on("click",".edit",function(e){
				e.preventDefault();
				var sno=$(this).attr("sno");
				$("#sno2").val(sno);
				var row=$(this);
				var rollno = row.closest("tr").find("td:eq(0)").text();
				console.log(rollno);
				$("#rollno2").val(rollno);
				var studname=row.closest("tr").find("td:eq(1)").text();
				$("#studname2").val(studname);
				var event_date=row.closest("tr").find("td:eq(2)").text();
				$("#date").val(event_date);
				var event_title=row.closest("tr").find("td:eq(3)").text();
				$("#title").val(event_title);
				var event_desc=row.closest("tr").find("td:eq(4)").text();
				$("#desc").val(event_desc);
				$("#save2").html(`<span></span>
                <span></span>
                <span></span>
                <span></span>
                UPDATE`);
				const form_field= document.getElementsByClassName("form_field");
				form_field[1].style.display = "flex";
			});

});