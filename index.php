<?php
//include header part of html
include ('header.php')
    ?>
    
<h1>School Managemet System</h1>
<div class="header">
    <div class="header-center">
        <a class="active" href="#home">Home</a>
        <a href="#contact">Contact</a>
        <a href="login.php">Login</a>
    </div>
</div>
<div class="bg-image"></div>

<div class="student-info text-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 jumbotron">
                <h2>Student Information</h2>
                <form action="index.php" method="post">
                    <input type="text" name="roll" placeholder="Enter Roll Number"
                        style="width: 300px;height: 30px;"><span><span>OR/AND<span><span>
                            <select name="standard" class="btn btn-info">
                                <option>SELECT STANDARD</option>
                                <option>1st</option>
                                <option>2nd</option>
                                <option>3rd</option>
                                <option>4th</option>
                                <option>5th</option>
                            </select>
                            <input type="submit" name="show" value="SHOW INFO" class="btn btn-success text-center"
                                style="margin-left: 20px;">
                </form>
            </div>
        </div>
    </div>
</div>

<table class="table table-striped table-bordered table-responsive text-center">
    <tr>
        <th class="text-center">Roll No.</th>
        <th class="text-center">Standard</th>
        <th class="text-center">Full Name</th>
        <th class="text-center">City</th>
        <th class="text-center">parent phone No.</th>
        <th class="text-center">Profile Pic</th>
    </tr>
    <?php
    include ('dbcon.php');
    if (isset ($_POST['show'])) {

        $Standard = $_POST['standard'];
        $RollNo = $_POST['roll'];

        $sql = "SELECT * FROM `student` WHERE `standard` = '$Standard' OR `rollno`='$RollNo'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($DataRows = mysqli_fetch_assoc($result)) {
                $Id = $DataRows['id'];
                $RollNo = $DataRows['rollno'];
                $Name = $DataRows['name'];
                $City = $DataRows['city'];
                $Pcontact = $DataRows['pcontact'];
                $Standard = $DataRows['standard'];
                $ProfilePic = $DataRows['image'];
                ?>
                <tr>
                    <td>
                        <?php echo $RollNo; ?>
                    </td>
                    <td>
                        <?php echo $Standard; ?>
                    </td>
                    <td>
                        <?php echo $Name; ?>
                    </td>
                    <td>
                        <?php echo $City; ?>
                    </td>
                    <td>
                        <?php echo $Pcontact; ?>
                    </td>
                    <td><img src="databaseimg/<?php echo $ProfilePic; ?>" alt="img"></td>
                </tr>
                <?php

            }

        } else {
            echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
        }
    }

    ?>



    <!--include header part of html-->
    <?php include ('footer.php') ?>