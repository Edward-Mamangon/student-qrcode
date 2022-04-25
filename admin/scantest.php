<?php
    session_start();
    if (!isset($_SESSION['user_name'])) {
        header("Location: index.php");
    }

    $conn = mysqli_connect("localhost", "root", "", "student-qrcode_db");   
    if ($conn) {
        // echo "<script> alert('Database successfully connected.')</script>";
    } else {
        echo "<script> alert('Database connection failed.')</script>";
    }

    if(isset($_POST['id'])) {
        $id = $_POST['id'];

        $sql = "INSERT INTO class_attendance (id, subject_teacher_id, time_logged) VALUES('$id', 10, NOW())";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Data sent successfully.')</script>";
        } else {
            echo "<script> alert('Send data failed.')</script>";
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
    <style>
        table, th, td {
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>

</head>
<body>
    <video width="50%" id = "MyCameraOpen"></video> <br><br>

    <form action="" method="post">
        <input type="text" id = "id" name="id">
    </form>
    
    <h2>Student Attendance</h2>

    <table>
        <tr>
            <th>Attendance ID</th>
            <th>Student ID</th>
            <th>Subject Teacher</th>
            <th>Time Logged</th>
            <th>Date</th>
        </tr>
        <?php
            $select = "SELECT * FROM class_attendance";
            $qr = mysqli_query($conn, $select);
            $i = 1;
            while ($st_row = mysqli_fetch_array($qr)) {
        ?>
        <tr>
            <td><?php echo $st_row['attendance_id']; ?> </td>
            <td><?php echo $st_row['id']; ?></td>
            <td><?php echo $st_row['subject_teacher_id']; ?></td>
            <td><?php echo $st_row['time_logged']; ?></td>
            <td><?php echo $st_row['date_created']; ?></td>
        </tr>
        <?php $i++;
            }
        ?>
    </table>


    
    <script>
        // step 1: Start camera section
        var video = document.getElementById("MyCameraOpen");
        var id = document.getElementById("id");

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
</html>