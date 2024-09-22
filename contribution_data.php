
    <?php
        include './backend/config.php';
        $rollno=mysqli_real_escape_string($con,$_POST['rollno']);
        $sql='select * from contributions';
        $res=$con->query($sql);
        $roll = "";
        $name = "";
        $i = 0;
        if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $i += 1;
            if (empty($roll) && empty($name)) {
                $roll=$row['rollno'];
                $name = $row['name'];
                $section1 = "
                <div class='pop_sec'>
            <div class='row'>
                <div class='col1 col'>
                    <h4 class='font_style'>Rollno</h4>
                </div>
                <div class='col2 col'>
                    <p class='event_val'>$roll</p>
                </div>
            </div>
            <div class='row'>
                <div class='col1 col'>
                    <h4 class='font_style'>Student Name</h4>
                </div>
                <div class='col2 col'>
                    <p class='event_val'>$name</p>
                </div>
            </div>
        </div>";
            }
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
            echo 'No Contributions';
        }
    ?>