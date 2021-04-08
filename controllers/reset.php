<?php

session_start();

if (isset($_SESSION['a'])) {
    session_unset();
    session_destroy();
    echo "cleared";
} else {
    echo "no need";
}

