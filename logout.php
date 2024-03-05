<?php
session_start();
//hapus semua data sesi
session_unset();
//hancurkan sesi
session_destroy();
//redirect ke halaman login
header("location:login.php");
exit();
?>