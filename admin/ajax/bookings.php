<?php

require('../include/essentials.php');
require('../include/db_config.php');
adminLogin();


if (isset($_POST['get_bookings'])) {
    $i = 1;

    $b_q = mysqli_query($con, "SELECT 
    r.id AS room_id, 
    r.name AS room_name, 
    r.*,  
    b.*,  
    u.id AS user_id, 
    u.name AS user_name,
    u.*  
FROM `rooms` r
INNER JOIN `bookings` b ON b.room_id = r.id
INNER JOIN `user_cred` u ON b.user_id = u.id;
");

    $booking_data = "";
    while ($row = mysqli_fetch_assoc($b_q)) {
        $booking_data .= "<tr class='align-middle'>
        <td>$i</td>
        <td>$row[user_id]</td>
        <td>$row[name]</td>
        <td>$row[room_id]</td>
        <td>$row[room_name]</td>
        <td>$row[date_from]</td>
        <td >$row[date_to]</td>
        <td>
             <button type='button' class='btn btn-danger shadow-none btn-sm' onclick='rem_booking($row[booking_id])''>
             <i class='bi bi-trash'></i>
          </button>
        </td>
        </tr>
     ";
        $i++;
    }

    echo $booking_data;
}

if (isset($_POST['rem_booking'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_booking']];

    $res = delete("DELETE FROM `bookings` WHERE `booking_id` = ?", $values, 'i');
    if ($res) {
        echo 1;
    } else {
        echo 0;
    }
}
