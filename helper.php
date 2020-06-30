<?php

function validate_input_text($textValue){
    if (!empty($textValue)){
        $trim_text = trim($textValue);

        //remove illegal characters

        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);

        return $sanitize_str;
    }
    return "";
}

function validate_input_email($emailValue){
    if (!empty($emailValue)){
        $trim_text = trim($emailValue);

        //remove illegal characters

        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_EMAIL);

        return $sanitize_str;
    }
    return "";
}

    function uploadProfile($path, $filename){
        $target_dir = $path;
        $default = "beard.png";

        $fileName = basename($filename['name']);
        $targetFilePath = $target_dir.$fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (!empty($fileName)){
            //allow certain file types
            $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (in_array($fileType, $allowType)){
                //upload file to server
                if (move_uploaded_file($filename['tmp_name'], $targetFilePath)){
                    return $targetFilePath;
                }
            } 
        }

        return $path.$default;
    }

    //get user info
    function get_user_info($conn, $userID){
        $query = "SELECT firstName, lastName, email, profileImage FROM user WHERE userID=?";
        $q = mysqli_stmt_init($conn);

        mysqli_stmt_prepare($q, $query);

        mysqli_stmt_bind_param($q, "s", $userID);

        mysqli_stmt_execute($q);

        $result = mysqli_stmt_get_result($q);

        $row = mysqli_fetch_array($result);

        return (empty($row)) ? false : $row;
    }

?>