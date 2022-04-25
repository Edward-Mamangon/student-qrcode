<?php
//  $conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");

//  $query = "SELECT * FROM student_tbl";
//  $query_run = mysqli_query($conn, $query);

        
// $conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");

// $query = "SELECT * FROM student_tbl";
// $query_run = mysqli_query($conn, $query);

//    if(mysqli_num_rows($query_run) > 0) {
                
//      while($row = mysqli_fetch_assoc($query_run)) {
       
 
?>

 
  <!------- FOR EDIT BUTTON ---------->
          <!-- Modal -->
          <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Student Data</h5>
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
          <label for="">Full Name</label>
          <input type="text" name="fname" id="fname" class="form-control" ><br>
          <input type="text" name="mname" id="mname" class="form-control" ><br>
          <input type="text" name="lname" id="lname" class="form-control" >
        </div>

     
        <div class="form-group">
          <label for="">Grade</label>
          <select class="form-control" name="grade" id="grade" aria-label="Default select example">
            <option disabled selected>Enter Grade Level</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        </div>

        <div class="form-group">
          <label for="">Section</label>
        <select class="form-control" name="section" id="section" aria-label="Default select example">
            <option disabled selected>Enter Section</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        </div>

        <div class="form-group">
          <label for="">Address</label>
          <input type="text" name="address" id="address" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Parent/Guardian Name</label>
          <input type="text" name="parent" id="parent" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Contact Number</label>
          <input type="phone" name="contact" id="contact" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>

          <div class="modal-footer">
          <button type="submit" name="update" class="btn btn-success">UPDATE DATA</button>
      </div>
      </div>
  </form>
    </div>
    </div>
  </div>
</div>

<?php
            //   }

            // }else{
            //     echo "No Record Found!";
            // }
        ?>