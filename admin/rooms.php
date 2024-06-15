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
    <title>Admin Panel - Rooms</title>
    <?php require('include/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('include/header.php'); ?>



    <div class="conatainer-fluid " id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Rooms</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                                <i class="bi bi-plus-square"></i> Add
                            </button>

                        </div>

                        <div class="table-responsive-lg" style="height: 450px; overflow-y:scroll;">
                            <table class="table table-hover border text-center">
                                <thead class="">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Guests</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <!-- Add Room Modal -->
    <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="add_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add Room</h1>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Area</label>
                                <input type="number" min="1" name="area" class="form-control shadow-none" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none" />
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Adults(Max.)</label>
                                <input type="number" min="1" name="adult" class="form-control shadow-none" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Children(Max.)</label>
                                <input type="number" min="1" name="children" class="form-control shadow-none" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Features</label>
                                <div class="row">
                                    <?php
                                    $res = selectAll('features');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                        <div class='col-md-3 mb-1'>
                                            <label>
                                              <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                              $opt[name]
                                            </label>
                                        </div>
                                        ";
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Facilities</label>
                                <div class="row">
                                    <?php
                                    $res = selectAll('facilities');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                        <div class='col-md-3 mb-1'>
                                            <label>
                                              <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                              $opt[name]
                                            </label>
                                        </div>
                                        ";
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn txt-secondary shadow-none" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Edit Room Modal -->

    <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="edit_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit Room</h1>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Area</label>
                                <input type="number" min="1" name="area" class="form-control shadow-none" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Adults(Max.)</label>
                                <input type="number" min="1" name="adult" class="form-control shadow-none" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Children(Max.)</label>
                                <input type="number" min="1" name="children" class="form-control shadow-none" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Features</label>
                                <div class="row">
                                    <?php
                                    $res = selectAll('features');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                        <div class='col-md-3 mb-1'>
                                            <label>
                                              <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'>
                                              $opt[name]
                                            </label>
                                        </div>
                                        ";
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Facilities</label>
                                <div class="row">
                                    <?php
                                    $res = selectAll('facilities');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                        <div class='col-md-3 mb-1'>
                                            <label>
                                              <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                              $opt[name]
                                            </label>
                                        </div>
                                        ";
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>

                            </div>
                            <input type="hidden" name="room_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn txt-secondary shadow-none" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Manage Room Images Modal -->
    <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Room Name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border-bottom border-3 pb-3 mb-3">
                        <form id="add_image_form">
                            <label class="form-label">Add Image</label>
                            <input type="file" name="image" accept="[.jpg, .png, .webp, .jpeg]" class="form-control shadow-none mb-4" required />
                            <button type="submit" class="btn custom-bg text-white shadow-none">Add</button>
                            <input type="hidden" name="room_id">
                        </form>

                    </div>
                    <div class="table-responsive-lg" style="height: 350px; overflow-y:scroll;">
                        <table class="table table-hover border text-center">
                            <thead class="">
                                <tr class="bg-dark text-light sticky-top">
                                    <th scope="col" width="60%">Image</th>
                                    <th scope="col">Thumbnail</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody id="room-image-data">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require('include/scripts.php') ?>
    <script src="scripts/rooms.js">

    </script>
</body>

</html>