<?php
//Destroy the session to logout.
function signout(){
    session_start();
    session_destroy();
}

