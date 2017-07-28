<html>
<head>
<style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Test</title>
<style type="text/css">
    table { page-break-inside:auto }
    div   { page-break-inside:avoid; } /* This is the key */
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
    td { padding-top: 5px; padding-bottom: 5px; }
</style>
 <script type="text/javascript">
      window.onload = function() {
       window.print();
		window.onfocus=function(){ window.close();}
   }
 </script>
</head>

<body style="width: 250px;">

<?php
$fromdate="1900/10/01"; //post value of the date
$tilldate="2016/09/10"; //post value of the date
$newfromdate = date("Y-m-d", strtotime($fromdate));
$newtilldate = date("Y-m-d", strtotime($tilldate));
$filterdate="'$newfromdate'";
$filterdate2="'$newtilldate'";

$date = date('Y-m-d H:i:s');
$today = date("m/d/Y", strtotime($date));
$time = date("H:i:s", strtotime($date));

$user_id=$this->session->user_id;

?>
<center><?php echo "<h2 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'>X-READING</h2>"; ?></center>
<center><?php echo "<h2 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'></h2>"; ?></center>
<center><?php echo "<h3 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'>".$company_info->company_name."</h3>"; ?></center>
<center><?php echo "<h3 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'>".$company_info->company_address."</h3>"; ?></center>
<center><?php echo "<h3 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'>".$company_info->email_address."</h3>"; ?></center>
<center><?php echo "<h3 style='font-size:11px;text-align:center;font-family:tahoma;margin:0px;margin-bottom:5px;'>".$company_info->landline."</h3>"; ?></center>
    <div><table width="95%" cellpadding="5" style="font-family: tahoma;font-size: 8px;">
            <tr>
               <!-- <td width="45%" valign="top">
                    <span>Company Name :</span>
                    <companyname>
                        <strong><?php // echo $company_info->company_name; ?></strong><br>
                        <?php// echo "Address :".$company_info->company_address; ?><br>
                        <?php //echo "Email Address :".$company_info->email_address; ?><br>
                        <abbr title="Phone">Phone :</abbr> <?php// echo $company_info->landline; ?>
                    </companyname>
                </td>  -->
				<td width="45%" valign="top">
                    <companyname>
                        <h3 style="margin-bottom: 3px !important;margin-top: 0px !important;"><strong><?php  echo "Date :<u>".$today."</u>";?></strong></h3>
                        <h3 style="margin-bottom: 3px !important;margin-top: 0px !important;"><strong><?php  echo "Time : <u>".$time."</u>";?></strong></h3>
                        <h3 style="margin-bottom: 3px !important;margin-top: 0px !important;"><strong><?php echo "Cashier Name :<br>".$user_info->full_name; ?> </strong></h3>
                    </companyname>
                </td>

                <!-- <td width="50%" align="right">
						<img height="50px" width="50px" src="<?php echo $company_info->logo_path; ?>" ></img>
                </td> -->
            </tr>
        </table></div>
<table width='95%' style='border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 8'>
			<thead>
			<!--<tr>
				<th width='30%' style='text-align: left;'><?php echo "Date: <u>".$fromdate."</u>"; ?></th>
            </tr>
			<tr>
				<th width='30%' style='text-align: left;'><?php echo "Cashier Name: <u>".$this->session->user_fullname."</u>"; ?></th>
			</tr> -->
            <tr>
				<th width='25%' style='border-bottom: 2px solid gray;text-align: left;'>Receipt #</th>
                <th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>Customer</th>
				<th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>Item</th>
                <th width='12%' style='border-bottom: 2px solid gray;text-align: left;'>SRP</th>
				<th width='6%' style='border-bottom: 2px solid gray;text-align: left;'>Qty</th>
				<th width='12%' style='border-bottom: 2px solid gray;text-align: right;'>Total</th>
            </tr>
            </thead>
 <tbody>
<?php

			$query = $this->db->query('SELECT receipt_no,pos_invoice.*,customers.customer_name,pos_payment.pos_payment_id FROM pos_payment
							LEFT JOIN pos_invoice
							ON pos_payment.pos_invoice_id=pos_invoice.pos_invoice_id

							LEFT JOIN customers
							ON pos_invoice.customer_id=customers.customer_id WHERE user_id='.$user_id.' AND end_batch=0');
			$gtotal = $query->row();
//$grandtotal = $gtotal->grand_total;

						$grandtotal=0; //start value of grandtotal
						$cash_amount=0;
						$card_amount=0;
						$tendered=0;
						$change=0;
foreach ($query->result() as $row)
{
       $receiptno=  $row->receipt_no;
	   $invoiceid=  $row->pos_invoice_id;
	   $customer=  $row->customer_name;
	   $pos_payment_id=  $row->pos_payment_id;


		?>
						<tr>
						<td width='25%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;text-align: left;'><?php echo $receiptno; ?></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'><?php echo $customer; ?></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='6%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						<td width='12%' style='border-bottom: 2px solid gray;border-top: 2px solid gray;text-align: left;'></td>
						</tr>


		<?php
					$query1 = $this->db->query('SELECT products.product_desc,pos_invoice_items.* FROM pos_invoice_items LEFT JOIN products
							ON pos_invoice_items.product_id=products.product_id
							WHERE pos_invoice_id='.$invoiceid);

					foreach ($query1->result() as $prod)
					{

						?>
						<tr>
						<td width='6%' style='text-align: left;'></td>
						<td width='24%' style='text-align: left;'></td>
						<td width='32%' style='text-align: left;'><?php echo $prod->product_desc; ?></td>
						<td width='12%' style='text-align: left;'><?php echo $prod->pos_price; ?></td>
						<td width='12%' style='text-align: left;'><?php echo $prod->pos_qty; ?></td>
						<td width='12%' style='text-align: right;'><?php echo $prod->total; ?></td></tr>

				<?php
					$grandtotal+=$prod->total; //computing for grandtotal
				}
	?>
						<tr>
						<td width='12%' style='text-align: left;'></td>
						<td width='12%' style='text-align: left;'></td>
						<td colspan="3" width='6%' style='border-bottom:1px solid black;text-align: left;'><b>Sub Total :</b></td>
						<td width='12%' style='border-bottom:1px solid black;text-align: right;'><?php echo "<b>".number_format($row->total_after_tax,2)."</b>"; ?></tr>
						<tr>
						<td width='12%' style='text-align: left;'></td>
						<td width='12%' style='text-align: left;'></td>
						<td width='6%' style='text-align: left;'></td>
						<td width='6%' style='text-align: left;'></td>
						<td width='6%' style='text-align: left;'></td>
						<td width='12%' style='text-align: left;'></td>
						</tr><br><br>
<?php

				$getcash = $this->db->query('SELECT pos_payment_details.card_amount FROM pos_payment_details WHERE pos_payment_id='.$pos_payment_id);
							foreach($getcash->result() as $row){
								$card_amount += $row->card_amount;
							}

				$getpayment = $this->db->query('SELECT pos_payment.* FROM pos_payment WHERE pos_payment_id='.$pos_payment_id);
							foreach($getpayment->result() as $row){
								$tendered += $row->tendered;
								$change += $row->change;
							}

	}
			?></tbody>
			<tfoot>
			<tr>
				<td ></td><td></td>
                <td colspan="3" style="border-bottom: 1px solid black;"><strong>Grand Total : </strong></td>
                <td colspan="3" style="border-bottom: 1px solid black;text-align:right;"><strong><?php echo number_format($grandtotal,2); ?></strong></td>
            </tr>
            <tr>
				<td ></td><td></td>
                <td colspan="3" style="border-bottom: 1px solid black;"><strong>Tendered : </strong></td>
                <td colspan="3" style="border-bottom: 1px solid black;text-align:right;"><strong><?php echo number_format($tendered,2); ?></strong></td>
            </tr>
            <tr>
				<td ></td><td></td>
                <td colspan="3" style="border-bottom: 1px solid black;"><strong>Change : </strong></td>
                <td colspan="3" style="border-bottom: 1px solid black;text-align:right;"><strong><?php echo number_format($change,2); ?></strong></td>
            </tr>
			<tr>
				<td ></td><td></td>
                <td colspan="3"><strong>Breakdown</strong></td>
                <td colspan="3"><strong></strong></td>
            </tr>
			<tr>
				<td ></td><td></td>
                <td colspan="3" style="border-bottom: 1px solid black;"><strong>Cash Sale : </strong></td>
                <td colspan="3" style="border-bottom: 1px solid black;text-align:right;"><strong><?php echo number_format($grandtotal-$card_amount,2); ?></strong></td>
            </tr>
			<tr>
				<td ></td><td></td>
                <td colspan="3" style="border-bottom: 1px solid black;"><strong>Card Sale : </strong></td>
                <td colspan="3" style="border-bottom: 1px solid black;text-align:right;"><strong><?php echo number_format($card_amount,2); ?></strong></td>
            </tr>
			<tr>
				<td ></td><td></td>
                <td colspan="3" style="border-bottom: 1px solid black;"><strong>Gift Cert : </strong></td>
                <td colspan="3" style="border-bottom: 1px solid black;text-align:right;"><strong><?php echo number_format(0,2); ?></strong></td>
            </tr>
			<tr>
				<td ></td><td></td>
                <td colspan="3" style="border-bottom: 1px solid black;"><strong>Total : </strong></td>
                <td colspan="3" style="border-bottom: 1px solid black;text-align:right;"><strong><?php echo number_format($grandtotal-$card_amount+$card_amount,2); ?></strong></td>
            </tr>
            </tfoot>
			</table>
			<?php
				$invoice = $this->db->query('SELECT pos_invoice.pos_invoice_id FROM pos_invoice WHERE user_id='.$user_id);
					foreach ($invoice->result() as $row)
					{
					$pos_invoice_id = $row->pos_invoice_id;
					$updateArray[] = array(
						'pos_invoice_id'=>$pos_invoice_id,                      // <-----End BatcH!
						'end_batch' => "1",
							);
					}
					$this->db->update_batch('pos_invoice',$updateArray, 'pos_invoice_id');
			?>
</body>
</html>