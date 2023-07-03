<?php

class Auth
{
    private $key = 'CURRENT_USER';
    private $session = null;
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function user()
    {
        return $this->session->get($this->key);
    }
    public function id()
    {
        $user = $this->session->get($this->key);
        return $user?->id;
    }

    public function createUserSession($user)
    {
        $this->session->put($this->key,$user);
    }
    public function check(){
        return $this->session->has($this->key);
    }

    public function logout()
    {
        $this->session->remove($this->key);
    }
}