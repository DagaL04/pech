<?php

session_star();

session_unset();

session_destroy();
header('Location: /php-login');
?>