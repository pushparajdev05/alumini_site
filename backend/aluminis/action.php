<?php
include "../config.php";
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
	if($action=="0"){
		$sql="insert into aluminis (rollno,studname,batch,empstatus,cur_cmp_name,cur_cmp_details,design,phno,email) values ('{$rollno}','{$name}','{$batch}','{$empstatus}','{$cmp_name}','{$cmp_details}','{$desig}','{$phno}','{$email}')";

		if($con->query($sql))
        {
			$sno=$con->insert_id;
			echo"<tr class='{$sno}'>
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
	}
    else
    {
		$sql="update aluminis set rollno='{$rollno}',studname='{$name}',batch='{$batch}',empstatus='{$empstatus}',phno='{$phno}',design='{$desig}',email='{$email}',cur_cmp_name='{$cmp_name}',cur_cmp_details='{$cmp_details}' where sno='{$action}'";

		if($con->query($sql))
        {
			echo"
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
?>