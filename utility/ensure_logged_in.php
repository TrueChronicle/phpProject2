<?php
start_session();

if(!isset($_SESSION['is_logged_in'])
        ||$_SESSION['is_logged_in'] == false){
    
    header("Location: .");
    
}

