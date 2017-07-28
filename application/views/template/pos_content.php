<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Official Receipt</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="description" content="Avenxo Admin Theme">
<meta name="author" content="">

<!-- <script type="text/javascript">
      window.onload = function() {
       window.print();
        window.onfocus=function(){ window.close();}
   }
</script> -->
<style>
    .receipt {
        width: 250px;
        font-family: tahoma;
        font-size: 11px;
        position: absolute;
    }

    #header {
        text-transform: uppercase;
        text-align: center;
    }

    #middle1 {
        text-align: center;
    }

    #middle2 {
        text-align: center;
    }

    #left1 {
        float: left;
        width: 60px;
    }

    #right1 {
        float: right;
        width: 180px;
    }

    #left2 {
        float: left;
        width: 40px;
    }

    #right2 {
        float: right;
        width: 200px;
    }

    #left3 {
        float: left;
        width: 80px;
        padding-top: 10px;
    }

    #center3 {
        float: left;
        width: 100px;
        padding-top: 10px;
    }

    #right3 {
        float: right;
        width: 54px;
        text-align: right;
        padding-top: 10px;
        padding-left: 0px;
        padding-right: 10px;
    }

    #left4 {
        float: left;
        width: 80px;
        padding-top: 10px;
    }

    #center4 {
        float: left;
        width: 35px;
        padding-top: 10px;
    }

    #right4 {
        float: right;
        width: 119px;
        padding-top: 10px;
    }

    #left5 {
        float: left;
        width: 80px;
        padding-top: 10px;
    }

    #center5 {
        float: left;
        width: 100px;
        padding-top: 10px;
    }

    #right5 {
        float: right;
        width: 54px;
        text-align: right;
        padding-top: 10px;
        padding-left: 0px;
        padding-right: 10px;
    }
       
</style>
</head>

<body class="receipt">
    <div id="wrapper">
        <div id="layout-static">
            <div class="page-content"><!-- #page-content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12"> 
                            <div id="header">
                                <?php echo $company_info->company_name; ?><br>
                                <?php echo $company_info->company_address; ?><br>
                                Contact:&nbsp;<?php echo $company_info->landline; ?><br>
                            </div>
                            <div id="middle1">
                                VAT&nbsp;Reg&nbsp;TIN:&nbsp;<?php echo $company_info->tin_no; ?><br>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div id="middle1" class="col-md-12">
                            MIN#&nbsp;<br>
                            SN#&nbsp;<br>
                            FP#&nbsp;<br>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div id="left2">
                                Date&nbsp;<br>
                                Cashier&nbsp;<br>
                                Terminal&nbsp;<br>
                                Receipt&nbsp;<br>
                            </div>
                            <div id="right2">
                                #&nbsp;:&nbsp;<?php echo  date_format(new DateTime($delivery_info->transaction_date),"m/d/Y"); ?><br>
                                #&nbsp;:&nbsp;<?php echo $delivery_info->cashier; ?><br>
                                #&nbsp;:&nbsp;<?php echo $company_info->terminal; ?><br>
                                #&nbsp;:&nbsp;<?php echo $delivery_info->receipt_no; ?><br>
                            </div>
                        </div>
                    </div><br><br><br><br><br>

                    <center>

                        <table width="95%" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11px;border-top: 2px dashed gray;">
                            <thead>
                            <tr>
                                <td width="15%" style="border-bottom: 2px dashed gray;text-align: left;height: 15px;padding: 6px;">Qty</td>
                                <td width="50%" style="border-bottom: 2px dashed gray;text-align: left;height: 15px;padding: 6px;">Description</td>
                                <td width="11%" style="border-bottom: 2px dashed gray;text-align: right;height: 15px;padding: 6px;"></td>
                                <td width="11%" style="border-bottom: 2px dashed gray;text-align: left;height: 15px;padding: 6px;">Price</td>
                                <td width="11%" style="border-bottom: 2px dashed gray;text-align: right;height: 15px;padding: 6px;">Amount</td>
                            </tr>
                            </thead>
                            <tbody id="pos_item">
                            <?php 
                            $count = 0;
                            $qty = 0;
                            foreach($pos_invoice_item as $item){
                            $count++;
                            $qty += $item->pos_qty;
                            ?>
                                <tr>
                                    <td width="15%" style="border-bottom: 1px dashed gray;text-align: left;height: 15px;padding: 6px;"><?php echo number_format($item->pos_qty); ?></td>
                                    <td width="50%" style="border-bottom: 1px dashed gray;text-align: left;height: 15px;padding: 6px;"><?php echo $item->product_desc; ?></td>
                                    <td width="11%" style="border-bottom: 1px dashed gray;text-align: left;height: 15px;padding: 6px;"></td>
                                    <td width="11%" style="border-bottom: 1px dashed gray;text-align: right;height: 15px;padding: 6px;"><?php echo number_format($item->pos_price,2); ?></td>
                                    <td width="11%" style="border-bottom: 1px dashed gray;text-align: right;height: 15px;padding: 6px;"><?php echo number_format($item->total,2); ?></td>
                                </tr>
                            <?php } ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: right;height: 15px;padding-top: 10px;"></td>
                                <td colspan="2" style="text-align: left;height: 15px;padding-top: 10px;">Sub Total : </td>
                                <td style="text-align: right;height: 15px;padding-top: 10px;padding-right: 4px;"><?php echo number_format($delivery_info->total_after_tax,2); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: left;height: 15px;"></td>
                                <td colspan="2" style="text-align: left;height: 15px;">Discount :</td>
                                <td style="text-align: right;height: 15px;padding-right: 4px;"><?php echo number_format($delivery_info->totaldiscount,2); ?></td>
                            </tr>
                            <!-- <tr>
                                <td colspan="2" style="text-align: left;height: 15px;padding-top: 10px;">Amount&nbsp;Due</td>
                                <td colspan="2" style="text-align: left;height: 15px;padding-top: 10px;">. . . . . . . . . </td>
                                <td style="text-align: right;height: 15px;padding-top: 10px;">AMOUNT<?php echo number_format($delivery_info->total_after_tax,2); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: left;height: 15px;">Tendered</td>
                                <td colspan="2" style="text-align: left;height: 15px;">. . . . . . . . . </td>
                                <td style="text-align: right;height: 15px;">AMOUNT<?php echo number_format($delivery_info->total_after_tax,2); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: left;height: 15px;padding-bottom: 10px;">Change</td>
                                <td colspan="2" style="text-align: left;height: 15px;padding-bottom: 10px;">. . . . . . . . . </td>
                                <td style="text-align: right;height: 15px;padding-bottom: 10px;">AMOUNT<?php echo number_format($delivery_info->total_after_tax,2); ?></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;height: 15px;">Total&nbsp;Item(s)</td>
                                <td style="text-align: left;height: 15px;">. . . . .</td>
                                <td colspan="3" style="text-align: left;height: 15px;">AMOUNT<?php echo number_format($delivery_info->total_after_tax,2); ?></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;height: 15px;padding-bottom: 10px;">Total&nbsp;Qty</td>
                                <td style="text-align: left;height: 15px;padding-bottom: 10px;">. . . . .</td>
                                <td colspan="3" style="text-align: left;height: 15px;padding-bottom: 10px;">AMOUNT<?php echo number_format($delivery_info->total_after_tax,2); ?></td>
                            </tr>  -->






                            <!-- <tr>
                                <td colspan="2" style="text-align: right;height: 15px;padding: 6px;"></td>
                                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 15px;padding: 6px;">Total before Tax : </td>
                                <td style="border-bottom: 1px solid gray;text-align: right;height: 15px;padding: 6px;"><?php echo number_format($delivery_info->before_tax,2); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;height: 15px;padding: 6px;"></td>
                                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 15px;padding: 6px;">Tax Amount : </td>
                                <td style="border-bottom: 1px solid gray;text-align: right;height: 15px;padding: 6px;"><?php echo number_format($delivery_info->tax_amount,2); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;height: 15px;padding: 6px;"></td>
                                <td colspan="2" style="border-bottom:1px solid gray;text-align: left;height: 15px;padding: 6px;"><strong>Total after Tax : </strong></td>
                                <td style="border-bottom: 1px solid gray;text-align: right;height: 15px;padding: 6px;"><strong><?php echo number_format($delivery_info->total_after_tax,2); ?></strong></td>
                            </tr> -->
                            </tfoot>
                        </table>
                    </center>

                    <div class="row">
                        <div class="col-md-12">
                            <div id="left3">
                                Amount&nbsp;Due&nbsp;<br>
                                Tendered&nbsp;<br>
                                Change&nbsp;<br>
                            </div>
                            <div id="center3">
                                . . . . . . . . . . . . . . <br>
                                . . . . . . . . . . . . . . <br>
                                . . . . . . . . . . . . . . <br>
                            </div>
                            <div id="right3">
                                <?php echo $delivery_info->amount_due; ?><br>
                                <?php echo $delivery_info->tendered; ?><br>
                                <?php echo $delivery_info->change; ?><br>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div id="left4">
                                Total&nbsp;Item(s)&nbsp;<br>
                                Total&nbsp;Qty&nbsp;<br>
                            </div>
                            <div id="center4">
                                . . . . <br>
                                . . . . <br>
                            </div>
                            <div id="right4">
                                <?php echo $count; ?><br>
                                <?php echo $qty; ?><br>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div id="left5">
                                Net&nbsp;Vat&nbsp;Sales&nbsp;<br>
                                Vat&nbsp;Sales&nbsp;<br>
                                12%&nbsp;Vat&nbsp;<br>
                                Non-Vat&nbsp;Sales&nbsp;<br>
                            </div>
                            <div id="center5">
                                . . . . . . . . . . . . . . <br>
                                . . . . . . . . . . . . . . <br>
                                . . . . . . . . . . . . . . <br>
                                . . . . . . . . . . . . . . <br>
                            </div>
                            <div id="right5">
                                <?php echo number_format($delivery_info->before_tax,2); ?><br>
                                <?php echo number_format($delivery_info->total_after_tax,2); ?><br>
                                <?php echo number_format($delivery_info->tax_amount,2); ?><br>
                                0.00<br>
                            </div>
                        </div>
                    </div><br><br><br><br><br><br><br><br><br><br><br><br><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div id="left1">
                                Buyer's&nbsp;Name<br>
                                Address<br>
                                TIN&nbsp;#<br>
                            </div>
                            <div id="right1">
                                ___________________________<br>
                                ___________________________<br>
                                ___________________________<br>
                            </div>
                        </div>
                    </div><br><br><br><br>

                    <div class="row">
                        <div id="middle2" class="col-md-12">
                            <?php echo $footer_info->note1; ?><br>
                            <?php echo $footer_info->note2; ?><br>
                            <?php echo $footer_info->note3; ?><br>
                            <?php echo $footer_info->note4; ?><br>
                            <?php echo $footer_info->note5; ?><br>
                            <?php echo $footer_info->note6; ?><br>
                            <?php echo $footer_info->note7; ?><br>
                            <?php echo $footer_info->note8; ?><br>
                            <?php echo $footer_info->note9; ?><br>
                            <?php echo $footer_info->note10; ?><br>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
