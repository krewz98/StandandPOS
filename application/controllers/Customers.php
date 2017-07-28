<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Customers_model');
        $this->load->model('Customer_photos_model');
    }

    public function index()
    {
        $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
        $data['_switcher_settings']=$this->load->view('template/elements/switcher','',TRUE);
        $data['_side_bar_navigation']=$this->load->view('template/elements/side_bar_navigation','',TRUE);
        $data['_top_navigation']=$this->load->view('template/elements/top_navigation','',TRUE);
        $data['title']='Customer Management';

        $this->load->view('customers_view',$data);
    }


    function transaction($txn=null,$filter_value=null){
        switch($txn){
            //****************************************************************************************************************
            case 'list':
                $m_customers=$this->Customers_model;
                $response['data']=$m_customers->get_list(
				   array('customers.is_deleted'=>FALSE),
				       'customers.*,customer_photos.photo_path',
				    array(
                            array('customer_photos','customer_photos.customer_id=customers.customer_id','left')

                        )
				);
                echo json_encode($response);
                break;

            //****************************************************************************************************************
            case 'create':
                $m_customers=$this->Customers_model;
                $m_photos=$this->Customer_photos_model;

                $m_customers->customer_name=$this->input->post('customer_name',TRUE);
                $m_customers->address=$this->input->post('address',TRUE);
                $m_customers->email_address=$this->input->post('email_address',TRUE);
                $m_customers->landline=$this->input->post('landline',TRUE);
                $m_customers->mobile_no=$this->input->post('mobile_no',TRUE);
                $m_customers->photo_path=$this->input->post('photo_path',TRUE);
                $m_customers->save();

                $customer_id=$m_customers->last_insert_id();//get last insert id

                $m_photos->customer_id=$customer_id;
                $m_photos->photo_path=$this->input->post('photo_path',TRUE);
                $m_photos->save();

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Customer information successfully created.';
                $response['row_added']=$this->row_response($customer_id);
                echo json_encode($response);

                break;
            //****************************************************************************************************************
            case 'delete':
                $m_customers=$this->Customers_model;
                $m_photos=$this->Customer_photos_model;
                $customer_id=$this->input->post('customer_id',TRUE);

                $m_customers->is_deleted=1;
                if($m_customers->modify($customer_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Customer information successfully deleted.';
                    //$response['row_updated']=$m_customers->get_customer_list($customer_id);
                    echo json_encode($response);
                }



                break;
            //****************************************************************************************************************
            case 'update':
                $m_customers=$this->Customers_model;
                $m_photos=$this->Customer_photos_model;

                $customer_id=$this->input->post('customer_id',TRUE);
                $m_customers->customer_name=$this->input->post('customer_name',TRUE);
                $m_customers->address=$this->input->post('address',TRUE);
                $m_customers->email_address=$this->input->post('email_address',TRUE);
                $m_customers->landline=$this->input->post('landline',TRUE);
                $m_customers->mobile_no=$this->input->post('mobile_no',TRUE);
                $m_customers->photo_path=$this->input->post('photo_path',TRUE);
                $m_customers->modify($customer_id);

                $m_photos->delete_via_fk($customer_id);
                $m_photos->customer_id=$customer_id;
                $m_photos->photo_path=$this->input->post('photo_path',TRUE);
                $m_photos->save();

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Customer information successfully updated.';
                $response['row_updated']=$this->row_response($customer_id);
                echo json_encode($response);

                break;

            //****************************************************************************************************************
            case 'upload':
                $allowed = array('png', 'jpg', 'jpeg','bmp');

                $data=array();
                $files=array();
                $directory='assets/img/customer/';


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


    function row_response($filter_value){
        $m_customers=$this->Customers_model;
        return $m_customers->get_list(
            $filter_value,

            array(
                'customers.*',
                'customer_photos.photo_path'
            ),

            array(
                array('customer_photos','customer_photos.customer_id=customers.customer_id','left')
            )

        );
    }



}
