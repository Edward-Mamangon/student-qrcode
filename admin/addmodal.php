<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Student Registration</h1>
          </div><!-- /.col -->

          <!-- Modal -->
  <div class="modal fade" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register New Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
  </div>
        
      <form action="connection.php" method="post" autocomplete="off">
      <div class="modal-body">

      <div class="form-group">
          <label for="">ID Number</label>
          <input type="text" name="idnumber" class="form-control" placeholder="Enter ID Number" required>
        </div>


        <div class="form-group">
          <label for="">Full Name</label>
          <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required><br>
          <input type="text" name="mname" class="form-control" placeholder="Enter Middle Name" required><br>
          <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required>
        </div>

        <div class="form-group">
          <label for="">Grade</label>
          <select class="form-control" name="grade" aria-label="Default select example" required>
            <option disabled selected>Enter Grade Level</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        </div>

        <div class="form-group">
          <label for="">Section</label>
        <select class="form-control" name="section" aria-label="Default select example" required>
            <option disabled selected>Enter Section</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        </div>

        <div class="form-group">
          <label for="">Address</label>
          <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
        </div>

        <div class="form-group">
          <label for="">Parent/Guardian Name</label>
          <input type="text" name="parent" class="form-control" placeholder="Enter Parent/Guardian Name" required>
        </div>

        <div class="form-group">
          <label for="">Contact Number</label>
          <input type="phone" name="contact" class="form-control" placeholder="Enter Contact Number" required>
        </div>

        <div class="form-group">
          <label for="">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
        </div>

       
          <div class="modal-footer">
          <button type="submit" name="submit" class="btn btn-success">Register</button>
      </div>
      </div>
      </form>
   
    </div>
  </div>
</div>


    <!-- Button trigger modal -->
      <button style="margin-bottom: 10px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#addstudent">
        Add New Student
      </button>
  <div class="card-body">


