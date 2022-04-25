<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header("Location: index.php");
}

    

  ?>
  <?php
include 'includes/header.php';
include 'includes/sidebar.php';
include 'addmodal.php';

?>




    <div class="table-responsive" style="font-size: 17px;">
      <?php

        $conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");

        $query = "SELECT * FROM student_tbl";
        $query_run = mysqli_query($conn, $query);

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

      <table id="datatable_id" class="table table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Student Number:</th>
            <th>ID Number:</th>
            <th>First Name:</th>
            <th>Middle Name:</th>
            <th>Last Name:</th>
            <th>Grade:</th>
            <th>Section:</th>
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
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['idnumber']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['mname'] ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['grade']; ?></td>
            <td><?php echo $row['section']; ?></td>

            
            <td>
              <form action="addSubjectTeacher.php" method="post">
                <button class="addST-btn bg-info" name="id-btn" type="submit" style="font-size: 13px;  color:white;">
                  <i class="fas fa-edit"></i>
                </button>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                
              <!-- <button class="btn btn-danger deletebtn" type="submit" style="font-size: 13px"> DELETE</button> -->
              
              </form>
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
<!-- <script>
    $(document).ready( function() {

        $('.editbtn').on('click', function() {
            $('#editmodal').modal('show');


              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function() {
                  return $(this).text();

              }).get();

              console.log(data);

              $('#idnumber').val(data[0]);
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
</script> -->


<!------------ FOR DELETE ---------->
<!-- <script>
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
</script> -->


<!------------ Call Modal for Adding Subject Teacher ---------->
<!-- <script>
    $(document).ready( function() {

        $('.addST-btn').on('click', function() {
            $('#addST').modal('show');


              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function() {
                  return $(this).text();

              }).get();

              console.log(data);

              $('#id').val(data[0]);
              $('#fname').val(data[2]);
              $('#mname').val(data[3]);
              $('#lname').val(data[4]);
              $('#grade').val(data[5]);
              $('#section').val(data[6]);

        });
    });
</script> -->