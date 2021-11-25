<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Subjective extends Admin_Controller {

    public function read($id) {

        if (!$this->rbac->hasPrivilege('question_bank', 'can_view')) {
            access_denied();
        }
public function index(){
   echo 1;die();
}

      }