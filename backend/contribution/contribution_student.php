
    <?php
        include '../config.php';
        $rollno=mysqli_real_escape_string($con,$_POST['rollno']);
        $sql="select * from contributions where rollno='{$rollno}'";
        $res=$con->query($sql);
        $i = 0;
        if ($res->num_rows > 0) {
        $section1 = "";
        while ($row = $res->fetch_assoc()) {
            
            $i += 1;
            $section1.="
        <div class='pop_sec'>
            <div class='event'>
            <h1 class='font_style event_head'>Event {$i}</h1>
            <div class='row'>
                <div class='col1 col'>
                    <h4 class='font_style'>Event Date</h4>
                </div>
                <div class='col2 col'>
                    <p class='event_val'>{$row["event_date"]}</p>
                </div>
            </div>
            <div class='row'>
                <div class='col1 col'>
                    <h4 class='font_style'>Event Title</h4>
                </div>
                <div class='col2 col'>
                    <p class='event_val'>{$row["event_title"]}</p>
                </div>
            </div>
            <div class='row'>
                <div class='col1 col'>
                    <h4 class='font_style'>Event Description</h4>
                </div>
                <div class='col2 col'>
                    <p class='event_val'>{$row["event_desc"]}</p>
                </div>
            </div>
            </div>
        </div>
            ";
            }
            echo $section1;
        }
        
        else
        {
            echo "<h4 class='font_style contribute'>No Contributions</h4>";
        }
    ?>