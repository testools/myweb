<?php
class ParentDB
{
    protected $_table;
    protected $db;
    
    public function __construct()
    {
        global $DB;
        $this->db = $DB;
    }
}