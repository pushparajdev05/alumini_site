
$(document).ready(() => {


    $("#add_admin_btn").click(async () => {
        let admin = $("#admin_id").val().trim();
        console.log(admin);
        const password = $("#pwd_id").val().trim();
        if (!((admin === "") || (password === ""))) {
            $.ajax({
                type: 'POST',
                url: 'backend/admins/action.php',
                data: {
                    admin_id: admin,
                    admin_pwd:password,
                    id: "0"
                },
                success: function (res) {
                    let taken = parseInt(res);
                    // console.log(taken);
                    console.log(res);
                    if (taken === 1)
                    {
                        $("#admin_id").val("");
                        $("#pwd_id").val("");
                        Swal.fire({

                            icon: "success",
                            title: "Admin has added to admin database",
                            showConfirmButton: false,
                            timer: 2000
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
        else {

            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "Enter Admin's Email and Password",
            });
        }
				
    });
    $("#delete_admin_btn").click(() => {

        let admin = $("#admin_id").val().trim();
        const password = $("#pwd_id").val().trim();
        if (!((admin === "") || (password === ""))) {
            // alert("are you sure to delete that admin");
            Swal.fire({
                title: "Are you sure to delete that admin",
                showDenyButton: true,
                confirmButtonText: "Yes",
                denyButtonText: `no`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: 'backend/admins/action.php',
                        data: {
                            admin_id: admin,
                            admin_pwd: password,
                            id: "1"
                        },
                        success: function (res) {
                            let taken = parseInt(res);
                            if (taken === 1) {
                                $("#admin_id").val("");
                                $("#pwd_id").val("");
                                Swal.fire({

                                    icon: "success",
                                    title: "admin has deleted from admin database",
                                    showConfirmButton: false,
                                    timer: 2000
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
                // } else if (result.isDenied) {
                //   Swal.fire("Changes are not saved", "", "info");
                // }
            });
            
            
        }
        else {

         Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "Enter Admin's Email and Password",
            });
        }
				
    }); 
});