<?php
	if($uid=="0"){
		$sql="insert into user (NAME,EMAIL,MOBILE) values ('{$name}','{$email}','{$mobile}')";
		if($con->query($sql)){
			$uid=$con->insert_id;
			echo"<tr class='{$row["sno"]}'>
                            <td>{$row["rollno"]}</td>
                            <td>{$row["name"]}</td>
                            <td>{$row["batch"]}</td>
                            <td>{$row["phno"]}</td>
                            <td>{$row["cmp_name"]}</td>
                            <td>{$row["desig"]}</td>
                            <td>{$row["email"]}</td>					
                            <td>
                                 <div id='action'>
                                 <div id='del'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M7 4V2H17V4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7ZM6 6V20H18V6H6ZM9 9H11V17H9V9ZM13 9H15V17H13V9Z'></path></svg><span>Delete</span>
                                </div>
                                <div id='update'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M5 18.89H6.41421L15.7279 9.57627L14.3137 8.16206L5 17.4758V18.89ZM21 20.89H3V16.6473L16.435 3.21231C16.8256 2.82179 17.4587 2.82179 17.8492 3.21231L20.6777 6.04074C21.0682 6.43126 21.0682 7.06443 20.6777 7.45495L9.24264 18.89H21V20.89ZM15.7279 6.74785L17.1421 8.16206L18.5563 6.74785L17.1421 5.33363L15.7279 6.74785Z'></path></svg>
                                <span>Update</span>
                                </div>
                                 </div>
                            </td>					
                        </tr>";
			
		}
	}else{
		$sql="update user set NAME='{$name}',EMAIL='{$email}',MOBILE='{$mobile}' where sno='{$sno}'";
		if($con->query($sql)){
			echo"
				<td>{$name}</td>
				<td>{$email}</td>
				<td>{$mobile}</td>
				<td><a href='#' class='btn btn-primary edit' uid='{$uid}'>Edit</a></td>
				<td><a href='#' class='btn btn-danger del' uid='{$uid}'>Delete</a></td>					
			";
		}
	}
?>