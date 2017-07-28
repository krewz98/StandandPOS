<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_groups extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('User_groups_model');
    }

    public function index() {

    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_user_groups = $this->User_groups_model;
                $response['data'] = $m_user_groups->get_list();
                echo json_encode($response);
                break;

            case 'create':
                $m_user_groups = $this->User_groups_model;

                $m_user_groups->user_group = $this->input->post('user_group', TRUE);
                $m_user_groups->user_group_desc = $this->input->post('user_group_desc', TRUE);
                $m_user_groups->save();

                $user_group_id = $m_user_groups->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'User group information successfully created.';
                $response['row_added'] = $m_user_groups->get_list(array('user_group_id'=>$user_group_id));
                echo json_encode($response);

                break;

            case 'delete':
                $m_user_groups=$this->User_groups_model;

                $user_group_id=$this->input->post('user_group_id',TRUE);
				
                $m_user_groups->is_deleted=1;
                if($m_user_groups->modify($user_group_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='User Group information successfully deleted.';

                    echo json_encode($response);
                }
                break;

            case 'update':


                break;
        }
    }
}
