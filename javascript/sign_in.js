import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13/firebase-app.js";
import { getAuth, signOut } from "https://www.gstatic.com/firebasejs/10.13/firebase-auth.js";

const sign_out = document.getElementById("sign_out");

const firebaseConfig = {
  apiKey: "AIzaSyDOs8r-4Qpz5Y3FdaoNt-VyH73c9h8Ymg4",
  authDomain: "fir-services-f3215.firebaseapp.com",
  projectcgetElementsByClassName: "fir-services-f3215",
  storageBucket: "fir-services-f3215.appspot.com",
  messagingSendercgetElementsByClassName: "866162843584",
  appcgetElementsByClassName: "1:866162843584:web:fdab74477053f83e38f225"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

//getAuth
const auth = getAuth(app);

//sign out from admin
sign_out.addEventListener("click", () => {
    signOut(auth).then(() => {
    // Sign-out successful.
    }).catch((error) => {
    // An error happened.
    });
});