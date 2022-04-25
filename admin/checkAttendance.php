<?php

session_start();
if (!isset($_SESSION['user_name'])) {
  header("Location: index.php");
}

include 'includes/header.php';
include 'includes/sidebar.php';
// include 'scan_modal.php';

$conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");

// $teacher_id = $_POST['id'];
// $grade = $_POST['grade'];
// $section = $_POST['section'];
// $subject_id = $_POST['subject_id'];

// if (isset($_POST['checkAttendance'])) {

//     // $teacher_id = $_POST['id'];
//     $grade = $_POST['grade'];
//     $section = $_POST['section'];
//     $subject_id = $_POST['subject_id'];

//     $teacher_id = $_SESSION ['id'];
//     $queryInsert = "INSERT INTO class_attendance (id, subject_teacher_id)
//                         SELECT s.id, ss.subject_teacher_id
//                         FROM student_tbl AS s
//                         INNER JOIN student_subject AS ss ON s.id = ss.id
//                         INNER JOIN subject_teacher AS st ON ss.subject_teacher_id = st.subject_teacher_id
//                         INNER JOIN teacher_tbl AS t ON st.id = t.id
//                         INNER JOIN subject_tbl AS sub ON st.subject_id = sub.subject_id
//                         WHERE s.grade = '$grade' AND s.section = '$section' AND sub.subject_id = '$subject_id' AND st.id = '$teacher_id' ";
//      $query_result_insert = mysqli_query($conn, $queryInsert);
//      if ($query_result_insert) {

//         // echo "Saved!";
//         $_SESSION['success'] = "New Attendance record";
//         header("Location: checkAttendance.php");

//         }
//     else {
//         $_SESSION['status'] = "Failed!";
//         header("Location: checkAttendance.php");
//     }

// }

 // Query for displaying results in table

//  $teacher_id = $_SESSION ['id'];
//  $queryAttendance = "SELECT s.id, s.fname, s.mname, s.lname, s.grade, s.section, ca.date_created
//  FROM student_tbl AS s
//  INNER JOIN class_attendance AS ca ON s.id = ca.id
//  INNER JOIN subject_teacher AS st ON ca.subject_teacher_id = st.subject_teacher_id
//  INNER JOIN teacher_tbl AS t ON st.id = t.id
//  INNER JOIN subject_tbl AS sub ON st.subject_id = sub.subject_id
//  WHERE s.grade = '$grade' AND s.section = '$section' AND sub.subject_id = '$subject_id' AND st.id = '$teacher_id' AND ca.date_created = NOW() ";
//  $result = mysqli_query($conn, $queryAttendance);

 // // mysqli_fetch_assoc($sqlReport) will populate the $row var
 // $st_row = mysqli_fetch_assoc($result);
 
?>

<div class="content-wrapper">
    <h2>Student Attendance Report</h2>

    <form action="scan.php" method="post">


        <!-- ============Filter By Grade Level ======================== -->
        <div class="form-group">
            <?php 
                $teacher_id = $_SESSION['id'];
                $query_grades = "SELECT s.grade 
                                FROM student_tbl AS s
                                INNER JOIN student_subject AS ss ON s.id = ss.id
                                INNER JOIN subject_teacher AS st ON ss.subject_teacher_id = st.subject_teacher_id
                                WHERE st.id = '$teacher_id' 
                                GROUP BY s.grade";
                                
                $grade_res = mysqli_query($conn, $query_grades);
            ?>

            <?php echo '<select class="form-control" name="grade" aria-label="Default select example" >'; ?>
                <option disabled selected>Filter by Grade</option>
            <?php while (($grade_row = mysqli_fetch_assoc($grade_res)) > 0) { ?>
            
                <option value="<?php echo $grade_row['grade'] ?> "> <?php echo $grade_row['grade']; ?></option>
            <?php  }
                echo '</select>'; 
            ?>
        </div>

        <!-- ============Filter By Section Level ======================== -->
        <div class="form-group">
            <?php 
                 $teacher_id = $_SESSION['id'];
                 $query_section = "SELECT s.section
                                 FROM student_tbl AS s
                                 INNER JOIN student_subject AS ss ON s.id = ss.id
                                 INNER JOIN subject_teacher AS st ON ss.subject_teacher_id = st.subject_teacher_id
                                 WHERE st.id = '$teacher_id' 
                                 GROUP BY s.section";
                $section_res = mysqli_query($conn, $query_section);
            ?>

            <?php echo '<select class="form-control" name="section" aria-label="Default select example" >'; ?>
                <option disabled selected>Filter by Section</option>
            <?php while (($section_row = mysqli_fetch_assoc($section_res)) > 0) { ?>
            
                <option value="<?php echo $section_row['section'] ?> "> <?php echo $section_row['section']; ?></option>
            <?php  }
                echo '</select>'; 
            ?>
        </div>

        <!-- ============Filter By Subject ======================== -->
        <div class="form-group">
            <?php 
                $teacher_id = $_SESSION['id'];
                $query_subjects = "SELECT sub.subject
                                FROM student_tbl AS s
                                INNER JOIN student_subject AS ss ON s.id = ss.id
                                INNER JOIN subject_teacher AS st ON ss.subject_teacher_id = st.subject_teacher_id
                                INNER JOIN subject_tbl AS sub ON st.subject_id = sub.subject_id
                                WHERE st.id = '$teacher_id' 
                                GROUP BY sub.subject";
                $subject_res = mysqli_query($conn, $query_subjects);
            ?>

            <?php echo '<select class="form-control" name="subject_id" aria-label="Default select example" >'; ?>
                <option disabled selected>Filter by Subject</option>
            <?php while (($subject_row = mysqli_fetch_assoc($subject_res)) > 0) { ?>
            
                <option value="<?php echo $subject_row['subject_id'] ?> "> <?php echo $subject_row['subject']; ?></option>
            <?php  }
                echo '</select>'; 
            ?>
        </div>

        <!--Check Attendance Button -->
        <div class="form-group">
            <button style="margin-bottom: 10px;" type="submit" name="checkAttendance" class="btn btn-success" >
                Check Attendance
            </button>
          
        </div>
    </form>

    <!-- ====================== Table Section ================================== -->
    <!-- <table id="datatable_id" class="table table-bordered" id="dataTable" width="100%" cellspacing="0" > -->

    <?php  
    // if(isset($_SESSION['success']) && $_SESSION['success'] != '') {
    //     echo '<h6 style="background: #15ca52; color: #000; font-size: 20px;"> '.$_SESSION['success'].' </h6>';
    //     unset($_SESSION['success']);
    // } 

    // if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
    //   echo '<h6 style="background: #970f0f; color: #fff; font-size: 20px;"> '.$_SESSION['status'].' </h6>';
    //   unset($_SESSION['status']);
    // } 
    ?>
        <!-- <thead>
          <tr>
            <th>Student No.</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Grade</th>
            <th>Section</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody> -->
        
        <?php
            // if(mysqli_num_rows($result) > 0) {        
            //   while ($st_row = mysqli_fetch_assoc($result)) {
        ?>

          <!-- <tr>
            <td><?php //echo $st_row['id']; ?> </td> -->
            <!-- <a class="viewqr" type="submit" name="submitqr"> <span class="fa fa-qrcode" style="cursor: pointer;"></span></a></td> -->
            <!-- <td><?php //echo $st_row['fname']; ?></td>
            <td><?php //echo $st_row['mname']; ?></td>
            <td><?php //echo $st_row['lname']; ?></td>
            <td><?php //echo $st_row['grade']; ?></td>
            <td><?php //echo $st_row['section']; ?></td>
            <td><?php //echo $st_row['date_created']; ?></td>
            <td>
                <button class="scanQR-btn" name="scan" type="submit" style="font-size: 13px;  color:white; background-color: green;"><i class="fas fa-edit"></i></button>
            </td>
          </tr> -->
          <?php
            //   }

            // }else{
            //     echo "No Record Found!";
            // }
        ?>

        <!-- </tbody>
      </table> -->

</div>

<?php
    include 'includes/footer.php';
?>


<!--------- FOR Scanning QR modal ---------->
<script>
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
              $('#mname').val(data[2]);
              $('#lname').val(data[3]);
              $('#date').val(data[6]);
        

        });
    });
</script>