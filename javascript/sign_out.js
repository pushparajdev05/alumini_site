
//sign out from admin
sign_out.addEventListener("click", () => {
  Swal.fire({
    title: "Do you want to log out from Admin",
    showDenyButton: true,
    confirmButtonText: "Yes",
    denyButtonText: `no`
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      location.href = "./backend/authentication/admin_logout.php";
    }
    // } else if (result.isDenied) {
    //   Swal.fire("Changes are not saved", "", "info");
    // }
  });
  
});