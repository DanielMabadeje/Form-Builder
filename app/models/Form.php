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

        if (isset($data['form_options'])) {
            $form = $data['form_options'];
        } else {
            $form = $data['form'];
        }
        // $data['form_options'] = json_encode($data['form_options']);

        $this->db->query('INSERT INTO forms (form_id, user_id, form_name, description, form_type) VALUES(:form_id, :user_id, :form_name, :description, :form_type)');
        $this->db->bind(':form_id', $data['uniqueId']);

        $this->db->bind(':form_type', $data['form_type']);
        $this->db->bind(':form_name', $data['title']);
        $this->db->bind(':description', $data['description']);

        if (isset($data['user_id'])) {
            $this->db->bind(':user_id', $data['user_id']);
        } else {
            $this->db->bind(':user_id', null);
        }

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
    public function setUserId($user_id, $form_id)
    {
        $this->db->query("UPDATE forms 
                          SET  user_id=:user_id,                       
                          WHERE form_id=:form_id");
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':form_id', $form_id);

        if ($this->db->execute()) {
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

        // var_dump($data);
        // die;

        if ($this->db->execute()) {
            $lastId = $this->db->getLastId();
            if (isset($data['options'])) {
                $optionData = [];

                var_dump($data['options']);
                die;
                foreach ($data['options'] as $option) {

                    // die($option);
                    $optionData['question_id'] = $lastId;
                    $optionData['form_id'] = $data['form_id'];
                    $optionData['type'] = $data['type'];
                    $optionData['option'] = $option;

                    $this->addQuestionOption($optionData);

                    $optionData = [];
                }
            } else {
                # code...
            }

            // die('gfgd');
            return $lastId;
            // return true;
        } else {
            return false;
        }
    }


    public function addQuestionOption($data)
    {
        $this->db->query("INSERT INTO questions_options (form_id, question_id, form_type, form_option) VALUES(:form_id, :question_id, :type, :option)");

        $this->db->bind(':form_id', $data['form_id']);
        $this->db->bind(':question_id', $data['question_id']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':option', $data['option']);


        if ($this->db->execute()) {
            return $this->db->getLastId();
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
        $this->db->query('SELECT  * FROM form_questions WHERE form_questions.form_id= :form_id
        -- RIGHT JOIN questions_options
        -- ON form_questions.question_id=questions_options.question_id
        ');
        $this->db->bind(':form_id', $id);


        $result = $this->db->resultSet();
        // $data = json_encode($result);
        // die($data);
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

    public function getQuestionDropdownOption($form_id, $question_id)
    {
        $this->db->query('SELECT form_option FROM questions_options WHERE form_id= :form_id AND question_id=:question_id');
        $this->db->bind(':form_id', $form_id);
        $this->db->bind(':question_id', $question_id);


        if ($result = $this->db->resultSet()) {

            // die(json_encode($result));
            $data = [];
            $index = 0;
            foreach ($result as $key => $value) {

                $data[$index] = $value->form_option;
                $index++;
            }
            return $data;
        } else {
            return false;
        }
    }

    public function getQuestionOption($form_id, $question_id)
    {
        $this->db->query('SELECT id, form_option AS value FROM questions_options WHERE form_id= :form_id AND question_id=:question_id ORDER BY created_at DESC');
        $this->db->bind(':form_id', $form_id);
        $this->db->bind(':question_id', $question_id);


        if ($result = $this->db->resultSet()) {

            foreach ($result as $key => $value) {
                $value->label = $value->value;
                // array($value);
                [$value];
            }

            return $result;
        } else {
            return [];
        }
    }

    public function deleteQuestionOption($id, $form_id, $question_id)
    {
        $this->db->query('DELETE FROM questions_options WHERE form_id= :form_id AND question_id=:question_id AND id=:id');
        $this->db->bind(':form_id', $form_id);
        $this->db->bind(':question_id', $question_id);
        $this->db->bind(':id', $id);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateQuestionOption($data)
    {
        $this->db->query('UPDATE questions_options SET form_option=:value WHERE form_id= :form_id AND question_id=:question_id AND id=:id');
        $this->db->bind(':form_id', $data['form_id']);
        $this->db->bind(':question_id', $data['question_id']);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':value', $data['value']);


        if ($this->db->execute()) {
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


    public function getLabelFromQuestionId($form_id, $name)
    {
        $this->db->query("SELECT label FROM form_questions WHERE form_id=:form_id AND name=:name");
        $this->db->bind(':form_id', $form_id);
        $this->db->bind(':name', $name);


        $row = $this->db->single();
        $label = $row->label;
        return $label;
    }


    public function getQuestionIdByName($form_id, $name)
    {
        $this->db->query("SELECT question_id FROM form_questions WHERE form_id=:form_id AND name=:name");
        $this->db->bind(':form_id', $form_id);
        $this->db->bind(':name', $name);

        $row = $this->db->single();
        // $row = $this->db->resultSet();
        // var_dump($row[0]->questionId);
        // die;
        $question_id = $row->question_id;
        return $question_id;
        // echo $question_id;
    }


    // function to get questions that their types are dropdowns, single option or multichoice
    public function getQuestionbyType($form_id)
    {
        $this->db->query("SELECT form_questions.question_id, COUNT(form_questions.question_id) AS NoOfOptions
                        --  SELECT form_questions.question_id,  form_questions.type, questions_options.form_option, COUNT(form_questions.question_id) AS NoOfQuestions
                          FROM form_questions
                        --   RIGHT JOIN questions_options
                          INNER JOIN questions_options
                          ON form_questions.question_id=questions_options.question_id
                        --   WHERE form_questions.form_id=:form_id AND form_questions.type='checkbox'
                          WHERE form_questions.form_id=:form_id AND (form_questions.type='checkbox' OR form_questions.type='dropdown')
                          GROUP BY form_questions.question_id
                          ");
        $this->db->bind(':form_id', $form_id);

        $row = $this->db->resultSet();

        foreach ($row as $key => $single_row) {
            $question_id = $single_row->question_id;
            $this->db->query('SELECT form_option, id FROM questions_options WHERE form_id= :form_id AND question_id=:question_id');
            $this->db->bind(':form_id', $form_id);
            $this->db->bind(':question_id', $question_id);

            $options = $this->db->resultSet();
            $single_row->options = [];
            $index = 0;

            foreach ($options as $key => $value) {
                $single_row->options[$value->id] = $value->form_option;
            }
        }
        return $row;
    }

    public function countResponsesOfOption($option_id)
    {
        # code...
    }



    // Answers Section
    public function addAnswer($data)
    {

        $this->db->query('INSERT INTO form_answers (form_id, question_id, answer_id, answer) VALUES(:form_id, :question_id, :answer_id, :answer)');
        $this->db->bind(':form_id', $data['form_id']);
        $this->db->bind(':question_id', $data['question_id']);
        $this->db->bind(':answer_id', $data['answer_id']);
        $this->db->bind(':answer', $data['answer']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function addOptionAnswer($data)
    {
        $this->db->query('INSERT INTO answer_option (form_id, question_id, answer_id, option_id) VALUES(:form_id, :question_id, :answer_id, :option_id)');
        $this->db->bind(':form_id', $data['form_id']);
        $this->db->bind(':question_id', $data['question_id']);
        $this->db->bind(':answer_id', $data['answer_id']);
        $this->db->bind(':option_id', $data['option_id']);

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function getResponsesCount($form_id)
    {
        $this->db->query("SELECT answer_id, COUNT(form_answers.answer_id) AS numberofanswers FROM form_answers WHERE form_id=:form_id GROUP BY answer_id ");
        $this->db->bind(':form_id', $form_id);


        $data = $this->db->resultSet();
        return $data;
    }

    public function getResponses($form_id)
    {
        $this->db->query("SELECT *,answer FROM form_answers WHERE answer_id=:form_id ");
        $this->db->bind(':form_id', $form_id);


        $data = $this->db->resultSet();
        return $data;
    }

    public function getResponseswithQuestion($form_id)
    {
        $this->db->query("SELECT *,answer FROM form_answers WHERE answer_id=:form_id ");
        $this->db->bind(':form_id', $form_id);


        $data = $this->db->resultSet();
        return $data;
    }


    public function countResponsesThatHaveOption($question_id, $value)
    {
        // $this->db->query("SELECT *,answer FROM form_answers WHERE question_id=:question_id AND value=:value");
        $this->db->query("SELECT COUNT(*) as chartcount FROM form_answers WHERE question_id=:question_id AND answer=:value");
        $this->db->bind(':question_id', $question_id);
        $this->db->bind(':value', $value);


        $data = $this->db->single();
        return $data->chartcount;
    }



    public function getFormsByUser($id){
        $this->db->query("SELECT * FROM forms WHERE user_id=:user_id");
        $this->db->bind(':user_id', $id);


        $data = $this->db->resultSet();
        return $data;
    }



    public function countQuestionswithFormId($form_id){}
}
