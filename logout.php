<?php
session_start();
require 'setting.php';
unset($_SESSION[ss().'user_id']);
unset($_SESSION[ss().'username']);
unset($_SESSION[ss().'fullname']);
unset($_SESSION[ss().'user_type']);

header('location:login.php');