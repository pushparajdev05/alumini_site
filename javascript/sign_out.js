// import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13/firebase-app.js";
import { signOut } from "https://www.gstatic.com/firebasejs/10.13/firebase-auth.js";
import { auth } from "./authentication.js";

const sign_out = document.getElementById("sign_out");

// const firebaseConfig = {
//   apiKey: "AIzaSyDOs8r-4Qpz5Y3FdaoNt-VyH73c9h8Ymg4",
//   authDomain: "fir-services-f3215.firebaseapp.com",
//   projectcgetElementsByClassName: "fir-services-f3215",
//   storageBucket: "fir-services-f3215.appspot.com",
//   messagingSendercgetElementsByClassName: "866162843584",
//   appcgetElementsByClassName: "1:866162843584:web:fdab74477053f83e38f225"
// };

// // Initialize Firebase
// const app = initializeApp(firebaseConfig);

// //getAuth
// const auth = getAuth(app);

//sign out from admin
sign_out.addEventListener("click", () => {
    signOut(auth).then(() => {
      location.href = "./index.php";
    }).catch((error) => {
      alert(" it is not signed out \n there is something causes problem")
    });
});