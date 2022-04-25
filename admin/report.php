<?php
error_reporting(0);
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
// $today = date('Y-m-d');

?>
 <?php
      
        
        // if (isset($_POST['date1']) && isset($_POST['date2'])) {
        // if (isset($_POST['reportBtn'])) {
        if (isset($_POST['date1']) && isset($_POST['date2'])) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];

        // Query for displaying results in table
        $teacher_id = $_SESSION['id'];

        $queryAttendance = "SELECT s.id, s.idnumber, s.fname, s.mname, s.lname, ca.time_logged, ca.date_created,
                        CASE WHEN ca.time_logged = '00:00:00' THEN 'Absent'
                        ELSE 'Present'
                        END AS Mark
                        FROM student_tbl AS s 
                        LEFT JOIN class_attendance AS ca ON s.id = ca.id
                        WHERE s.grade = '$grade' AND s.section = '$section' AND ca.date_created >= '$date1' AND date_created <= '$date2' ";
                       
        $result = mysqli_query($conn, $queryAttendance);
     

    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Reports</title>

</head>
<body>
   
   <div class="content-wrapper" style="margin-top: 100px">
        
        <div class="form-group">
            <h1 class="m-3">Attendance Report</h1><br>
            <form action="report.php" method="post" class="ml-5"> 
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
                <input type="hidden" name="subject_teacher_id" id="subject_teacher_id" class="form-control" value="<?php echo $_SESSION['subject_teacher_id'] ?>" readonly> 
               
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <label for="">Start Date</label>
                        <input type="date" name="date1" id="date1" class="form-control" value="" >
                    </div>
                    <div class="col-lg-6 col-6">
                        <label for="">End Date</label>
                        <input type="date" name="date2" id="date2" class="form-control" value="" >
                    </div>
                </div>
                <input type="hidden" name="subject_teacher_id" id="subject_teacher_id" class="form-control" value="<?php echo $_SESSION['subject_teacher_id'] ?>" readonly>
                <br>
                        <!--Generate Report Button -->
                <div class="form-group">
                    <button style="margin-bottom: 10px;" type="submit" name="reportBtn" class="btn btn-success" >
                        Generate Report
                    </button>
             
                </div>
            </form>
        </div>    
   
        <!-- ====================== Table Section ================================== -->
        <div class="container">
            <table id="datatable_id" class="table table-striped mt-3" id="dataTable" width="100%" cellspacing="0" >

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
                <th>ID Number</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Time Logged</th>
                <th>Date</th>
                <th class="bg-info">Mark</th>
                <!-- <th>Section</th>
                <th>Time</th>
                <th>Action</th> -->
            </tr>
            </thead>
            <tbody>

        
            
            <?php
                if(mysqli_num_rows($result) > 0) {        
                    while ($st_row = mysqli_fetch_assoc($result)) {
            ?>

            <tr>
                <td><?php echo $st_row['id']; ?> </td>
                <td><?php echo $st_row['idnumber']; ?> </td>
                <td><?php echo $st_row['fname']; ?></td>
                <td><?php echo $st_row['mname']; ?></td>
                <td><?php echo $st_row['lname']; ?></td>
                <td><?php echo $st_row['time_logged']; ?></td>
                <td><?php echo $st_row['date_created']; ?></td>
                <td class="bg-info"><?php echo $st_row['Mark']; ?></td>
                <!-- <td><?php //echo $st_row['section']; ?></td>
                <td><?php //echo $st_row['date_created']; ?></td>
                <td>
                    <button class="scanQR-btn" type="submit" style="font-size: 13px;  color:white; background-color: green;"><i class="fas fa-edit"></i></button>
                </td> -->
                
            </tr>
            <?php
                 }
            
                }else{
                    echo "No Record Found!";
                }
            ?>

            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('date1').valueAsDate = new Date();
    document.getElementById('date2').valueAsDate = new Date();
</script>

</body>
</html>

<?php
include 'includes/footer.php';
?>