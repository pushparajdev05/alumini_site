import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13/firebase-app.js";
import { getAuth, signInWithEmailAndPassword} from "https://www.gstatic.com/firebasejs/10.13/firebase-auth.js";
const credit = document.getElementsByClassName("input");
const sign_btn = document.getElementById("sign_in");

// Your web app's Firebase configuration
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

// get athentication from firebase
const auth = getAuth(app);

//sign in as admin
sign_btn.addEventListener("click", () => {
    signInWithEmailAndPassword(auth, credit[0], credit[1])
    .then((userCredential) => {
        // Signed in 
        const user = userCredential.user;
        console.log(user);
        // ...
    })
    .catch((error) => {
        const errorCode = error.code;
        const errorMessage = error.message;
        alert(" username or password might wrong \n"+ "Error Message :" + errorMessage );
    });
});

