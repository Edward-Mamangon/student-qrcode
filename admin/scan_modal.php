<?php

    session_start();
    if (!isset($_SESSION['user_name'])) {
        header("Location: index.php");
    }

    $conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");

    // $sqlCheck = "SELECT s.id, s.fname, s.mname, s.lname, s.grade, s.section, ca.time_logged
    //                 FROM student_tbl AS s
    //                 INNER JOIN class_attendance AS ca ON s.id = ca.id
    //                 INNER JOIN subject_teacher AS st ON ca.subject_teacher_id = st.subject_teacher_id
    //                 INNER JOIN teacher_tbl AS t ON st.id = t.id
    //                 INNER JOIN subject_tbl AS sub ON st.subject_id = sub.subject_id
    //                 WHERE s.grade = '$grade' AND s.section = '$section' AND sub.subject_id = '$subject_id' AND t.id = '$teacher_id' AND ca.date_created = NOW() ";
    // $queryRes = mysqli_query($conn, $sqlCheck);
    // $row = mysqli_fetch_assoc($queryRes);

    if(isset($_POST['id'])) {
        $idnumber = $_POST['idnumber'];
        $id = $_POST['id'];
        $today = $_POST['date_created'];

        $sql = "UPDATE class_attendance SET time_logged = NOW() WHERE id = '$id' AND date_created = '$today' ";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            // echo "<script> alert('Data sent successfully.')</script>";
            $_SESSION['success'] = "Data sent successfully.";
            header("Location: scan_modal.php");
        } else {
            // echo "<script> alert('Send data failed.')</script>";
            $_SESSION['status'] = "Send data Failed!";
            header("Location: scan_modal.php");
        }
    }

?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

</head>
<body>
 
 <!------- FOR Scan QR ---------->
          <!-- Modal -->
    
<div class="modal fade" id="scanQR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Scan QR Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                
            </div>

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

            <form action="" method="post" autocomplete="off">
                <div class="modal-body">
                <video width="50%" id = "MyCameraOpen"></video> 
                    <div class="form-group">
                        <label for="">Student Number</label>
                        <input type="text" name="id" id="id" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Time</label>
                        <input type="text" name="time" id="time" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="text" name="date_created" id="date" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="">ID Number</label>
                        <input type="text" name="id" id="id" class="form-control" readonly>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="Save Data" class="btn btn-primary">SAVE DATA</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
        // step 1: Start camera section
        var video = document.getElementById("MyCameraOpen");
        var id = document.getElementById("id");
        // var text = document.getElementById("time");

        var scanner = new Instascan.Scanner({
            video : video
        });

        Instascan.Camera.getCameras()
        .then(function(Our_Camera) {
            if(Our_Camera.length > 0) {
                scanner.start(Our_Camera[0]);
            }else {
                alert("Camera Failed.");
            }
        })
        .catch(function(error) {
            console.log("Error: Please try again.")
        })

        // step 2: Input text section
        scanner.addListener('scan', function(input_value) {
           id.value = input_value

            document.forms[0].submit();
        })
</script>

</body>