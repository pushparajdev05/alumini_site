<?php
include "../config.php";
	$action=mysqli_real_escape_string($con,$_POST["sno2"]);
	$rollno=mysqli_real_escape_string($con,$_POST["rollno"]);
	$name=mysqli_real_escape_string($con,$_POST["studname"]);
	$event_date=mysqli_real_escape_string($con,$_POST["date"]);
	$event_title=mysqli_real_escape_string($con,$_POST["title"]);
	$event_desc=mysqli_real_escape_string($con,$_POST["desc"]);
	if($action=="0"){
		$sql="insert into contributions (rollno,name,event_date,event_title,event_desc) values ('{$rollno}','{$name}','{$event_date}','{$event_title}','{$event_desc}')";

		if($con->query($sql))
        {
			$sno=$con->insert_id;
			echo"<tr class='{$sno}'>
                            <td>{$rollno}</td>
                            <td>{$name}</td>
                            <td>{$event_date}</td>
                            <td>{$event_title}</td>
                            <td>{$event_desc}</td>					
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
		$sql="update contributions set rollno='{$rollno}',name='{$name}',event_date='{$event_date}',event_title='{$event_title}',event_desc='{$event_desc}' where sno='{$action}'";

		if($con->query($sql))
        {
			echo "<td>{$rollno}</td>
                            <td>{$name}</td>
                            <td>{$event_date}</td>
                            <td>{$event_title}</td>
                            <td>{$event_desc}</td>				
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