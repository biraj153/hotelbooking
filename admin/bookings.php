<?php
require('include/essentials.php');
require('include/db_config.php');
adminLogin();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Bookings</title>
    <?php require('include/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('include/header.php'); ?>



    <div class="conatainer-fluid " id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Bookings</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-4">


                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead class="">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Booked Room ID</th>
                                        <th scope="col">Booked Room</th>
                                        <th scope="col">Boooking From</th>
                                        <th scope="col">Boooking To</th>
                                        <th scope="col">Delete Booking</th>
                                    </tr>
                                </thead>
                                <tbody id="bookings-data">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


            </div>

        </div>
    </div>
    </div>





    <?php require('include/scripts.php') ?>
    <script src="scripts/bookings.js">
    </script>
</body>

</html>