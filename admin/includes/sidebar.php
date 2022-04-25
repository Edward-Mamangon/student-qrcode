<?php

// require "session.php"; 
// $conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");

//   $query = "SELECT * FROM admin_tbl where role = 'admin' ";
//   $query_run = mysqli_query($conn, $query);


//   if(mysqli_num_rows($query_run) > 0) {        
//     while($row = mysqli_fetch_assoc($query_run)) {

      if($_SESSION['role'] == 'Teacher' || $_SESSION['role'] == 'Admin'){
        

      
?>



<!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="main.php" class="brand-link" style="font-weight: bold">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light"><?php echo $_SESSION['role']?> Dashboard</span>
    
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
       
          <span class="brand-text font-weight-light" style="color: #f1f1f1; font-size: 20px;">Welcome, <?php echo $_SESSION['user_name']; ?> </span>
       
      </div>  
        
                
      <!-- SidebarSearch Form -->
   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      
          <!-- <li class="nav-header">Menu List</li> -->
          <li class="nav-item">
            <a href="details.php" class="nav-link">
            <i class="fas fa-user-alt"></i>
              <p>
                Student Details
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="attendance.php" class="nav-link">
              <i class="fas fa-user-clock"></i>
              <p>
                Attendance List
              </p>
            </a>
          </li> -->
<?php
  }
      if($_SESSION['role'] == 'Admin'){      
?>
    
          <li class="nav-item">
            <a href="register.php" class="nav-link">
              <i class="fas fa-user-check"></i>
              <p>
                Register Student
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="reg_teacher.php" class="nav-link">
              <i class="fas fa-chalkboard-teacher"></i>
              <p>
                Register Teacher
              </p>
            </a>
          </li>
<?php
  }
?>
<?php  { ?>
          <!-- <li class="nav-header"><hr style="background-color: #f1f1f1"></li> -->
          <li class="nav-item">
            <a name="scan" href="scan_2.php" class="nav-link">
            <i class="fas fa-book"></i>
              <p>
               Check Attendance
              </p>
            </a>
          </li>
<?php } ?>
          <li class="nav-header"><hr style="background-color: #f1f1f1"></li>
          <li class="nav-item">
            <a href="report.php" class="nav-link">
            <i class="fas fa-book"></i>
              <p>
               Reports
              </p>
            </a>
          </li>

            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
  <?php
  // }
  // }
  
?>