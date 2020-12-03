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

    public function index($offset, $no_of_records_per_page)
    {
        $this->db->query("SELECT *
                          FROM blogs
                          LIMIT $offset, $no_of_records_per_page
                        --   ORDER BY blogs.created_at DESC
                          ");
        $results = $this->db->resultSet();
        return $results;
    }

    public function count($value = null)
    {
        if ($value !== null) {
            $this->db->query("SELECT COUNT(*) AS count FROM blog WHERE title=:title");
            $this->db->bind(':title', $value);
        } else {
            $this->db->query("SELECT COUNT(*) AS count FROM blog");
        }
        $result = $this->db->resultSet();
        return $result[0]->count;
    }
}