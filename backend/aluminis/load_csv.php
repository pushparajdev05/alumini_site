<?php

include '../config.php';

$csvFile = 'aluminis_img/load_csv.csv';
$uploaded = false;

if (isset($_FILES['csv'])) {
    $file_name = $_FILES["csv"]["name"];
    $target_file = basename($file_name);
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($FileType != "csv") {
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        echo "file does not seem to be csv file type";
        exit();
    }
    if ($uploadOk == 0) {

            echo "something went wrong,CSV have not uploaded on server ";

    } else {
        if (move_uploaded_file($_FILES["csv"]["tmp_name"],$csvFile)) {
            $uploaded = true;
        } else {
            // echo "CSV file cannot move to server";
            echo "sorry there is a problem to move file to server folder";
        }
    }
}
else
{
    echo "CSV File not Found";
}


// Path to the CSV file

if($uploaded==true)
{
    if (file_exists($csvFile)) {
        if (($handle = fopen($csvFile, "r")) !== FALSE) {
            $count = 0;
            $header = fgetcsv($handle, 1000, ",");
            $img_path = "backend/aluminis/aluminis_img/no_image.jpg";
            while (($data = fgetcsv($handle, 1200, ",")) !== FALSE) 
            {
                $rollno = trim($data[0]);
                $name = trim($data[1]);
                $batch = trim($data[2]);
                $empstatus = trim($data[3]);
                $cmp_name = trim($data[4]);
                $cmp_details = trim($data[5]);
                $desig = trim($data[6]);
                $phno = trim($data[7]);
                $email = trim($data[8]);
                $stmt = $con->prepare("insert into aluminis (rollno,studname,batch,empstatus,cur_cmp_name,cur_cmp_details,design,phno,email,img_path) values (?,?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param("ssssssssss", $rollno, $name, $batch, $empstatus, $cmp_name, $cmp_details, $desig, $phno, $email, $img_path);
                if ($stmt->execute()) 
                {
                    $count+=1;
                }
                else
                {
                    echo "A error occur while inserting the {$count} data line in CSV File,the error is :" . $stmt->error;
                    unlink($csvFile);
                    exit();

                }
            }
            fclose($handle);
            unlink($csvFile);
            if($count > 0)
            {
                echo 1;
            }
        }
         else
        { 
            echo "Error opening the csv file";
        }
    } else {
        echo "CSV file not Found";
    }
}
else
{
    echo "csv file has not uploaded";
}


?>
