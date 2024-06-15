<?php
require('include/essentials.php');
adminLogin();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>
    <?php require('include/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('include/header.php'); ?>



    <div class="conatainer-fluid " id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Settings</h3>



                <!--Shut Down-->
                <div class="card border-0 shadow-sm  mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0">Shutdown Website</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input class="form-check-input" onchange="upd_shutdown(this.value)" type="checkbox" id="shutdown-toggle">
                                </form>
                            </div>
                        </div>
                        <p class="card-text">No users will be able to Book rooms when shut down mode is turned on.</p>

                    </div>
                </div>



            </div>
        </div>
    </div>


    <?php require('include/scripts.php') ?>
    <script src="scripts/settings.js"></script>
</body>

</html>