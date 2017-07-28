<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Company_model');
        $this->load->model('Notes_model');
        $this->load->model('Tax_model');
    }

    public function index() {

        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'Notes Information';
        $data['tax_type']=$this->Tax_model->get_list();
        $info=$this->Notes_model->get_list(null,
                    'notes.*'

                    );
		$data['notes']=$info[0];
		
        $this->load->view('notes_view', $data);
    }

    function transaction($txn = null) {

        switch($txn){
            case 'list':
                $m_notes=$this->Notes_model;
                $response['data']=$m_notes->get_list(

                    null,
                    'notes.*'
                );
                echo json_encode($response);
                break;
            case 'create':
                $m_company=$this->Company_model;
                $m_company->company_name=$this->input->post('company_name',TRUE);
                $m_company->company_address=$this->input->post('company_address',TRUE);
                $m_company->email_address=$this->input->post('email_address',TRUE);
                $m_company->mobile_no=$this->input->post('mobile_no',TRUE);
                $m_company->landline=$this->input->post('landline',TRUE);
                $m_company->tin_no=$this->input->post('tin_no',TRUE);
                $m_company->registered_to=$this->input->post('registered_to',TRUE);
                $m_company->logo_path=$this->input->post('photo_path',TRUE);
                $m_company->tax_type_id=$this->input->post('tax_type_id',TRUE);
                $m_company->save();

                $company_id=$m_company->last_insert_id();

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Company information successfully created.';
                $response['row_added']=$m_company->get_list(

                    $company_id,
                    'company_info.*,tax_types.tax_type,tax_types.tax_rate',

                    array(
                        array('tax_types','tax_types.tax_type_id=company_info.tax_type_id','left')

                    )
                );
                echo json_encode($response);

                break;
            //****************************************************************************************************************
            case 'update' :
                $m_notes=$this->Notes_model;

                $note_id=$this->input->post('note_id',TRUE);

                $m_notes->note1=$this->input->post('note_1',TRUE);
                $m_notes->note2=$this->input->post('note_2',TRUE);
                $m_notes->note3=$this->input->post('note_3',TRUE);
                $m_notes->note4=$this->input->post('note_4',TRUE);
                $m_notes->note5=$this->input->post('note_5',TRUE);
                $m_notes->note6=$this->input->post('note_6',TRUE);
                $m_notes->note7=$this->input->post('note_7',TRUE);
                $m_notes->note8=$this->input->post('note_8',TRUE);
                $m_notes->note9=$this->input->post('note_9',TRUE);
                $m_notes->note10=$this->input->post('note_10',TRUE);
                $m_notes->modify($note_id);


                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Notes information successfully created.';
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
                    $response['msg']='Company information successfully deleted.';
                    echo json_encode($response);
                }
                break;
            case 'upload':
                $allowed = array('png', 'jpg', 'jpeg','bmp');

                $data=array();
                $files=array();
                $directory='assets/img/company/';

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
