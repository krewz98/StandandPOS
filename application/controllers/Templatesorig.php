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

        $this->load->library('M_pdf');
    }

    public function index() {

    }


    function layout($layout=null,$filter_value=null,$type=null){




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

                        //show only inside grid with menu button
                        if($type=='fullview'||$type==null){
                            echo $this->load->view('template/dr_content',$data,TRUE);
                            echo $this->load->view('template/dr_content_menus',$data,TRUE);
                        }

                        //show only inside grid without menu button
                        if($type=='contentview'){
                            echo $this->load->view('template/dr_content',$data,TRUE);
                        }


                        //download pdf
                        if($type=='pdf'){
                            $pdfFilePath = $filter_value.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/dr_content',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->Output($pdfFilePath,"D");

                        }

                        //preview on browser
                        if($type=='preview'){
                            $pdfFilePath = $filter_value.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/dr_content',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->Output();
                        }

                        break;

            case 'pospr': //delivery invoice
                        $m_invoice=$this->Pos_payment_model;
                        $m_invoice_items=$this->Purchase_items_model;
                        $m_company=$this->Company_model;

                        $info=$m_invoice->get_list(
                            $filter_value,

                            'pos_payment.pos_invoice_id,pos_payment.pos_payment_id,pos_payment.receipt_no,pos_invoice.*',
							array(
								array('pos_invoice','pos_invoice.pos_invoice_id=pos_payment.pos_invoice_id','left') //join
							)
                        );
						
						$invoice_id=$info[0]->pos_invoice_id;

						
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
						

                        //show only inside grid with menu button
                        if($type=='fullview'||$type==null){
                            echo $this->load->view('template/pos_content',$data,TRUE);
                            echo $this->load->view('template/pos_content_menus',$data,TRUE);
                        }

                        //show only inside grid without menu button
                        if($type=='contentview'){
                            echo $this->load->view('template/pos_content',$data,TRUE);
                        }


                        //download pdf
                        if($type=='pdf'){
                            $pdfFilePath = $filter_value.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/pos_content',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
                            //download it.
                            $pdf->Output($pdfFilePath,"D");

                        }

                        //preview on browser
                        if($type=='preview'){
                            $pdfFilePath = $filter_value.".pdf"; //generate filename base on id
                            $pdf = $this->m_pdf->load(); //pass the instance of the mpdf class
                            $content=$this->load->view('template/pos_content',$data,TRUE); //load the template
                            $pdf->setFooter('{PAGENO}');
                            $pdf->WriteHTML($content);
							$pdf->SetJS('this.print();');
                            //download it.
                            $pdf->Output();
                        }

                        break;
						
            case 'dailyreports': //delivery invoice
                        $m_invoice=$this->Pos_payment_model;
                        $m_invoice_items=$this->Purchase_items_model;
                        $m_company=$this->Company_model;

       $query1 = $this->db->query('SELECT pos_payment.*,pos_invoice.total_after_tax,pos_payment.receipt_no,pos_invoice.*,pos_invoice_items.*,products.product_desc
							FROM pos_payment
							LEFT JOIN pos_invoice
							ON pos_payment.pos_invoice_id=pos_invoice.pos_invoice_id
							LEFT JOIN pos_invoice_items
							ON pos_payment.pos_invoice_id=pos_invoice_items.pos_invoice_id
							LEFT JOIN products
							ON pos_invoice_items.product_id=products.product_id WHERE receipt_no="T1-00024"');
							

$data['info']=$query1->result();

echo json_encode($data);
						

                        //show only inside grid with menu button
                        if($type=='fullview'||$type==null){
                           // echo $this->load->view('template/dailyreports_content',$data,TRUE);
                          //  echo $this->load->view('template/dailyreports_menus',$data,TRUE);
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
                            $pdfFilePath = $filter_value.".pdf"; //generate filename base on id
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
