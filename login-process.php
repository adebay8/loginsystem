<?php

    $error = array();

    $email = validate_input_text($_POST['email']);
    if (empty($email)){
        $error[]="You forgot to enter your Email";
    }

    $password = validate_input_text($_POST['password']);
    if (empty($password)){
        $error[]="You forgot to enter your password";
    }

    if (empty($error)){
        //sql query
        $query = "SELECT userID, firstName, lastName, email, password, profileImage FROM user WHERE email=?";

        $q = mysqli_stmt_init($conn);

        mysqli_stmt_prepare($q, $query);

        mysqli_stmt_bind_param($q, "s", $email);
        
        mysqli_stmt_execute($q);

        $result = mysqli_stmt_get_result($q);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (!empty($row)){
            //verify password
            if (password_verify($password, $row['password'])){
                header('location: index.php');
                exit();
            }else{
                print "you are not a member please register";
            }
        }
    }else{
        echo "please fill out the email and password correctly";
    }
?>  