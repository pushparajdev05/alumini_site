
    <?php
        include "./backend/config.php";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/students.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/datatable/dataTables.dataTables.css">
    <title>Students_view</title>
</head>
<body>
    <?php
        include "./component/header.html";
    ?>
    <div id="login_form">
            <?php
        include "./component/login_form.html";
    ?> 
    </div>       
        <table id="myTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>RollNO</th>
                <th>Student Name</th>
                <th>Batch</th>
                <th>Company Name</th>
                <th>Designation</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql="select sno,rollno,name,batch,cmp_name,desig from aluminis";
                $res=$con->query($sql);
                if($res->num_rows>0)
                {
                    while($row=$res->fetch_assoc())
                    {	
                        echo"<tr class='{$row["sno"]}'>
                            <td>{$row["rollno"]}</td>
                            <td>{$row["name"]}</td>
                            <td>{$row["batch"]}</td>
                            <td>{$row["cmp_name"]}</td>
                            <td>{$row["desig"]}</td>				
                        </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    <script src="./javascript/datatable/jquery-3.7.1.js"></script>
    <script src="./javascript/datatable/datatable.js"></script>
    <script src="./javascript/general.js"></script>
    <script type="module" src="./javascript/authentication.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>
</html>