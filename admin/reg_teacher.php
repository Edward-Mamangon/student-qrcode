<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header("Location: index.php");
}

    

include 'includes/header.php';
include 'includes/sidebar.php';
include 'addteachermodal.php';
include 'edit_teachermodal.php';
include 'delete_teachermodal.php';
?>

 

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




    <div class="table-responsive" style="font-size: 14px">
      <?php

        $conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");

        // $query = "SELECT * FROM teacher_tbl";
        $query = "SELECT t.idnumber, t.name, grade, section, s.subject, t.contact, t.username, t.role 
                  FROM teacher_tbl AS t
                  LEFT JOIN subject_teacher AS st ON t.id = st.id
                  LEFT JOIN subject_tbl AS s ON st.subject_id = s.subject_id " ;
        $query_run = mysqli_query($conn, $query);

      ?>



      <table id="datatable_id" class="table table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID Number</th>
            <th>Full Name</th>
            <th>Grade</th>
            <th>Section</th>
            <th>Subject</th>
            <th>Contact No.</th>
            <th>Username</th>
            <th>Role</th>
            <th>Action</th>
            <!-- <th>DELETE</th> -->
          </tr>
        </thead>
        <tbody>

        <?php
            if(mysqli_num_rows($query_run) > 0) {
                
              while($row = mysqli_fetch_assoc($query_run)) {
                ?>

          <tr>
            <td><?php echo $row['idnumber']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['grade']; ?></td>
            <td><?php echo $row['section']; ?></td>
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['contact']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['role']; ?></td>
          
            
            <td>
            <!-- <form action="edit_teachermodal.php" method="post" >  -->
              <!-- <input type="hidden" name="idnumber" value="<?php echo $row['idnumber']; ?>"> 
              <input type="hidden" name="subject_id" value="<?php echo $row['subject_id']; ?>"> -->
              <button class="edit_teacherbtn bg-info" name="edit" type="submit" style="font-size: 13px;  color:white;"><i class="fas fa-edit"></i></button>
            <!-- </form> -->

            <button class="delete_teacherbtn bg-danger" type="submit" style="font-size: 13px; color:white; background-color: red;"><i class="fa fa-trash"></i></button>
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

        $('.edit_teacherbtn').on('click', function() {
            $('#edit_teachermodal').modal('show');


              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function() {
                  return $(this).text();

              }).get();

              console.log(data);

              $('#idnumber').val(data[0]);
              $('#fname').val(data[1]);
              $('#grade').val(data[2]);
              $('#section').val(data[3]);
              $('#subject_id').val(data[4]);
              $('#contact').val(data[5]);
              $('#username').val(data[6]);
              $('#role').val(data[7]);
              // $('#password').val(data[7]);
        });
    });
</script>


<!------------ FOR DELETE ---------->
<script>
    $(document).ready( function() {

        $('.delete_teacherbtn').on('click', function() {
            $('#delete_teachermodal').modal('show');


              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function() {
                  return $(this).text();

              }).get();

              console.log(data);

              $('#delete_id').val(data[0]);
              $('#delete_fname').val(data[1]);
        });
    });
</script>
