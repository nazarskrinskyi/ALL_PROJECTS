<?php

session_start();
session_destroy();
header('location: ../MY_WEB.php');
exit();
