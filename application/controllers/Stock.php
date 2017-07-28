<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();

        $this->load->model('Delivery_invoice_model');
        $this->load->model('Suppliers_model');
        $this->load->model('Tax_types_model');
        $this->load->model('Products_model');
        $this->load->model('Delivery_invoice_item_model');
        $this->load->model('Purchases_model');
        $this->load->model('Stock_model');
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

        $data['title'] = 'Delivery Invoice';
        $this->load->view('stock_view', $data);


    }

    function transaction($txn = null,$id_filter=null) {
        switch ($txn){
            case 'list':  //this returns JSON of Purchase Order to be rendered on Datatable
                $m_delivery_invoice=$this->Delivery_invoice_model;
                $response['data']=$this->response_rows(
                    'delivery_invoice.is_active=TRUE AND delivery_invoice.is_deleted=FALSE'.($id_filter==null?'':' AND delivery_invoice.dr_invoice_id='.$id_filter)
                );
                echo json_encode($response);
                break;

            ////****************************************items/products of selected purchase invoice***********************************************
            case 'items': //items on the specific PO, loads when edit button is called
                $m_items=$this->Delivery_invoice_item_model;
                $response['data']=$m_items->get_list(
                    array('dr_invoice_id'=>$id_filter),
                    array(
                        'delivery_invoice_items.*',
                        'products.product_code',
                        'products.product_desc',
                        'units.unit_id',
                        'units.unit_name'
                    ),
                    array(
                        array('products','products.product_id=delivery_invoice_items.product_id','left'),
                        array('units','units.unit_id=delivery_invoice_items.unit_id','left')
                    ),
                    'delivery_invoice_items.dr_invoice_item_id DESC'
                );


                echo json_encode($response);
                break;


            //***************************************create new purchase invoice************************************************
            case 'create':
                $today = date("Y-m-d");
                $m_delivery_invoice=$this->Delivery_invoice_model;
                $m_stock_detail=$this->Stock_model;


                $m_products=$this->Products_model;


                $dr_invoice_id=$m_delivery_invoice->last_insert_id();
                $m_dr_items=$this->Delivery_invoice_item_model;

                $prod_id=$this->input->post('product_id',TRUE);
                $adj_qty=$this->input->post('dr_qty',TRUE);
                $post_operation=$this->input->post('post_operation',TRUE);
                $post_reason=$this->input->post('reason',TRUE);

                for($i=0;$i<count($prod_id);$i++){

                /*  $m_dr_items->dr_invoice_id=$dr_invoice_id;
                    $m_dr_items->product_id=$prod_id[$i];
                    $m_dr_items->dr_qty=$dr_qty[$i];
                    $m_dr_items->dr_price=$this->get_numeric_value($dr_price[$i]);
                    $m_dr_items->dr_discount=$this->get_numeric_value($dr_discount[$i]);
                    $m_dr_items->dr_line_total_discount=$this->get_numeric_value($dr_line_total_discount[$i]);
                    $m_dr_items->dr_tax_rate=$this->get_numeric_value($dr_tax_rate[$i]);
                    $m_dr_items->dr_line_total_price=$this->get_numeric_value($dr_line_total_price[$i]);
                    $m_dr_items->dr_tax_amount=$this->get_numeric_value($dr_tax_amount[$i]);
                    $m_dr_items->dr_non_tax_amount=$this->get_numeric_value($dr_non_tax_amount[$i]);
                    $m_dr_items->save();

                    $m_products->set('quantity','quantity+'.$dr_qty[$i]);
                    $m_products->modify($prod_id[$i]);
                }*/
                while($post_operation=="1"){
                $m_stock_detail->product_id=$prod_id[$i];
                $m_stock_detail->added_stock=$adj_qty[$i];
                $m_stock_detail->reason=$post_reason;
                $m_stock_detail->date_adjusted=$today;
                $m_stock_detail->save();

                $m_products->set('quantity','quantity+'.$adj_qty[$i]);
                $m_products->modify($prod_id[$i]);

                    break;
                    }
                while($post_operation=="2"){

                $m_stock_detail->product_id=$prod_id[$i];
                $m_stock_detail->minus_stock=$adj_qty[$i];
                $m_stock_detail->reason=$post_reason;
                $m_stock_detail->date_adjusted=$today;
                $m_stock_detail->save();

                $m_products->set('quantity','quantity-'.$adj_qty[$i]);
                $m_products->modify($prod_id[$i]);


                    break;
                    }
                }
                $response['title']="Success";
                $response['stat']='success';
                $response['msg']='Product Quantity Successfully Decreased.';
                echo json_encode($response);



                break;


            ////***************************************update purchase invoice************************************************
            case 'update':
                $m_delivery_invoice=$this->Delivery_invoice_model;
                $dr_invoice_id=$this->input->post('dr_invoice_id',TRUE);


                //get purchase order id base on po number
                $m_po=$this->Purchases_model;
                $arr_po_info=$m_po->get_list(
                    array('purchase_order.po_no'=>$this->input->post('po_no',TRUE)),
                    'purchase_order.purchase_order_id'
                );
                $purchase_order_id=(count($arr_po_info)>0?$arr_po_info[0]->purchase_order_id:0);

                $m_delivery_invoice->begin();
                $m_delivery_invoice->set('date_created','NOW()'); //treat NOW() as function and not string

                $m_delivery_invoice->purchase_order_id=$purchase_order_id;
                //$m_delivery_invoice->dr_invoice_no=$this->input->post('dr_invoice_no',TRUE);
                $m_delivery_invoice->external_ref_no=$this->input->post('external_ref_no',TRUE);
                $m_delivery_invoice->contact_person=$this->input->post('contact_person',TRUE);
                $m_delivery_invoice->terms=$this->input->post('terms',TRUE);
                $m_delivery_invoice->duration=$this->input->post('duration',TRUE);
                $m_delivery_invoice->supplier_id=$this->input->post('supplier',TRUE);
                $m_delivery_invoice->remarks=$this->input->post('remarks',TRUE);
                $m_delivery_invoice->tax_type_id=$this->input->post('tax_type',TRUE);
                $m_delivery_invoice->date_delivered=date('Y-m-d',strtotime($this->input->post('date_delivered',TRUE)));
                $m_delivery_invoice->date_due=date('Y-m-d',strtotime($this->input->post('date_due',TRUE)));
                $m_delivery_invoice->modified_by_user=$this->session->user_id;
                $m_delivery_invoice->total_discount=$this->get_numeric_value($this->input->post('summary_discount',TRUE));
                $m_delivery_invoice->total_before_tax=$this->get_numeric_value($this->input->post('summary_before_discount',TRUE));
                $m_delivery_invoice->total_tax_amount=$this->get_numeric_value($this->input->post('summary_tax_amount',TRUE));
                $m_delivery_invoice->total_after_tax=$this->get_numeric_value($this->input->post('summary_after_tax',TRUE));
                $m_delivery_invoice->modify($dr_invoice_id);


                $m_dr_items=$this->Delivery_invoice_item_model;

                $m_dr_items->delete_via_fk($dr_invoice_id); //delete previous items then insert those new

                $prod_id=$this->input->post('product_id',TRUE);
                $dr_price=$this->input->post('dr_price',TRUE);
                $dr_discount=$this->input->post('dr_discount',TRUE);
                $dr_line_total_discount=$this->input->post('dr_line_total_discount',TRUE);
                $dr_tax_rate=$this->input->post('dr_tax_rate',TRUE);
                $dr_qty=$this->input->post('dr_qty',TRUE);
                $dr_line_total_price=$this->input->post('dr_line_total_price',TRUE);
                $dr_tax_amount=$this->input->post('dr_tax_amount',TRUE);
                $dr_non_tax_amount=$this->input->post('dr_non_tax_amount',TRUE);

                for($i=0;$i<count($prod_id);$i++){

                    $m_dr_items->dr_invoice_id=$dr_invoice_id;
                    $m_dr_items->product_id=$prod_id[$i];
                    $m_dr_items->dr_price=$this->get_numeric_value($dr_price[$i]);
                    $m_dr_items->dr_discount=$this->get_numeric_value($dr_discount[$i]);
                    $m_dr_items->dr_line_total_discount=$this->get_numeric_value($dr_line_total_discount[$i]);
                    $m_dr_items->dr_tax_rate=$this->get_numeric_value($dr_tax_rate[$i]);
                    $m_dr_items->dr_qty=$dr_qty[$i];
                    $m_dr_items->dr_line_total_price=$this->get_numeric_value($dr_line_total_price[$i]);
                    $m_dr_items->dr_tax_amount=$this->get_numeric_value($dr_tax_amount[$i]);
                    $m_dr_items->dr_non_tax_amount=$this->get_numeric_value($dr_non_tax_amount[$i]);

                    $m_dr_items->set('unit_id','(SELECT unit_id FROM products WHERE product_id='.(int)$prod_id[$i].')');
                    $m_dr_items->save();
                }

                //update status of po
                $m_po->order_status_id=$this->get_po_status($purchase_order_id);
                $m_po->modify($purchase_order_id);

                $m_delivery_invoice->commit();



                if($m_delivery_invoice->status()===TRUE){
                    $response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Delivery invoice successfully updated.';
                    $response['row_updated']=$this->response_rows($dr_invoice_id);

                    echo json_encode($response);
                }


                break;


            //***************************************************************************************
            case 'delete':
                $m_delivery_invoice=$this->Delivery_invoice_model;
                $dr_invoice_id=$this->input->post('dr_invoice_id',TRUE);

                //mark purchase invoice as deleted
                $m_delivery_invoice->is_deleted=1;
                $m_delivery_invoice->modify($dr_invoice_id);

                //********************************************************************************************************************
                //if purchase invoice is mark as deleted, make sure purchase order status is updated(open, closed, partially invoice)
                $po_info=$m_delivery_invoice->get_list($dr_invoice_id,'delivery_invoice.purchase_order_id'); //get purchase order first
                if(count($po_info)>0){ //make sure po info return resultset before executing other process
                    $purchase_order_id=$po_info[0]->purchase_order_id; //pass it to variable
                    //update purchase order status
                    $m_purchases=$this->Purchases_model;
                    $m_purchases->order_status_id=$this->get_po_status($purchase_order_id);
                    $m_purchases->modify($purchase_order_id);
                }
                //********************************************************************************************************************

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Purchase invoice successfully deleted.';
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
        return $this->Delivery_invoice_model->get_list(
            $filter_value,
            array(
                'delivery_invoice.*',
                'DATE_FORMAT(delivery_invoice.date_due,"%m/%d/%Y")as date_due',
                'DATE_FORMAT(delivery_invoice.date_delivered,"%m/%d/%Y")as date_delivered',
                'remarks as remarks',
                'suppliers.supplier_name',
                'suppliers.supplier_name',
            ),
            array(
                array('suppliers','suppliers.supplier_id=delivery_invoice.supplier_id','left')
            ),
            $order_by
        );
    }


    function get_po_status($id){
            //NOTE : 1 means open, 2 means Closed, 3 means partially invoice
            $m_delivery=$this->Delivery_invoice_model;

            if(count($m_delivery->get_list(
                        array('delivery_invoice.purchase_order_id'=>$id,'delivery_invoice.is_active'=>TRUE,'delivery_invoice.is_deleted'=>FALSE),
                        'delivery_invoice.dr_invoice_id'))==0 ){ //means no po found on delivery/purchase invoice that means this po is still open

                return 1;

            }else{

                $m_po=$this->Purchases_model;
                $row=$m_po->get_po_balance_qty($id);
                return ($row[0]->Balance>0?3:2);

            }

    }
//***************************************************************************************





}