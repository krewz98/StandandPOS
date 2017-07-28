<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issuance extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();

        $this->load->model('Issuance_model');
        $this->load->model('Suppliers_model');
        $this->load->model('Tax_types_model');
        $this->load->model('Products_model');
        $this->load->model('Issuance_item_model');
        $this->load->model('Purchases_model');

    }

    public function index() {

        //default resources of the active view
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);


        //data required by active view
        $data['suppliers']=$this->Suppliers_model->get_list(
            null,
            'suppliers.*,IFNULL(tax_types.tax_rate,0)as tax_rate',
            array(
                array('tax_types','tax_types.tax_type_id=suppliers.tax_type_id','left')
            )
        );


        $data['tax_types']=$this->Tax_types_model->get_list();

        $data['products']=$this->Products_model->get_list();

        $data['title'] = 'Issuance';
        $this->load->view('issuance_view', $data);


    }

    function transaction($txn = null,$id_filter=null) {
        switch ($txn){
            case 'list':  //this returns JSON of Purchase Order to be rendered on Datatable
                $m_issuance=$this->Issuance_model;
                $response['data']=$this->response_rows(
                    'issuance.is_deleted=0'.($id_filter==null?'':' AND issuance.issuance_id='.$id_filter)
                );
                echo json_encode($response);
                break;

            ////****************************************items/products of selected purchase invoice***********************************************
            case 'items': //items on the specific PO, loads when edit button is called
                $m_items=$this->Issuance_item_model;
                $response['data']=$m_items->get_list(
                    array('issuance_id'=>$id_filter),
                    array(
                        'issuance_items.*',
                        'products.product_code',
                        'products.product_desc',
                        'units.unit_id',
                        'units.unit_name'
                    ),
                    array(
                        array('products','products.product_id=issuance_items.product_id','left'),
                        array('units','units.unit_id=issuance_items.unit_id','left')
                    ),
                    'issuance_items.issuance_items_id DESC'
                );


                echo json_encode($response);
                break;


            //***************************************create new purchase invoice************************************************
            case 'create':
                $m_issuance=$this->Issuance_model;

                $m_po=$this->Purchases_model;
	              $m_products=$this->Products_model;

                //$m_issuance->dr_invoice_no=$this->input->post('dr_invoice_no',TRUE);
                $m_issuance->issuance_no=$this->input->post('issuance_no',TRUE);
                $m_issuance->supplier_id=$this->input->post('supplier',TRUE);
                $m_issuance->remarks=$this->input->post('remarks',TRUE);
                $m_issuance->date_issued=date('Y-m-d',strtotime($this->input->post('date_received',TRUE)));
                $m_issuance->posted_by_user=$this->session->user_id;
                $m_issuance->total_discount=$this->get_numeric_value($this->input->post('summary_discount',TRUE));
                $m_issuance->total_before_tax=$this->get_numeric_value($this->input->post('summary_before_discount',TRUE));
                $m_issuance->total_tax_amount=$this->get_numeric_value($this->input->post('summary_tax_amount',TRUE));
                $m_issuance->total_after_tax=$this->get_numeric_value($this->input->post('summary_after_tax',TRUE));

                $m_issuance->save();

                $issuance_id=$m_issuance->last_insert_id();
                $m_issuance_items=$this->Issuance_item_model;

                $prod_id=$this->input->post('product_id',TRUE);
                $is_qty=$this->input->post('is_qty',TRUE);
                $is_price=$this->input->post('is_price',TRUE);
                $is_discount=$this->input->post('is_discount',TRUE);
                $is_line_total_discount=$this->input->post('is_line_total_discount',TRUE);
                $is_tax_rate=$this->input->post('is_tax_rate',TRUE);
                $is_line_total_price=$this->input->post('is_line_total_price',TRUE);
                $is_tax_amount=$this->input->post('is_tax_amount',TRUE);
                $is_non_tax_amount=$this->input->post('is_non_tax_amount',TRUE);

    						$i=0;
    						foreach($prod_id as $item)
    						{
    							$minus="-";
    							$data[] =
    							   array(
    								  'issuance_id' => $issuance_id,
    								  'product_id' => $prod_id[$i],
    								  'is_qty' => $is_qty[$i],
    								  'is_price' => $is_price[$i],
    								  'is_discount' => $is_discount[$i],
    								  'is_line_total_discount' => $is_line_total_discount[$i],
    								  'is_tax_rate' => $is_tax_rate[$i],
    								  'is_line_total_price' => $is_line_total_price[$i],
    								  'is_tax_amount' => $is_tax_amount[$i],
    								  'is_non_tax_amount' => $is_non_tax_amount[$i]
    							   );


    							$i++;
    						}
    					$this->db->insert_batch('issuance_items', $data);

              $response['title'] = 'Success!';
              $response['stat'] = 'success';
              $response['msg'] = 'Issuance successfully created.';
	            $response['row_added']=$this->response_rows($issuance_id);

                    echo json_encode($response);



            break;


            ////***************************************update purchase invoice************************************************
            case 'update':
                $m_issuance=$this->Issuance_model;

                $m_po=$this->Purchases_model;
		            $m_products=$this->Products_model;
                $issuance_id=$this->input->post('issuance_id',TRUE);
                //$m_issuance->dr_invoice_no=$this->input->post('dr_invoice_no',TRUE);
                $m_issuance->issuance_no=$this->input->post('issuance_no',TRUE);
                $m_issuance->supplier_id=$this->input->post('supplier',TRUE);
                $m_issuance->remarks=$this->input->post('remarks',TRUE);
                $m_issuance->date_issued=date('Y-m-d',strtotime($this->input->post('date_received',TRUE)));
                $m_issuance->posted_by_user=$this->session->user_id;
                $m_issuance->total_discount=$this->get_numeric_value($this->input->post('summary_discount',TRUE));
                $m_issuance->total_before_tax=$this->get_numeric_value($this->input->post('summary_before_discount',TRUE));
                $m_issuance->total_tax_amount=$this->get_numeric_value($this->input->post('summary_tax_amount',TRUE));
                $m_issuance->total_after_tax=$this->get_numeric_value($this->input->post('summary_after_tax',TRUE));
                $m_issuance->modify($issuance_id);


                $m_issuance_items=$this->Issuance_item_model;

                $m_issuance_items->delete_via_fk($issuance_id); //delete previous items then insert those new


                $prod_id=$this->input->post('product_id',TRUE);
                $is_qty=$this->input->post('is_qty',TRUE);
                $is_price=$this->input->post('is_price',TRUE);
                $is_discount=$this->input->post('is_discount',TRUE);
                $is_line_total_discount=$this->input->post('is_line_total_discount',TRUE);
                $is_tax_rate=$this->input->post('is_tax_rate',TRUE);
                $is_line_total_price=$this->input->post('is_line_total_price',TRUE);
                $is_tax_amount=$this->input->post('is_tax_amount',TRUE);
                $is_non_tax_amount=$this->input->post('is_non_tax_amount',TRUE);

                for($i=0;$i<count($prod_id);$i++){

		               $m_issuance_items->issuance_id=$issuance_id;
                    $m_issuance_items->product_id=$prod_id[$i];
                    $m_issuance_items->is_qty=$is_qty[$i];
                    $m_issuance_items->is_price=$this->get_numeric_value($is_price[$i]);
                    $m_issuance_items->is_discount=$this->get_numeric_value($is_discount[$i]);
                    $m_issuance_items->is_line_total_discount=$this->get_numeric_value($is_line_total_discount[$i]);
                    $m_issuance_items->is_tax_rate=$this->get_numeric_value($is_tax_rate[$i]);
                    $m_issuance_items->is_line_total_price=$this->get_numeric_value($is_line_total_price[$i]);
                    $m_issuance_items->is_tax_amount=$this->get_numeric_value($is_tax_amount[$i]);
                    $m_issuance_items->is_non_tax_amount=$this->get_numeric_value($is_non_tax_amount[$i]);
	                  $m_issuance_items->save();

                }

                    $response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Issuance successfully updated.';
                    $response['row_updated']=$this->response_rows($issuance_id);

                    echo json_encode($response);


                break;


            //***************************************************************************************
            case 'delete':
                $m_issuance=$this->Issuance_model;
	              $m_products=$this->Products_model;
                $issuance_id=$this->input->post('issuance_id',TRUE);

                //mark purchase invoice as deleted
                $m_issuance->is_deleted=1;
                $m_issuance->modify($issuance_id);
                //********************************************************************************************************************
                //

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Issuance successfully deleted.';
                echo json_encode($response);

                break;
            //***************************************************************************************

            case 'test':
                $m_po=$this->Purchases_model;
                $row=$m_po->get_po_balance_qty($id_filter);
                echo json_encode($row);
                break;
            //***************************************************************************************
        }

    }



//**************************************user defined*************************************************
    function response_rows($filter_value,$order_by=null){
        return $this->Issuance_model->get_list(
            $filter_value,
            array(
                'issuance.*',
                'DATE_FORMAT(issuance.date_issued,"%m/%d/%Y")as date_issued',
                'remarks as remarks',
                'suppliers.supplier_name',
				'suppliers.supplier_name',
            ),
            array(
                array('suppliers','suppliers.supplier_id=issuance.supplier_id','left')
            ),
            $order_by
        );
    }


    function get_po_status($id){
            //NOTE : 1 means open, 2 means Closed, 3 means partially invoice
            $m_delivery=$this->Issuance_model;

            if(count($m_delivery->get_list(
                        array('delivery_invoice.purchase_order_id'=>$id,'delivery_invoice.is_active'=>TRUE,'delivery_invoice.is_deleted'=>FALSE),
                        'delivery_invoice.issuance_id'))==0 ){ //means no po found on delivery/purchase invoice that means this po is still open

                return 1;

            }else{

                $m_po=$this->Purchases_model;
                $row=$m_po->get_po_balance_qty($id);
                return ($row[0]->Balance>0?3:2);

            }

    }
//***************************************************************************************





}
