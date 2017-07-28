<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rights extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Users_model');
        $this->load->model('User_groups_model');
        $this->load->model('User_rights_model');
    }

    public function index() {

        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['user_groups']=$this->User_groups_model->get_list();
        $data['title'] = 'User Account Management';

        $this->load->view('usergrouprights_view', $data);
    }

    function transaction($txn = null) {

        switch($txn){
            case 'list':
                $m_usergroups=$this->User_groups_model;
                $response['data']=$m_usergroups->get_list(
				array('user_groups.is_deleted'=>FALSE),
					'user_groups.*,user_groups_permission.*',
					array(
						array('user_groups_permission','user_groups_permission.user_group_id=user_groups.user_group_id','left')
					)
				);
                echo json_encode($response);
                break;
            case 'create':
                $m_user_group=$this->User_groups_model;
                $m_user_group_permission=$this->User_rights_model;
				
				$m_user_group->user_group = $this->input->post('group_name', TRUE);
                $m_user_group->user_group_desc = $this->input->post('group_name_desc', TRUE);
                $m_user_group->save();
				
                $user_group_id=$m_user_group->last_insert_id();
				
				$m_user_group_permission->user_group_id=$user_group_id;
                $m_user_group_permission->receiving_stock=$this->input->post('receiving_stock',TRUE);
				$m_user_group_permission->point_of_sale=$this->input->post('point_of_sale',TRUE);
				$m_user_group_permission->transactions=$this->input->post('transactions',TRUE);
				$m_user_group_permission->sales_reports=$this->input->post('sales_reports',TRUE);
				$m_user_group_permission->inventory_reports=$this->input->post('inventory_reports',TRUE);
				$m_user_group_permission->product_management=$this->input->post('product_management',TRUE);
				$m_user_group_permission->supplier_management=$this->input->post('supplier_management',TRUE);
				$m_user_group_permission->customer_management=$this->input->post('customer_management',TRUE);
				$m_user_group_permission->stock_management=$this->input->post('stock_management',TRUE);
				$m_user_group_permission->xreading=$this->input->post('x_reading',TRUE);
				$m_user_group_permission->zreading=$this->input->post('z_reading',TRUE);
				$m_user_group_permission->user_account=$this->input->post('user_account',TRUE);
				$m_user_group_permission->user_rights=$this->input->post('user_rights',TRUE);
				$m_user_group_permission->company_info=$this->input->post('company_info',TRUE);
				$m_user_group_permission->notes=$this->input->post('notes',TRUE);
                $m_user_group_permission->save();


                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='User account information successfully created.';
                $response['row_added']=$m_user_group_permission->get_list(
				$user_group_id,
				'user_groups.*,user_groups_permission.*',
					array(
							array('user_groups','user_groups.user_group_id=user_groups_permission.user_group_id','left')
					)
				);
                echo json_encode($response);

                break;
            //****************************************************************************************************************
            case 'update' :
                $m_user_group=$this->User_groups_model;
                $m_user_group_permission=$this->User_rights_model;
				
                $permission_id=$this->input->post('permission_id',TRUE);
				
                $m_user_group_permission->receiving_stock=$this->input->post('receiving_stock',TRUE);
				$m_user_group_permission->point_of_sale=$this->input->post('point_of_sale',TRUE);
				$m_user_group_permission->transactions=$this->input->post('transactions',TRUE);
				$m_user_group_permission->sales_reports=$this->input->post('sales_reports',TRUE);
				$m_user_group_permission->inventory_reports=$this->input->post('inventory_reports',TRUE);
				$m_user_group_permission->product_management=$this->input->post('product_management',TRUE);
				$m_user_group_permission->supplier_management=$this->input->post('supplier_management',TRUE);
				$m_user_group_permission->customer_management=$this->input->post('customer_management',TRUE);
				$m_user_group_permission->stock_management=$this->input->post('stock_management',TRUE);
				$m_user_group_permission->xreading=$this->input->post('x_reading',TRUE);
				$m_user_group_permission->zreading=$this->input->post('z_reading',TRUE);
				$m_user_group_permission->user_account=$this->input->post('user_account',TRUE);
				$m_user_group_permission->user_rights=$this->input->post('user_rights',TRUE);
				$m_user_group_permission->company_info=$this->input->post('company_info',TRUE);
				$m_user_group_permission->notes=$this->input->post('notes',TRUE);
				
                $m_user_group_permission->modify($permission_id);



                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='User account information successfully created.';
                $response['row_updated']=$m_user_group_permission->get_list(
				$permission_id,
				'user_groups.*,user_groups_permission.*',
					array(
							array('user_groups','user_groups.user_group_id=user_groups_permission.user_group_id','left')
					)
				);
                echo json_encode($response);

                break;
            //****************************************************************************************************************
            case 'delete':
                $m_users=$this->Users_model;
                $user_account_id=$this->input->post('user_id',TRUE);

                $m_users->is_deleted=1;
                if($m_users->modify($user_account_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='User account information successfully deleted.';
                    echo json_encode($response);
                }
                break;
            case 'upload':
                $allowed = array('png', 'jpg', 'jpeg','bmp');

                $data=array();
                $files=array();
                $directory='assets/img/user/';

                foreach($_FILES as $file){

                    $server_file_name=uniqid('');
                    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $file_path=$directory.$server_file_name.'.'.$extension;
                    $orig_file_name=$file['name'];

                    if(!in_array(strtolower($extension), $allowed)){
                        $response['title']='Invalid!';
                        $response['stat']='error';
                        $response['msg']='Image is invalid. Please select a valid photo!';
                        die(json_encode($response));
                    }

                    if(move_uploaded_file($file['tmp_name'],$file_path)){
                        $response['title']='Success!';
                        $response['stat']='success';
                        $response['msg']='Image successfully uploaded.';
                        $response['path']=$file_path;
                        echo json_encode($response);
                    }
                }
                break;

        }


    }
}
