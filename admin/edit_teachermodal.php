<?php 
  // $conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");

  // if (isset($_POST["edit"])) {
  //   $idnumber = $_POST["idnumber"];
    
    // $queryTeacher = "SELECT t.idnumber, t.name, t.grade, t.section, sub.subject, t.username
    //                   FROM teacher_tbl AS t
    //                   INNER JOIN subject_teacher AS st ON t.id = st.id
    //                   INNER JOIN subject_tbl AS sub ON st.subject_id = sub.subject.id
    //                   WHERE t.idnumber = '$idnumber' ";
    // $sqlEdit = mysqli_query($conn, $queryTeacher);
    // mysqli_fetch_assoc($sqlUpdate) will populate the $row var
    // $row = mysqli_fetch_assoc($sqlEdit);
// }
// ?>
  <!------- FOR EDIT BUTTON ---------->
          <!-- Modal -->
    
    <div class="modal fade" id="edit_teachermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Teacher Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

  <form action="connection.php" method="post" autocomplete="off">
      <div class="modal-body">

      <div class="form-group">
          <label for="">ID Number</label>
          <input type="text" name="idnumber" id="idnumber" class="form-control" readonly>
        </div>

        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="fname" id="fname" class="form-control" >
        </div>


        <div class="form-group">
          <label for="">Grade</label>
          <select class="form-control" name="grade" id="grade" aria-label="Default select example">
            <option disabled selected>Enter Grade Handled</option>
            <option value="7" >7</option>
            <option value="8" >8</option>
            <option value="9" >9</option>
            <option value="10" >10</option>
        </select>
        </div>

        <div class="form-group">
          <label for="">Section</label>
        <select class="form-control" name="section" id="section" aria-label="Default select example">
            <option disabled selected>Enter Section Handled</option>
            <option value="A" >A</option>
            <option value="B" >B</option>
            <option value="C" >C</option>
        </select>
        </div>

        <div class="form-group">
        <label for="">Subject</label>

      <?php 
        // $subject_id = $_POST['subject_id'];
        $conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");
        // $idnumber = $_POST['idnumber'];
        $query_subject = "SELECT sub.subject_id, sub.subject
                          FROM subject_tbl AS sub";
                          // -- INNER JOIN subject_teacher AS st ON sub.subject_id = st.subject_id
                          // -- INNER JOIN teacher_tbl AS t ON st.id = t.id 
                          // -- WHERE t.idnumber = '$idnumber' ";
        $res = mysqli_query($conn, $query_subject);
      ?>
      <?php echo '<select class="form-control" id="subject_id" name="subject_id" aria-label="Default select example" required>'; ?>
      <option disabled selected>Enter Subject Assigned</option>
      <?php 
      while (($row = mysqli_fetch_assoc($res)) > 0)
            {
      ?>
            <option value="<?php echo $row['subject_id'] ?>" > <?php echo $row['subject']; ?> </option>
            <!-- <option disabled selected>Enter Subject Assigned</option>
            <option value="English">English</option>
            <option value="Mathematics">Mathematics</option>
            <option value="Science">Science</option>
            <option value="Filipino">Filipino</option> 
        </select>   -->
      <?php 
        }
      echo '</select>'; 
      
      ?>
        </div>

        <div class="form-group">
          <label for="">Contact No.</label>
          <input type="text" name="contact" id="contact" class="form-control" >
        </div> 

        <div class="form-group">
          <label for="">Username</label>
          <input type="text" name="username" id="username" class="form-control" >
        </div> 

        <div class="form-group">
          <label for="">Role</label>
        <select class="form-control" name="role" id="role" aria-label="Default select example">
            <option disabled selected>Enter Role</option>
            <option value="Admin" >Admin</option>
            <option value="Teacher" >Teacher</option>
        </select>
        </div>


        <!-- <div class="form-group">
          <label for="">Contact Number</label>
          <input type="phone" name="contact" id="contact" class="form-control">
        </div> -->     
        <!-- <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" id="password" class="form-control">
        </div> -->

          <div class="modal-footer">
          <button type="submit" name="update1" class="btn btn-success">UPDATE DATA</button>
      </div>
      </div>
  </form>
    </div>
    </div>
  </div>
</div>
