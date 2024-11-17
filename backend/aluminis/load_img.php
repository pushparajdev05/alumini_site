<?php
//upload csv file
    include "../config.php";

function getImagepath( $file_name,$file_tmp,$file_size,$target_dir)
{
    $target_file = basename($file_name);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image

    $check = getimagesize($file_tmp);
    if ($check == false) {
        $uploadOk = 0;
        // echo "image is not real one, it's fake one among the image list";
        return $uploadOk;
    }

    // Check if file already exists


    // Check file size
    if ($file_size > 6291456) {
        $uploadOk = 0;
        // echo "Sorry, your file is too large. try to upload image with 5MB";
        return $uploadOk;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    ) {
        $uploadOk = 0;
        // echo "Sorry, only JPG, JPEG, PNG  files are allowed.";
        return $uploadOk;
    }
    //TODO: img path for project and table of database

    $img_current_path = $target_dir .$file_name;

        if (file_exists($img_current_path)) {
            unlink($img_current_path);
            // echo "Sorry, file already exists.";
        }

    return $uploadOk;
    // Check if $uploadOk is set to 0 by an error

}
// echo json_encode([4, "request can get"]);

if (isset($_FILES['img_files'])) {
    $target_dir = "aluminis_img/";
    $images = 1;
    $image_verification_error = [
        101,
        0,
        "0", "<h2 style='text-align:justify;'>those images has not uploaded as images are not satisfied below</h2><br>
    <h3 style='text-align:justify;text-decoration:underline;'>the criteria of images </h3>
										<p style='text-align:justify;'>1. Image size must be in 5mb<br>
										2. Image type must be jpg or png or jpeg. <br>
										3. Image should be real image type,not to be fake one. <br><br>
                                        but except them rest of images has verfication and uploaded
										.<p>"
    ];
    // $count=0;

    // Loop through each file
    //  header('Content-Type: application/json');   

    $affected = 0;
    foreach ($_FILES['img_files']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['img_files']['name'][$key];
        $file_tmp = $_FILES['img_files']['tmp_name'][$key];
        $file_size = $_FILES['img_files']['size'][$key];
        $file_error = $_FILES['img_files']['error'][$key];
        $uploadOk = getImagepath($file_name, $file_tmp, $file_size, $target_dir);
        $roll = "";

        //path separation

        $file_current_path = $target_dir . $file_name;
        $img_path = "backend/aluminis/aluminis_img/";
        $raw_file_name = trim(strtolower(pathinfo($file_name, PATHINFO_FILENAME)));
        //  $stmt->bind_param("ss", $img_path,$raw_file_name);
        // $roll = $raw_file_name;
        if ($uploadOk == 0) {
            $image_verification_error[2] = $image_verification_error[2] === "0" ? "" : $image_verification_error[2];
            $count = $key + 1;
            $image_verification_error[1] += 1;
            $image_verification_error[2] .= "{$count},";
        } else {
            if (move_uploaded_file($file_tmp, $file_current_path)) {
                $img_path .= $file_name;
                $sql4 = "select rollno from aluminis where rollno = '{$raw_file_name}'";
                $res = $con->query($sql4);
                if ($res->num_rows) {
                    if ($row = $res->fetch_assoc()) {
                        $roll = $row["rollno"];
                        // echo $roll;
                         $stmt = "update aluminis set img_path = '{$img_path}' where rollno = '{$roll}'";
                    // echo $stmt;
                        if ($con->query($stmt)) {
                                $images += 1;
                         } else {
                                unlink($file_current_path);
                         }
                        } else {
                            unlink($file_current_path);
                            echo json_encode([4, "sorry there is a problem in update path of rollno"]);
                        }
                        //     echo json_encode([4, "none of the images has added to server, try to give correct rollno to image that you want to add {$row['rollno']}"]);
                        // }
                    } else {
                        unlink($file_current_path);
                        echo json_encode([4, "sorry this $images image rollno does not exist in alumini table , try to give correct rollno"]);
                    exit();
                    }

                    // echo "raw file name  :{$raw_file_name}";
                   
                } else {

                    echo json_encode([4, "sorry there is a problem to move .$images image to server folder and earlier image has uploaded if images has satisfied the criteria to check visit student page"]);
                    exit();
                }
            }
        }
        if ($image_verification_error[1] > 0) {

            echo json_encode($image_verification_error);
        } else if ($images > 0) {
            echo json_encode([1, "all images have successfully uploaded."]);
        } else {

            /* $sql4 = "select rollno from aluminis where rollno = '{$roll}'";
            $res = $con->query($sql4);
            if($res->num_rows)
            {
                if($row=$res->fetch_assoc())
                {
                    echo json_encode([4, "none of the images has added to server, try to give correct rollno to image that you want to add {$row['rollno']}"]);
                }
            }
            else{
                echo json_encode([4, "there is no row selected"]);
            }
     */
            echo json_encode([4, "none of the images has added to server, try to give correct rollno to image that you want to add."]);


        }
        // $con->close();
    }
else
{
    echo json_encode([4,"uploading files not Found"]);
        // $con->close();    
}
?>
