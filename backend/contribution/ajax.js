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
							if(sno=="0"){
								$("#myTable2").find("tbody").append(res);
							} else {
							console.log(res);
								$("#myTable2").find("."+sno).html(res);
							}
							
							document.getElementById("form_data2").reset();
							$("#save2").text("Save");
						}
					});
				
            });
            
            //Delete row using jQuery ajax
			$("#myTable2").on("click",".del",function(e){
				var sno=$(this).attr("sno");
				var btn=$(this);
				if(confirm("Are You Sure ? ")){
					$.ajax({
						type:'POST',
						url:'backend/contribution/delete.php',
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
			$("#myTable2").on("click",".edit",function(e){
				e.preventDefault();
				var sno=$(this).attr("sno");
				$("#sno2").val(sno);
				var row=$(this);
				var rollno = row.closest("tr").find("td:eq(0)").text();
				console.log(rollno)
				$("#rollno2").val(rollno);
				var studname=row.closest("tr").find("td:eq(1)").text();
				$("#studname2").val(studname);
				var event_date=row.closest("tr").find("td:eq(2)").text();
				$("#date").val(event_date);
				var event_title=row.closest("tr").find("td:eq(3)").text();
				$("#title").val(event_title);
				var event_desc=row.closest("tr").find("td:eq(4)").text();
				$("#desc").val(event_desc);
				$("#save2").text("Update");
				const form_field= document.getElementsByClassName("form_field");
				form_field[1].style.display = "flex";
			});
});