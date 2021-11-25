<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_paper_model extends CI_Model {


 public function get($id = null) {
        $this->db->select('generate_paper.*,subjects.name as subject_name, staff.name as teacher_name, sections.section as section_name, exam_groups.name as exam_group, exam_groups.id as exam_group_id, classes.class as class_name,classes.id as class_id_edit, ')->from('generate_paper');

        $this->db->join('subjects', 'subjects.id = generate_paper.subject_id');
        $this->db->join('staff', 'staff.id = generate_paper.teacher_id');
        $this->db->join('sections', 'sections.id = generate_paper.section_id');
        $this->db->join('exam_groups', 'exam_groups.id = generate_paper.exam_group');
        $this->db->join('classes', 'classes.id = generate_paper.class_id');
        if ($id != null) {
            $this->db->where('generate_paper.id', $id);
        } else {
            $this->db->order_by('generate_paper.id');
        }
        $query = $this->db->get();
        if ($id != null) {
           return  $query->row();
        } else {
           return  $query->result(); 
        }
    }

	 // public function get($id = null) {
	 // 	//echo 1; die();

  //       if (!empty($id)) {
  //       	echo 0; die();

  //           $query = $this->db->where("id", $id)->get("generate_paper");

  //           return $query->row_array();
  //          // $query->row_array();
  //            echo $this->db->last_query(); die();

  //       } else {
  //       	//echo 1; die();

  //           $query = $this->db->get("generate_paper");

  //        return  $query->result_array();
  //           //  echo $this->db->last_query(); die();
         
  //       }
  //   }
//     public function add($data) {
    	
// //print_r($data);
//         $this->db->trans_start(); # Starting Transaction
//         $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
//         //=======================Code Start===========================
//         if (isset($data["id"])) {
//             $this->db->where("id", $data["id"])->update("generate_paper", $data);
//             $message = UPDATE_RECORD_CONSTANT . " On  generate paper id " . $data["id"];
//             $action = "Update";
//             $record_id = $data["id"];
//             $this->log($message, $record_id, $action);
//             //======================Code End==============================
//             $this->db->trans_complete(); # Completing transaction
//             /* Optional */
//             if ($this->db->trans_status() === false) {
//                 # Something went wrong.
//                 $this->db->trans_rollback();
//                 return false;
//             } else {
//                 //return $return_value;
//             }
//         } else {
//         	print_r($data); die();
        	
//             $this->db->insert("generate_paper", $data);

//             $id = $this->db->insert_id();
    
//             $message = INSERT_RECORD_CONSTANT . " On generate paper id " . $id;
//             $action = "Insert";
//             $record_id = $id;
//             $this->log($message, $record_id, $action);
//             //======================Code End==============================
//             $this->db->trans_complete(); # Completing transaction
//             /* Optional */
//             if ($this->db->trans_status() === false) {
//                 # Something went wrong.
//                 $this->db->trans_rollback();
//                 return false;
//             } else {
//                 //return $return_value;
//             }
//         }
//     }

	public function addValue($data){
		$this->db->insert('generate_paper',$data);
	}

	 public function update($data, $id){
        $this->db->where('id', $id);
        $this->db->update('generate_paper', $data); 
      
    }

	public function add($data) {
        $this->db->trans_start(); # Starting Transaction
        $this->db->trans_strict(false); # See Note 01. If you wish can remove as well
        //=======================Code Start===========================
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']); 
            $this->db->update('generate_paper', $data);
            $message = UPDATE_RECORD_CONSTANT . " On  generate paper id " . $data['id'];

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

            $this->db->insert('generate_paper', $data);
            $id = $this->db->insert_id();
            $message = INSERT_RECORD_CONSTANT . " On  generate paper id " . $id;

            $action = "Insert";
            $record_id = $id;
            $this->log($message, $record_id, $action);
             echo $this->db->last_query(); die();
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

    public function get_subject(){

    	    $this->db->select('*');
		    $this->db->from('subjects');
		    $this->db->order_by('id','asc');
		    $query = $this->db->get();
		    return $query->result();
    }

    public function get_exam_group(){
    		$this->db->select('*');
		    $this->db->from('exam_groups');
		    $this->db->order_by('id','asc');
		    $query = $this->db->get();
		    return $query->result();
    }

    public function get_classes(){
    	$this->db->select('*');
    	$this->db->from('classes');
		$this->db->order_by('id','asc');
		$query = $this->db->get();
		return $query->result();
    }

     public function delete($id) {

     	$this->db->where('id', $id);
      	$this->db->delete('generate_paper'); 
    }

    public function view($id){
//    	echo $id; die();

    	$this->db->select('generate_paper.*,subjects.name as subject_name, staff.name as teacher_name, sections.section as section_name, exam_groups.name as exam_group, exam_groups.id as exam_group_id, classes.class as class_name,classes.id as class_id_edit, ')->from('generate_paper');
        $this->db->join('subjects', 'subjects.id = generate_paper.subject_id');
        $this->db->join('staff', 'staff.id = generate_paper.teacher_id');
        $this->db->join('sections', 'sections.id = generate_paper.section_id');
        $this->db->join('exam_groups', 'exam_groups.id = generate_paper.exam_group');
        $this->db->join('classes', 'classes.id = generate_paper.class_id');
         $this->db->where('generate_paper.id', $id);
		$query = $this->db->get();
		return  $query->row();
		  //echo  $this->db->last_query(); die();
	
    }


    // get section for class
   public function get_class_section_id($id) {
        //echo $id; die();

            $this->db->select('*'); 
            $this->db->from('classes');
            $this->db->join('class_sections','classes.id=class_sections.class_id');
            $this->db->join('sections','sections.id=class_sections.section_id');
            $this->db->where('class_sections.class_id',$id);

            $query = $this->db->get();    
           // echo $this->db->last_query(); die();      
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

   public function objective_questions($id){
   		  $this->db->order_by('rand()');
		  $this->db->limit($id);
		  $query = $this->db->get('questions');
		  return $query->result_array();
		     //echo $this->db->last_query(); die();
   }


   public function get_subjective_questions($id){
   		$this->db->order_by('rand()');
		  $this->db->limit($id);
		  $query = $this->db->get('subjective_questions');
		  return $query->result_array();
   }
	
  public function get_school_setting(){
      $this->db->select('*');
      $this->db->from('sch_settings');
    $this->db->order_by('id','asc');
    $query = $this->db->get();
    return $query->row();

    // $query = $this->db->get('sch_settings');
    // //$data['count'] = $query->num_rows();
    // return = $query->result();
    //return $data;

  }

}

/* End of file Generate_paper_model.php */
/* Location: ./application/models/Generate_paper_model.php */