<?php
if(!isset($_SESSION)){session_start();}
if(isset($_SESSION['role']))
{
  if(!$_SESSION['role']==1) 
    { 
        header('location: /index.php');
        die();
    }
}
else{header('location: /index.php');die();}
