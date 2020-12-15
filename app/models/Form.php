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
        // $data['form_options'] = json_encode($data['form_options']);

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

    public function updateForm($data)
    {

        // var_dump($data);
        // die;
        $form = $data['form'];
        // $this->db->query("UPDATE forms SET (form_id, user_id, form_name, description, form_type) VALUES(:form_id, :user_id, :form_name, :description, :form_type)");

        $this->db->query("UPDATE forms 
                          SET form_id=:form_id, user_id=:user_id, form_name=:form_name, description=:description, form_type=:form_type 
                          
                          WHERE form_id=:form_id");
        $this->db->bind(':form_id', $data['form_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':form_type', $data['form_type']);
        $this->db->bind(':form_name', $data['form_name']);
        $this->db->bind(':description', $data['description']);

        if ($this->db->execute()) {

            foreach ($form as $question) {
                $param['questions'] = $question;
                $param['form_id'] = $data['form_id'];
                $this->updateFormQuestion($param);
            }
            // $data['form_id']=
            return $this->getUpdatedAt($data);
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
        if ($row) {
            $row->form = $this->getFormQuestion($id);
            return $row;
        } else {
            return false;
        }
    }


    public function addQuestion($data)
    {

        $data['uniqueId'] = $data['form_id'];
        if ($question_id = $this->createFormQuestion($data)) {

            $result = [];
            $result['question_id'] = $question_id;
            // var_dump($data);
            // die;
            return $result;
        } else {
            return false;
        }
    }
    public function createFormQuestion($data)
    {


        $this->db->query('INSERT INTO 
                            form_questions 
                            (form_id, label, type, name, placeholder, id)
                             VALUES(:form_id, :label, :type, :name, :placeholder, :id)');


        $this->db->bind(':form_id', $data['uniqueId']);
        if (isset($data['questions'])) {
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
        } else {
            if (isset($data['label'])) {
                $this->db->bind(':label', $data['label']);
            } else {
                $this->db->bind(':label', null);
            }
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':name', $data['name']);
            if (isset($data['placeholder'])) {
                $this->db->bind(':placeholder', $data['placeholder']);
            } else {
                $this->db->bind(':placeholder', null);
            }
            $this->db->bind(':id', $data['id']);
        }

        if ($this->db->execute()) {
            // die('gfgd');
            return $this->db->getLastId();
            // return true;
        } else {
            return false;
        }
    }


    public function updateFormQuestion($data)
    {


        $this->db->query("UPDATE
                            form_questions 
                            SET
                            form_id=:form_id, label=:label, type=:type, name=:name, placeholder=:placeholder, id=:id
                            --  VALUES(:form_id, :label, :type, :name, :placeholder, :id)
                             WHERE form_id=:form_id AND question_id=:question_id");


        $this->db->bind(':form_id', $data['form_id']);
        $this->db->bind(':question_id', $data['questions']['question_id']);
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

    public function getQuestion($form_id, $question_id)
    {
        $this->db->query('SELECT * FROM form_questions WHERE form_id= :form_id AND question_id=:question_id');
        $this->db->bind(':form_id', $form_id);
        $this->db->bind(':question_id', $question_id);


        if ($result = $this->db->single()) {
            return true;
        } else {
            return false;
        }
    }


    public function editQuestion($data)
    {
        $this->db->query("UPDATE form_question SET label=:label WHERE question_id=:question_id AND form_id=:form_id");
        $this->db->bind(':label', $data['label']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':placeholder', $data['placeholder']);
        // $this->db->bind(':type', $data['type']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editAllowingResponses($data)
    {
        $this->db->query("UPDATE forms SET allowing_responses=:allowing WHERE form_id=:form_id");
        $this->db->bind(':form_id', $data['form_id']);
        $this->db->bind(':allowing', $data['allow']);

        if ($this->db->execute()) {
            return $this->getUpdatedAt($data);
        } else {
            return false;
        }
    }

    private function getUpdatedAt($data)
    {
        $this->db->query("SELECT updated_at FROM forms WHERE form_id=:form_id");
        $this->db->bind(':form_id', $data['form_id']);

        $row = $this->db->single();
        return $row;
    }

    public function deleteQuestion($form_id, $question_id)
    {
        $this->db->query("DELETE FROM form_questions WHERE form_id=:form_id AND question_id=:question_id");
        $this->db->bind(':form_id', $form_id);
        $this->db->bind(':question_id', $question_id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateQuestion($form_id, $question_id)
    {
        # code...
    }
    public function getQuestionIdByName($form_id, $name)
    {
        $this->db->query("SELECT question_id FROM form_questions WHERE form_id=:form_id AND name=:name");
    }
}
