<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Accounttype extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('encoding_lib');
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('account_types', 'can_view')) {
            access_denied();
        }
        
        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'ACCOUNTS');
        $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'account/getall');
        $userdata = $this->customlib->getUserData();
        $data['title'] = 'Add account type';
        $data['title_list'] = 'Add account type Details';
        $data['posturl'] ='admin/accounttype/create/';
        $data['listaccounts'] = array();
        $categories = $this->accounttype_model->getCategories(0, $userdata['id']);
        //print_r($categories);die();
        $data['accounttypes'] = $categories;
        foreach ($categories as $category) {
            if ($category['parent_account_type_id']==0) {
                // Level 2
                $children_data = array();
                $children = $this->accounttype_model->getCategories($category['id'], $userdata['id']);
                foreach ($children as $child) {

                    $children_data[] = array(
                        
                        'id'  => $child['id'],
                        'parent_id'  => $child['parent_account_type_id'],
                        'name'  => $child['name']
                    );
                }
                // Level 1
                $data['listaccounts'][] = array(
                    'id'        => $category['id'],
                    'parent_id' => $category['parent_account_type_id'],
                    'name'      => $category['name'],
                    'children'  => $children_data
                );
            }
        }
        //print_r($data['listaccounts']); die();
        $this->load->view('layout/header');
        $this->load->view('admin/accounttype/createaccounttype', $data);
        $this->load->view('layout/footer');
    }

    public function getall() {


        if (!$this->rbac->hasPrivilege('accounts', 'can_view')) {
            access_denied();
        }

        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'ACCOUNTS');
        $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'account/getall');


        $listbook = $this->book_model->getaccount();
        $data['listbook'] = $listbook;

        $this->load->view('layout/header');
        $this->load->view('admin/accounttype/getall', $data);
        $this->load->view('layout/footer');
    }

    function create() {
        if (!$this->rbac->hasPrivilege('account_types', 'can_add')) {
            access_denied();
        }

        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'ACCOUNTS');
        
        $userdata = $this->customlib->getUserData();
        $data['title'] = 'Add account type'; 
        $data['title_list'] = 'Account Details';
        $data['posturl'] ='admin/accounttype/create/';
        $this->form_validation->set_rules('account_name', $this->lang->line('account_name'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['listaccounts'] = array();
            $categories = $this->accounttype_model->getCategories(0, $userdata['id']);
            if($categories){
                $data['accounttypes'] = $categories;
                foreach ($categories as $category) {
                    if ($category['parent_account_type_id']==0) {
                        // Level 2
                        $children_data = array();
                        $children = $this->accounttype_model->getCategories($category['id'], $userdata['id']);
                        foreach ($children as $child) {

                            $children_data[] = array(
                                'name'  => $child['name'],
                                'id'  => $child['id']
                            );
                        }
                        // Level 1
                        $data['listaccounts'][] = array(
                            'name'     => $category['name'],
                            'id'     => $category['id'],
                            'children' => $children_data
                        );
                    }
                }
            }
            $this->load->view('layout/header');
            $this->load->view('admin/accounttype/createaccounttype', $data);
            $this->load->view('layout/footer');
        } else {
            
            $data = array(
                'name' => $this->input->post('account_name'),
                'parent_account_type_id' => $this->input->post('account_type_id'),
                'user_id' => $userdata['id'],
            );
            
            $this->accounttype_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/accounttype/index');
        }
    }

    function edit($id) {
        if (!$this->rbac->hasPrivilege('account_types', 'can_edit')) {
            access_denied();
        }

        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'ACCOUNTS');
        $userdata = $this->customlib->getUserData();
        $data['title'] = 'Edit Account Type';
        $data['title_list'] = 'Account Type Details';
        $data['id'] = $id;
        $data['posturl'] ='admin/accounttype/edit/' . $id;
        $editaccounttype = $this->accounttype_model->get($id);
        $data['editaccount'] = $editaccounttype;
        $data['listaccounts'] = array();
        $categories = $this->accounttype_model->getCategories(0, $userdata['id']);
        $data['accounttypes'] = $categories;
        foreach ($categories as $category) {
            if ($category['parent_account_type_id']==0) {
                // Level 2
                $children_data = array();
                $children = $this->accounttype_model->getCategories($category['id'], $userdata['id']);
                foreach ($children as $child) {

                    $children_data[] = array(
                        'name'  => $child['name'],
                        'id'  => $child['id']
                    );
                }
                // Level 1
                $data['listaccounts'][] = array(
                    'name'     => $category['name'],
                    'id'     => $category['id'],
                    'children' => $children_data
                );
            }
        }
        $this->form_validation->set_rules('account_name', $this->lang->line('account_name'), 'trim|required|xss_clean');
        //$this->form_validation->set_rules('account_number', $this->lang->line('account_number'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            //$getaccount = $this->account_model->getaccount();
            //$data['getaccounts'] = $getaccount;
            $this->load->view('layout/header');
            $this->load->view('admin/accounttype/createaccounttype', $data);
            $this->load->view('layout/footer');
        } else {
            $parent_id = $this->accounttype_model->get_parent_account_type_byid($id);
            $data = array(
                'id' => $id,
                'name' => $this->input->post('account_name'),
                'parent_account_type_id' => $parent_id['parent_account_type_id']
                
            );
            
            $this->accounttype_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/accounttype/index');
        }
    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('accounts', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Accounts Type List';
        $this->accounttype_model->remove($id);
        redirect('admin/accounttype/index');
    }

    

}

?>