<?php
    
session_start();
if (!isset($_SESSION['user_name'])) {
  header("Location: index.php");
}

include 'includes/header.php';
include 'includes/sidebar.php';

$conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");

if (isset($_POST['id-btn'])){
    $student_id = $_POST['id'];
    $query2= "SELECT * FROM student_tbl WHERE id = '$student_id'";
        $sql2 = mysqli_query($conn, $query2);
        // mysqli_fetch_assoc($sqlUpdate) will populate the $row var
        $row = mysqli_fetch_assoc($sql2);

}


$querygrade = "SELECT * FROM student_tbl WHERE id = '$student_id' "; 
$result_grade = mysqli_query($conn, $querygrade);
$row2 = mysqli_fetch_array($result_grade);
$grade= $row2['grade'];
$section = $row2['section'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject Teacher</title>

</head>
<body>
   
   <div class="content-wrapper" style="margin-top: 100px">
        
        <div class="form-group">
            <h1 class="m-3">Assign Subject Teacher</h1><br>
                <form action="connection.php" method="post" autocomplete="off">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Student Number</label>
                        
                        <input type="text" name="id" id="id" class="form-control" value="<?php echo $row['id']; ?>" readonly>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $row['fname']; ?>" readonly>
                            </div>
                        </div>

                            <!-- <div class="form-group">
                                <label for="">Middle Name</label>
                                <input type="text" name="mname" id="mname" class="form-control" value="<?php //echo $row['mname']; ?>" readonly>
                            </div> -->
                        <div class="col-lg-6 col-6">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $row['lname']; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <div class="form-group">
                                <label for="">Grade</label>
                                <input type="text" name="grade" id="grade" class="form-control" value="<?php echo $row['grade']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="form-group">
                                <label for="">Section</label>
                                <input type="text" name="section" id="section" class="form-control" value="<?php echo $row['section']; ?>" readonly>
                            </div>
                        </div>
                    </div>    
                    <!-- ------------------------SUBJECTS ------------------------------------ -->
                    <div class="container mt-4">
                        <h4>LIST OF SUBJECTS</h4>
                        <div class="form-group">
                        
                            <label for="">English Subject </label>

                            <?php 
                                $query_subject1 = "SELECT st.subject_teacher_id, sub.subject, t.name
                                                    FROM subject_teacher AS st
                                                    INNER JOIN teacher_tbl AS t ON st.id = t.id
                                                    INNER JOIN subject_tbl AS sub ON st.subject_id = sub.subject_id
                                                    WHERE t.section = '$section' AND t.grade = '$grade' AND sub.subject LIKE 'English%' ";
                                $res1 = mysqli_query($conn, $query_subject1);
                            ?>
                            <?php echo '<select class="form-control" id="subject_teacher_id" name="subject_teacher_id[]" aria-label="Default select example" required>'; ?>
                            <option disabled>Enter Assigned Teacher</option>
                            <?php 
                            while (($row1 = mysqli_fetch_assoc($res1)) > 0)
                                {
                            ?>
                                <option value="<?php echo $row1['subject_teacher_id'] ?>" > <?php echo $row1['subject']." : ".$row1['name']; ?> </option>
                
                            <?php 
                                }
                            echo '</select>'; 
                            ?>
                        </div>
                        <!-- ---------------------  ------------------------ -->
                        <div class="form-group">
                            <label for="">Math Subject </label>

                            <?php 
                                $query_subject2 = "SELECT st.subject_teacher_id, sub.subject, t.name
                                                    FROM subject_teacher AS st
                                                    INNER JOIN teacher_tbl AS t ON st.id = t.id
                                                    INNER JOIN subject_tbl AS sub ON st.subject_id = sub.subject_id
                                                    WHERE t.section = '$section' AND t.grade = '$grade' AND sub.subject LIKE 'Math%' ";
                                $res2 = mysqli_query($conn, $query_subject2);
                            ?>
                            <?php echo '<select class="form-control" id="subject_teacher_id" name="subject_teacher_id[]" aria-label="Default select example" required>'; ?>
                            <option disabled>Enter Assigned Teacher</option>
                            <?php 
                            while (($row2 = mysqli_fetch_assoc($res2)) > 0)
                                {
                            ?>
                                <option value="<?php echo $row2['subject_teacher_id'] ?>" > <?php echo $row2['subject']." : ".$row2['name']; ?> </option>
                
                            <?php 
                                }
                            echo '</select>'; 
                            ?>
                        </div>
                        <!-- -------------------------------------------------------------------- -->
                        <div class="form-group">
                            <label for="">Science Subject </label>

                            <?php 
                                $query_subject3 = "SELECT st.subject_teacher_id, sub.subject, t.name
                                                    FROM subject_teacher AS st
                                                    INNER JOIN teacher_tbl AS t ON st.id = t.id
                                                    INNER JOIN subject_tbl AS sub ON st.subject_id = sub.subject_id
                                                    WHERE t.section = '$section' AND t.grade = '$grade' AND sub.subject LIKE 'Science%' ";
                                $res3 = mysqli_query($conn, $query_subject3);
                            ?>
                            <?php echo '<select class="form-control" id="subject_teacher_id" name="subject_teacher_id[]" aria-label="Default select example" required>'; ?>
                            <option disabled>Enter Assigned Teacher</option>
                            <?php 
                            while (($row3 = mysqli_fetch_assoc($res3)) > 0)
                                {
                            ?>
                                <option value="<?php echo $row3['subject_teacher_id'] ?>" > <?php echo $row3['subject']." : ".$row3['name']; ?> </option>
                
                            <?php 
                                }
                            echo '</select>'; 
                            ?>
                        </div>
                    </div>                


                    <div class="modal-footer">
                        <button type="submit" name="addST" class="btn btn-success">Add Subject Teachers</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<?php
include 'includes/footer.php';
?>