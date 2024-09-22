
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
    <link rel="stylesheet" href="./css/filter.css">
    <link rel="stylesheet" href="./css/datatable/dataTables.dataTables.css">
    <link rel="stylesheet" href="./css/datatable/buttons.dataTables.css">
        <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
    <title>Students_view</title>
</head>
<body>
    <?php
        include "./component/header_logout.html";
    ?>
    <div id="field" class="form">
        <?php
        include "./component/form_field.html";
        ?>
    </div>
    <div id="field2" class="form">
        <?php
        include "./component/form_contribution.html";
        ?>
    </div> 
    <section id="option_list">
        <?php
        include "./component/fliters_admin.html";
        ?>
          <div id="option_btn">
                <div id="switch_btn" class="option_btn">
                <div data-tooltip="switch table" class="button">
                    <div class="button-wrapper">
                    <div class="text">Switch</div> 
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
                            <path d="M16.9767 19.5C19.4017 17.8876 21 15.1305 21 12C21 7.02944 16.9706 3 12 3C11.3126 3 10.6432 3.07706 10 3.22302M16.9767 19.5V16M16.9767 19.5H20.5M7 4.51555C4.58803 6.13007 3 8.87958 3 12C3 16.9706 7.02944 21 12 21C12.6874 21 13.3568 20.9229 14 20.777M7 4.51555V8M7 4.51555H3.5" stroke="currentColor" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    </div>
                </div>
        
            </div>
            <div id="add_btn" class="option_btn">
            <div data-tooltip="Add Alumini" class="button">
                <div class="button-wrapper">
                <div class="text">Add</div> 
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z" stroke-width="10"></path></svg>
                    </svg>
                </span>
                </div>
            </div>

            </div>
        </div>
    </section>
    <div id="table_view">
    <div id="table1">
    <table id="myTable1" class="display">
        <thead>
            <tr>
                <th>RollNO</th>
                <th>Student Name</th>
                <th>Batch</th>
                <th>Employee Status</th>
                <th>Company Name</th>
                <th>Company details</th>
                <th>Designation</th>
                <th>Phone NO</th>
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
                            <td>{$row["studname"]}</td>
                            <td>{$row["batch"]}</td>
                            <td>{$row["empstatus"]}</td>
                            <td>{$row["cur_cmp_name"]}</td>
                            <td>{$row["cur_cmp_details"]}</td>
                            <td>{$row["design"]}</td>					
                            <td>{$row["phno"]}</td>					
                            <td>{$row["email"]}</td>					
                            <td>
                                 <div id='action'>
                                 <div id='del' class='del' sno='{$row["sno"]}'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M7 4V2H17V4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7ZM6 6V20H18V6H6ZM9 9H11V17H9V9ZM13 9H15V17H13V9Z'></path></svg><span>Delete</span>
                                </div>
                                <div id='update' class='edit' sno='{$row["sno"]}'>
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
    </div>
    <div id="table2">
        <table id="myTable2" class="display">
        <thead>
            <tr>
                <th>RollNO</th>
                <th>Student Name</th>
                <th>Event Date</th>
                <th>Event Title</th>
                <th>Event Description</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql="select * from contributions";
                $res=$con->query($sql);
                if($res->num_rows>0)
                {
                    while($row=$res->fetch_assoc())
                    {	
                        echo"<tr class='{$row["sno"]}'>
                            <td>{$row["rollno"]}</td>
                            <td>{$row["name"]}</td>
                            <td>{$row["event_date"]}</td>					
                            <td>{$row["event_title"]}</td>					
                            <td>{$row["event_desc"]}</td>					
                            <td>
                                 <div id='action'>
                                 <div id='del' class='del' sno='{$row["sno"]}'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M7 4V2H17V4H22V6H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V6H2V4H7ZM6 6V20H18V6H6ZM9 9H11V17H9V9ZM13 9H15V17H13V9Z'></path></svg><span>Delete</span>
                                </div>
                                <div id='update' class='edit' sno='{$row["sno"]}'>
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
    </div>
    </div>
    <script src="./javascript/datatable/jquery-3.7.1.js"></script>
    <script src="./javascript/datatable/datatable.js"></script>
    <script src="./javascript/datatable/buttons.dataTables.js"></script>
    <script src="./javascript/datatable/dataTables.buttons.js"></script>
    <script src="./javascript/datatable/jszip.min.js"></script>
    <script src="./javascript/datatable/pdfmake.min.js"></script>
    <script src="./javascript/datatable/vfs_fonts.js"></script>
    <script src="./javascript/datatable/buttons.html5.min.js"></script>
    <script src="./backend/aluminis/ajax.js"></script>
    <script src="./backend/contribution/ajax.js"></script>
    <script type="module" src="./javascript/authentication.js"></script>
    <script type="module" src="./javascript/sign_out.js"></script>
    <script type="module" src="./javascript/button.js"></script>

    <script type="module"> 
        const table1 = new DataTable('#myTable1',
    {
                layout: {
                    topStart: {
                        buttons: ['copy', 'csv', 'excel', 'pdf']
                    }
                }
            }
);
        const table2 = new DataTable('#myTable2',
    {
                layout: {
                    topStart: {
                        buttons: ['copy', 'csv', 'excel', 'pdf']
                    }
                }
            }
);



    </script>
</body>
</html>