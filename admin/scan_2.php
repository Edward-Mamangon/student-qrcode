<?php

session_start();
if (!isset($_SESSION['user_name'])) {
  header("Location: index.php");
}

include 'includes/header.php';
include 'includes/sidebar.php';
// include 'scan_modal.php';

$conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");

$teacher_name = $_SESSION['user_name'];
$subject = $_SESSION['subject'];
$st_id = $_SESSION['subject_teacher_id'];
$grade = $_SESSION['grade'];
$section = $_SESSION['section'];
$today = date('Y-m-d');

//Insert new default attendance record
if (isset($_POST['checkAttendance'])) {
    $teacher_id = $_SESSION ['id'];
    $queryInsert = "INSERT INTO class_attendance (id, subject_teacher_id, time_logged, date_created)
                        SELECT s.id, ss.subject_teacher_id, 'NULL' AS time_logged, NOW() AS date_created
                        FROM student_tbl AS s
                        INNER JOIN student_subject AS ss ON s.id = ss.id
                        INNER JOIN subject_teacher AS st ON ss.subject_teacher_id = st.subject_teacher_id
                        INNER JOIN teacher_tbl AS t ON st.id = t.id
                        INNER JOIN subject_tbl AS sub ON st.subject_id = sub.subject_id
                        WHERE s.grade = '$grade' AND s.section = '$section' AND st.subject_teacher_id = '$st_id' 
                        GROUP BY s.id";
     $query_result_insert = mysqli_query($conn, $queryInsert);
     if ($query_result_insert) {
        echo "<script> alert('New Attendance record.')</script>";
        // echo "Saved!";
        // $_SESSION['success'] = "New Attendance record";
        // header("Location: checkAttendance.php");

        }
    else {
        echo "<script> alert('New Attendance Failed.')</script>";
        // $_SESSION['status'] = "Failed!";
        // header("Location: checkAttendance.php");
    }
}


// Updating class_attendance table
if(isset($_POST['id'])) {
    // $idnumber = $_POST['idnumber'];
    $id = $_POST['id'];

    $sqlCheck = "SELECT * FROM student_tbl WHERE id= '$id' AND grade = '$grade' AND section = '$section' ";
    $queryCheck =  mysqli_query($conn, $sqlCheck);
    $row_res = mysqli_fetch_array($queryCheck);

    if ($row_res) {

        $sql = "UPDATE class_attendance SET time_logged = NOW() WHERE id = '$id' AND date_created = '$today' ";
        // $sql = "INSERT INTO class_attendance (id, subject_teacher_id, time_logged, date_created) VALUES('$id', $st_id, NOW(), NOW())";
        $query = mysqli_query($conn, $sql);
        
        if ($query) {
            echo "<script> alert('Data sent successfully.')</script>";
            // $_SESSION['success'] = "Data sent successfully.";
            // header("Location: scan.php");
        } else {
            echo "<script> alert('Send data failed.')</script>";
            // $_SESSION['status'] = "Send data Failed!";
            // header("Location: scan.php");
        }
    } else {
        echo "<script> alert('Error: Student does not exist.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

</head>
<body>
   
   <div class="content-wrapper" style="margin-top: 100px">
        <div class="row">
            <div class="col-lg-6 col-6 mb-3">
                <video width="100%" id = "MyCameraOpen" style="margin-left: 150px"></video> 
            </div>
        </div>
        <div class="form-group ml-4 mr-4">
            <form action="" method="post">
                <label for="">Student Number</label>
                <input type="text" name="id" id="id" class="form-control" readonly>
            </form>
            <form action="scan_2.php" method="post">
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <label for="">Teacher</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $teacher_name ?>" readonly>
                    </div>
                    <div class="col-lg-6 col-6">
                        <label for="">Subject</label>
                        <input type="text" name="subject" id="subject" class="form-control" value="<?php echo $_SESSION['subject'] ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <label for="">Grade</label>
                        <input type="text" name="grade" id="grade" class="form-control" value="<?php echo $_SESSION['grade'] ?>" readonly>
                    </div>
                    <div class="col-lg-6 col-6">
                        <label for="">Section</label>
                        <input type="text" name="section" id="section" class="form-control" value="<?php echo $_SESSION['section'] ?>" readonly>
                    </div>
                </div>
                <input type="hidden" name="subject_teacher_id" id="subject_teacher_id" class="form-control" value="<?php echo $_SESSION['subject_teacher_id'] ?>" readonly> <br>

                <!--Check Attendance Button -->
                <div class="form-group">
                    <button style="margin-bottom: 10px;" type="submit" name="checkAttendance" class="btn btn-success" >
                        New Attendance
                    </button>
                
                </div>
            </form>
        </div>
 
    <!-- ====================== Table Section ================================== -->
    <div class="container m-3">
        <table id="datatable_id" class="table table-striped mt-5" id="dataTable" width="100%" cellspacing="0" >

                <?php  
                // if(isset($_SESSION['success']) && $_SESSION['success'] != '') {
                //     echo '<h6 style="background: #15ca52; color: #000; font-size: 20px;"> '.$_SESSION['success'].' </h6>';
                //     unset($_SESSION['success']);
                // } 

                // if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
                // echo '<h6 style="background: #970f0f; color: #fff; font-size: 20px;"> '.$_SESSION['status'].' </h6>';
                // unset($_SESSION['status']);
                // } 
                ?>
            <thead>
            <tr>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Subject Teacher</th>
                <th>Time Logged</th>
                <th>Date</th>
                <!-- <th>Section</th>
                <th>Time</th>-->
                <th>Action</th> 
            </tr>
            </thead>
            <tbody>

            <?php
                // Query for displaying results in table
                $teacher_id = $_SESSION['id'];
                $queryAttendance = "SELECT s.id, s.fname, s.lname, ca.subject_teacher_id, ca.time_logged, ca.date_created
                                FROM student_tbl AS s 
                                INNER JOIN class_attendance AS ca ON s.id = ca.id
                                WHERE s.grade = '$grade' AND s.section = '$section' AND date_created = '$today' " ;
                                // INNER JOIN subject_teacher AS st ON ca.subject_teacher_id = st.subject_teacher_id
                                // INNER JOIN teacher_tbl AS t ON st.id = t.id
                                // INNER JOIN subject_tbl AS sub ON st.subject_id = sub.subject_id
                            
                $result = mysqli_query($conn, $queryAttendance);

            ?>
            
            <?php
                // if(mysqli_num_rows($result) > 0) {        
                $i = 1;
                while ($st_row = mysqli_fetch_array($result)) {
            ?>

            <tr>
                <td><?php echo $st_row['id']; ?> </td>
                <td><?php echo $st_row['fname']; ?></td>
                <td><?php echo $st_row['lname']; ?></td>
                <td><?php echo $st_row['subject_teacher_id']; ?></td>
                <td><?php echo $st_row['time_logged']; ?></td>
                <td><?php echo $st_row['date_created']; ?></td>
                <!-- <td><?php //echo $st_row['section']; ?></td>
                <td><?php //echo $st_row['date_created']; ?></td> -->
                <td>
                    <button class="scanQR-btn" type="submit" style="font-size: 13px;  color:white; background-color: green;"><i class="fas fa-edit"></i></button>
                </td>
                
            </tr>
            <?php
                $i++; }
            
                
            ?>

            </tbody>
        </table>
    </div>
</div>



<script>
        // step 1: Start camera section
        var video = document.getElementById("MyCameraOpen");
        var id = document.getElementById("id");
        // var text = document.getElementById("time");

        var scanner = new Instascan.Scanner({
            video : video
        });

        Instascan.Camera.getCameras()
        .then(function(Our_Camera) {
            if(Our_Camera.length > 0) {
                scanner.start(Our_Camera[0]);
            }else {
                alert("Camera Failed.");
            }
        })
        .catch(function(error) {
            console.log("Error: Please try again.")
        })

        // step 2: Input text section
        scanner.addListener('scan', function(input_value) {
           id.value = input_value

            document.forms[0].submit();
        })
</script>

<!--------- FOR Scanning QR modal ---------->
<!-- <script>
    $(document).ready( function() {

        $('.scanQR-btn').on('click', function() {
            $('#scanQR').modal('show');


              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function() {
                  return $(this).text();

              }).get();

              console.log(data);

              $('#id').val(data[0]);
              $('#fname').val(data[1]);
              $('#lname').val(data[2]);
              $('#time').val(data[3]);
              $('#date').val(data[6]);

        });
    });
</script> -->
</body>
</html>

<?php
include 'includes/footer.php';
?>