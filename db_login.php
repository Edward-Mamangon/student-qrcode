<?php 
include 'dbconnection/db_connect.php';

session_start();

// if (isset($_SESSION["status"]) == "invalid" || empty($_SESSION["status"])){
//     $_SESSION["status"] = "invalid";
// }    

if (isset($_SESION["status"]) == "valid") {
    // echo "<script> window.location.href = './admin/main.php'</script>";
    header("Location: ./admin/main.php");
}

    if (isset($_POST['uname']) && isset($_POST['password'])) {

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);

        if (empty($uname)) {

            header("Location: index.php?error=Username is Required!");
            exit();

        }else if(empty($pass)){

            header("Location: index.php?error=Password is Required!");
            exit();

        }else{
            $sql = "SELECT * FROM teacher_tbl AS t
                    INNER JOIN subject_teacher AS st ON t.id = st.id
                    INNER JOIN subject_tbl AS sub ON st.subject_id = sub.subject_id
                    WHERE username = '".$uname."' AND password = '".$pass."' ";

            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

            if($row["role"] == "Admin" || $row["role"] == "Teacher"){
                $_SESSION ['role'] = $row['role'];
                $_SESSION ['user_name'] = $row['username'];
                $_SESSION ['id'] = $row['id'];
                $_SESSION ['subject'] = $row['subject'];
                $_SESSION ['subject_teacher_id'] = $row['subject_teacher_id'];
                $_SESSION ['grade'] = $row['grade'];
                $_SESSION ['section'] = $row['section'];

                header("Location: ./admin/main.php");

            }else{
                header("Location: index.php?error=Incorrect Username or Password!");
               
            }
        }

    }else{
        header("Location: index.php");
        exit();
    }

    ?>
    
