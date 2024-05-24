<?php
session_start();
session_destroy();
header("Location: /vue/paccueil.php");
?>