// const staff_up = document.getElementById("staff_up");
// const staff_in = document.getElementById("staff_in");
$(document).ready(() => {
    $("#staff_in").click(function (e)
    {
        let data = $("#credentials").serialize();
        let additionalData = '&user=in';
        data += additionalData;
        // console.log(data);
        console.log("staff sign in");
                $.ajax({
						type:'POST',
						url:'backend/authentication/staff_up_in.php',
						data:data,
						// beforeSend:function(){
						// 	$("#save2").text("Wait...");
						// },
                    success: function (res) {
                            let taken = parseInt(res)
                            if (taken)
                            {
                                // alert(typeof taken);
                                location.href = "./backend/authentication/staff_login.php";
                            }
                            else
                            {

                                alert("staff can only login");
                            }
						}
					});
})
    $("#staff_up").click(function (e)
    {
        let data = $("#credentials").serialize();
        let additionalData = '&user=up';
        data += additionalData;
        // console.log(data);
        console.log("staff sign up");

                $.ajax({
						type:'POST',
						url:'backend/authentication/staff_up_in.php',
						data:data,
						// beforeSend:function(){
						// 	$("#save2").text("Wait...");
						// },
						success:function(res){
                            if (res)
                            {
                                // alert("staff sign up");
                                alert(res);
                            }
                            // else {
                            //     alert("Email sending process has failed");
                            // }
						}
					});
})
});
