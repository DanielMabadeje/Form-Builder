<?php
// namespace App\Models;
class Blog
{
    private $db;

    /**
     * User constructor.
     * @param null $data
     */
    public function __construct()
    {
        $this->db = new Database;
    }

    public function index($var = null)
    {
        $this->db->query("SELECT *
                          FROM blogs
                          LIMIT $offset, $no_of_records_per_page
                        --   ORDER BY blogs.created_at DESC
                          ");
        $results = $this->db->resultSet();
        return $results;
    }
}