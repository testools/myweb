<?php
class HomeFrontendDB extends ParentDB
{
    function getAutorizeUser($login = false, $pass = false)
    {
        if (!$login or !$pass) {
            return false;
        }

        return $this->getStoredProc('users_getByLoginPass', array($login ,$pass));
    }
}
