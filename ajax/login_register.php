<?php

require('../admin/include/essentials.php');
require('../admin/include/db_config.php');

if (isset($_POST['register'])) {
    $data = filteration($_POST);

    $dobDate = new DateTime($data['dob']);
    $today = new DateTime();

    if ($dobDate >= $today) {
        echo 'date_missmatch';
        exit;
    }

    if ($data['pass'] != $data['cpass']) {
        echo 'pass_missmatch';
        exit;
    }

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=?", [$data['email'], $data['phonenum']], "ss");

    if (mysqli_num_rows($u_exist) != 0) {
        echo 'already_registered';
        exit;
    }

    $hashed_password = password_hash($data['pass'], PASSWORD_DEFAULT);

    $query = "INSERT INTO `user_cred`(`name`, `address`, `phonenum`, `dob`, `pass`, `email`) VALUES (?,?,?,?,?,?)";
    $values = [$data['name'], $data['address'], $data['phonenum'], $data['dob'], $hashed_password, $data['email']];

    if (insert($query, $values, 'ssssss')) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['login'])) {
    $data = filteration($_POST);

    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? LIMIT 1 ", [$data['email']], "s");
    if (mysqli_num_rows($u_exist) == 0) {
        echo 'inv_email';
    } else {
        $u_fetch = mysqli_fetch_assoc($u_exist);
        if (!password_verify($data['pass'], $u_fetch['pass'])) {
            echo 'inv_pass';
        } else if ($u_fetch['status'] == 0) {
            echo 'inv_pass';
        } else {
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['uId'] = $u_fetch['id'];
            $_SESSION['uName'] = $u_fetch['name'];
            echo 1;
        }
    }
}
