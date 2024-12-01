const sign_out = document.getElementById("log_out");
//sign out from admin
sign_out.addEventListener("click", () => {
  Swal.fire({
    title: "Do you want to log out",
    showDenyButton: true,
    confirmButtonText: "Yes",
    denyButtonText: `no`
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      location.href = "./backend/authentication/logout.php";
    }
  });
  
});