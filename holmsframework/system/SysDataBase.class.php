<?php
class SysDataBase
{
    private $type;
    private $server;
    private $user;
    private $db;
    private $pwd;
    
    private $DBconnect;
    
    public function __construct()
    {
        if (($resParamDb = SysConfig::getConnectParamDb()) !== false) {
            list($this->type, $this->user, $this->pwd, $this->server, $this->db) = $resParamDb;
        }
        
        $this->DBconnect = NewADOConnection($this->type);
        try {
            $this->DBconnect->Connect($this->server, $this->user, $this->pwd, $this->db);
        } catch (Exception $e) {
            unset($this);
            echo 'Unable connect to DB';
            exit;
        }
    }
    
    public function getValueDb()
    {
        return $this->DBconnect;
    }
}