<?php
@session_start();
if (empty($_SESSION['ses_id']))
{
    header("location:index.php");
    exit;
}
 ?>