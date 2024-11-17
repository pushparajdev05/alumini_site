$(document).ready(() => {
	//aluminis tables
    	//Insert and update using jQuery ajax
			$("#form_data1").submit(function(e){
				e.preventDefault();
				var sno = $("#sno").val();
				const formdata = new FormData(this);
				// console.log(this);
				// formdata.append("name", "pushpara P");
				// for (let pair of formdata.entries()) {
				// 	console.log(pair[0] + ': ' + pair[1]);
				// }
				
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
					type: 'POST',
					url: 'backend/aluminis/action.php',
					data: formdata,
					contentType: false,
					processData: false,
					beforeSend: function () {
						$("#save1").text("Wait...");
					},
					success: function (res) {
						let taken = parseInt(res);
						if (sno == "0") {
							if (taken == 1) {
								Swal.fire({
									icon: "error",
									title: "Oops...",
									text: "Something went wrong while inserting , the error might be already exists rollno used to reinsert to database try to check the roll no already exists otherwise it will somthing else",
								});

							}
							else if (taken == 2) {
								console.log(res);
								Swal.fire({
									title: "the image has not added as image is not satisfied below",
									icon: "error",
									html: ` <h1 style='text-align:justify;'>the criteria of images </h1>
										<p style='text-align:justify;'>1. Image size must be in 5mb<br>
										2. Image type must be jpg or png or jpeg. <br>
										3. Image should be real image type,not to be fake one. <br><br>
										still facing something error it might be problem to upload image to server.<p>
									`,
								});
							}
							else {
								$("#myTable1").find("tbody").append(res);
								document.getElementById("form_data1").reset();
								Swal.fire({
										icon: "success",
										text: "Successfully inserted the alumini detail to table",
									});

								console.log(res);
							}
						} else {
							let taken = parseInt(res);
							if (taken === 1) {
								Swal.fire({
									icon: "error",
									title: "Oops...",
									text: "Something went wrong while updating , the error might be related to updating data in table",
								});
							}
							else if (taken === 2)
							{
								Swal.fire({
									title: "the image has not updated as image is not satisfied below",
									icon: "error",
									html: ` <h1 style='text-align:justify;'>the criteria of images </h1>
										<p style='text-align:justify;'>1. Image size must be in 5mb<br>
										2. Image type must be jpg or png or jpeg. <br>
										3. Image should be real image type,not to be fake one. <br>
										4. Image might be already existed. <br><br>
										still facing something error it might be problem to upload image to server.<p>
									`,
								});
							}
							else
							{
							console.log(res);
								$("#myTable1").find("." + sno).html(res);
								document.getElementById("form_data1").reset();
								$("#alumini_form").css("display", "none");
								Swal.fire({
										icon: "success",
										text: "Successfully Updated the alumini detail in the table",
									});
							}
						}
							

						$("#save1").html(`<span></span>
                <span></span>
                <span></span>
                <span></span>
                Save`);
					}
				});
				
            });
            
            //Delete row using jQuery ajax
			$("#myTable1").on("click",".del",function(e){
				var sno=$(this).attr("sno");
				var btn=$(this);
				Swal.fire({
					title: "Are you sure to delete alumini detail",
					showDenyButton: true,
					confirmButtonText: "Yes",
					denyButtonText: `no`
				}).then((result) => {
					/* Read more about isConfirmed, isDenied below */
					if (result.isConfirmed) {
						$.ajax({
							type: 'POST',
							url: 'backend/aluminis/delete.php',
							data: { action: sno },
							beforeSend: function () {
								$(btn).text("Deleting...");
							},
							success: function (res) {
								let taken = parseInt(res);
								if (taken == 1) {
									btn.closest("tr").remove();
									Swal.fire({
										icon: "success",
										text: "Successfully deleted the alumini detail from table",
									});
								}
								else {
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
			$("#myTable1").on("click",".edit",function(e){
				e.preventDefault();
				var sno=$(this).attr("sno");
				$("#sno").val(sno);
				var row=$(this);
				var rollno=row.closest("tr").find("td:eq(0)").text();
				$("#rollno").val(rollno);
				var studname=row.closest("tr").find("td:eq(1)").text();
				$("#studname").val(studname);
				var batch=row.closest("tr").find("td:eq(2)").text();
				$("#batch").val(batch);
				var empstatus = row.closest("tr").find("td:eq(3)").text();
				$("#status").val(empstatus);
				// console.log($("#status").val(empstatus));
				var cmpname=row.closest("tr").find("td:eq(4)").text();
				$("#cmpname").val(cmpname);
				var cmpdetails=row.closest("tr").find("td:eq(5)").text();
				$("#cmpDetails").val(cmpdetails);
				var desig=row.closest("tr").find("td:eq(6)").text();
				$("#desig").val(desig);
				var phno=row.closest("tr").find("td:eq(7)").text();
				$("#phno").val(phno);
				var email=row.closest("tr").find("td:eq(8)").text();
				$("#email").val(email);
				$("#save1").html(`<span></span>
                <span></span>
                <span></span>
                <span></span>
                UPDATE`);
				const form_field= document.getElementsByClassName("form_field");
				form_field[0].style.display = "flex";
			});
	
});