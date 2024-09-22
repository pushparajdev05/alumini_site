$(document).ready(() => {
	//aluminis tables
    	//Insert and update using jQuery ajax
			$("#form_data1").submit(function(e){
				e.preventDefault();
				var sno=$("#sno").val();
				
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
						url:'backend/aluminis/action.php',
						data:$("#form_data1").serialize(),
						beforeSend:function(){
							$("#save1").text("Wait...");
						},
						success:function(res){
						
							if(sno=="0"){
								$("#myTable1").find("tbody").append(res);
							}else{
								$("#myTable1").find("."+sno).html(res);
							}
							
							document.getElementById("form_data1").reset();
							$("#save1").text("Save");
						}
					});
				
            });
            
            //Delete row using jQuery ajax
			$("#myTable1").on("click",".del",function(e){
				var sno=$(this).attr("sno");
				var btn=$(this);
				if(confirm("Are You Sure ? ")){
					$.ajax({
						type:'POST',
						url:'backend/aluminis/delete.php',
						data:{action:sno },
						beforeSend:function(){
							$(btn).text("Deleting...");
						},
						success:function(res){
							if(res){
								btn.closest("tr").remove();
							}
						}
					});	
				}
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
				var empstatus=row.closest("tr").find("td:eq(3)").text();
				$("#status").val(empstatus);
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
				$("#save1").text("Update");
				const form_field= document.getElementsByClassName("form_field");
				form_field[0].style.display = "flex";
			});
	
});