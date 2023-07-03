<?php

class Session
{
    public function put($key,$value) {
        $_SESSION[$key] = $value;
    }

    public function get($key){
        return array_key_exists($key,$_SESSION) ? $_SESSION[$key] : null;
    }

    public function has($key){
        return array_key_exists($key,$_SESSION);
    }
    public function remove($key){
        if(array_key_exists($key,$_SESSION))
        {
            unset($_SESSION[$key]);
        }
    }
    public function destroy($key){
        session_destroy();
    }

    /**
     * EXAMPLE -  session()->flash('register_success','you are registered');
     * DISPLAY IN VIEW - echo session()->flash('register_success');
     * @param String $key
     * @param String $message
     * @param String $class
    */
    public function flash($key='',$message='',$class='alert alert-success')
    {
        if(!empty($key))
        {

            if(!empty($message) && empty($_SESSION[$key]))
                {

                    if(!empty($_SESSION[$key]))
                    {
                        unset($_SESSION[$key]);
                    }

                    if(!empty($_SESSION[$key. '_class']))
                    {
                        unset($_SESSION[$key. '_class']);
                    }

                    $_SESSION[$key] = $message;
                    $_SESSION[$key. '_class'] = $class;
                }
            elseif (empty($message) && !empty($_SESSION[$key]))
            {
                $class = !empty($_SESSION[$key. '_class']) ? $_SESSION[$key. '_class'] : '';
                echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$key].'</div>';
                unset($_SESSION[$key]);
                unset($_SESSION[$key. '_class']);
            }
        }
    }

}