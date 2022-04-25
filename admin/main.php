<?php
// require "session.php"; 
session_start();
if (!isset($_SESSION['user_name'])) {
  header("Location: index.php");
}

  ?>
  <?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Student Attendance Management System</h1>
          </div><!-- /.col -->
      
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");
                    // $st_id = $_SESSION['subject_teacher_id'];
                    $query = "SELECT id FROM student_tbl ORDER by id";
                    $query_run = mysqli_query($conn, $query);

                    $row = mysqli_num_rows($query_run);
                    echo '<h3> '.$row.' </h3>';

                ?>
                <p>Total Students</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-alt"></i>
              </div>
              <a href="details.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                    $conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");
                    $query = "SELECT id FROM teacher_tbl ORDER by id";
                    $query_run = mysqli_query($conn, $query);

                    $row = mysqli_num_rows($query_run);
                    echo '<h3> '.$row.' </h3>';

                ?>
                <p>Total Teachers</p>
              </div>
              <div class="icon">
              <i class="fas fa-chalkboard-teacher"></i>
              </div>
              <a href="reg_teacher.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            
            <div class="small-box bg-danger">
              <div class="inner">
                <?php echo '<h3>  </h3>'; ?>
              
                <h4>Check Attendance</h4><br><br>
              </div>
              <div class="icon">
              <i class="fa fa-qrcode"></i>
              </div>
              <a href="scan_2.php" class="small-box-footer">Click here <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6"> -->
            <!-- small box -->
            <!-- <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-alt"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6"> -->
            <!-- small box -->
            <!-- <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div> -->
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
  
