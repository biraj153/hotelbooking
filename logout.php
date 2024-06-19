<?php

require('admin/include/essentials.php');
session_start();
unset($_SESSION['login']);
redirect('index.php');
