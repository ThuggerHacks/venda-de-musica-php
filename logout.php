<?php

    session_start();
    session_unset();
    unset($_SESSION['idUSer']);
    unset($_SESSION['nome']);
    session_destroy();

    header("location:entrar.php");