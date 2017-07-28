<!DOCTYPE html>
<html lang="en">
<head>
<style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Test</title>
<style type="text/css">
    table { page-break-inside:auto }
    div   { page-break-inside:avoid; } /* This is the key */
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>
 <script type="text/javascript">
      window.onload = function() {
       window.print();
		window.onfocus=function(){ window.close();}
   }
 </script>
<link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">

<link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
<link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">

<link href="assets/plugins/select2/select2.min.css" rel="stylesheet">

<link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->
<link type="text/css" href="assets/plugins/iCheck/skins/minimal/_all.css" rel="stylesheet">                   <!-- Custom Checkboxes / iCheck -->
<link href="assets/plugins/twittertypehead/twitter.typehead.css" rel="stylesheet">


<script src="assets/plugins/spinner/dist/spin.min.js"></script>
<script src="assets/plugins/spinner/dist/ladda.min.js"></script>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>




<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>



<!-- twitter typehead -->
<script src="assets/plugins/twittertypehead/handlebars.js"></script>
<script src="assets/plugins/twittertypehead/bloodhound.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.bundle.min.js"></script>
<script src="assets/plugins/twittertypehead/typeahead.jquery.min.js"></script>

<!-- touchspin -->
<script type="text/javascript" src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"></script>

<!-- numeric formatter -->
<script src="assets/plugins/formatter/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/formatter/accounting.js" type="text/javascript"></script>
</head>

<body style="width: 200px;">

<div style=" height: 500px;">
    <center><table width="95%" cellpadding="5" style="font-family: tahoma;font-size: 11px;">
            <tr>

                <td width="50%" align="center">
                    <!-- <h4 style="margin:0;">Purchase Invoice No.</h4> -->
                    <!-- <?php echo $delivery_info->receipt_no; ?> -->
                    <div style="text-transform: uppercase;">
                        <?php echo $company_info->company_name; ?><br>
                        <?php echo $company_info->company_address; ?><br>
                        Contact:&nbsp;<?php echo $company_info->landline; ?><br>
                    </div>
                        VAT&nbsp;Reg&nbsp;TIN:&nbsp;<!-- <?php echo $company_info->vat; ?>--><br> 
                    <p style="margin:0;">
                        <span><strong>Transaction Date : </strong> <?php echo  date_format(new DateTime($delivery_info->transaction_date),"m/d/Y"); ?></span><br />
                    </p>
                </td>
            </tr>
            <tr>
                <td width="50%" align="left">
                    <div style="width:50px !important;">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <div class="row">
                                    Buyer's&nbsp;Name___________________<br>
                                    Address________________________<br>
                                    TIN&nbsp;#_________________________<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="50%" align="center">
                    <div style="width:100%;">
                        MIN#&nbsp;<!-- <?php echo $company_info->min; ?> --><br>
                        SN#&nbsp;<!-- <?php echo $company_info->sn; ?> --><br>
                        FP#&nbsp;<!-- <?php echo $company_info->fp; ?> --><br>
                    </div>
                </td>
            </tr>
        </table></center>

    <center>
        <table width="95%" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11px;">
            <thead>
            <tr>
                <th width="50%" style="border-bottom: 2px solid gray;text-align: left;height: 30px;padding: 6px;">Item</th>
								<th width="12%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;"></th>
                <th width="12%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Qty</th>

                <th width="12%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Price</th>
                <th width="12%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($pos_invoice_item as $item){ ?>
                <tr>
                    <td width="50%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"><?php echo $item->product_desc; ?></td>
                    <td width="12%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"></td>
                    <td width="12%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->pos_qty,2); ?></td>
                    <td width="12%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->pos_price,2); ?></td>

                    <td width="12%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->total,2); ?></td>
                </tr>
            <?php } ?>

            </tbody>
            <tfoot>
            <tr>
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;">Discount : </td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($delivery_info->totaldiscount,2); ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;">Total before Tax : </td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($delivery_info->before_tax,2); ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;">Tax Amount : </td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($delivery_info->tax_amount,2); ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom:1px solid gray;text-align: left;height: 30px;padding: 6px;"><strong>Total after Tax : </strong></td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><strong><?php echo number_format($delivery_info->total_after_tax,2); ?></strong></td>
            </tr>
            </tfoot>
        </table>
    </center>
<body>
</html>
