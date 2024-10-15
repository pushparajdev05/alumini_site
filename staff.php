
     <?php
    session_start();
    if(!isset($_SESSION["staff"]))
    {
        $from=$_SESSION["from"];
        header("location: ./{$from}");
        die();
    }
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
    <link rel="stylesheet" href="./css/filter.css">
    <link rel="stylesheet" href="./css/popup.css">
    <link rel="stylesheet" href="./css/datatable/dataTables.dataTables.css">
    <!-- <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script> -->
    <script>
        function logout()
        {
            location.href="./backend/authentication/staff_logout.php";
        }
    </script>
    <title>Staff Page</title>
</head>
<body>
    <?php
        include "./component/header_logout.html";
    ?> 
    <div>   
    <section id="table_section">
            <div id="filter_pane">
                <?php
                    include "./component/filters_staff.html";
                ?>
            </div>
            <table id="myTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>RollNO</th>
                        <th>Student Name</th>
                        <th>Batch</th>
                        <th>Company Name</th>
                        <th>Company details</th>
                        <th>Designation</th>
                        <th>Phone number</th>
                        <th>Email ID</th>
                        <th>Contributions</th>
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
                                echo"<tr>
                                    <td>{$row["rollno"]}</td>
                                    <td>{$row["studname"]}</td>
                                    <td>{$row["batch"]}</td>
                                    <td>{$row["cur_cmp_name"]}</td>
                                    <td>{$row["cur_cmp_details"]}</td>
                                    <td>{$row["design"]}</td>				
                                    <td>{$row["phno"]}</td>				
                                    <td>{$row["email"]}</td>				
                                    <td class='view'>view</td>				
                                </tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>    
                    </section>
    </div>
    <section id="pop_up">
    <div id="content">
          <div class="close" id="contribution_close">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM12 10.5858L14.8284 7.75736L16.2426 9.17157L13.4142 12L16.2426 14.8284L14.8284 16.2426L12 13.4142L9.17157 16.2426L7.75736 14.8284L10.5858 12L7.75736 9.17157L9.17157 7.75736L12 10.5858Z"></path></svg>
  </div>
        <!-- <h1 class="font_style">Loading...</h1> -->
                <!-- <h1 class="font_style">Loading...</h1>
                <table id="pop_table">
                    <tbody>
                        <tr>
                            <td>Roll No</td>
                            <td>23it136</td>
                        </tr>
                        <tr>
                            <td>Student Name</td>
                            <td>Pushparaj P</td>
                        </tr>
                                <tr class="event"><td>Event_1</td></tr>
                                <tr>
                                    <td>Event Date</td>
                                    <td>23/12/2024</td>
                                </tr>
                                <tr>
                                    <td>Event Title</td>
                                    <td>Workshops</td>
                                </tr>
                                <tr>
                                    <td class="Description">Event Description</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, corporis adipisci doloremque quos, recusandae nobis enim blanditiis quasi fugit iusto sequi! Laudantium nostrum veniam neque similique cum non quasi asperiores praesentium unde omnis? Assumenda ea eum quia soluta dolorum ratione cupiditate quisquam impedit, cumque, quaerat molestias laboriosam pariatur accusamus dolorem!</td>
                                </tr>
                    </tbody>    
                </table> -->
    <div id="data">
            <h1 class="font_style">
                Loading...
            </h1>
    </div>
    </div>
</section>
    <script src="./javascript/filter_pane.js"></script>
    <script src="./javascript/datatable/jquery-3.7.1.js"></script>
    <script src="./javascript/datatable/datatable.js"></script>
        <script src="./javascript/ajax.js"></script>
        <!-- <script src="./javascript/sign_out.js"></script> -->

    <script>
        let table = new DataTable('#myTable');
    </script>
</body>
</html>