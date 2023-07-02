<?php
session_start();
//Flash message helper

function session()
{
    return new Session();
}

