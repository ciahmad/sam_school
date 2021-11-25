<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Subjectivequestion extends Admin_Controller {

   public function index() {
        

      if (!$this->rbac->hasPrivilege('question_bank', 'can_view')) {
          access_denied();
      }
      //echo 1; die();
    
      $this->session->set_userdata('menu_heading', 'SETTINGS');
     
      $this->session->set_userdata('sub_heading', 'EXAMINATIONS');
      $this->session->set_userdata('top_menu', 'Online_Examinations');
      $this->session->set_userdata('sub_menu', 'Online_Examinations/subjective_question');
     //echo 1; die();
    

      $s_questionList = $this->Text_model->get();
echo 1;die();
      print_r($s_questionList); die();
      // echo 1; die();
      
      $data['s_questionList'] = $s_questionList;
      $subject_result = $this->subject_model->get();
      $data['subjectlist'] = $subject_result;
      $questionOpt = $this->customlib->getQuesOption();
      $data['questionOpt'] = $questionOpt;
      $this->load->view('layout/header', $data);
      $this->load->view('admin/question/subjective_question', $data);
      $this->load->view('layout/footer', $data);
  }


}