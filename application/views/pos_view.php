<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>JCORE - <?php echo $title; ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">

    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">

	<link href="assets/plugins/select2/select2.min.css" rel="stylesheet">

    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->
    <link type="text/css" href="assets/plugins/iCheck/skins/minimal/_all.css" rel="stylesheet">                   <!-- Custom Checkboxes / iCheck -->
	<link href="assets/plugins/twittertypehead/twitter.typehead.css" rel="stylesheet">

    <style>

    	html {
    		zoom: 0.828;
    	}

        .toolbar{
            float: left;
        }

        td.details-control {
            background: url('assets/img/Folder_Closed.png') no-repeat center center;
            cursor: pointer;
        }
        tr.details td.details-control {
            background: url('assets/img/Folder_Opened.png') no-repeat center center;
        }

        .child_table{
            padding: 5px;
            border: 1px #ff0000 solid;
        }

        .glyphicon.spinning {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;
        }
        .select2-container{
            min-width: 100%;
        }
        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }

        .numeric{
            text-align: right;
            width: 100%;
        }
		.amounts{
			color:#2ecc71;
			margin-right:20px;
			text-align:right;
			font-weight:bold;
			margin-top:0px !important;
			border:none;
		}

		.col-md-4{
			padding:0px !important;
		}
		.col-md-8{
			padding:5px !important;
		}
		.smalltable{
			font-size:12px;

		}
		.smalltable td{
			padding:1px !important;
		}
		.btn100{
			width:100%;
		}
		.btngreen{
			width:100%;
			background-color:#2ecc71;
			color:#ecf0f1;
		}
		.btnblue{
			margin-top:5px;
			width:100%;
			background-color:#2980b9;
			color:#ecf0f1;
		}
		.btntorq{
			margin-top:5px;
			width:98%;
			background-color:#1abc9c;
			color:#ecf0f1;
		}

		.btnred{
			margin-top:5px;
			width:98%;
			background-color:#e74c3c;
			color:#ecf0f1;
		}

		.btncash{
			width:98%;
			background-color:#27ae60;
			color:white;
			font-size: 18px;
			font-family: arial !important;
			height:80px;
			margin-bottom:3px;
			margin-top: 2px;
			border-radius: 10px !important;
			box-shadow: 0px 5px 10px #444;
		}

		.backcolorconcrete{
			background-color:#95a5a6;
		}

		.disablepadding{
			padding:0px !important;
		}
		
		thead{
			background-color:#7f8c8d;
			color:white;
		}
		.modal-body{
			padding:0px !important;
		}
		hr{
			height:2px;
			background-color:#7f8c8d;
			border-radius:5px !important;
		}
		.btnconcrete{
			background-color:#95a5a6;
			color:white;
			margin-top:5px;
			width:99%;
		}
		.noborder{
			border:none;
		}
		.pointer{
			cursor: pointer;
		}
		.modal-backdrop{
			opacity:0.1 !important;
		}

		.amounts {
			width: 97% !important;
		}

		#amountdue {
			color: green;
			font-size: 50px;
			background: transparent;
			margin-bottom: 15px;
		}

		#tendered {
			color: yellow;
			font-size: 50px;
			background: transparent;
			margin-bottom: 15px;
		}

		#change {
			color: yellow;
			font-size: 50px;
			background: transparent;
			margin-bottom: 15px;
		}

		.box {
			background: black;
			height: 100px !important;
		    margin-bottom: 10px;
		    padding-bottom: 105px !important;
		}

		.amounttitle {
			padding-top: 5px;
			padding-left: 10px;
			color: white;
			margin-top:0px !important;
			font-size: 20px;
			padding-bottom: 0px !important;
		}

		.btncash:hover {
			background: #327435;
			color: white;
		}

		.clearcash {
			color: white;
			background: #f44336 !important;
		}

		.clearcash:hover {
			background: #ba160a !important;
		}

		.clearcheck {
			color: white;
			background: #f44336 !important;
		}

		.clearcheck:hover {
			background: #ba160a !important;
		}

		.clearcard {
			color: white;
			background: #f44336 !important;
		}

		.clearcard:hover {
			background: #ba160a !important;
		}

		.clearcharge {
			color: white;
			background: #f44336 !important;
		}

		.clearcharge:hover {
			background: #ba160a !important;
		}

		label {
			font-weight: bold;
		}

		textarea {
			resize: none;
		}

		.btngreen:hover {
			background: #429745;
			color: white;
		}

		.btnblue:hover {
			background: #3b4ba8;
			color: white;
		}

		.btnconcrete:hover {
			background: #7c7c7c;
			color: white;
		}

		.browse_products:hover {
			background: #252f69 !important;
		}

		.browse_journal:hover {
			background: #2d6830 !important;
		}

		.clear_cart:hover {
			background: #995b00 !important;
		}

		.enablevoid:hover {
			background: #ba160a !important
		}

		.big {
			background: #ff5722 !important;
		}

		.big:hover {
			background: #bb2d00 !important;
		}

		#modal_payment {
			padding-right: 370px;
		}

    </style>

</head>
<body class="animated-content" >

<?php echo $_top_navigation; ?>

<div id="wrapper" style="background: #e2e2e2;">
        <div id="layout-static">
                <div class="page-content"><!-- #page-content -->
                    <div class="container-fluid">
                                <div class="col-md-8">
									<div class="panel panel-default" style="height: 721px !important;box-shadow: 0px 5px 30px #888888;padding-top: 15px !important;padding-left: 15px !important;padding-right: 15px !important;">
										<div class="col-md-12" style="padding: 0px;">
											<div class="col-md-3" style="padding-left: 0px;padding-right: 5px;">
												<button class="btn browse_products" id="browse_products" style="width: 100%;height:55px;background-color:#2980b9;color:white;box-shadow: 0px 5px 10px #888888;" data-toggle="modal" data-target="#modal_browse_products">Browse List<br>ALT-2</button>
											</div>
											<div class="col-md-3" style="padding-left: 0px;padding-right: 5px;">
												<button class="btn browse_journal" id="browse_journal" style="width: 100%;height:55px;background-color:#4caf50;color:white;box-shadow: 0px 5px 10px #888888;" data-toggle="modal" data-target="#modal_journal">Journal<br>ALT-5</button>
											</div>
											<div class="col-md-3" style="padding-left: 0px;padding-right: 5px;">
												<button class="btn clear_cart" id="clear_cart" name="clear_cart" style="width: 100%;background-color:#ff9800;color:white;height:55px;box-shadow: 0px 5px 10px #888888;" >Cancel<br>ALT-C</button>
											</div>
											<div class="col-md-3" style="padding-left: 0px;padding-right: 5px;">
												<button class="btn enablevoid" id="enablevoid" name="enablevoid" style="width: 100%;background-color:#f44336;color:white;height:55px;box-shadow: 0px 5px 10px #888888;" data-toggle="modal" data-target="#modal_admin_login" >Void<br>ALT-4</button>
											</div>
			                        	</div><br>
			                        	<!-- <button class="btn" name="cart_count" style="background-color:#2980b9;color:white;height:55px;"><h4 id="cart_count" style="width:80px;margin:0px;color:white;">0</h4></button> -->
			                        	<div class="row custom_frame">
		                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br />
		                                        <label class="control-label"><strong>Enter PLU or Search Item :</strong></label>
		                                        <div style="float: right;text-align: left;">
		                                        	<label class="control-label"><strong>Item Row :</strong></label>
		                                        	<div style="float: right;text-align: right;">
					                        			<h4 id="cart_count" style="margin: 0px;padding-left: 15px;padding-right: 10px;color: black;">0</h4>
					                        		</div>
					                        	</div>
		                                        <div id="custom-templates">
													<label class="control-label"><strong>Quantity:</strong></label><input style="border:none;background-color:white !important;" type="text" id="tempcode" disabled>
		                                            <input class="typeahead" id="txtsearch" type="text" placeholder="Enter PLU or Search Item">
		                                        </div><br />

		                                        <form id="frm_items">
		                                            <div class="table-responsive" style="overflow-x: auto;overflow-y: scroll; height: 300px;">
		                                                <table id="tbl_items" class="table table-striped table-bordered " cellspacing="0" width="100%" >
				                                            <thead style="background-color:#16a085;">
				                                            <tr>
				                                                <th width="10%">Qty</th>
				                                                <th width="30%">Item</th>
				                                                <th width="12%" style="text-align: right">SRP</th>
				                                                <th width="12%" style="text-align: right">Discount</th>
				                                                <th style="display: none;">T.D</th> <!-- total discount -->
				                                                <th>Tax %</th>
				                                                <th width="12%" style="text-align: right">Total</th>
				                                                <th style="display: none;">V.I</th> <!-- vat input -->
				                                                <th style="display: none;">N.V</th> <!-- net of vat -->
				                                                <td style="display: none;">Item ID</td><!-- product id -->
				                                                <th><center>Action</center></th>

				                                            </tr>
				                                            </thead>
															<tbody id="tbl_products_body">
				                                            </tbody>
		                                        		</table>
		                                            </div>

		                                        <div class="row">
		                                            <div class="col-lg-3 col-lg-offset-9">
		                                                <div class="table-responsive">
		                                                    <table id="tbl_purchase_summary" class="table invoice-total">
		                                                    <tbody>

		                                                    <tr>
		                                                        <td>Discount :</td>
		                                                        <td align="right">0.00</td>
		                                                    </tr>

		                                                    <tr>
		                                                        <td>Total before Tax :</td>
		                                                        <td align="right">0.00</td>
		                                                    </tr>
		                                                    <tr>
		                                                        <td>Tax :</td>
		                                                        <td align="right">0.00</td>
		                                                    </tr>
		                                                    <tr>
		                                                        <td><strong>Total After Tax :</strong></td>
		                                                        <td align="right"><b>0.00</b></td>
		                                                    </tr>
		                                                    </tbody>
		                                                </table>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
	                                	</div>
									</div>
								</div>
								<div class="col-md-4" style="margin-top: 5px;">
								  <div class="panel panel-default" style="box-shadow: 0px 5px 30px #888888;">
									 <div class="panel-body">
									 	<form id="payment_invoice">
										<div class="box">
											<h4 class="amounttitle">Amount Due</h4>
												<!-- <p class="amounttitle" style="text-align:right;margin-right:35px;">Amount Due</p> -->
											<h4 class="amounts" ><input class="amounts" id="amountdue" type="text" name="post_amountdue" value="0.00" disabled></h4>
											<!-- <hr class="amounts"> -->
											</hr>
										</div>
										<div class="box">
											<h4 class="amounttitle">Tendered</h4>
												<!-- <p class="amounttitle" style="text-align:right;margin-right:35px;">Tendered</p> -->
											<h4 class="amounts" ><input class="amounts" id="tendered" type="text" name="post_tendered" value="0.00" disabled></h4>
											<!-- <hr class="amounts"> -->
											</hr>
										</div>
										<div class="box">
											<h4 class="amounttitle">Change</h4>
												<!-- <p class="amounttitle" style="text-align:right;margin-right:35px;">Change</p> -->
											<h4 class="amounts" ><input class="amounts" id="change" type="text" name="post_change" value="0.00" disabled></h4>
											<!-- <hr class="amounts"> -->
											</hr>
										</div>
										</form>
											<h4 class="amounttitle" style="font-weight:bold;color: #616161;padding-left: 0px !important;font-size: 14px !important;">Payment</h2>

                        <table class="table table-responsive smalltable" cellspacing="0" width="100%">

													<thead style="background-color:#27ae60;">
						                            <tr>
						                                <th>#</th>
						                                <th>Method</th>
						                                <th>Amount</th>
						                                <th>Action</th>
						                            </tr>
													</thead>
                          							<tbody>
													<tr>
								<!-- USER SESSION ID --><td hidden><input type="text" id="session_id" style="width:10px !important;border:none;" name="session_id" value="<?php echo $user_session; ?>" readonly></td>
														<td><input type="text" id="method1" style="width:10px !important;border:none;" name="post_method1" value="1" readonly></td>
														<td>Cash</td>
														<td><input type="text" class="noborder" id="cashamount" name="post_cashamount" value="0.00" readonly></td>
														<td><center><span class="pointer"><i  id="removecash" class="fa fa-trash-o"></i></span></center>
														<td hidden><input type="text" class="noborder" id="post_cash_remarks" name="post_cash_remarks" value="0.00" readonly></td>
														</td>
													</tr>
													<tr>
														<td><input type="text" id="method2" style="width:10px !important;border:none;" name="post_method2" value="2" readonly></td>
														<td>Check</td>
														<td><input type="text" class="noborder" id="checkamount" name="post_checkamount" value="0.00" readonly></td>
														<td hidden><input type="text" class="noborder" id="post_check_bank" name="post_check_bank" value="" readonly></td>
														<td hidden><input type="text" class="noborder" id="post_check_address" name="post_check_address" value="" readonly></td>
														<td hidden><input type="text" class="noborder" id="post_check_number" name="post_check_number" value="0.00" readonly></td>
														<td hidden><input type="date" class="noborder" id="post_check_date" name="post_check_date" value="" readonly></td>
														<td><center><span class="pointer" ><i id="removecheck" class="fa fa-trash-o"></i></span></center>
														</td>
													</tr>
													<tr>
														<td><input type="text" id="method3" style="width:10px !important;border:none;" name="post_method3" value="3" readonly></td>
														<td>Card</td>
														<td><input type="text" class="noborder" id="cardamount" name="post_cardamount" value="0.00" readonly></td>
														<td><center><span class="pointer" ><i id="removecard" class="fa fa-trash-o"></i></span></center>
														<td hidden><input type="text" class="noborder" id="post_card_type" name="post_card_type" value="" readonly></td>
														<td hidden><input type="text" class="noborder" id="post_card_holder" name="post_card_holder" value="" readonly></td>
														<td hidden><input type="text" class="noborder" id="post_card_number" name="post_card_number" value="" readonly></td>
														<td hidden><input type="text" class="noborder" id="post_card_apnumber" name="post_card_apnumber" value="" readonly></td>
														<td hidden><input type="date" class="noborder" id="post_card_expdate" name="post_card_expdate" value="" readonly></td>

														</td>
													</tr>
													<tr>
														<td><input type="text" id="method4" style="width:10px !important;border:none;" name="post_method4" value="4" readonly></td>
														<td>Charge</td>
														<td><input type="text" class="noborder" id="chargeamount" name="post_chargeamount" value="0.00" readonly></td>
														<td hidden><input type="text" class="noborder" id="post_chargeto" name="post_chargeto" value="" readonly></td>
														<td hidden><input type="text" class="noborder" id="post_charge_remarks" name="post_charge_remarks" value="" readonly></td>
														<td hidden><input type="date" class="noborder" id="post_charge_date" name="post_charge_date" value="" readonly></td>
														<td><center><span class="pointer" ><i id="removecharge" class="fa fa-trash-o"></i></span></center>
														</td>
													</tr>
                                                    </tbody>
                                                </table>
											<label for="Customer" style="font-weight:bold;">Customer:</label>
											<div class="input-group">
											<select id="customers" name="customers_name" class="" >
												<!--<option value="clist">[ Browse Customers ]</option>
												<option value="ccreate">[ Create Customer ]</option>-->
												<option value="0">Walk-In</option>
                                                                <?php
                                                                foreach($customers as $row)
                                                                {
                                                                    echo '<option value="'.$row->customer_id.'">'.$row->customer_name.'</option>';
                                                                }
                                                                ?>
											</select>
											  <span class="input-group-btn">
												<button class="btn btn-default" type="button" tabindex="-1" data-toggle="modal" data-target="#modal_customers_list"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></button>
											  </span>
											</div>

											</form>
											<button class="btn btngreen btn100" id="buttontransact" style="margin-top:5px;" data-toggle="modal" data-target="#modal_payment">Make Payment | ALT-6</button>
											<button class="btn btnblue btn100 finalize" id="buttontransact">Finalize</button>
											<!-- <div class="col-md-6" style="padding:0px !important;">
											<button class="btn btnconcrete" id="printreceipt">Print Receipt</button>
											</div> -->
											
											<form action="Templates/layout/endbatch/0/preview" method="post" target="_blank">
											<button class="btn btnconcrete btn100" id="end_batch" style="width: 100% !important;">End Batch</button>
											</form>
											
										</div>
										</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>

</div>

<!-- start modal for browse -->

            <div id="modal_browse_products" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-lg">
                    <div class="modal-content"><!---content-->
                        <div class="modal-header" style="background-color:#2980b9;">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;">Items/Products</h4>

                        </div>

                        <div class="modal-body">
							<div class="container-fluid">
								<div id="div_product_list">
                                    <table id="tbl_products" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>PLU</th>
                                            <th>Description</th>
                                            <th>SRP</th>
											<th>Tax Value</th>
                                            <th>On hand</th>
											<th>ID</th>
											<th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
							</div>
						</div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

<!-- start modal for browse -->

            <div id="modal_journal" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-lg">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header" style="background-color:#2980b9;">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;">Journal</h4>
                        </div>
                        <div class="modal-body">
            							<div class="container-fluid">
            								<div id="div_journal_list">
                              <table id="tbl_journal" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                  <thead>
                                  <tr>
                                      <th></th>
          														<th>Invoice #</th>
          														<th>Transaction Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
            							</div>
            						</div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

<!-- start modal for login -->

            <div id="modal_admin_login" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header" style="background-color:#2980b9;">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;">Admin Login</h4>

                        </div>
                        <div class="modal-body">
						<form action="#" class="form-horizontal" id="validate-form">
								<div class="container-fluid">
									<div class="form-group" style="margin:10px;">
									  <label for="usr">Username:</label>
									  <input type="text" name="user_name" id="user_name" class="form-control" id="usr">
									</div>
									<div class="form-group" style="margin:10px;">
									  <label for="pwd">Password:</label>
									  <input type="password" name="user_pword" id="user_pword"class="form-control" id="pwd">
									</div>
								</div>
								</form>
						      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="voidlogin">Login</button>
		 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
						</div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

<!-- start modal for customers modal -->

            <div id="modal_customers_list" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-lg">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header" style="background-color:#2980b9;">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;">Customers List</h4>

                        </div>

                        <div class="modal-body">
							<div class="container-fluid">
								<div id="div_product_list">
                                                <table id="tbl_customers" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Customer Name</th>
                                                        <th>Address</th>
                                                        <th>Landline</th>
                                                        <th>Mobile</th>
                                                        <th>ID</th>
                                                        <th><center>Action</center></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>



                                                    </tbody>
                                                </table>
                                    </div>
							</div>
						</div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

<!-- start modal for create customers modal -->
            <div id="modal_customers_create" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><span id="modal_mode"> </span>New Category Group</h4>

                        </div>

                        <div class="modal-body">
                            <form id="frm_category_group">
                                <div class="form-group">
                                    <label>* Category Name :</label>
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                                        <input type="text" name="category_name" class="form-control" placeholder="Category Name" data-error-msg="Category name is required." required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Description :</label>
                                    <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="category_desc" placeholder="Category Description" class="form-control"></textarea>
                                    </div>
                                </div>
                            </form>


                        </div>

                        <div class="modal-footer">
                            <button id="btn_create_category_group" type="button" class="btn btn-primary"  style="text-transform: capitalize;"><span class=""></span> Create</button>
                            <button id="btn_close_unit_group" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;">Cancel</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

			<!-- start modal for payment -->

            <div id="modal_payment" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-lg">
                    <div class="modal-content"><!---content-->
                        <div class="modal-header" style="background-color:#2ecc71">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:white;">Payment</h4>

                        </div>

                        <div class="modal-body">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#cash_tab">Cash</a></li>
										<li><a data-toggle="tab" href="#check_tab">Check</a></li>
										<li><a data-toggle="tab" href="#card_tab">Card</a></li>
										<li><a data-toggle="tab" href="#charge_tab">Charge</a></li>

									  </ul>

									  </div>

									  <div class="tab-content">
									<div id="cash_tab" class="tab-pane fade in active">
									<div class="row">
									<div class="col-md-12">
										<div class="col-md-6" style="padding-left: 30px;">
											<div class="col-md-4">
												<button class="btn btncash big click_class" value="20.00" >20</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_class" value="50.00">50</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_class" value="100.00">100</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_class" value="200.00">200</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_class" value="500.00">500</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_class" value="1000.00">1000</button>
											</div>

											<div class="col-md-4">
												<button class="btn btncash click_class2" value="1">1</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_class2" value="2">2</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_class2" value="3">3</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_class2" value="4">4</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_class2" value="5">5</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_class2" value="6">6</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_class2" value="7">7</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_class2" value="8">8</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_class2" value="9">9</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_class2" value="0">0</button>
											</div>
											<div class="col-md-8" style="padding: 0px !important;">
												<button class="btn btncash clearcash" style="width: 99% !important;">CLEAR</button>
											</div>
										</div>
										<div class="col-md-6">
											<div class="col-md-12">
												<form role="form">
												<div class="form-group" style="margin-top:5px;">
												 <label for="Type of Payment" style="font-weight:bold;">Remarks:</label>
												  <textarea type="text" class="form-control" id="cash_remarks"></textarea>
													 <label for="Type of Payment" style="font-weight:bold;">Cash Amount Receive:</label>
													<input type="text" class="form-control" id="cash" placeholder="0.00" value="0.00" style="color:#e74c3c;text-align:right;font-size:18pt">
												</div>
												</form>
												<button class="btn btncash finalize" style="background-color:#2980b9 !important; height:60px !important;width: 100% !important;">Finalize</button>
											</div>
										</div>
									</div>
									</div>
									</div>
								<div id="check_tab" class="tab-pane fade in">
									<div class="row">
									<div class="col-md-12">
										<div class="col-md-6" style="padding-left: 30px;">
											<div class="col-md-4">
												<button class="btn btncash big click_check" value="20.00" >20</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_check" value="50.00">50</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_check" value="100.00">100</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_check" value="200.00">200</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_check" value="500.00">500</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_check" value="1000.00">1000</button>
											</div>

											<div class="col-md-4">
												<button class="btn btncash click_check2" value="1">1</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_check2" value="2">2</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_check2" value="3">3</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_check2" value="4">4</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_check2" value="5">5</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_check2" value="6">6</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_check2" value="7">7</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_check2" value="8">8</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_check2" value="9">9</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_check2" value="0">0</button>
											</div>
											<div class="col-md-8" style="padding: 0px !important;">
												<button class="btn btncash clearcheck" style="width: 99% !important;">CLEAR</button>
											</div>
										</div>
										<div class="col-md-6">

											<form role="form" name="check_payment">
											<div class="form-group" style="margin-top:5px;">
											  <label for="usr">Bank *:</label>
											  <input type="text" class="form-control" id="check_bank" placeholder="Bank" name="check_bank">
											  <label for="remarks">Address:</label>
											  <textarea type="text" class="form-control" placeholder="Address" id="check_address" name="check_address"></textarea>
												 <label for="remarks">Check # *:</label>
												<input type="text" class="form-control" id="check_number" name="check_number" placeholder="Check Number">
												 <label for="remarks">Check Date:</label>
												<input type="date" class="form-control" id="check_date" name="check_date" placeholder="Check Date" >
												<label for="check amount">Check Amount:</label>
												<input type="text" class="form-control" id="check" placeholder="0.00" value="0.00" style="color:#e74c3c;text-align:right;font-size:18pt">
											</div>
											</form>
												<button class="btn btncash finalize" style="background-color:#2980b9 !important; height:60px !important; width: 100% !important;">Finalize</button>
										</div>
									</div>
									</div>
									</div>
								<div id="card_tab" class="tab-pane fade in">
									<div class="row">
									<div class="col-md-12">
										<div class="col-md-6" style="padding-left: 30px;">
											<div class="col-md-4">
												<button class="btn btncash big click_card" value="20.00" >20</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_card" value="50.00">50</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_card" value="100.00">100</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_card" value="200.00">200</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_card" value="500.00">500</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_card" value="1000.00">1000</button>
											</div>

											<div class="col-md-4">
												<button class="btn btncash click_card2" value="1">1</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_card2" value="2">2</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_card2" value="3">3</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_card2" value="4">4</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_card2" value="5">5</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_card2" value="6">6</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_card2" value="7">7</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_card2" value="8">8</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_card2" value="9">9</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_card2" value="0">0</button>
											</div>
											<div class="col-md-8" style="padding: 0px !important;">
												<button class="btn btncash clearcard" style="width: 99% !important;">CLEAR</button>
											</div>
										</div>
										<div class="col-md-6">
											<div class="col-md-12">
											<form role="form" name="card_payment">
												<div class="form-group" style="margin-top:5px;">
												 <label for="usr">Card Type *:</label>
												<select class="form-control" id="typeofcard">
													<option value="">Select Type of Card</option>
													<?php
														foreach($cards as $row) {
															echo '<option value"'.$row->card_id.'">'.$row->card_name.'</option>';
														}
													?>
												</option>
												</select>

												  <label for="usr">Card Holder *:</label>
												  <input type="text" class="form-control" placeholder="Card Holder" id="cardholder">
												  <label for="remarks">Card # *:</label>
												 <input type="text" class="form-control" placeholder="Card #" id="cardnum">
													 <label for="remarks">Approval # *:</label>
													<input type="text" class="form-control" id="approvalnum" placeholder="Approval Number">
													 <label for="remarks">Expiry Date:</label>
													<input type="date" class="form-control" id="cardexpiry" placeholder="Expiry Date" >
													<label for="remarks">Card Amount:</label>
													<input type="text" class="form-control" id="card" placeholder="0.00" value="0.00" style="color:#e74c3c;text-align:right;font-size:18pt">
												</div>
												</form>
												<button class="btn btncash finalize" style="background-color:#2980b9 !important; height:60px !important;width: 100% !important;">Finalize</button>
											</div>
										</div>
									</div>
									</div>
									</div>
								<div id="charge_tab" class="tab-pane fade in">
									<div class="row">
									<div class="col-md-12">
										<div class="col-md-6" style="padding-left: 30px;">
											<div class="col-md-4">
												<button class="btn btncash big click_charge" value="20.00" >20</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_charge" value="50.00">50</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_charge" value="100.00">100</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_charge" value="200.00">200</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_charge" value="500.00">500</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_charge" value="1000.00">1000</button>
											</div>

											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="1">1</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="2">2</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="3">3</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="4">4</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="5">5</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="6">6</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="7">7</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="8">8</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="9">9</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="0">0</button>
											</div>
											<div class="col-md-8" style="padding: 0px !important;">
												<button class="btn btncash clearcharge" style="width: 99% !important;">CLEAR</button>
											</div>
										</div>
										<div class="col-md-6">
											<div class="col-md-12">
											<form role="form" name="charge_payment">

												<div class="form-group" style="margin-top:5px;">
												  <label for="Charge to">Charge to *:</label>
												  <input type="text" class="form-control" id="chargeto" placeholder="Charge to" ">
												  <label for="Charge Remarks" >Remarks:</label>
												  <textarea type="text" class="form-control" id="charge_remarks"></textarea>
													 <label for="remarks">Charge Date:</label>
													<input type="date" class="form-control" id="charge_date" placeholder="Approval Number">
													 <label for="remarks">Charge Amount:</label>
													<input type="text" class="form-control" id="charge" placeholder="0.00" value="0.00" style="color:#e74c3c;text-align:right;font-size:18pt">
												</div>
												</form>
													<button class="btn btncash finalize" style="background-color:#2980b9 !important; height:60px !important;width: 100% !important;">Finalize</button>
											</div>
										</div>
									</div>
									</div>
									</div>

								<div id="total_payment_amount" class="tab-pane fade in">
									<div class="row">
									<div class="col-md-12">
										<div class="col-md-6" style="padding-left: 30px;">
											<div class="col-md-4">
												<button class="btn btncash big click_charge" value="20.00" disabled>20</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_charge" value="50.00" disabled>50</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_charge" value="100.00" disabled>100</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_charge" value="200.00" disabled>200</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_charge" value="500.00" disabled>500</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash big click_charge" value="1000.00" disabled>1000</button>
											</div>

											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="1" disabled>1</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="2" disabled>2</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="3" disabled>3</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="4" disabled>4</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="5" disabled>5</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="6" disabled>6</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="7" disabled>7</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="8" disabled>8</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="9" disabled>9</button>
											</div>
											<div class="col-md-4">
												<button class="btn btncash click_charge2" value="0" disabled>0</button>
											</div>
											<div class="col-md-8" style="padding: 0px !important;">
												<button class="btn btncash clearcharge" style="width: 99% !important;">CLEAR</button>
											</div>
										</div>
										<div class="col-md-6">
											<div class="col-md-12">
											<form role="form" name="total_payment">
												<h2> Total Payment </h2>
												<div class="form-group" style="margin-top:5px;">
													<input type="text" class="form-control" id="total_payment" placeholder="0.00" style="color:#e74c3c;text-align:right;font-size:18pt">
												</div>
												</form>
													<button class="btn btncash finalize" style="background-color:#2980b9 !important; height:60px !important;width:100% !important;">Finalize</button>
											</div>
										</div>
									</div>
									</div>
									</div>
									<br><br>
									  </div><!--end of tabs -->



                    </div><!---content---->
                </div></div>
            </div><!---modal-->

<!-- start modal for empty cart -->

            <div id="modal_cart_empty" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header" style="background-color:#c0392b;border-bottom:0px;">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <center><h4 class="modal-title" style="color:white;">Warning : Cart is Empty</h4></center>
                        </div>

                    </div><!---content---->
                </div>
            </div><!---modal-->


<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>

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

<script>




$(function(){

	$(document).keydown(function(event){
		if(event.which == 118){
			//$("#modal_payment").modal('show');
			$('#buttontransact').click();
		}
	});

	$(document).keydown(function(event){
		if( event.which === 50 && event.altKey ) {
			$('#browse_products').click();
		}
	});

	$(document).keydown(function(event) {
	    if( event.which === 53 && event.altKey ) {
	        $('#browse_journal').click();
	    }
	});

	$(document).keydown(function(event) {
	    if( event.which === 52 && event.altKey ) {
	        $('#enablevoid').click();
	    }
	});

	$(document).keydown(function(event) {
	    if( event.which === 67 && event.altKey ) {
	        $('#clear_cart').click();
	    }
	});

	$(document).keydown(function(event) {
	    if( event.which === 54 && event.altKey ) {
	        $('#buttontransact').click();
	    }
	});
})

$(document).ready(function(){
	    var reInitializeNumeric=function(){
        $('.numeric').autoNumeric('init');
    };

		var countCart=function() {
        var itemcount= ($('table#tbl_items tr:last').index()+ 1);
		var string = "rows";
		/*var total = itemcount +" "+ string;*/
		var total = itemcount;
		$('#cart_count').text(total);
        };

			var synchronizeFields=function(){
			var cashremarks = $("#cash_remarks").val();
			$("#post_cash_remarks").val(cashremarks);

			var acheckbank = $("#check_bank").val();
			var achecknumber = $("#check_number").val();
			var acheckaddress = $("#check_address").val();
			var acheckdate = $("#check_date").val();
			$("#post_check_bank").val(acheckbank);
			$("#post_check_number").val(achecknumber);
			$("#post_check_address").val(acheckaddress);
			$("#post_check_date").val(acheckdate);

			var atypeofcard = $("#typeofcard").val();
			var acardholder = $("#cardholder").val();
			var acardnum = $("#cardnum").val();
			var aapprovalnum = $("#approvalnum").val();
			var acardexpiry = $("#cardexpiry").val();
			$("#post_card_type").val(atypeofcard);
			$("#post_card_holder").val(acardholder);
			$("#post_card_number").val(acardnum);
			$("#post_card_apnumber").val(aapprovalnum);
			$("#post_card_expdate").val(acardexpiry);

			var achargeto = $("#chargeto").val();
			var achargeremarks = $("#charge_remarks").val();
			var achargedate = $("#charge_date").val();
			$("#post_chargeto").val(achargeto);
			$("#post_charge_remarks").val(achargeremarks);
			$("#post_charge_date").val(achargedate);



    };

reInitializeNumeric();

		$('#removecash').click(function(){
		$("#cash").val(0);
			reComputeChange();
		});

		$('#removecheck').click(function(){
		$("#check").val(0);
			reComputeChange();
		});

		$('#removecard').click(function(){
		$("#card").val(0);
			reComputeChange();
		});

		$('#removecharge').click(function(){
		$("#charge").val(0);
			reComputeChange();
		});

		$('.finalize').click(function(){
			var samountdue = $("#amountdue").val();
			var amountdue = samountdue.replace(/,/g, "");
			var stendered = $("#tendered").val();
			var tendered = stendered.replace(/,/g, "");
			synchronizeFields();
			if(amountdue==0){
				cartempty();
			}
			else{
			if(parseFloat(tendered)>=parseFloat(amountdue)){

			validaterequirefields();

				//go to validate requirefields function if true
			}
			else{
				alert("Not Enough Funds");
			}
			}


		});

		/*$('#browse_journal').click(function(){
			$('#modal_journal').modal('show');
		});*/

		$('#printreceipt').click(function(){
			PrintReceipt();
		});

		$('#printchecklist').click(function(){
			PrintChecklist();
		});

		/*$('#browse_journal2').click(function(){
			$('#browse_journal').click();
		});*/


	    $('.click_class').click(function() {
		    var scurrentcash = $('#cash').val();
			if(scurrentcash == ""){
				scurrentcash = 0;
				var value = ($(this).attr('value'));
				var cash = parseFloat(scurrentcash) + parseFloat(value);
				$("#cash").val(cash);
				reChange();
			reComputeChange();
			}
			else{
				var currentcash =  scurrentcash.replace(/,/g, "");
				var value = ($(this).attr('value'));
				var cash = parseFloat(currentcash) + parseFloat(value);
				$("#cash").val(cash);
				reChange();
							reComputeChange();
			}
        });

		$('.click_class2').click(function() {
		    var scurrentcash = $('#cash').val();
			var currentcash =  scurrentcash.replace(/,/g, "");
            var value = ($(this).attr('value'));
			var cash2 = parseFloat(currentcash) + parseFloat(value);
			$("#cash").val(cash2);
			reChange();
						reComputeChange();
        });

	    $('.click_check').click(function() {
		    var scurrentcheck = $('#check').val();
			if(scurrentcheck == ""){
				scurrentcheck = 0;
				var value = ($(this).attr('value'));
				var check = parseFloat(scurrentcheck) + parseFloat(value);
				$("#check").val(check);
				reChange();
							reComputeChange();
			}
			else{
				var currentcheck =  scurrentcheck.replace(/,/g, "");
				var value = ($(this).attr('value'));
				var check = parseFloat(currentcheck) + parseFloat(value);
				$("#check").val(check);
				reChange();
							reComputeChange();
			}
        });

		$('.click_check2').click(function() {
		    var scurrentcheck = $('#check').val();
			var currentcheck =  scurrentcheck.replace(/,/g, "");
            var value = ($(this).attr('value'));
			var check = parseFloat(currentcheck) + parseFloat(value);
			$("#check").val(check);
			reChange();
						reComputeChange();
        });

		$('.click_card').click(function() {
		    var scurrentcard = $('#card').val();
			if(scurrentcard == ""){
				scurrentcard = 0;
				var value = ($(this).attr('value'));
				var card = parseFloat(scurrentcard) + parseFloat(value);
				$("#card").val(card);
				reChange();
							reComputeChange();
			}
			else{
				var currentcard =  scurrentcard.replace(/,/g, "");
				var value = ($(this).attr('value'));
				var card = parseFloat(currentcard) + parseFloat(value);
				$("#card").val(card);
				reChange();
							reComputeChange();
			}
        });

		$('.click_card2').click(function() {
		    var scurrentcard = $('#card').val();
			var currentcard =  scurrentcard.replace(/,/g, "");
            var value = ($(this).attr('value'));
			var card = parseFloat(currentcard) + parseFloat(value);
			$("#card").val(card);
			reChange();
						reComputeChange();
        });

		$('.click_charge').click(function() {
		    var scurrentcharge = $('#charge').val();
			if(scurrentcharge == ""){
				scurrentcharge = 0;
				var value = ($(this).attr('value'));
				var charge = parseFloat(scurrentcharge) + parseFloat(value);
				$("#charge").val(charge);
				reChange();
							reComputeChange();
			}
			else{
				var currentcharge =  scurrentcharge.replace(/,/g, "");
				var value = ($(this).attr('value'));
				var charge = parseFloat(currentcharge) + parseFloat(value);
				$("#charge").val(charge);
				reChange();
							reComputeChange();
			}
        });

		$('.click_charge2').click(function() {
		    var scurrentcharge = $('#charge').val();
			var currentcharge =  scurrentcharge.replace(/,/g, "");
            var value = ($(this).attr('value'));
			var charge = parseFloat(currentcharge) + parseFloat(value);
			$("#charge").val(charge);
			reChange();
						reComputeChange();
        });

		$('.pay').click(function() {

					$("#modal_payment").modal('hide');
					reComputeChange();
					paymentaddnotif();
					txtfocus();

        });
		$('#clear_cart').click(function(){
			$('#tbl_items > tbody').html('');
			/*$('#cart_count').text("0 Rows");*/
			$('#cart_count').text("0");
			clearFields();
			reComputeTotal();
			removeditemnotif();
		});

		$('#end_batch').click(function(){
			endbatch().done(function(response){   //End Batch
			    window.location.replace("Login/transaction/logout");
                showNotification(response);
			});
		});

		//$('.enablevoid').click(function(){
	//		showloginmodal();

	//	});

		$('#voidlogin').click(function(){
			adminvoid().done(function(response){   //End Batch
			 var checking = response['stat'];
			if(checking=="success")
			{
				$('.remove_item').removeAttr("disabled");
				showNotification(response);
				$('#modal_admin_login').modal('hide');
				$('#user_pword').val("");

			}
			else{
				showNotification(response);
			}

			});
		});

		$('.clearcash').click(function(){
			ClearCashInput();
			reChange();
			reComputeChange();
		});

		$('.clearcheck').click(function(){
			ClearCheckInput();
			reChange();
			reComputeChange();
		});

		$('.clearcard').click(function(){
			ClearCardInput();
			reComputeChange();
		});

		$('.clearcharge').click(function(){
			ClearChargeInput();
			reComputeChange();
		});

		/*$('.clear_cart').click(function(){
			$('#tbl_items > tbody').html('');
			$('#cart_count').text("0 Rows");
			$('#cart_count').text("0");
			clearFields();
			reComputeTotal();
			removeditemnotif();
		});*/

		var ClearChange=function() {
			var zero = "0.00";
			$("#change").val(zero);
        };

		var ClearCashInput=function() {
			var zero = "0.00";
			$("#cash").val(zero);
        };

		var ClearCheckInput=function() {
			var zero = "0.00";
			$("#check").val(zero);
        };

		var ClearCardInput=function() {
			var zero = "0.00";
			$("#card").val(zero);
        };

		var ClearChargeInput=function() {
			var zero = "0.00";
			$("#charge").val(zero);
        };

			var PrintReceipt=function(){
				alert("print receipt here");
			}

			var showloginmodal=function(){
				$('#modal_admin_login').modal('show');
			}

			var PrintChecklist=function(){
				alert("print Checklist here");
			}

			var reComputeChange=function(){
			var stotalcash = $("#cash").val();
			var stotalcheck = $("#check").val();
			var stotalcard = $("#card").val();
			var stotalcharge = $("#charge").val();

			var totalcash = stotalcash.replace('',0);
			var totalcheck = stotalcheck.replace('',0);
			var totalcard = stotalcard.replace('',0);
			var totalcharge = stotalcharge.replace('',0);

			var sumofpayment = parseFloat(totalcash)+parseFloat(totalcheck)+parseFloat(totalcard)+parseFloat(totalcharge);

			var samountdue = $("#amountdue").val();
			var amountdue = samountdue.replace(/,/g, "");
			var change = sumofpayment-parseFloat(amountdue);

			$("#cashamount").val(accounting.formatNumber(totalcash,2));
			$("#checkamount").val(accounting.formatNumber(totalcheck,2));
			$("#cardamount").val(accounting.formatNumber(totalcard,2));
			$("#chargeamount").val(accounting.formatNumber(totalcharge,2));

			$("#total_payment").val(accounting.formatNumber(sumofpayment,2));

			$("#tendered").val(accounting.formatNumber(sumofpayment,2));
			$("#change").val(accounting.formatNumber(change,2));

    };

			var reChange=function(){
			var stotalcash = $("#cash").val();
			var stotalcheck = $("#check").val();
			var stotalcard = $("#card").val();
			var stotalcharge = $("#charge").val();

			var totalcash = stotalcash.replace('',0);
			var totalcheck = stotalcheck.replace('',0);
			var totalcard = stotalcard.replace('',0);
			var totalcharge = stotalcharge.replace('',0);

			var sumofpayment = parseFloat(totalcash)+parseFloat(totalcheck)+parseFloat(totalcard)+parseFloat(totalcharge);

			$("#total_payment").val(accounting.formatNumber(sumofpayment,2));

    };



			var validaterequirefields=function(){
			var scheckamount = $('#checkamount').val();
			var checkamount = scheckamount.replace(/,/g, "");
			var scardamount = $('#cardamount').val();
			var cardamount = scardamount.replace(/,/g, "");
			var schargeamount = $('#chargeamount').val();
			var chargeamount = schargeamount.replace(/,/g, "");

			var checkbank = $('#check_bank').val();
			var checknumber = $('#check_number').val();

			var cardholder = $('#cardholder').val();
			var cardnumber = $('#cardnum').val();
			var cardapprovalnum = $('#approvalnum').val();

			var chargeto = $('#chargeto').val();

			if(parseFloat(checkamount)!="0"){
					if(checkbank==""){
					bankisrequired();
					return;
					}
					if(checknumber==""){
					checknumberisrequired();
					return;
					}

				}
			if(parseFloat(cardamount)!="0"){
					if(cardholder==""){
					cardholderisrequired();
					return;
					}
					if(cardnumber==""){
					cardnumberisrequired();
					return;
					}
					if(cardapprovalnum==""){
					cardapprovalisrequired();
					return;
					}
				}

			if(parseFloat(chargeamount)!="0"){
					if(chargeto==""){
					chargetofieldisrequired();
					return;
					}
				}
					//if all condtion is false -> proceed
				createPurchaseOrder().done(function(response){   //Create Purchase
                showNotification(response);
				var payment_id=response.pos_payment_id;
				$("#payment_id").val(payment_id);
				clearFields();
				reComputeTotal();
				txtfocus();
				$('#cart_count').text("0 rows");
				$("#modal_payment").modal('hide');
				window.open("Templates/layout/pospr/"+payment_id+"/print");
				});


    };



		var CheckPayments=function() {       //Function for checking payments
					$("#modal_payment").modal('hide');
					reComputeChange();
					paymentaddnotif();
					txtfocus();


        };


    var dt; var _txnMode; var _selectedID; var _selectRowObj; var _cboSuppliers; var _cboTaxType;

    var oTableItems={
        qty : 'td:eq(0)',
        sale_cost : 'td:eq(2)',
        discount : 'td:eq(3)',
        total_line_discount : 'td:eq(4)',
        tax : 'td:eq(5)',
        total : 'td:eq(6)',
        vat_input : 'td:eq(7)',
        net_vat : 'td:eq(8)'

    };


    var oTableDetails={
        discount : 'tr:eq(0) > td:eq(1)',
        before_tax : 'tr:eq(1) > td:eq(1)',
        tax_amount : 'tr:eq(2) > td:eq(1)',
        after_tax : 'tr:eq(3) > td:eq(1)'
    };


    var initializeControls=function(){

            dt_customer=$('#tbl_customers').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "ajax" : "Customers/transaction/list",
				"language": {
				"searchPlaceholder": "Search Customers"
				},
                "columns": [
                    {
                        "targets": [0],
                        "class":          "details-control",
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ""
                    },
                    { targets:[1],data: "customer_name" },
                    { targets:[2],data: "address" },
                    { targets:[3],data: "landline" },
                    { targets:[4],data: "mobile_no" },
                    { targets:[5],data: "customer_id" },
                {
                    targets:[6],
                    render: function (data, type, full, meta){
                        var btn_addcustomer_close='<button class="btn btn-default btn-sm" name="add_customer"   data-toggle="tooltip" data-placement="top" title="add and close"><span class="glyphicon glyphicon-ok"></span> </button>';
                        return '<center>'+btn_addcustomer_close+'</center>';
                    }
                },
                ]
            });



        var raw_data=<?php echo json_encode($products); ?>;


            var products = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('product_code','product_desc'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                local : raw_data
            });

            var _objTypeHead=$('#custom-templates .typeahead');

            _objTypeHead.typeahead(null, {
                name: 'products',
                display: 'description',
                source: products,
                templates: {
                    header: [
                        '<table width="100%"><tr><td width=20%" style="padding-left: 1%;"><b>PLU</b></td><td width="30%" align="left"><b>Description</b></td><td width="20%" align="right" style="padding-right: 2%;"><b>SRP</b></td><td width="20%" align="right" style="padding-right: 2%;" hidden><b>Tax Rate</b></td></tr></table>'
                    ].join('\n'),

                    suggestion: Handlebars.compile('<table width="100%"><tr><td width="20%" style="padding-left: 1%">{{product_code}}</td><td width="30%" align="left">{{product_desc}}</td><td width="20%" align="right" style="padding-right: 2%;">{{sale_cost}}</td><td width="20%" align="right" style="padding-right: 2%;" hidden>{{tax_rate}}</td></tr></table>')

                }
            }).on('keyup', this, function (event) {
					var codevalue = $("#txtsearch").val();
					var n = codevalue.indexOf("*");
				if(codevalue[n]=="*"){
					total="";
					for(i=0;i!=n;i++){
					total = total + codevalue[i];

					}
					$("#txtsearch").val(""); //cleart txsearcg
					$("#tempcode").val(total); //the quantity
					return;
				}
				 if(_objTypeHead.typeahead('val')==''){
					 return false; }  //if input text of typeahead  enter.log(suggestion);
                if (event.keyCode == 13) {
                    $('.tt-suggestion:first').click();
                    _objTypeHead.typeahead('close');
                    _objTypeHead.typeahead('val','');

                }

            }).bind('typeahead:select', function(ev, suggestion) {

                //console.log(suggestion);


                var tax_id="1";
                var tax_rate=getFloat(suggestion.tax_rate);

                var total=getFloat(suggestion.sale_cost);
                var net_vat=0;
                var vat_input=0;


                    net_vat=total/(1+(getFloat(tax_rate)/100));
                    vat_input=total-net_vat;
					var tempvalue = $("#tempcode").val();
					var newtotal = tempvalue * total;
				if(tempvalue==""){
					$('#tbl_items > tbody').prepend(newRowItem({
                    po_qty : "1",
                    product_code : suggestion.product_code,
                    unit_id : suggestion.unit_id,
                    unit_name : suggestion.unit_name,
                    product_id: suggestion.product_id,
                    product_desc : suggestion.product_desc,
                    po_line_total_discount : "0.00",
                    tax_exempt : false,
                    po_tax_rate : tax_rate,
                    po_price : suggestion.sale_cost,
                    po_discount : "0.00",
                    tax_type_id : null,
                    po_line_total : total,
                    po_non_tax_amount: net_vat,
                    po_tax_amount:vat_input
                }));
				}
				else{
                $('#tbl_items > tbody').prepend(newRowItem({
                    po_qty : tempvalue,
                    product_code : suggestion.product_code,
                    unit_id : suggestion.unit_id,
                    unit_name : suggestion.unit_name,
                    product_id: suggestion.product_id,
                    product_desc : suggestion.product_desc,
                    po_line_total_discount : "0.00",
                    tax_exempt : false,
                    po_tax_rate : tax_rate,
                    po_price : suggestion.sale_cost,
                    po_discount : "0.00",
                    tax_type_id : null,
                    po_line_total : newtotal,
                    po_non_tax_amount: net_vat,
                    po_tax_amount:vat_input
                }));
				}




				$("#tempcode").val("");
                reInitializeNumeric();
				reComputeTotal();
				reComputeChange();
				countCart();
                //alert("dd")
            });

            $('div.tt-menu').on('click','table.tt-suggestion',function(){
                _objTypeHead.typeahead('val','');
            });

            $("input#touchspin4").TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'fa fa-fw fa-plus',
                verticaldownclass: 'fa fa-fw fa-minus'
            });


    }();

        _customers=$("#customers").select2({
            placeholder: "Select Customer.",
            allowClear: true
        });

        _customers.select2('val',"0");

    var bindEventHandlers=(function(){
        var detailRows = [];


            $('#tbl_customers tbody').on( 'click', 'tr td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = dt_customer.row( tr );
                var idx = $.inArray( tr.attr('id'), detailRows );

                if ( row.child.isShown() ) {
                    tr.removeClass( 'details' );
                    row.child.hide();

                    // Remove from the 'open' array
                    detailRows.splice( idx, 1 );
                }
                else {
                    tr.addClass( 'details' );
                    //console.log(row.data());
                    row.child( format_customer( row.data() ) ).show();
                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }



                }
            } );

        $('#tbl_journal tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt_journal.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );
                //console.log(row.data());
                var d=row.data();

                $.ajax({
                    "dataType":"html",
                    "type":"POST",
                    "url":"Templates/layout/journal/"+ d.pos_payment_id,
                    "beforeSend" : function(){
                        row.child( '<center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center>' ).show();
                    }
                }).done(function(response){
                    row.child( response ).show();
                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                });




            }
        } );

        $('#browse_products').click(function(){
          $('#tbl_products').dataTable().fnDestroy();
          getproducts();
    		});

        var getproducts=function(){
          dt=$('#tbl_products').DataTable({
             "dom": '<"toolbar">frtip',
             "bLengthChange":false,
             "ajax" : "Pos/transaction/listinventory",
             "bDestroy": true,
         			"language": {
                 "searchPlaceholder": "Search Products"
             },
             "columns": [
                 {
                     "targets": [0],
                     "class":          "details-control",
                     "orderable":      false,
                     "data":           null,
                     "defaultContent": ""
                 },
			            { targets:[1],data: "product_code"},
			            { targets:[2],data: "product_desc" },
			            { targets:[3],data: "sale_cost" },
		 				{ targets:[4],data: "tax_rate" },
		 				{ targets:[5],data: "stock_onhand" },
		 				{ targets:[6],data: "product_id"  },
                 {
                     targets:[7],
                     render: function (data, type, full, meta){
                         var btn_addtocart_close='<button class="btn btn-default btn-sm" name="addtocart_close"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="add and close"><span class="glyphicon glyphicon-ok"></span> </button>';
                         var btn_addtocart='<button class="btn btn-default btn-sm" name="addtocart" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="fa fa-plus" aria-hidden="true"></i> </button>';

                         return '<center>'+btn_addtocart_close+btn_addtocart+'</center>';
                     }
                 },





             ],
             "rowCallback":function( row, data, index ){

                 $(row).find('td').eq(5).attr({
                     "align": "right"
                 });
             }
         });
        }

        $('#browse_journal').click(function(){
          $('#tbl_journal').dataTable().fnDestroy();
          getjournal();
    	});

        var getjournal=function(){
          dt_journal=$('#tbl_journal').DataTable({
              "dom": '<"toolbar">frtip',
              "bLengthChange":false,
              "ajax" : "Receipts/transaction/list",
             "bDestroy": true,
              "language": {
              "searchPlaceholder": "Search Journal"
              },
              "columns": [
                  {
                      "targets": [0],
                      "class":          "details-control",
                      "orderable":      false,
                      "data":           null,
                      "defaultContent": ""
                  },
              { targets:[1],data: "receipt_no" },
              { targets:[2],data: "transaction_date" },
              ]
          });
        }

        $('#tbl_products tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();

                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );

                row.child( format( row.data() ) ).show();

                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }
            }
        } );




        //track every changes on numeric fields
        $('#tbl_items tbody').on('keyup','input.numeric',function(){
            var row=$(this).closest('tr');

            var price=parseFloat(accounting.unformat(row.find(oTableItems.sale_cost).find('input.numeric').val()));
            var discount=parseFloat(accounting.unformat(row.find(oTableItems.discount).find('input.numeric').val()));
            var qty=parseFloat(accounting.unformat(row.find(oTableItems.qty).find('input.numeric').val()));
            var tax_rate=parseFloat(accounting.unformat(row.find(oTableItems.tax).find('input.numeric').val()))/100;

            if(discount>price){
                showNotification({title:"Invalid",stat:"error",msg:"Discount must not greater than unit price."});
                row.find(oTableItems.discount).find('input.numeric').val('0.00');
                //$(this).trigger('keyup');
                //return;
            }

            var discounted_price=price-discount;
            var line_total_discount=discount*qty;
            var line_total=discounted_price*qty;
            var net_vat=line_total/(1+tax_rate);
            var vat_input=line_total-net_vat;

            $(oTableItems.total,row).find('input.numeric').val(accounting.formatNumber(line_total,2)); // line total amount
            $(oTableItems.total_line_discount,row).find('input.numeric').val(line_total_discount); //line total discount
            $(oTableItems.net_vat,row).find('input.numeric').val(net_vat); //net of vat
            $(oTableItems.vat_input,row).find('input.numeric').val(vat_input); //vat input

            //console.log(net_vat);
            reComputeTotal();
			reComputeChange();


        });


        $('#tbl_items > tbody').on('click','button[name="remove_item"]',function(){
                $(this).closest('tr').remove();
                reComputeTotal();
				reComputeChange();

        });


    })();

    var removePurchaseOrder=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Purchases/transaction/delete",
            "data":{purchase_order_id : _selectedID}
        });
    };

	var cartempty=function(){
		$('#modal_cart_empty').modal('show');
	}
    var showNotification=function(obj){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };

	var removeditemnotif=function(){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  "Removed",
            text:  "All items removed to Cart",
            type:  "warning"
        });
    };

	var removedpaymentnotif=function(){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  "Removed",
            text:  "Cash Payment Removed",
            type:  "warning"
        });
    };

	var paymentaddnotif=function(){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  "Payment Added",
            text:  "Payment Added",
            type:  "success"
        });
    };

	var nopaymentaddnotif=function(){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  "Error",
            text:  "No Payment Added",
            type:  "error"
        });
    };

	var bankisrequired=function(){

        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  "Check Payment Error",
            text:  "Bank Field is required",
            type:  "error"
        });
    };

	var checknumberisrequired=function(){

        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  "Check Payment Error",
            text:  "Check Number is required",
            type:  "error"
        });
    };

	var cardholderisrequired=function(){

        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  "Card Payment Error",
            text:  "Card Holder is required",
            type:  "error"
        });
    };

	var cardnumberisrequired=function(){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  "Card Payment Error",
            text:  "Card Number is required",
            type:  "error"
        });
    };

	var cardapprovalisrequired=function(){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  "Card Payment Error",
            text:  "Card Approval number is required",
            type:  "error"
        });
    };

	var chargetofieldisrequired=function(){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  "Charge Payment Error",
            text:  "Charge to is required",
            type:  "error"
        });
    };


    var showSpinningProgress=function(e){
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };

    var clearFields=function(f){
        $('input,textarea',f).val('');
        $(f).find('input:first').focus();
        $('#tbl_items > tbody').html('');
		$('#cash').val("0.00"); //add 0.00
    $('#card').val("0.00"); //add 0.00
    $('#check').val("0.00"); //add 0.00
    $('#charge').val("0.00"); //add 0.00
		$('#amountdue').val(accounting.formatNumber(0.00,2));
		$('#tendered').val(accounting.formatNumber(0.00,2));
		$('#change').val(accounting.formatNumber(0.00,2));

		$('#cashamount').val(accounting.formatNumber(0.00,2));
		$('#checkamount').val(accounting.formatNumber(0.00,2));
		$('#cardamount').val(accounting.formatNumber(0.00,2));
		$('#chargeamount').val(accounting.formatNumber(0.00,2));

		$('#method1').val(1);
		$('#method2').val(2);
		$('#method3').val(3);
		$('#method4').val(4);
    };


    function format ( d ) {

        //return


    };


    var getFloat=function(f){
        return parseFloat(accounting.unformat(f));
    };

    var newRowItem=function(d){


        return '<tr>'+
                        '<td width="10%"><input name="pos_qty[]" type="text" class="numeric form-control" value="'+ d.po_qty+'"></td>'+
                        '<td width="30%">'+d.product_desc+'</td>'+
                        '<td width="11%"><input name="pos_price[]" type="text" class="numeric form-control" value="'+accounting.formatNumber(d.po_price,2)+'" style="text-align:right;"></td>'+
                        '<td width="11%"><input name="pos_discount[]" type="text" class="numeric form-control" value="'+ accounting.formatNumber(d.po_discount,2)+'" style="text-align:right;"></td>'+
                        '<td style="display: none;" width="11%"><input name="po_line_total_discount[]" type="text" class="numeric form-control" value="'+ accounting.formatNumber(d.po_line_total_discount,2)+'" readonly></td>'+
                        '<td width="11%"><input name="pos_tax_rate[]" type="text" class="numeric form-control" value="'+ accounting.formatNumber(d.po_tax_rate,2)+'"></td>'+
                        '<td width="11%" align="right"><input name="po_line_total[]" type="text" class="numeric form-control" value="'+ accounting.formatNumber(d.po_line_total,2)+'" readonly></td>'+
                        '<td style="display: none;"><input name="tax_amount[]" type="text" class="numeric form-control" value="'+ d.po_tax_amount+'" readonly></td>'+
                        '<td style="display: none;"><input name="non_tax_amount[]" type="text" class="numeric form-control" value="'+ d.po_non_tax_amount+'" readonly></td>'+
                        '<td style="display: none;"><input name="product_id[]" type="text" class="numeric form-control" value="'+ d.product_id+'" readonly></td>'+
                        '<td align="center"><button type="button" name="remove_item" class="btn btn-default remove_item" disabled><i class="fa fa-trash"></i></button></td>'+
                    '</tr>';
    };



    var reComputeTotal=function(){
        var rows=$('#tbl_items > tbody tr');


        var discounts=0; var before_tax=0; var after_tax=0; var tax_amount=0;

        $.each(rows,function(){
            //console.log($(oTableItems.net_vat,$(this)));
            discounts+=parseFloat(accounting.unformat($(oTableItems.total_line_discount,$(this)).find('input.numeric').val()));
            before_tax+=parseFloat(accounting.unformat($(oTableItems.net_vat,$(this)).find('input.numeric').val()));
            tax_amount+=parseFloat(accounting.unformat($(oTableItems.vat_input,$(this)).find('input.numeric').val()));
            after_tax+=parseFloat(accounting.unformat($(oTableItems.total,$(this)).find('input.numeric').val()));
        });

        var tbl_summary=$('#tbl_purchase_summary');
        tbl_summary.find(oTableDetails.discount).html(accounting.formatNumber(discounts,2));
        tbl_summary.find(oTableDetails.before_tax).html(accounting.formatNumber(before_tax,2));
        tbl_summary.find(oTableDetails.tax_amount).html(accounting.formatNumber(tax_amount,2));
        tbl_summary.find(oTableDetails.after_tax).html('<b>'+accounting.formatNumber(after_tax,2)+'</b>');
		$('#amountdue').val(accounting.formatNumber(after_tax,2));
    };

	var createPurchaseOrder=function(){
        var _data=$('#frm_items').serializeArray();
        _data.push({name : "post_amountdue" ,value : $('#amountdue').val()});
        _data.push({name : "post_tendered" ,value : $('#tendered').val()});
        _data.push({name : "post_change" ,value : $('#change').val()});

        var tbl_summary=$('#tbl_purchase_summary');
        _data.push({name : "summary_discount", value : tbl_summary.find(oTableDetails.discount).text()});
        _data.push({name : "summary_before_tax", value :tbl_summary.find(oTableDetails.before_tax).text()});
        _data.push({name : "summary_tax_amount", value : tbl_summary.find(oTableDetails.tax_amount).text()});
        _data.push({name : "summary_after_tax", value : tbl_summary.find(oTableDetails.after_tax).text()});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Purchases/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

     var adminvoid=(function(){
        var _data={uname : $('input[name="user_name"]').val() , pword : $('input[name="user_pword"]').val()};

                return $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Login/transaction/validatevoid",
                    "data" : _data,
                    "beforeSend": function(){

                    }
          });
    });

	var endbatch=function(){

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Purchases/transaction/endbatch",
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var reInitializeNumeric=function(){
        $('.numeric').autoNumeric('init');
    };
	//add to cart then close modal
    $('#tbl_products tbody').on( 'click', 'button[name="addtocart_close"]', function () {
			var tds = $(this).closest('tr').children('td');
			var dataArray =[];
			for(i=1;i < tds.length;i++)
				dataArray.push($(tds[i]).html());

			var d_product_code = dataArray[0];
			var d_product_desc = dataArray[1];
			var d_sale_cost = dataArray[2];
			var d_tax_rate = dataArray[3];
			var d_on_hand = dataArray[4];
			var d_product_id = dataArray[5];

			    var tax_id="1";
                var tax_rate=d_tax_rate;

                var total=getFloat(d_sale_cost);
                var net_vat=0;
                var vat_input=0;


                    net_vat=total/(1+(getFloat(tax_rate)/100));
                    vat_input=total-net_vat;
			//Use dataArray here
					$('#tbl_items > tbody').prepend(newRowItem({
                    po_qty : "1",
                    product_code : d_product_code,
                    product_id: d_product_id,
                    product_desc : d_product_desc,
					po_line_total_discount : "0.00",
                    tax_exempt : false,
                    po_tax_rate : d_tax_rate,
                    po_price : d_sale_cost,
                    po_discount : "0.00",
                    tax_type_id : null,
                    po_line_total : total,
                    po_non_tax_amount: net_vat,
                    po_tax_amount:vat_input,
                }));
			     reInitializeNumeric();
				reComputeTotal();
				reComputeChange();
				countCart();
				$('#modal_browse_products').modal('hide');

			return false;
    } );
		//add to cart without closing modal
	$('#tbl_products tbody').on('click','button[name="addtocart"]',function(){
			var tds = $(this).closest('tr').children('td');
			var dataArray =[];
			for(i=1;i < tds.length;i++)
				dataArray.push($(tds[i]).html());
			var d_product_code = dataArray[0];
			var d_product_desc = dataArray[1];
			var d_sale_cost = dataArray[2];
			var d_tax_rate = dataArray[3];
			var d_on_hand = dataArray[4];
			var d_product_id = dataArray[5];


			    var tax_id="1";
                var tax_rate=d_tax_rate;

                var total=getFloat(d_sale_cost);
                var net_vat=0;
                var vat_input=0;


                    net_vat=total/(1+(getFloat(tax_rate)/100));
                    vat_input=total-net_vat;
			//Use dataArray here
					$('#tbl_items > tbody').prepend(newRowItem({
                    po_qty : "1",
                    product_code : d_product_code,
                    product_id: d_product_id,
                    product_desc : d_product_desc,
					po_line_total_discount : "0.00",
                    tax_exempt : false,
                    po_tax_rate : d_tax_rate,
                    po_price : d_sale_cost,
                    po_discount : "0.00",
                    tax_type_id : null,
                    po_line_total : total,
                    po_non_tax_amount: net_vat,
                    po_tax_amount:vat_input,
                }));
			     reInitializeNumeric();
				reComputeTotal();
				reComputeChange();
				countCart();
        });

	//add customer then close modal
    $('#tbl_customers tbody').on( 'click', 'button[name="add_customer"]', function () {
			var tds = $(this).closest('tr').children('td');
			var dataArray =[];
			for(i=1;i < tds.length;i++)
				dataArray.push($(tds[i]).html());

		var customername=dataArray[4];
		$("select").val(customername).trigger("change");

				$('#modal_customers_list').modal('hide');


    } );



   function format ( d ) {
        return '<br /><table style="margin-left:10%;width: 80%;">' +
        '<thead>' +
        '</thead>' +
        '<tbody>' +
        '<tr>' +
        '<td width="20%">Product Code : </td><td width="50%"><b>'+ d.product_code+'</b></td>' +
        '</tr>' +
        '<tr>' +
        '<td>Product Description 1 : </td><td>'+ d.product_desc+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Inventory Type : </td><td>'+ d.inventory_type+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Category : </td><td>'+ d.category_name+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Brand : </td><td>'+ d.brand_name+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Unit : </td><td>'+ d.unit_name+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Vendor : </td><td>'+ d.vendor_name+'</td>' +
        '</tr>' +
		'<tr>' +
        '<td>SRP : </td><td>'+ d.sale_cost+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Purchase Cost : </td><td>'+ d.purchase_cost+'</td>' +
        '</tr>' +
		'<tr>' +
        '<td>Tax Rate : </td><td>'+ d.tax_rate+'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Markup Percent : </td><td>'+ d.markup_percent+'</td>' +
        '</tr>' +
        '</tbody></table><br />';
    };


   function format_customer ( d ) {
        return '<br /><table style="margin-left:10%;width: 80%;">' +
        '<thead>' +
        '</thead>' +
        '<tbody>' +
                    '<tr>' +
                    '<td width="20%">Name : </td><td width="50%"><b>'+ d.customer_name+'</b></td>' +
                    '<td rowspan="5" valign="top"><div class="avatar">'+
                    '<img src="'+ d.photo_path+'" class="img-circle" style="margin-top:0px;height: 100px;width: 100px;">'+
                    '</div></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Address : </td><td><b>'+ d.address+'</b></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Email : </td><td>'+ d.email_address+'</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Mobile Nos. : </td><td>'+ d.mobile_no+'</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Landline. : </td><td>'+ d.landline+'</td>' +
                    '</tr>' +

        '</tbody></table><br />';
    };


});



</script>
<script>
	$(window).load(function(){
		$('#txtsearch').focus();
	});
	var txtfocus=function(){
		$('#txtsearch').focus();
	}

$('#modal_payment').on('hidden.bs.modal', function (e) {
 txtfocus();
})
	$('#modal_browse_products').on('hidden.bs.modal', function (e) {
 txtfocus();
})
	$('#modal_cart_empty').on('hidden.bs.modal', function (e) {
 txtfocus();
})

	$('.btncash').click(function() {
		$('.btncash').css('color','white');
	});

	$('#buttontransact').click(function() {
		$('#buttontransact').css('color','white');
	});

	$('#printreceipt').click(function() {
		$('#printreceipt').css('color','white');
	});

	$('#end_batch').click(function() {
		$('#end_batch').css('color','white');
	});

</script>

</body>

</html>