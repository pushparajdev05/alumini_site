// const staff_up = document.getElementById("staff_up");
// const staff_in = document.getElementById("staff_in");
$(document).ready(() => {
    const credit = document.getElementsByClassName("input");
        const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    $("#staff_in").click(function (e) {
        let data = $("#credentials").serialize();
        let additionalData = '&user=in';
        data += additionalData;
        // console.log(data);
        console.log("staff sign in");
        const email = credit[0].value.trim();
        const password = credit[1].value.trim();
        if (!((email === "") || (password === ""))) {
            if (pattern.test(email))
            {
                $.ajax({
                    type: 'POST',
                    url: 'backend/authentication/staff_up_in.php',
                    data: data,
                    // beforeSend:function(){
                    // 	$("#save2").text("Wait...");
                    // },
                    success: function (res) {
                        let taken = parseInt(res);
                        if (taken) {
                            // alert(typeof taken);
                            location.href = "./backend/authentication/staff_login.php";
                        }
                        else {
    
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Staff's Username and Password are wrong",
                            });
                        }
                    }
                });
            }
            else {
                Swal.fire({
                    icon: "warning",
                    title: "Oops...",
                    text: "Try to give valid Email address",
                });
            }
        }
        else {
            Swal.fire({
        icon: "warning",
        title: "Oops...",
        text: "Enter staff's Email and Password",
      });
        }
    });
    $("#staff_up").click(function (e) {
        const credit = document.getElementsByClassName("input");
        let data = $("#credentials").serialize();
        let additionalData = '&user=up';
        data += additionalData;
        // console.log(data);
        console.log("staff sign up");
        const email = credit[0].value.trim();
        const password = credit[1].value.trim();
        if (!((email === "") || (password === ""))) {
            if (pattern.test(email)) {
                $.ajax({
                    type: 'POST',
                    url: 'backend/authentication/staff_up_in.php',
                    data: data,
                    // beforeSend:function(){
                    // 	$("#save2").text("Wait...");
                    // },
                    success: function (res) {
                        let taken = parseInt(res);
                        if (taken == 1) {
                            // alert("staff sign up");
                            Swal.fire({
                                icon: "success",
                                text: "verfication mail has sent for each administrator",
                            });
                        }
                        else {
                            Swal.fire({
                                icon: "warning",
                                title: "Oops...",
                                text: res,
                            });
                        
                        }
                    }
                });
            }
             else {
                Swal.fire({
                    icon: "warning",
                    title: "Oops...",
                    text: "Try to give valid Email address",
                });
            }
        }
        else
        {
            Swal.fire({
        icon: "warning",
        title: "Oops...",
        text: "Enter Email and Password to register",
      });
            }
    });
    
});

