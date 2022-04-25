<?php
// session_start();
// if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

session_start();
if (!isset($_SESSION['user_name'])) {
  header("Location: index.php");
}

    

  ?>
  <?php
include 'includes/header.php';
include 'includes/sidebar.php';
include 'editmodal.php';
include 'deletemodal.php';
include 'qrcodemodal.php';
?>

<?php

$conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");

// $st_id = $_SESSION['subject_teacher_id'];

$query = "SELECT * FROM student_tbl";
// $query = "SELECT s.id, s.fname, s.mname, s.lname, s.grade, s.section, s.address, s.parent, s.contact, s.email 
//           FROM student_tbl AS s
//           INNER JOIN student_subject AS ss ON s.id = ss.id
//           WHERE ss.subject_teacher_id = '$st_id' ";
$query_run = mysqli_query($conn, $query);

?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-5">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Student Details</h1><br>
          </div><!-- /.col -->


          <div class="table-responsive" style="font-size: 13px">
  

    <?php  
    if(isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '<h6 style="background: #15ca52; color: #000; font-size: 20px;"> '.$_SESSION['success'].' </h6>';
        unset($_SESSION['success']);
    } 

    if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
      echo '<h6 style="background: #970f0f; color: #fff; font-size: 20px;"> '.$_SESSION['status'].' </h6>';
      unset($_SESSION['status']);
  } 
    ?>
 
          <!--------- FOR DELETING DATA ------------------->
          <?php 
    
    if(isset($_SESSION['success1']) && $_SESSION['success1'] != '') {
      echo '<h6 style="background: #970f0f; color: #fff; font-size: 20px;"> '.$_SESSION['success1'].' </h6>';
      unset($_SESSION['success1']);
  } 

  if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
    echo '<h6 style="background: #970f0f; color: #000; font-size: 20px;"> '.$_SESSION['status'].' </h6>';
    unset($_SESSION['status']);
} 

    ?>
<!-- <form action="generate.php"> </form> -->

      <table id="datatable_id" class="table table-striped m-3" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Student Number:</th>
            <th>First Name:</th>
            <th>Middle Name:</th>
            <th>Last Name:</th>
            <th>Grade:</th>
            <th>Section:</th>
            <th>Address:</th>
            <th>Parent/Guardian Name:</th>
            <th>Contact Number:</th>
            <th>Email:</th>
            <th>ACTION:</th>
            <!-- <th>DELETE</th> -->
          </tr>
        </thead>
        <tbody>

        <?php
            if(mysqli_num_rows($query_run) > 0) {        
              while($row = mysqli_fetch_assoc($query_run)) {
        ?>

          <tr>
            <td><?php echo $row['id']; ?> 
                <a class="viewqr" type="submit" name="submitqr"> 
                <span class="fa fa-qrcode" style="cursor: pointer;"></span></a>
            </td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['mname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['grade']; ?></td>
            <td><?php echo $row['section']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['parent']; ?></td>
            <td><?php echo $row['contact']; ?></td>
            <td><?php echo $row['email']; ?></td>

            <!-- <form action="connection.php" method="post"> -->
            <!-- <input type="hidden" name="edit_id" value=""> -->
           <td> <button class="editbtn bg-info" type="submit" style="font-size: 13px;  color:white; background-color: green;"><i class="fas fa-edit"></i></button>

            <button class="deletebtn bg-danger" type="submit" style="font-size: 13px; color:white; background-color: red;"><i class="fa fa-trash"></i></button>
          <!-- </form> -->
          </td>
            
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




        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         
        </div>
        <!-- /.row -->


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <?php 
  // }else{
  //       header("Location: index.php");
  //       exit(); 
  //   } 
    ?>



  <?php
include 'includes/footer.php';
?>


<!--------- FOR EDIT ---------->
<script>
    $(document).ready( function() {

        $('.editbtn').on('click', function() {
            $('#editmodal').modal('show');


              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function() {
                  return $(this).text();

              }).get();

              console.log(data);

              $('#id').val(data[0]);
              $('#fname').val(data[1]);
              $('#mname').val(data[2]);
              $('#lname').val(data[3]);
              $('#grade').val(data[4]);
              $('#section').val(data[5]);
              $('#address').val(data[6])
              $('#parent').val(data[7])
              $('#contact').val(data[8])
              $('#email').val(data[9]);
        });
    });
</script>


<!------------ FOR DELETE ---------->
<script>
    $(document).ready( function() {

        $('.deletebtn').on('click', function() {
            $('#deletemodal').modal('show');


              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function() {
                  return $(this).text();

              }).get();

              console.log(data);

              $('#delete_id').val(data[0]);
        });
    });
</script>


<!------------ FOR QR CODE ---------->
<script>
    $(document).ready( function() {

        $('.viewqr').on('click', function() {
            $('#viewqrcode').modal('show');


              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function() {
                  return $(this).text();

              }).get();

              console.log(data);

              $('#idnum').val(data[0]);
              $('#fname2').val(data[1]);
              $('#lname2').val(data[3]);
          
        });
    });
</script>