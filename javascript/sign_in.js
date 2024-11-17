$(document).ready(() => {
  const credit = document.getElementsByClassName("input");
  const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  $("#sign_in").click(() => {
    console.log("sign in clicked");
    const email = credit[0].value.trim();
    const password = credit[1].value.trim();
    if (!((email === "") || (password === ""))) {
      if (pattern.test(email)) {
        $.ajax({
          type: 'POST',
          url: 'backend/admins/verify_admin.php',
          data: {
            admin_email: email,
            admin_pwd: password,
          },
          success: function (res) {
            let taken = parseInt(res)
            if (taken) {
              location.href = "backend/authentication/admin_login.php";
            }
            else {
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Admin's Username and password are wrong",
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
        text: "Enter Admin's Email and Password",
      });
      1
    }
  });
});