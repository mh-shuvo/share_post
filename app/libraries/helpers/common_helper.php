<?php

function auth(){
    return new Auth(new Session());
}