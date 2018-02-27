<?php
$conn=mysqli_connect("localhost", "root", "", "codeit");
if (!$conn) {
    die("connection_aborted:".mysqli_connect_error);
}
