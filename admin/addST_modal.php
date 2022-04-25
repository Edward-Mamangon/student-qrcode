<?php 
    // session_start();
    $conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");

    // if (isset($_POST['id'])){
    //     $id = $_POST['id'];
    
    $student_id = $_SESSION['student_id'];
    $querygrade = "SELECT * FROM student_tbl WHERE id = '$student_id' "; 
    $result_grade = mysqli_query($conn, $querygrade);
    $row = mysqli_fetch_array($result_grade);
    $grade= $row['grade'];
    $section = $row['section'];
   
// }
       

?>

<div class="modal fade" id="addST" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Assign Subject Teacher</h5>
<?php echo  $student_id; ?>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form action="connection.php" method="post" autocomplete="off">
            <div class="modal-body">

                <div class="form-group">
                    <label for="">Student Number</label>
                    <input type="text" name="id" id="id" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="fname" id="fname" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="">Middle Name</label>
                    <input type="text" name="mname" id="mname" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" id="lname" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="">Grade</label>
                    <input type="text" name="grade" id="grade" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="">Section</label>
                    <input type="text" name="section" id="section" class="form-control" readonly>
                </div>

                <!-- ------------------------SUBJECTS ------------------------------------ -->
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



                <div class="modal-footer">
                    <button type="submit" name="addST" class="btn btn-success">Add Subject Teachers</button>
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
<?php
     unset($_SESSION['student_number']);
?>
