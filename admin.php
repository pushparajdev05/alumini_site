
    <?php
        include "./backend/config.php";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/form_field.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/datatable/dataTables.dataTables.css">
    <link rel="stylesheet" href="./css/datatable/buttons.dataTables.css">
    <title>Students_view</title>
</head>
<body>
    <?php
        include "./component/header.html";
    ?>
    <div id="field">
         <?php
        include "./component/form_field.html";
    ?>
    </div>
    <div id="option_list">
        <div id="add_btn">
        <div data-tooltip="Add Alumini" class="button">
            <div class="button-wrapper">
            <div class="text">Add</div> 
            <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z"></path></svg>
                </svg>
            </span>
            </div>
        </div>

        </div>
    </div>
    </div>       
        <table id="myTable" class="display">
        <thead>
            <tr>
                <th>RollNO</th>
                <th>Student Name</th>
                <th>Batch</th>
                <th>Phone NO</th>
                <th>Company Name</th>
                <th>Designation</th>
                <th>E-mail ID</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql="select * from aluminis";
                $res=$con->query($sql);
                if($res->num_rows>0)
                {
                    while($row=$res->fetch_assoc())
                    {	
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
                }
            ?>
        </tbody>

    </table>
    <script src="./javascript/datatable/jquery-3.7.1.js"></script>
    <script src="./javascript/datatable/datatable.js"></script>
    <script src="./javascript/datatable/buttons.dataTables.js"></script>
    <script src="./javascript/datatable/dataTables.buttons.js"></script>
    <script src="./javascript/datatable/jszip.min.js"></script>
    <script src="./javascript/datatable/pdfmake.min.js"></script>
    <script src="./javascript/datatable/vfs_fonts.js"></script>
    <script src="./javascript/datatable/buttons.html5.min.js"></script>
    <script>
        let table = new DataTable('#myTable',
    {
                layout: {
                    topStart: {
                        buttons: ['copy', 'csv', 'excel', 'pdf']
                    }
                }
            }
);

    //close button for alumini form field
    const close_btn = document.getElementById("close");
    const add_btn = document.getElementById("add_btn");
    const form_field= document.getElementsByClassName("form_field");
    close_btn.addEventListener("click", () => {
        form_field[0].style.display = "none";
        document.body.style.overflowY = "auto";
    });
    add_btn.addEventListener("click", () => {
        form_field[0].style.display = "block";
        document.body.style.overflowY = "hidden";
    });

    </script>
</body>
</html>