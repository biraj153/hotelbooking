<?php

require('../admin/include/essentials.php');
require('../admin/include/db_config.php');


if (isset($_POST['book_room'])) {

    $frm_data = filteration($_POST);

    $fromDate = new DateTime($frm_data['from']);
    $toDate = new DateTime($frm_data['to']);
    $today = new DateTime();


    if ($fromDate < $today || $fromDate > $toDate) {
        echo 'date_missmatch';
        exit;
    }

    $b_exist = select("SELECT * FROM `bookings` WHERE `room_id` = ? AND NOT (`date_to` <= ? OR `date_from` >= ?)", [$frm_data['room_id'], $frm_data['from'], $frm_data['to']], "iss");
    if (mysqli_num_rows($b_exist) != 0) {
        echo "Room Cannot be Booked from {$frm_data['from']} to {$frm_data['to']}";
        exit;
    }

    $q1 = "INSERT INTO `bookings`(`room_id`, `user_id`,`date_from`,`date_to`) VALUES (?,?,?,?)";
    $values = [$frm_data['room_id'], $frm_data['user'], $frm_data['from'], $frm_data['to']];
    if (insert($q1, $values, 'iiss')) {
        echo 1;
    } else {
        echo 'error';
    }
}
