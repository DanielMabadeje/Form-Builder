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

        $form =$data['form_options'];
        $data['form_options']=json_encode($data['form_options']);

        $this->db->query('INSERT INTO forms (form_id, user_id, form_array, form_name, description) VALUES(:form_id, :user_id, :form_array, :form_name, :description)');
        $this->db->bind(':form_id', $data['uniqueId']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':form_array', $data['form_options']);
        $this->db->bind(':form_name', $data['title']);
        $this->db->bind(':description', $data['description']);

        if ($this->db->execute()) {

            foreach ($form as $question) {
                $param['questions']=$question;
                $param['uniqueId']=$data['uniqueId'];
                if ($this->createFormQuestion($param)) {
                    return true;
                } else {
                    return false;
                }
            }
            // return true;
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
        $this->db->bind(':label', $data['questions']['label']);
        $this->db->bind(':type', $data['questions']['type']);
        $this->db->bind(':name', $data['questions']['name']);
        $this->db->bind(':placeholder', $data['questions']->placeholder);
        $this->db->bind(':id', $data['questions']->id);


        var_dump($data);
        if ($this->db->execute()) {
            return true;
        }
        else{
            return false;
        }
        
    }

}