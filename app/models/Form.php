<?php
// namespace App\Models;
class Form
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

    public function add($data)
    {

        $data['form_options']=json_encode($data['form_options']);

        $this->db->query('INSERT INTO forms (form_id, user_id, form_array, form_name, description) VALUES(:form_id, :user_id, :form_array, :form_name, :description)');
        $this->db->bind(':form_id', $data['uniqueId']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':form_array', $data['form_options']);
        $this->db->bind(':form_name', $data['title']);
        $this->db->bind(':description', $data['description']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        var_dump($data);
        die;
    }


}