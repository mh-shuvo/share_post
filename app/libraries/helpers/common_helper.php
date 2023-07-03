<?php

function auth(){
    return new Auth(new Session());
}

function isAuthenticated(){
    if (!auth()->check())
    {
        redirect('users/login');
    }
}