import { signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-auth.js";
import { auth } from "./authentication.js";

const sign_btn = document.getElementById("sign_in");
const credit = document.getElementsByClassName("input");
    
sign_btn.addEventListener("click", () => {
  const email = credit[0].value.trim();
  const password = credit[1].value.trim();
  signInWithEmailAndPassword(auth, email, password)
    .then((userCredential) => {
    //   const user = userCredential.user;
        //   console.log(user);
      location.href = "./backend/authentication/admin_login.php";
    })
    .catch((error) => {
    //   const errorMessage = error.message;
      alert("Username or password might be wrong\nError Message: " + error.message);
    });
});