<?php
session_start();
include '../dbconnection/db_connect.php';
// $name = "localhost";
// $user = "root";
// $password = "";
// $db_name = "student-qrcode_db";


// $conn = mysqli_connect($name, $user, $password, $db_name);

// if(!$conn) {
//    die ("Access Denied!!!");
// }




     // --------------------------------------STUDENT TABLE


    if (isset($_POST['submit'])) {

        $idnumber = $_POST['idnumber'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $grade = $_POST['grade'];
        $section = $_POST['section'];
        $address = $_POST['address'];
        $parent = $_POST['parent'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];

        $query2 = "SELECT * FROM student_tbl WHERE idnumber = '$idnumber' ";
        $query_run2 = mysqli_query($conn, $query2);

        if(mysqli_num_rows($query_run2) > 0 ){
            $_SESSION['status'] = "Idnumber already existed!";
            header("Location: register.php");
        }else{


        $query = "INSERT INTO student_tbl (idnumber,fname,mname,lname,grade,section,address,parent,contact,email) 
        VALUES ('$idnumber', '$fname', '$mname', '$lname', '$grade', '$section', '$address', '$parent', '$contact', '$email')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            // echo "Saved!";
            $_SESSION['success'] = "Student Registered Successfully!";
            header("Location: register.php");

        }else{
            $_SESSION['status'] = "Access Denied!";
            header("Location: register.php");
            exit();
        }
    } 
}





    if(isset($_POST['update'])) {
        
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $grade = $_POST['grade'];
        $section = $_POST['section'];
        $address = $_POST['address'];
        $parent = $_POST['parent'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];

        $query = "UPDATE student_tbl SET fname = '$fname', mname = '$mname', lname = '$lname', grade = '$grade', 
        section = '$section',  address = '$address',  parent = '$parent',  contact = '$contact', email = '$email' 
        WHERE id = '$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run) {
            $_SESSION['success'] = "Data Updated Successfully!";
            header("Location: details.php");
        }else{
            echo '<script> alert("Data Not Updated!"); </script>';
        }

    }


    if(isset($_POST['delete'])) {

        $id = $_POST['delete_id'];

        $query = "DELETE FROM student_tbl WHERE id = '$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run) {

            $_SESSION['success1'] = "Data Deleted Successfully!";
            header("Location: details.php");
        }else{
            echo '<script> alert("Data Not Deleted!")';
        }
        

    }

//=============== Assigning Subject Teachers======================/
    if (isset($_POST['addST'])){
        if (isset($_POST['subject_teacher_id'])){

            foreach ($_POST['subject_teacher_id'] as $st_row => $value) {
                $st_id = $_POST['subject_teacher_id'][$st_row];
                $id = $_POST['id'];

                $sql_st = "INSERT INTO student_subject (id, subject_teacher_id)
                            VALUES ('".$id."','".$st_id."')";
                if (mysqli_query($conn, $sql_st)) {
                    $_SESSION['success'] = "Subject Teachers added Successfully!";
                    header("Location: register.php");
                } else {
                    echo '<script> alert("Failed to add Subject Teachers.")';
                }
            }
        }

    }
    




    // -----------------------------------ADD NEW-TEACHER TABLE

    if (isset($_POST['submit1'])) {
        $id = $_POST['id'];
        $idnumber = $_POST['idnumber'];
        $fname = $_POST['fname'];
        $grade = $_POST['grade'];
        $section = $_POST['section'];
        $subject_id = $_POST['subject_id'];
        $contact = $_POST['contact'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $query2 = "SELECT * FROM teacher_tbl WHERE idnumber = '$idnumber' ";
        $query_run2 = mysqli_query($conn, $query2);

        if(mysqli_num_rows($query_run2) > 0 ){
            $_SESSION['status'] = "Id number already exists!";
            header("Location: reg_teacher.php");
        }
        else { 

            $query = "INSERT INTO teacher_tbl (idnumber, name, grade, section, contact, username,password, role) VALUES ('$idnumber', '$fname', 
            '$grade', '$section', '$contact', '$username', '$password', '$role')";
            $query_run = mysqli_query($conn, $query);

            
            
            if ($query_run) {

                $teacher_id = mysqli_insert_id($conn);
                //2nd query to save to associative table subject_teacher
                $query_st = "INSERT INTO subject_teacher (subject_id, id) VALUES ('$subject_id','$teacher_id')";
                $query_run_st = mysqli_query($conn, $query_st);

                if ($query_run_st) {

                // echo "Saved!";
                $_SESSION['success'] = "Teacher Added Successfully!";
                header("Location: reg_teacher.php");
                }

            else {
                $_SESSION['status'] = "Access Denied!";
                header("Location: reg_teacher.php");
            }
        }

        }
    }



//=======Updating records for Teacher
    
    if(isset($_POST['update1'])) {
        
        $idnumber = $_POST['idnumber'];
        $fname = $_POST['fname'];
        $grade = $_POST['grade'];
        $section = $_POST['section'];
        $subject_id = $_POST['subject_id'];
        $contact = $_POST['contact'];
        $username = $_POST['username'];
        $role = $_POST['role'];

        $query = "UPDATE teacher_tbl AS t
                  JOIN subject_teacher AS st ON t.id = st.id
                  SET t.name = '$fname', t.grade = '$grade', t.section = '$section', st.subject_id = '$subject_id', 
                        t.contact = '$contact', t.username = '$username', t.role = '$role'
                  WHERE t.idnumber = '$idnumber' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run) {
            $_SESSION['success'] = "Data Updated Successfully!";
            header("Location: reg_teacher.php");
        }else{
            echo '<script> alert("Data Not Updated!"); </script>';
        }

    }

//=======Deleting records for Teacher

    if(isset($_POST['delete1'])) {

        $idnumber = $_POST['delete_id'];

        $query = "DELETE FROM teacher_tbl WHERE idnumber = '$idnumber' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run) {

            $_SESSION['success1'] = "Data Deleted Successfully!";
            header("Location: reg_teacher.php");
        }else{
            echo '<script> alert("Data Not Deleted!")</script>';
        }
        

    }




?>