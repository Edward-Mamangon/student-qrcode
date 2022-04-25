<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Teacher Registration Area</h1>
          </div><!-- /.col -->

          <!-- Modal -->
  <div class="modal fade" id="addteacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register New Teacher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
  </div>
        
      <form action="connection.php" method="post" autocomplete="off">
      <div class="modal-body">
      <!-- Hidden teacher Id -Primary key -->
      <input type="hidden" name="id" class="form-control" placeholder="" required>

      <div class="form-group">
          <label for="">ID Number</label>
          <input type="text" name="idnumber" class="form-control" placeholder="Enter ID Number" required>
        </div>

        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="fname" class="form-control" placeholder="Enter Full Name" required>
        </div>


        <div class="form-group">
          <label for="">Grade</label>
          <select class="form-control" name="grade" aria-label="Default select example" required>
            <option disabled selected>Enter Grade Assigned</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        </div>

        <div class="form-group">
          <label for="">Section</label>
        <select class="form-control" name="section" aria-label="Default select example" required>
            <option disabled selected>Enter Section Assigned</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        </div>

        <div class="form-group">
        <label for="">Subject</label>

      <?php 
        $conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");
        $query_subject = 'SELECT * FROM subject_tbl'; 
        $res = mysqli_query($conn, $query_subject);
      ?>

      <?php echo '<select class="form-control" name="subject_id" aria-label="Default select example" required>'; ?>
      <option disabled selected>Enter Subject Assigned</option>
      <?php while (($row = mysqli_fetch_assoc($res)) > 0)
            {
      ?>
           
            <option value="<?php echo $row['subject_id'] ?> "> <?php echo $row['subject']; ?></option>
      
            <!-- <option disabled selected>Enter Subject Assigned</option>
            <option value="English">English</option>
            <option value="Mathematics">Mathematics</option>
            <option value="Science">Science</option>
            <option value="Filipino">Filipino</option> -->
      <?php 
        }
      echo '</select>'; 
      
      ?>
        </div>

        <div class="form-group">
          <label for="">Contact Number</label>
          <input type="phone" name="contact" class="form-control" placeholder="Enter Phone Number" required>
        </div>

        <div class="form-group">
          <label for="">Username</label>
          <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
        </div>

        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
        </div>

        <div class="form-group">
          <label for="">Role</label>
          <select class="form-control" name="role" aria-label="Default select example" required>
            <option disabled selected>Enter Role</option>
            <option value="Admin">Admin</option>
            <option value="Teacher">Teacher</option>
        </select>
        </div>

        <div class="modal-footer">
          <button type="submit" name="submit1" class="btn btn-success">Register</button>
      </div>
      </div>
      </form>
   
    </div>
  </div>
</div>


    <!-- Button trigger modal -->
      <button style="margin-bottom: 10px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#addteacher">
        Add New Teacher
      </button>
  <div class="card-body">


