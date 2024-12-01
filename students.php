
    <?php
        include './backend/config.php';
    session_start();
    $_SESSION["from"] = "students.php?page=2";
    ?>
<!DOCTYPE html> 
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='./css/header.css'>
    <link rel='stylesheet' href='./css/students.css'>
    <link rel='stylesheet' href='./css/student_table.css'>
    <link rel='stylesheet' href='./css/login.css'>
    <link rel='stylesheet' href='./css/filter.css'>
    <link rel='stylesheet' href='./css/popup.css'>
    <link rel='stylesheet' href='./css/student_responsive.css'>
    <link rel="stylesheet" href="./assets/packages/sweetalert2/sweetalert2.min.css">
    <!-- <link rel='stylesheet' href='./css/footer.css'> -->
    <link rel='stylesheet' href='./css/datatable/dataTables.dataTables.css'>
    <title>Students_view</title>
    
</head>
<body>
    <?php
        include './component/header.html';
    ?>
    <div id='login_form'>
            <?php
        include './component/login_form.html';
    ?> 
    </div>  
    <section id='table_section'>
        <div id='filter_pane'>
            <?php
                include './component/filters_student.html';
            ?>
        </div>
        <table id='myTable' class='display' style='width:100%'>
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql='select rollno,studname,batch,cur_cmp_name,empstatus,img_path from aluminis';
                $res=$con->query($sql);
                if($res->num_rows>0)
                {
                    while($row=$res->fetch_assoc())
                    {	
                        echo"<tr rollno='{$row["rollno"]}'>
                    <td>
                <div class='accrodian_wrapper'>
                    <div class='accrodian'>
                        <div class='header' count='0' action='close'>
                            <div class='head'>
                                <div class='left'>
                                    <img src='{$row["img_path"]}' alt='No Image'>
                                </div>
                                <div class='right'>
                                    <div class='row'>
                                        <div class='cols'>Name<span>:</span></div>
                                        <div class='cols'> {$row["studname"]}</div>
                                    </div>
                                    <div class='row'>
                                        <div class='cols'>Roll No<span>:</span></div>
                                        <div class='cols'> {$row["rollno"]}</div>
                                    </div>
                                    <div class='row'>
                                        <div class='cols'>Batch<span>:</span></div>
                                        <div class='cols'>{$row["batch"]}</div>
                                    </div>
                                </div>
                            </div>
                            <div class='up_down'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-chevron-down'><path d='m6 9 6 6 6-6'/></svg>
                            </div>
                        </div>
                        <div class='contributions'>
                            <div class='pop_sec'>
                                <div class='row'>
                                    <div class='col1 col'>
                                        <h4 class='font_style'>company Name</h4>
                                    </div>
                                    <div class='col2 col'>
                                        <p class='event_val'>{$row["cur_cmp_name"]}</p>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col1 col'>
                                        <h4 class='font_style'>Employee Status</h4>
                                    </div>
                                    <div class='col2 col'>
                                        <p class='event_val'>{$row["empstatus"]}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>";
                    }
                }
            ?>
            <!-- <tr><td>
                <div class='accrodian_wrapper'>
                    <div class='accrodian'>
                        <div class='header'>
                            <div class='head'>
                                <div class='left'>
                                    <img src='./assets/img/profile_img.jpg' alt='No Image'>
                                </div>
                                <div class='right'>
                                    <div class='row'>
                                        <div class='cols'>Name</div>
                                        <div class='cols'>: Pushparaj P</div>
                                    </div>
                                    <div class='row'>
                                        <div class='cols'>Roll No</div>
                                        <div class='cols'>: 23it136</div>
                                    </div>
                                    <div class='row'>
                                        <div class='cols'>Batch</div>
                                        <div class='cols'>: 2015 - 2017</div>
                                    </div>
                                </div>
                            </div>
                            <div class='up_down'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-chevron-down'><path d='m6 9 6 6 6-6'/></svg>
                            </div>
                        </div>
                        <div class='contributions'>
                            <div class='pop_sec'>
                                <div class='row'>
                                    <div class='col1 col'>
                                        <h4 class='font_style'>company Name</h4>
                                    </div>
                                    <div class='col2 col'>
                                        <p class='event_val'>$roll</p>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col1 col'>
                                        <h4 class='font_style'>Employee Status</h4>
                                    </div>
                                    <div class='col2 col'>
                                        <p class='event_val'>$name</p>
                                    </div>
                                </div>
                            </div>
                            <div class='pop_sec'>
                                <div class='event'>
                                    <h1 class='font_style event_head'>Event {$i}</h1>
                                    <div class='row'>
                                        <div class='col1 col'>
                                            <h4 class='font_style'>Event Date</h4>
                                        </div>
                                        <div class='col2 col'>
                                            <p class='event_val'>{$row['event_date']}</p>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col1 col'>
                                            <h4 class='font_style'>Event Title</h4>
                                        </div>
                                        <div class='col2 col'>
                                            <p class='event_val'>{$row['event_title']}</p>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col1 col'>
                                            <h4 class='font_style'>Event Description</h4>
                                        </div>
                                        <div class='col2 col'>
                                            <p class='event_val'>{$row['event_desc']}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            </tr> -->
        </tbody>
    </table>
</section> 
<!-- <section id='pop_up'>
    <div id='content'>
          <div class='close' id='contribution_close'>
    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'><path d='M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM12 10.5858L14.8284 7.75736L16.2426 9.17157L13.4142 12L16.2426 14.8284L14.8284 16.2426L12 13.4142L9.17157 16.2426L7.75736 14.8284L10.5858 12L7.75736 9.17157L9.17157 7.75736L12 10.5858Z'></path></svg>
  </div>
    <div id='data'>
            <h1 class='font_style'>
                Loading...
            </h1>
    </div>
    </div>
</section> -->
<?php
// include './component/footer.html';
?>
    <script src='./javascript/datatable/jquery-3.7.1.js'></script>
    <script src='./javascript/datatable/datatable.js'></script>
    <script src="./javascript/sign_out.js"></script>
    <script src='./javascript/general.js'></script>
    <script type='module' src='./javascript/sign_in.js'></script>
    <script type='module' src='./javascript/contribution.js'></script>
    <script type='module' src='./javascript/filter_pane.js'></script>
    <script type='module' src='./javascript/login_signup.js'></script>
    <script type='module' src='./javascript/navbar.js'></script>
    <script src="./assets/packages/sweetalert2/sweetalert2.all.min.js"></script>
  
    <script>
        let table = new DataTable('#myTable');
    </script>   
            <script>
        var session_login="<?php echo $_SESSION["login"]??null?>";
        const menu_option = document.getElementById("nav_option").children;
        const profile_text=document.getElementById("profile_text");
        console.log(menu_option);
            if (session_login == "admin")
            {
                menu_option[2].style.display="block";
                menu_option[4].style.display="flex";
                menu_option[5].style.display="none";
                profile_text.innerText="Admin";
            }
            else if(session_login == "staff")
            {
                menu_option[3].style.display="block";
                menu_option[4].style.display="flex";
                menu_option[5].style.display="none";
                profile_text.innerText="Staff";

            }
            else
            {
                menu_option[2].style.display="none";
                menu_option[3].style.display="none";
                menu_option[5].style.display="block";

            }
        </script>
    </body>
</html>