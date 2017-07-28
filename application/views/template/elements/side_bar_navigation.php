	<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">
		<style>
        .select2-container{
            min-width: 100%;
        }
		.highlight{
			border:1px solid black;
			color:black;
		}


		</style>
<?php
		$user_id=$this->session->user_id;
					$user = $this->db->query('SELECT user_accounts.user_group_id FROM user_accounts
							 WHERE user_id='.$user_id);
		$user_group = $user->row(0);
		$user_group_id = $user_group->user_group_id;
			$query = $this->db->query('SELECT user_groups_permission.* FROM user_groups_permission
							 WHERE user_group_id='.$user_group_id);

			$category = $this->db->query('SELECT category_id,category_name FROM categories');
			$products = $this->db->query('SELECT product_id,product_desc FROM products');


		?>


<div class="static-sidebar-wrapper sidebar-default">
    <div class="static-sidebar">
        <div class="sidebar">
            <div class="widget">
                <div class="widget-body">
                    <div class="userinfo">
                        <div class="avatar">
                            <img src="<?php echo $this->session->user_photo; ?>" class="img-responsive img-circle">
                        </div>
                        <div class="info">
                            <span class="username"><?php echo $this->session->user_fullname; ?></span>
                            <span class="useremail"><?php echo $this->session->user_email; ?></span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="widget stay-on-collapse" id="widget-sidebar">
                <nav role="navigation" class="widget-body">
                    <ul class="acc-menu">
                        <li class="nav-separator"><span>Explore</span></li>

                        <li><a href="Dashboard"><i class="ti ti-home"></i><span>Dashboard</span></a></li>
                        <!--<li><a href="#"><i class="ti ti-package"></i><span>Purchasing</span></a>
                            <ul class="acc-menu">
                                <li><a href="Purchases">Purchase Order</a></li>
                                <li><a href="Deliveries">Purchase Invoice</a></li>
                                <li><a href="#">Record Payment</a></li>
                                <li><a href="#">Item Issuance</a></li>
                                <li><a href="#">Item Adjustment</a></li>
                            </ul>
                        </li>-->
                        <li><a href="javascript:void();"><i class="fa fa-money" aria-hidden="true"></i><span>Purchasing</span></a>
                            <ul class="acc-menu">
                                <li><a href="Deliveries" class="receivingjs" id="receivingjs" >Receiving Stock</a>
                                </li>

                            </ul>
                        </li>
												<li><a href="javascript:void();"><i class="fa fa-money" aria-hidden="true"></i><span>Issuance</span></a>
                            <ul class="acc-menu">
                                <li><a href="Issuance" class="" id="" >Issuance</a>
                                </li>

                            </ul>
                        </li>
                        <li><a href="javascript:void();"><i class="ti ti-shopping-cart"></i><span>POS</span></a>
                            <ul class="acc-menu">
                                <li><a href="pos" class="posjs" id="posjs">Point of Sale</a>
                                </li>

                            </ul>
                        </li>
                        <li><a href="javascript:void();"><i class="fa fa-book" aria-hidden="true"></i><span>Journal</span></a>
                            <ul class="acc-menu">
                                <li><a href="Receipts" class="transactionsjs" id="transactionsjs">Transactions</a>
                                </li>
                                <li><a data-toggle="modal" class="sales_reportsjs" id="sales_reportsjs">Daily Sales Reports</a>
                                </li>
								<li><a data-toggle="modal" class="inventory_reportsjs" id="inventory_reportsjs">Inventory Reports</a>
                                </li>
																<!-- <li><a data-toggle="modal" class="stock_cardjs" id="stock_cardjs" >Stock Card</a>
                                </li> -->

                            </ul>
                        </li>
                        <li><a href="#"><i class="ti ti-view-list-alt"></i><span>References</span></a>
                            <ul class="acc-menu">
                                <li><a href="categories">Category Management</a></li>
                                <!-- <li><a href="departments">Department Management</a></li> -->
                                <li><a href="units">Unit Management</a></li>
                                <li><a href="brands">Brand Management</a></li>
                                <li><a href="discounts">Discount Management</a></li>
                                <li><a href="cards">Card Management</a></li>
                                <li><a href="generics">Generic Management</a></li>
                                <li><a href="giftcards">Gift Card Management</a></li>
                                <li><a href="locations">Location Management</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void();"><i class="ti ti-harddrive"></i><span>Masterfiles</span></a>
                            <ul class="acc-menu">
                                <li><a href="products" class="product_managementjs" id="product_managementjs">Product Management</a></li>
                                <li><a href="suppliers" class="supplier_managementjs" id="supplier_managementjs">Supplier Management</a></li>
                                <li><a href="customers" class="customer_managementjs" id="customer_managementjs">Customer Management</a></li>
                                <li><a href="stock" class="stock_managementjs" id="stock_managementjs">Stock Management</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void();"><i class="ti ti-settings"></i><span>Admin</span></a>
                            <ul class="acc-menu">
								<li><a href="xreading" class="xreading_reportjs" id="xreading_reportjs" >X-Reading</a></li>
								<li><a data-toggle="modal" class="zreading_reportjs" id="zreading_reportjs" data-target="#modal_zreading_reportsjs">Z-Reading</a>
                                </li>
                                <li><a href="users" class="user_accountjs" id="user_accountjs">User Account</a></li>
								<li><a href="rights" class="user_rightsjs" id="user_rightsjs">Setup User Group Rights</a></li>
                                <li><a href="company" class="company_infojs" id="company_infojs">Setup Company Info</a></li>
								<li><a href="notes" class="notesjs" id="notesjs" >Setup Notes</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

            <!--<div class="widget" id="widget-progress">
                <div class="widget-heading">
                    Progress
                </div>
                <div class="widget-body">

                    <div class="mini-progressbar">
                        <div class="clearfix mb-sm">
                            <div class="pull-left">Bandwidth</div>
                            <div class="pull-right">50%</div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar progress-bar-lime" style="width: 50%"></div>
                        </div>
                    </div>
                    <div class="mini-progressbar">
                        <div class="clearfix mb-sm">
                            <div class="pull-left">Storage</div>
                            <div class="pull-right">25%</div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar progress-bar-info" style="width: 25%"></div>
                        </div>
                    </div>

                </div>
            </div>-->
        </div>
    </div>
</div>
<modalsalesreports>
<div class="modal fade" id="modal_sales_reportsjs" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#2ecc71;">
          <a type="button" href="Dashboard" class="close" >&times;</a>
          <h4 class="modal-title bold" style="color:white;">Sales Reports</h4>
        </div>
        <div class="modal-body">
    		<div class="col-md-12">
    			<form id="frm_salesreports">
        			<div class="row">
        				<label class="col-sm-2" style="float:left;margin-top:5px;font-weight:bold;" for="inputEmail1">Filter Dates :</label>
    					<label class="col-sm-1" style="float:left;margin-top:5px;" for="inputEmail1">From :</label>
    					<div class="col-sm-3">
    							<input type="text" id="salesfromdate" name="salesfromdate" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="From">
    					</div>
    					<label class="col-sm-1" style="float:left;margin-top:5px;" for="inputEmail1">To :</label>
    					<div class="col-sm-3">
    							<input type="text" id="salestodate" name="salestodate" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="From">
    					</div>
        			</div>
    			</form>

    		</div>
    		<hr>
    		<sales class="preview_salesreports"></sales>
        </div>

        <div class="modal-footer">
					<button type="button" id="print_daily_report" class="btn btn-default">Print</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
      </div>

    </div>
</div>

</modalsalesreports>

<modalinventoryreports>
<div class="modal fade" id="modal_inventory_reportsjs" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color:#2ecc71;">
          <a type="button" href="Dashboard" class="close" >&times;</a>
          <h4 class="modal-title bold" style="color:white;">Inventory Reports</h4>
        </div>
	        <div class="modal-body">
						<div class="col-md-12">
							<form id="frm_inventoryreports">
							<div class="row">
								<label class="col-sm-2" style="float:left;margin-top:5px;font-weight:bold;" for="inputEmail1">Filter Dates :</label>
	                <label class="col-sm-1" style="float:left;margin-top:5px;" for="inputEmail1">From :</label>
	                <div class="col-sm-3">
	                    <input type="text" id="inventoryfromdate" name="inventoryfromdate" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="From">
	                </div>
									<label class="col-sm-1" style="float:left;margin-top:5px;" for="inputEmail1">To :</label>
	                <div class="col-sm-3">
	                    <input type="text" id="inventorytodate" name="inventorytodate" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="From">
	                </div>
	            </div>
							</form>
							<hr>
						</div>

						<inventory class="preview_inventoryreports"></inventory>
					</div>
        <div class="modal-footer">
					<button type="button" class="btn btn-default" id="print_inventory_report">Print</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
</div>
</modalinventoryreports>



<modalzreading>
<div class="modal fade" id="modal_zreading_reportsjs" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <a type="button" href="Dashboard" class="close" >&times;</a>
          <h4 class="modal-title">Z Reading</h4>
        </div>
        <div class="modal-body">
		<form action="Templates/layout/zreading/0/preview" method="post" target="_blank">

		 <button type="submit" style="margin-top:50px;background-color:#2ecc71 !important;color:white;padding:20px !important;width:100%;" href="Dashboard" class="btn btn-default">Generate Report</button>
		</button>
		</form>
		<form action="Templates/layout/zreading/0/pdf" method="post" target="_blank">
			<input type="text" style="display:none;" id="fromdatepdf" name="fromdatepdf" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Due Date" data-error-msg="Due Date is required!" required>
			<input type="text" style="display:none;" id="tilldatepdf" name="tilldatepdf" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Due Date" data-error-msg="Due Date is required!" required>
		  <button type="submit" style="margin-top:50px;background-color:#2ecc71 !important;color:white;padding:20px !important;width:100%;" href="Dashboard" class="btn btn-default">Dowload Report as PDF</button>
		  </form>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
</div>
</modalzreading>
<script src="assets/plugins/select2/select2.full.min.js"></script>
<script>
$(document).ready(function(){
			$("#inventory_reportsjs").click(function(){
        	getinventory();
					$('#modal_inventory_reportsjs').modal('toggle');
      });

			$('#inventoryfromdate').change(function() {
					getinventory();
      });

			$('#inventorytodate').change(function() {
					getinventory();
      });

			var getinventory=function(){
				var _data=$('#frm_inventoryreports').serializeArray();
				$.ajax({
		        "dataType":"html",
		        "type":"POST",
						"data":_data,
		        "url":"Templates/layout/inventoryreports/",
		        beforeSend : function(){
                    $('.preview_inventoryreports').html("<center><img src='assets/img/loader/preloaderimg.gif'><h3>Loading...</h3></center>");
                },
            }).done(function(response){
                $('.preview_inventoryreports').html(response);
            });
            //alert(_selectedID);

			}

			$("#sales_reportsjs").click(function(){
        	getsales();
					$('#modal_sales_reportsjs').modal('toggle');
      });

			$('#salesfromdate').change(function() {
					getsales();
      });

			$('#salestodate').change(function() {
					getsales();
      });

			var getsales=function(){
				var _data=$('#frm_salesreports').serializeArray();
				$.ajax({
		        "dataType":"html",
		        "type":"POST",
						"data":_data,
		        "url":"Templates/layout/dailyreports/",
		        beforeSend : function(){
                    $('.preview_salesreports').html("<center><img src='assets/img/loader/preloaderimg.gif'><h3>Loading...</h3></center>");
                },
            }).done(function(response){
                $('.preview_salesreports').html(response);
            });
            //alert(_selectedID);

			}

			$("#stock_cardjs").click(function(){
					$('#modal_stock_cardjs').modal('toggle');
      });

			$('#print_daily_report').click(function(event){
            /*printing_notif();*/
            var currentURL = window.location.href;
            var output = currentURL.match(/^(.*)\/[^/]*$/)[1];
            output = output+"/assets/css/css_special_files.css";
            $(".preview_salesreports").printThis({
                debug: false,
                importCSS: true,
                importStyle: false,
                printContainer: false,
                loadCSS: output,
                formValues:false
            });

    });

		$('#print_inventory_report').click(function(event){
					/*printing_notif();*/
					var currentURL = window.location.href;
					var output = currentURL.match(/^(.*)\/[^/]*$/)[1];
					output = output+"/assets/css/css_special_files.css";
					$(".preview_inventoryreports").printThis({
							debug: false,
							importCSS: true,
							importStyle: false,
							printContainer: false,
							loadCSS: output,
							formValues:false
					});

	});

});

</script>
<?php
foreach ($query->result() as $row)
{
       if($row->receiving_stock!="enabled"){
		   echo "<script>
					$('a.receivingjs').attr('href', '#');
					document.getElementById('receivingjs').style.color = 'black';
				</script>";
	   }
       if($row->transactions!="enabled"){
		   echo "<script>
					$('a.transactionsjs').attr('href', '#');
					document.getElementById('transactionsjs').style.color = 'black';
				</script>";
	   }
       if($row->point_of_sale!="enabled"){
		   echo "<script>
					$('a.posjs').attr('href', '#');
					document.getElementById('posjs').style.color = 'black';
				</script>";
	   }
       if($row->transactions!="enabled"){
		   echo "<script>
					$('a.transactionsjs').attr('href', '#');
					document.getElementById('transactionsjs').style.color = 'black';
				</script>";
	   }
       if($row->sales_reports!="enabled"){
		   echo "<script>
					$('a.sales_reportsjs').attr('data-target', '#');
					document.getElementById('sales_reportsjs').style.color = 'black';
				</script>";
	   }
	   if($row->inventory_reports!="enabled"){
		   echo "<script>
					$('a.inventory_reportsjs').attr('data-target', '#');
					document.getElementById('inventory_reportsjs').style.color = 'black';
				</script>";
	   }
	   if($row->product_management!="enabled"){
		   echo "<script>
					$('a.product_managementjs').attr('href', '#');
					document.getElementById('product_managementjs').style.color = 'black';
				</script>";
	   }
	   if($row->supplier_management!="enabled"){
		   echo "<script>
					$('a.supplier_managementjs').attr('href', '#');
					document.getElementById('supplier_managementjs').style.color = 'black';
				</script>";
	   }
	   if($row->customer_management!="enabled"){
		   echo "<script>
					$('a.customer_managementjs').attr('href', '#');
						document.getElementById('customer_managementjs').style.color = 'black';
				</script>";
	   }
	   if($row->xreading!="enabled"){
		   echo "<script>
					$('a.xreading_reportjs').attr('href', '#');
					document.getElementById('xreading_reportjs').style.color = 'black';
				</script>";
	   }
	   if($row->zreading!="enabled"){
		   echo "<script>
					$('a.zreading_reportjs').attr('data-target', '#');
					document.getElementById('zreading_reportjs').style.color = 'black';
				</script>";
	   }
	   if($row->user_account!="enabled"){
		   echo "<script>
					$('a.user_accountjs').attr('href', '#');
					document.getElementById('user_accountjs').style.color = 'black';
				</script>";
	   }
	   if($row->user_rights!="enabled"){
		   echo "<script>
					$('a.user_rightsjs').attr('href', '#');
					document.getElementById('user_rightsjs').style.color = 'black';
				</script>";
	   }
	   if($row->company_info!="enabled"){
		   echo "<script>
					$('a.company_infojs').attr('href', '#');
					document.getElementById('company_infojs').style.color = 'black';
				</script>";
	   }
	   if($row->notes!="enabled"){
		   echo "<script>
					$('a.notesjs').attr('href', '#');
					document.getElementById('notesjs').style.color = 'black';
				</script>";
	   }


}
?>
