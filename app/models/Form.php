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

        $form = $data['form_options'];
        $data['form_options'] = json_encode($data['form_options']);

        $this->db->query('INSERT INTO forms (form_id, user_id, form_name, description, form_type) VALUES(:form_id, :user_id, :form_name, :description, :form_type)');
        $this->db->bind(':form_id', $data['uniqueId']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':form_type', $data['form_type']);
        $this->db->bind(':form_name', $data['title']);
        $this->db->bind(':description', $data['description']);

        if ($this->db->execute()) {

            foreach ($form as $question) {
                $param['questions'] = $question;
                $param['uniqueId'] = $data['uniqueId'];
                $this->createFormQuestion($param);
            }
            return true;
        } else {
            return false;
        }
    }

    public function getForm($id)
    {
        //going to add an inner Join later
        $this->db->query('SELECT * FROM forms WHERE form_id= :form_id');
        $this->db->bind(':form_id', $id);

        $row = $this->db->single();
        $row->form = $this->getFormQuestion($id);
        return $row;
    }




    public function createFormQuestion($data)
    {


        $this->db->query('INSERT INTO 
                            form_questions 
                            (form_id, label, type, name, placeholder, id)
                             VALUES(:form_id, :label, :type, :name, :placeholder, :id)');


        $this->db->bind(':form_id', $data['uniqueId']);
        if (isset($data['questions']['label'])) {
            $this->db->bind(':label', $data['questions']['label']);
        } else {
            $this->db->bind(':label', null);
        }
        $this->db->bind(':type', $data['questions']['type']);
        $this->db->bind(':name', $data['questions']['name']);
        if (isset($data['questions']['placeholder'])) {
            $this->db->bind(':placeholder', $data['questions']['placeholder']);
        } else {
            $this->db->bind(':placeholder', null);
        }
        $this->db->bind(':id', $data['questions']['id']);


        var_dump($data);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getFormQuestion($id)
    {
        $this->db->query('SELECT * FROM form_questions WHERE form_id= :form_id');
        $this->db->bind(':form_id', $id);


        $result = $this->db->resultSet();
        return $result;
    }
}
