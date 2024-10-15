<?php
include "../config.php";
	if($_SERVER["REQUEST_METHOD"]=='POST')
    {
        $action=mysqli_real_escape_string($con,$_POST["sno"]);
	$rollno=mysqli_real_escape_string($con,$_POST["rollno"]);
	$name=mysqli_real_escape_string($con,$_POST["studname"]);
	$batch=mysqli_real_escape_string($con,$_POST["batch"]);
	$empstatus=mysqli_real_escape_string($con,$_POST["status"]);
	$phno=mysqli_real_escape_string($con,$_POST["phno"]);
	$cmp_name=mysqli_real_escape_string($con,$_POST["cmpname"]);
	$cmp_details=mysqli_real_escape_string($con,$_POST["cmpDetails"]);
	$desig=mysqli_real_escape_string($con,$_POST["desig"]);
	$email=mysqli_real_escape_string($con,$_POST["email"]);
    //getting the image of aluminis function
function getImagepath($rollno,$operation)
{
    if (isset($_FILES["upload"])) {
        $target_dir = "aluminis_img/";
            $table_dir = "backend/aluminis/aluminis_img/";
        $target_file = basename($_FILES["upload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["upload"]["tmp_name"]);
        if ($check == false) {
            $uploadOk = 0;
            return false;
        }

        // Check if file already exists
       

        // Check file size
        if ($_FILES["upload"]["size"] > 6291456) {
            // echo "Sorry, your file is too large. try to upload image with 5MB";
            $uploadOk = 0;
            return false;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
         ) {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            return false;
        }
        //TODO: img path for project and table of database

        $img_current_path = $target_dir . $rollno .".". $imageFileType;
            $table_img_path = $table_dir . $rollno . "." . $imageFileType;

            if($operation==true)
            {
                if (file_exists($img_current_path)) {
                    // echo "Sorry, file already exists.";
                    $uploadOk = 0;
                    return false;
                }
            }
            else
            {
                if (file_exists($img_current_path)) {
                    unlink($img_current_path);
                    // echo "Sorry, file already exists.";
                }
            }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo false;
            // echo "this something went wrong ";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $img_current_path)) {
                return $table_img_path;
            } else {
                    return false;
                // echo "sorry there is a problem to move file to server folder";
            }
        }
    }
}
    // $image_path = getImagepath($rollno);
if ($action == "0") {
    $image_path = getImagepath($rollno,true);
    if (!(false == $image_path)) {
        $sql = "insert into aluminis (rollno,studname,batch,empstatus,cur_cmp_name,cur_cmp_details,design,phno,email,img_path) values ('{$rollno}','{$name}','{$batch}','{$empstatus}','{$cmp_name}','{$cmp_details}','{$desig}','{$phno}','{$email}','{$image_path}')";

        if ($con->query($sql)) {
            $sno = $con->insert_id;
            echo "<tr class='{$sno}'>
                            <td>{$rollno}</td>
                            <td>{$name}</td>
                            <td>{$batch}</td>
                            <td>{$empstatus}</td>
                            <td>{$cmp_name}</td>
                            <td>{$cmp_details}</td>
                            <td>{$desig}</td>
                            <td>{$phno}</td>
                            <td>{$email}</td>					
                            <td>
                                 <div id='action'>
                                 <div id='del' class='del' sno='{$sno}'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M7 4V2H17V4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7ZM6 6V20H18V6H6ZM9 9H11V17H9V9ZM13 9H15V17H13V9Z'></path></svg><span>Delete</span>
                                </div>
                                <div id='update' class='edit' sno='{$sno}'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M5 18.89H6.41421L15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89ZM21 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L9.24264 18.89H21V20.89ZM15.7279 6.74785L17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785Z'></path></svg>
                                <span>Update</span>
                                </div>
                                 </div>
                            </td>					
                        </tr>";

        }
    } else {
        echo "invalid";
    }
} else {
    $image_path = getImagepath($rollno,false);
    if (!(false == $image_path)) {
        $sql = "update aluminis set rollno='{$rollno}',studname='{$name}',batch='{$batch}',empstatus='{$empstatus}',phno='{$phno}',design='{$desig}',email='{$email}',cur_cmp_name='{$cmp_name}',cur_cmp_details='{$cmp_details}',img_path='{$image_path}' where sno='{$action}'";

        if ($con->query($sql)) {
            echo "
                    <td>{$rollno}</td>
                            <td>{$name}</td>
                            <td>{$batch}</td>
                            <td>{$empstatus}</td>
                            <td>{$cmp_name}</td>
                            <td>{$cmp_details}</td>
                            <td>{$desig}</td>
                            <td>{$phno}</td>
                            <td>{$email}</td>					
                            <td>
                                 <div id='action'>
                                 <div id='del' class='del' sno='{$action}'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M7 4V2H17V4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7ZM6 6V20H18V6H6ZM9 9H11V17H9V9ZM13 9H15V17H13V9Z'></path></svg><span>Delete</span>
                                </div>
                                <div id='update' class='edit' sno='{$action}'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M5 18.89H6.41421L15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89ZM21 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L9.24264 18.89H21V20.89ZM15.7279 6.74785L17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785Z'></path></svg>
                                <span>Update</span>
                                </div>
                                 </div>
                            </td>";
        }
    }
}
    }
?>