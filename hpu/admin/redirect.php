<?php
session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
// Finally, destroy the Session
 @session_destroy();
 header("Location: " . "http://login.hpu.edu.vn/login?service=http%3A%2F%2Fhpu.edu.vn%2Fadmin%2Flogin.php");

  /*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
