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
    }

    public function getForm($id)
    {
        $this->db->query('SELECT * FROM forms WHERE form_id= :form_id');
        $this->db->bind(':form_id', $id);

        $row = $this->db->single();
        return $row;
    }




    public function createFormQuestion($data){
        $this->db->query('INSERT INTO 
                            form_questions 
                            (form_id, label, type, name, placeholder, id)
                             VALUES(:form_id, :label, :type, :name, :placeholder, :id)');


        $this->db->bind(':form_id', $data['uniqueId']);
        $this->db->bind(':label', $data['label']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':placeholder', $data['placeholder']);
        $this->db->bind(':id', $data['id']);
        
    }

}