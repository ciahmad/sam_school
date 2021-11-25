<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Subjective extends Admin_Controller {

   //  public function read($id) {

   //      if (!$this->rbac->hasPrivilege('question_bank', 'can_view')) {
   //          access_denied();
   //      }

        public function index(){
         //  echo 1; die();
           $this->session->set_userdata('menu_heading', 'SETTINGS');
           $this->session->set_userdata('sub_heading', 'EXAMINATIONS');
           $this->session->set_userdata('top_menu', 'Online_Examinations');
           $this->session->set_userdata('sub_menu', 'Online_Examinations/subjective');
           $question = $this->Subjective_model->get_class();
        }
   }