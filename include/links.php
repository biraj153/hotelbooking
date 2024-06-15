<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
<link rel="stylesheet" href="css/common.css" />
<?php
session_start();

require('admin/include/db_config.php');
require('admin/include/essentials.php');

$setting_q = "SELECT * FROM `settings` WHERE `sr_no`= ?";
$values = [1];
$setting_r = mysqli_fetch_assoc(select($setting_q, $values, 'i'));

if ($setting_r['shutdown']) {
    echo <<<alertbar
    <div class='bg-danger text-center p-2 fw-bold'>
    Bookings are temporarily closed!
    </div>
    alertbar;
}
?>