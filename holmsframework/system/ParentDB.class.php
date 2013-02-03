<?php
class ParentDB
{
    protected $_table;
    protected $db;
    
    public function __construct()
    {
        global $DB;
        $this->db = $DB;
        $this->db->connect();
    }
    
    public function getStoredProc($namaStoredP, $storedArg = array())
    {
        if (empty($namaStoredP)) {
            return false;
        }

        $rs = $this->db->Execute(' call '.$namaStoredP.' ('.rtrim(str_repeat('?,', count($storedArg)), ',').')', $storedArg);
        $res = false;
        if ($rs) { 
            if (!$rs->EOF) {
                $res = $rs->fields;
            }
        }
        $rs->Close();
        return $res;
    }
    
    public function __destruct()
    {
        $this->db->Close();
    }
}