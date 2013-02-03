<?php
class HomeFrontendDB extends ParentDB
{
    function getAutorizeUser($login = false, $pass = false)
    {
        echo '-=getAutorizeUser=-';
        $rs = $this->db->Execute(' call users_getByLoginPass (?, ?)', array('admin','12345'));
        $res = false;
        if ($rs) { 
            if (!$rs->EOF) {
                $res = $rs->fields;
            }
        }
        $rs->Close();
        return $res;
    }
}
