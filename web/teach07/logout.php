<?php
/**
 * Created by PhpStorm.
 * User: Luis
 * Date: 17/02/2020
 * Time: 10:00 PM
 */
session_start();
session_destroy();
header("Location: login.php");