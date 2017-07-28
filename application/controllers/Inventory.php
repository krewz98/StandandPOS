<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Inventory_model');
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'Category Management';

        $this->load->view('inventory_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_inventory = $this->Inventory_model;
                $response['data'] = $m_inventory->get_inventory_list();
                echo json_encode($response);
                break;

            case 'create':
                $m_inventory = $this->Inventory_model;

                $m_inventory->inventory_name = $this->input->post('inventory_name', TRUE);
                $m_inventory->inventory_desc = $this->input->post('inventory_desc', TRUE);
                $m_inventory->save();

                $inventory_id = $m_inventory->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Inventory information successfully created.';
                $response['row_added'] = $m_inventory->get_inventory_list($inventory_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_categories=$this->Categories_model;

                $category_id=$this->input->post('category_id',TRUE);

                $m_categories->is_deleted=1;
                if($m_categories->modify($category_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='category information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_categories=$this->Categories_model;

                $category_id=$this->input->post('category_id',TRUE);
                $m_categories->category_name=$this->input->post('category_name',TRUE);
                $m_categories->category_desc=$this->input->post('category_desc',TRUE);

                $m_categories->modify($category_id);

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='category information successfully updated.';
                $response['row_updated']=$m_categories->get_category_list($category_id);
                echo json_encode($response);

                break;
        }
    }
}
