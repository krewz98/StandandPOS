<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends CORE_Controller {
    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Purchases_model');
        $this->load->model('Purchase_items_model');
        $this->load->model('Delivery_invoice_model');
        $this->load->model('Delivery_invoice_item_model');
        $this->load->model('Company_model');
        $this->load->model('Pos_payment_model');
        $this->load->model('Invoice_model');
        $this->load->model('Products_model');
        $this->load->model('Notes_model');
        $this->load->model('Users_model');
        $this->load->model('Inventory_model');
        $this->load->model('Issuance_item_model');
        $this->load->model('Issuance_model');
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
    }


    function layout($layout=null,$filter_value=null,$filter_value2=null){




        switch($layout){
            case 'po': //purchase order
                        $pos="1";
                        $receipt = $this->Pos_payment_model->get_list($pos,'receipt_no');
                        $data['r']=$receipt[0];
                            $pdfFilePath = $filter_value.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/po_content',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->Output($pdfFilePath,"D");



                        break;
            //****************************************************
            case 'dr': //delivery invoice
                        $m_delivery=$this->Delivery_invoice_model;
                        $m_dr_items=$this->Delivery_invoice_item_model;
                        $m_company=$this->Company_model;

                        $info=$m_delivery->get_list(
                            $filter_value,

                            'delivery_invoice.*,
                            suppliers.supplier_name,suppliers.address,suppliers.email_address,suppliers.landline',

                            array(
                                array('suppliers','suppliers.supplier_id=delivery_invoice.supplier_id','left'),
                            )
                        );

                        $company=$m_company->get_list();

                        $data['delivery_info']=$info[0];
                        $data['company_info']=$company[0];
                        $data['dr_items']=$m_dr_items->get_list(
                            array('dr_invoice_id'=>$filter_value),
                            'delivery_invoice_items.*,products.product_desc,units.unit_name',
                            array(
                                array('products','products.product_id=delivery_invoice_items.product_id','left'),
                                array('units','units.unit_id=delivery_invoice_items.unit_id','left')
                            )
                        );
                        if($filter_value2=='print'){
                          echo $this->load->view('template/dr_content',$data,TRUE);
                        }
                        else{
                          echo $this->load->view('template/dr_content',$data,TRUE);
                          echo $this->load->view('template/dr_menu',$data,TRUE);
                        }

            break;

            case 'issuance': //delivery invoice
                        $m_issuance=$this->Issuance_model;
                        $m_issuance_items=$this->Issuance_item_model;

                        $m_company=$this->Company_model;

                        $info=$m_issuance->get_list(
                            $filter_value,

                            'issuance.*,
                            suppliers.supplier_name,suppliers.address,suppliers.email_address,suppliers.landline',

                            array(
                                array('suppliers','suppliers.supplier_id=issuance.supplier_id','left'),
                            )
                        );

                        $company=$m_company->get_list();

                        $data['issuance_info']=$info[0];
                        $data['company_info']=$company[0];
                        $data['issuance_items']=$m_issuance_items->get_list(
                            array('issuance_id'=>$filter_value),
                            'issuance_items.*,products.product_desc,units.unit_name',
                            array(
                                array('products','products.product_id=issuance_items.product_id','left'),
                                array('units','units.unit_id=issuance_items.unit_id','left')
                            )
                        );

                        if($filter_value2=='print'){
                          echo $this->load->view('template/issuance_content',$data,TRUE);
                        }
                        else{
                          echo $this->load->view('template/issuance_content',$data,TRUE);
                          echo $this->load->view('template/issuance_menu',$data,TRUE);
                        }


            break;

            case 'pospr': //delivery invoice
                        $m_invoice=$this->Pos_payment_model;
                        $m_invoice_items=$this->Purchase_items_model;
                        $m_company=$this->Company_model;
                        $m_info=$this->Notes_model;

                        $info=$m_invoice->get_list(
                            $filter_value,
                            'pos_payment.*,pos_invoice.*,pos_invoice_items.*,customers.customer_name,user_accounts.*,CONCAT(user_fname, " ", user_mname, " ", user_lname) AS cashier',
                                        array(
                                            array('pos_invoice','pos_invoice.pos_invoice_id=pos_payment.pos_invoice_id','left'),
                                            array('customers','customers.customer_id=pos_invoice.customer_id','left'),
                                            array('user_accounts','user_accounts.user_id=pos_invoice.user_id','left'),
                                            array('pos_invoice_items','pos_invoice_items.pos_invoice_id=pos_payment.pos_invoice_id','left')                               //join
                                        )
                        );

                                    $invoice_id=$info[0]->pos_invoice_id;
                        $data['info']=$invoice_id;
                        $footer=$m_info->get_list();
                        $company=$m_company->get_list();
                        $data['pos_invoice_item']=$m_invoice_items->get_list(

                                        array('pos_invoice_items.pos_invoice_id'=>$invoice_id),
                                            'pos_invoice_items.*,products.product_desc',
                                        array(
                                            array('products','products.product_id=pos_invoice_items.product_id','left')
                                        )
                                    );

                        $data['footer_info']=$footer[0];
                        $data['delivery_info']=$info[0];
                        $data['company_info']=$company[0];

                        if($filter_value2=='print'){
                          echo $this->load->view('template/pos_content',$data,TRUE);
                        }
                        else{
                          echo $this->load->view('template/pos_content',$data,TRUE);
                          echo $this->load->view('template/pos_menu',$data,TRUE);
                        }
            break;

            case 'journal': //delivery invoice
                        $m_invoice=$this->Pos_payment_model;
                        $m_invoice_items=$this->Purchase_items_model;
                        $m_company=$this->Company_model;
                        $m_info=$this->Notes_model;

                        $info=$m_invoice->get_list(
                          $filter_value,
                          'pos_payment.*,pos_invoice.*,pos_invoice_items.*,customers.customer_name,CONCAT(user_fname, " ", user_mname, " ", user_lname) AS cashier',
                                        array(
                                            array('pos_invoice','pos_invoice.pos_invoice_id=pos_payment.pos_invoice_id','left'),
                                            array('customers','customers.customer_id=pos_invoice.customer_id','left'),
                                            array('user_accounts','user_accounts.user_id=pos_invoice.user_id','left'),
                                            array('pos_invoice_items','pos_invoice_items.pos_invoice_id=pos_payment.pos_invoice_id','left')                               //join
                                 )
                        );

                        $invoice_id=$info[0]->pos_invoice_id;
                        $data['info']=$invoice_id;
                        $footer=$m_info->get_list();
                        $company=$m_company->get_list();
                        $data['pos_invoice_item']=$m_invoice_items->get_list(
                                        array('pos_invoice_items.pos_invoice_id'=>$invoice_id),
                                            'pos_invoice_items.*,products.product_desc',
                                        array(
                                            array('products','products.product_id=pos_invoice_items.product_id','left')
                                        )
                                    );
                        $data['delivery_info']=$info[0];
                        $data['company_info']=$company[0];
                        $data['footer_info']=$footer[0];


                        if($filter_value2=='print'){
                          echo $this->load->view('template/pos_content',$data,TRUE);
                        }
                        else{
                          echo $this->load->view('template/pos_content',$data,TRUE);
                          echo $this->load->view('template/pos_menu',$data,TRUE);
                        }

                        break;

            case 'dailyreports': //delivery invoice
                        $salesfromdate = date("Y-m-d", strtotime($this->input->post('salesfromdate', TRUE)));
                        $salestodate = date("Y-m-d", strtotime($this->input->post('salestodate', TRUE)));
                        $m_pos_payment=$this->Pos_payment_model;
                        $m_invoice=$this->Invoice_model;
                        $m_company=$this->Company_model;
                            $m_notes=$this->Notes_model;
                        $data['receipts']=$m_pos_payment->get_list('pos_payment.transaction_date BETWEEN "'.$salesfromdate.'" AND "'.$salestodate.'" ');
                        $data['invoice']=$m_invoice->get_invoice_items($salesfromdate,$salestodate);
                        // echo json_encode($data['invoice']);
                        $company=$m_company->get_list();
                                    $data['company_info']=$company[0];
                                    $notes=$m_notes->get_list();
                                    $data['notes']=$notes[0];

                        echo $this->load->view('template/dailyreports_content',$data,TRUE);

                        break;

            case 'inventoryreports':
                        $inventoryfromdate = date("Y-m-d", strtotime($this->input->post('inventoryfromdate', TRUE)));
                        $inventorytodate = date("Y-m-d", strtotime($this->input->post('inventorytodate', TRUE)));
                        $m_company=$this->Company_model;
                        $data['inventory']=$this->Inventory_model->get_inventory_onhand_list_filter($inventoryfromdate,$inventorytodate);
                        $company=$m_company->get_list();
                            $data['company_info']=$company[0];


                        echo $this->load->view('template/inventoryreports_content',$data,TRUE);

                        break;

            case 'stockcard': //delivery invoice
                        $m_invoice=$this->Pos_payment_model;
                        $m_invoice_items=$this->Purchase_items_model;
                        $m_company=$this->Company_model;

                        $company=$m_company->get_list();
                            $data['company_info']=$company[0];

                        echo $this->load->view('template/stockcard_content',$data,TRUE);

                        break;

            case 'xreading': //delivery invoice
                        $m_invoice=$this->Pos_payment_model;
                        $m_invoice_items=$this->Purchase_items_model;
                        $m_company=$this->Company_model;
                                    $m_notes=$this->Notes_model;
                                    $m_user=$this->Users_model;
                                    $user_id=$this->session->user_id;

                                    $company=$m_company->get_list();
                                    $data['company_info']=$company[0];
                                    $notes=$m_notes->get_list();
                                    $data['notes']=$notes[0];

                                    $user=$m_user->get_user_list(
                                                    $filter_value
                                    );
                                    $data['user_info']=$user[0];

                                    $data['id']=$filter_value;

                            echo $this->load->view('template/xreading_content',$data,TRUE);

            break;

            case 'endbatch': //delivery invoice
                        $m_invoice=$this->Pos_payment_model;
                        $m_invoice_items=$this->Purchase_items_model;
                        $m_company=$this->Company_model;
                                    $m_notes=$this->Notes_model;
                                    $m_user=$this->Users_model;

                                    $user_id=$this->session->user_id;

                                    $company=$m_company->get_list();
                                    $data['company_info']=$company[0];
                                    $notes=$m_notes->get_list();
                                    $data['notes']=$notes[0];

                                    $user=$m_user->get_user_list(
                                                    $user_id
                                    );

                                    $data['user_info']=$user[0];

                        if($filter_value2=='print'){
                          echo $this->load->view('template/end_batch',$data,TRUE);
                        }
                        else{
                          echo $this->load->view('template/end_batch',$data,TRUE);
                          // echo $this->load->view('template/pos_menu',$data,TRUE);
                        }


                        break;

            case 'zreading': //delivery invoice
                        $m_invoice=$this->Pos_payment_model;
                        $m_invoice_items=$this->Purchase_items_model;
                        $m_company=$this->Company_model;
                                    $m_notes=$this->Notes_model;
                                    $m_user=$this->Users_model;
                                    $user_id=$this->session->user_id;

                        $company=$m_company->get_list();
                                    $data['company_info']=$company[0];
                                    $notes=$m_notes->get_list();
                                    $data['notes']=$notes[0];
                        echo $this->load->view('template/zreading_content',$data,TRUE);

                        break;

            case 'test': //delivery invoice
                        $m_invoice=$this->Pos_payment_model;
                        $m_invoice_items=$this->Purchase_items_model;
                        $m_company=$this->Company_model;

                        $info=$m_invoice->get_list(
                            null,

                            'pos_payment.pos_invoice_id,pos_payment.pos_payment_id,pos_payment.receipt_no,pos_invoice.*,products.product_desc,pos_invoice_items.*',
                            array(
                                array('pos_invoice','pos_invoice.pos_invoice_id=pos_payment.pos_invoice_id','left'),
                                array('pos_invoice_items','pos_invoice_items.pos_invoice_id=pos_payment.pos_invoice_id','left'),
                                array('products','products.product_id=pos_invoice_items.product_id','left')                             //join
                            )
                        );

$query1 = $this->db->query('SELECT pos_payment.*,pos_invoice.total_after_tax,pos_payment.receipt_no,pos_invoice.*,pos_invoice_items.*,products.product_desc
                            FROM pos_payment
                            LEFT JOIN pos_invoice
                            ON pos_payment.pos_invoice_id=pos_invoice.pos_invoice_id
                            LEFT JOIN pos_invoice_items
                            ON pos_payment.pos_invoice_id=pos_invoice_items.pos_invoice_id
                            LEFT JOIN products
                            ON pos_invoice_items.product_id=products.product_id WHERE receipt_no="T1-00024"');
$total = $this->db->query('SELECT SUM(total_after_tax) as grandtotal
                            FROM pos_invoice');


$data['info']=$query1->result();
$grand = $total->row(0);
$data['grand'] = $grand->grandtotal;
echo json_encode($data);
                        //show only inside grid with menu button
                        if($type=='fullview'||$type==null){
                            echo $this->load->view('template/dailyreports_content',$data,TRUE);
                           // echo $this->load->view('template/dailyreports_menus',$data,TRUE);
                        }

                        //show only inside grid without menu button
                        if($type=='contentview'){
                            echo $this->load->view('template/dailyreports_content',$data,TRUE);
                        }


                        //download pdf
                        if($type=='pdf'){
                            $pdfFilePath = $filter_value.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/dailyreports_content',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->Output($pdfFilePath,"D");

                        }

                        //preview on browser
                        if($type=='preview'){
                            $pdfFilePath = "daily.pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/dailyreports_content',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            $pdf->SetJS('this.print();');
                            //download it.
                            $pdf->Output();
                        }

                        break;
        }
    }


}