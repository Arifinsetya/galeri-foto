<?php
session_start();
session_destroy();
echo "<script>
    alert('Logoutsuccessful');
    location.href = '../index.php';
    </script>";

?>

<!-- aksi logout -->