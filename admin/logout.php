<?php

require('include/essentials.php');
session_start();
unset($_SESSION['adminLogin']);
redirect('index.php');
