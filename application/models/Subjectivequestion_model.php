<?php

class Subjectivequestion_model extends MY_model {

    

    public function add($data) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']); 
            $this->db->update('subjective_questions', $data);
            $message = UPDATE_RECORD_CONSTANT . " On  subjective_questions id " . $data['id'];

            $action = "Update";
            $record_id = $data['id'];
            $this->log($message, $record_id, $action);
            //======================Code End==============================

            $this->db->trans_complete(); # Completing transaction
            /* Optional */

            if ($this->db->trans_status() === false) {
                # Something went wrong.
                $this->db->trans_rollback();
                return false;
            } else {
                //return $return_value;
            }
        } else {
           // echo 1; die();

            $this->db->insert('subjective_questions', $data);
           // echo $this->db->last_query(); die();
            $id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On  questions id " . $id;
            $action = "Insert";
            $record_id = $id;
            $this->log($message, $record_id, $action);
            //echo $this->db->last_query();die;
            //======================Code End==============================

            $this->db->trans_complete(); # Completing transaction
            /* Optional */

            if ($this->db->trans_status() === false) {
                # Something went wrong.
                $this->db->trans_rollback();
                return false;
            } else {
                //return $return_value;
            }
            return $id;
        }
    }


    public function get($id = null) {
        $this->db->select('subjective_questions.*,subjects.name')->from('subjective_questions');

        $this->db->join('subjects', 'subjects.id = subjective_questions.subject_id');
        if ($id != null) {
            $this->db->where('subjective_questions.id', $id);
        } else {
            $this->db->order_by('subjective_questions.id');
        }
        $query = $this->db->get();
        if ($id != null) {
            //echo 1; die();
            return $query->row(); 
        } else {
            //echo 0; die();
            return $query->result();            
        }
    }


    public function remove($id) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        $this->db->where('id', $id);
        $this->db->delete('subjective_questions');
        $message = DELETE_RECORD_CONSTANT . " On questions id " . $id;
        $action = "Delete";
        $record_id = $id;
        $this->log($message, $record_id, $action);
        //======================Code End==============================
        $this->db->trans_complete(); # Completing transaction
        /* Optional */
        if ($this->db->trans_status() === false) {
            # Something went wrong.
            $this->db->trans_rollback();
            return false;
        } else {
            //return $return_value;
        }
    }

    public function image_add($id, $image) {

        $this->db->where('id', $id);
        $this->db->update('questions', $image);
    }

    public function add_option($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('question_options', $data);
        } else {
            $this->db->insert('question_options', $data);
            return $this->db->insert_id();
        }
    }

        public function get_class_section_id($id) {
    

            $this->db->select('*'); 
            $this->db->from('classes');
            $this->db->join('class_sections','classes.id=class_sections.class_id');
            $this->db->join('sections','sections.id=class_sections.section_id');
            $this->db->where('class_sections.class_id',$id);

            $query = $this->db->get();    
          //  echo $this->db->last_query(); die();      
            return $query->result();
    }

      public function  get_class_teacher_id($id){

     $this->db->select('*'); 
            $this->db->from('classes');
            $this->db->join('class_teacher','classes.id=class_teacher.staff_id');
            $this->db->join('staff','staff.id=class_teacher.staff_id');
            $this->db->where('class_teacher.staff_id',$id);
            $query = $this->db->get(); 
            //echo $this->db->last_query(); die();         
            return $query->row();

   }

    public function add_question_answers($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('question_answers', $data);
        } else {
            $this->db->insert('question_answers', $data);
            return $this->db->insert_id();
        }
    }

    public function get_result($id) {
        return $this->db->select('*')->from('questions')->join('question_answers', 'question.id=question_answers.question_id')->get()->row_array();
    }

    public function get_option($id) {
        return $this->db->select('id,option')->from('question_options')->where('question_id', $id)->get()->result_array();
    }

    public function get_answer($id) {
        return $this->db->select('option_id as answer_id')->from('question_answers')->where('question_id', $id)->get()->row_array();
    }
    
    public function get_classes() {
        $this->db->order_by('id', 'DESC');  //actual field name of id
        $query=$this->db->get('classes');

        return $query->result();
    }

    public function get_class_section() {
        $this->db->order_by('id', 'DESC');  //actual field name of id
        $query=$this->db->get('sections');

        return $query->result();


    //     $this->db->select("*");
    //     $this->db->from('classes');
    //     $this->db->join('class_sections', 'class_sections.class_id = classes.id');
    //     $query = $this->db->get();
    //   return $query->result();
    }

    public function get_subject_teacher() {
        $this->db->select("*");
        $this->db->from('classes');
        $this->db->join('class_teacher', 'classes.id = class_teacher.class_id');
        $query = $this->db->get();
      return $query->result();
    }

    //    public function getById($id){
    //   //  echo 1; die();
    //     $this->db->select('subjects.id as subject_id, subjective_questions.select_paper as paper,
    //     subjective_questions.question_value as question_value,subjective_questions.question_marks as question_marks, subjects.name as subject_name, classes.class as class_name, sections.section as section_name, sections.id as section_id, CONCAT( staff.name, " ", staff.surname ) as teacher_name'); 
    //         $this->db->from('subjective_questions');
    //          echo $this->db->last_query(); die();     
    //         $this->db->join('subjects','subjects.id=subjective_questions.subject_id');
    //         $this->db->join('classes','classes.id=subjective_questions.class_id');
    //         $this->db->join('sections','sections.id=subjective_questions.section_id');
    //         $this->db->join('staff','staff.id=subjective_questions.teacher_id');
    //         $this->db->join('sections','sections.id=class_sections.section_id');
    //         $this->db->where('subjective_questions.id',$id);
    //         $query = $this->db->get();    
           
    //         return $query->row();

    // }

      public function getById($id){
        $this->db->select('subjects.id as subject_id, subjects.name as subject_name, subjective_questions.select_paper as paper, sections.section as section_name, sections.id as section_id, classes.class as class_name, staff.id as teacher_id, CONCAT( staff.name, " ", staff.surname ) as teacher_name'); 
            $this->db->from('subjective_questions');
            $this->db->join('subjects','subjects.id=subjective_questions.subject_id');
            $this->db->join('classes','classes.id=subjective_questions.class_id');
            $this->db->join('sections','sections.id=subjective_questions.section_id');
            $this->db->join('staff','staff.id=subjective_questions.teacher_id');
            $this->db->where('subjective_questions.id',$id);
            $query = $this->db->get();    
          // echo $this->db->last_query(); die();      
            return $query->row();

    
    }

     public function savefile($data, $ids){
        //echo 1; die();
        $fileData =  array(
            'subject_id'=>$ids['subject_id'],
            'question_value'=>$data[0],
            'question_marks'=>$data[1],
            'select_paper'=>$data[2],
            'class_id'=>$ids['class_id'],
            'section_id'=>$ids['section_id'],
            'teacher_id'=>$ids['teacher_id'],
        );
        //print_r($fileData); die();
        $this->db->insert('subjective_questions',$fileData);
    }
    

}
