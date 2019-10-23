<?php
class UserTable
{
    protected $table = 'users';
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    // retrieve all users
    public function all(): array
    {
        $sth = $this->db->query("SELECT * FROM {$this->table}");
        return $sth->fetchAll();
    }

    // retrieve 1 user

    

}

