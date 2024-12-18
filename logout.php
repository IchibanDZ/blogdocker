<?php 
session_start();
session_destroy();
header('location:index.php');
exit();
require_once 'partials/header.php';?>