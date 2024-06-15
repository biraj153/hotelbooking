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
    <title>Admin Panel - Users</title>
    <?php require('include/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('include/header.php'); ?>



    <div class="conatainer-fluid " id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Users</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">


                        <div class="table-responsive" style="height: 450px; overflow-y:scroll; min-width:1300px; ">
                            <table class="table table-hover border text-center">
                                <thead class="">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="users-data">

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
    <script src="scripts/users.js">

    </script>
</body>

</html>