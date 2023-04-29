<?php

session_start();

session_destroy();
echo "logged out success";
// echo '<script type="text/javascript"> window.location.reload();</script>';