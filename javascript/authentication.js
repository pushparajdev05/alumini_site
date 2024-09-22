import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-app.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-auth.js";

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyDOs8r-4Qpz5Y3FdaoNt-VyH73c9h8Ymg4",
  authDomain: "fir-services-f3215.firebaseapp.com",
  projectId: "fir-services-f3215",
  storageBucket: "fir-services-f3215.appspot.com",
  messagingSenderId: "866162843584",
  appId: "1:866162843584:web:fdab74477053f83e38f225"
};

// Initialize Firebase
try {
  console.log("Initializing Firebase...");
  const app = initializeApp(firebaseConfig);
  console.log("Firebase initialized:", app);
   var auth = getAuth(app);
  console.log("Auth initialized:", auth);
} catch (e) {
  console.log("Firebase initialization error\n" + e);
}
export { auth };
// Sign in as admin

