<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('encoding_lib');
    }

    public function index() {
        if (!$this->rbac->hasPrivilege('accounts', 'can_view')) {
            access_denied();
        }
        
        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'ACCOUNTS');
        $this->session->set_userdata('top_menu', 'Library');
        $this->session->set_userdata('sub_menu', 'account/getall');
        $userdata = $this->customlib->getUserData();
        $data['addedby'] = $userdata['name'];
        $data['title'] = 'Add account type';
        $data['title_list'] = 'Add Account Details';
        $data['posturl'] ='admin/account/create/';
        $data['listaccounts'] = array();
        $categories = $this->accounttype_model->getCategories(0, $userdata['id']);
        $data['opening_balance'] = 0;
        $data['closing_balance'] = 0;
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
        
        $this->load->view('layout/header');
        $this->load->view('admin/account/createaccount', $data);
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
        $userdata = $this->customlib->getUserData();
        $data['addedby'] = $userdata['name'];
        $accountslist = $this->account_model->getaccount();
        $data['accountslist'] = $accountslist;

        $this->load->view('layout/header');
        $this->load->view('admin/account/getall', $data);
        $this->load->view('layout/footer');
    }

    function create() {
        if (!$this->rbac->hasPrivilege('accounts', 'can_add')) {
            access_denied();
        }
        
        $userdata = $this->customlib->getUserData();
        $data['title'] = 'Add Account'; 
        $data['title_list'] = 'Account Details';
        $data['posturl'] ='admin/account/create/';
        $data['opening_balance'] = 0;
        $data['closing_balance'] = 0;
        $this->form_validation->set_rules('account_title', $this->lang->line('account_title'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('account_number', $this->lang->line('account_number'), 'trim|required|xss_clean');

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
            $this->load->view('admin/account/createaccount', $data);
            $this->load->view('layout/footer');
        } else {
            
            $parent_id = $this->accounttype_model->get_parent_account_type_byid($this->input->post('account_type_id'));

            if($parent_id){
                $parent_account_type_id = $parent_id['parent_account_type_id'];
            }else{
                $parent_account_type_id = 0;
            }

            $data = array(
                'user_id' => $userdata['id'],
                'account_title' => $this->input->post('account_title'),
                'account_number' => $this->input->post('account_number'),
                'account_type_id' => $this->input->post('account_type_id'),
                'parent_account_type_id' => $parent_account_type_id,
                'opening_balance' => $this->input->post('opening_balance'),
                'closing_balance' => $this->input->post('closing_balance'),
                'created_by' => $userdata['id']
                
            );

            $insert_id = $this->account_model->add($data);
            
            // if($insert_id){
            //     if($this->input->post('account_type_id')==1){
            //         $data = array(
            //             'income_category' => $this->input->post('account_title'),
            //             'account_id' => $this->input->post('account_type_id'),
            //         );
            //     }
            //     if($this->input->post('account_type_id')==2){
            //         $data = array(
            //             'expense_head' => $this->input->post('account_title'),
            //             'account_id' => $this->input->post('account_type_id'),
            //         );
            //     }
            //     $this->account_model->insertHead($data);
            // }

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('success_message') . '</div>');
            redirect('admin/account/index');
        }
    }

    function edit($id) {
        if (!$this->rbac->hasPrivilege('accounts', 'can_edit')) {
            access_denied();
        }

        $this->session->set_userdata('menu_heading', 'SETTINGS');
        $this->session->set_userdata('sub_heading', 'ACCOUNTS');
        $userdata = $this->customlib->getUserData();
        $data['title'] = 'Edit Account Type';
        $data['title_list'] = 'Account Type Details';
        $data['id'] = $id;
        $data['posturl'] ='admin/account/edit/' . $id;
        $editaccount = $this->account_model->get($id);
        $data['editaccount'] = $editaccount;
        $data['account_type_id'] = $editaccount['account_type_id'];
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



        $this->form_validation->set_rules('account_title', $this->lang->line('account_title'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('account_number', $this->lang->line('account_number'), 'trim|required|xss_clean');
        //$this->form_validation->set_rules('account_number', $this->lang->line('account_number'), 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            //$getaccount = $this->account_model->getaccount();
            //$data['getaccounts'] = $getaccount;
            $this->load->view('layout/header');
            $this->load->view('admin/account/createaccount', $data);
            $this->load->view('layout/footer');
        } else {

            $parent_id = $this->accounttype_model->get_parent_account_type_byid($this->input->post('account_type_id'));

            if($parent_id){
                $parent_account_type_id = $parent_id['parent_account_type_id'];
            }else{
                $parent_account_type_id = 0;
            }

            $data = array(
                'id' => $id,
                'user_id' => $userdata['id'],
                'account_title' => $this->input->post('account_title'),
                'account_number' => $this->input->post('account_number'),
                'account_type_id' => $this->input->post('account_type_id'),
                'parent_account_type_id' => $parent_account_type_id,
                'opening_balance' => $this->input->post('opening_balance'),
                'closing_balance' => $this->input->post('closing_balance'),
                'created_by' => $userdata['id']
                
            );
            
            $this->account_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $this->lang->line('update_message') . '</div>');
            redirect('admin/account/getall');
        }

    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('accounts', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Accounts List';
        $this->accounttype_model->remove($id);
        redirect('admin/account/index');
    }

    

}

?>