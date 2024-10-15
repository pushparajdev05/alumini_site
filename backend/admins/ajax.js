import { createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-auth.js";
import { auth } from "../../javascript/authentication.js";

$(document).ready(() => {
    console.log(auth);
    async function delete_admin(email) {
        try {
            // Get user by email
            const userRecord = await auth.getUserByEmail(email);
            const uid = userRecord.uid;

            // Delete user by UID
            await admin.auth.deleteUser(uid);
            console.log(`Successfully deleted user with UID: ${uid}`);
            return true;
        } catch (error) {
            console.error('Error deleting user:', error);
            return false;
        }
    }
    async function add_admin(email,password)
    {
        let state = false;
        await createUserWithEmailAndPassword(auth, email, password)
            .then((userCredential) => {
                // Signed up 
                const user = userCredential.user;
                console.log("user : " + user);
                state = true;
                // ...
            })
            .catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message;
                alert("error :" + errorMessage);
                // ..
            });
        return state;
        
    }

    $("#add_admin_btn").click(async () => {
        let state = false;
        let admin = $("#admin_id").val().trim();
        const password = $("#pwd_id").val().trim();
        if (!((admin === "") || (password === ""))) {
              state = await add_admin(admin, password);
            console.log(state);
            if (state) {
                $.ajax({
                    type: 'POST',
                    url: 'backend/admins/action.php',
                    data: {
                        admin_id: admin,
                        id: "0"
                    },
                    success: function (res) {
                        alert(res);
                    }
						
					
                });
            }
            else {
                alert("admin has not added to firebase auth and admin database");
            }
        }
        else {

            alert("Enter Admin's Email amd Password");
        }
				
    });
    $("#delete_admin_btn").click(() => {
        let state = false;
        let admin = $("#admin_id").val().trim();
        if (!(admin === "")) {
            state = delete_admin(admin);
            if (state) {
                $.ajax({
                    type: 'POST',
                    url: 'backend/admins/action.php',
                    data: {
                        admin_id: admin,
                        id: "1"
                    },
                    success: function (res) {
                        if (res === 'true') {
                            alert("admin has successfully deleted from firebase auth and admins database");
                        }
                        else {
                            alert("admin has not deleted from firebase auth and admin database");
                        }
                    }
                            
                        
                });
            
            }
            else {
                alert("admin has not added to firebase auth and admin database");
            }
        }
        else {

            alert("Enter Admin's Email");
        }
				
    }); 
});