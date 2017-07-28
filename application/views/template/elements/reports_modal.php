<modalsalesreports>
<div class="modal fade" id="modal_sales_reports" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <a type="button" href="Dashboard" class="close" >&times;</a>
          <h4 class="modal-title">Sales Reports</h4>
        </div>
        <div class="modal-body">
		<form action="Templates/layout/dailyreports/0/preview" method="post" target="_blank">
		<div class="col-md-12">
		<div class="row">
						 <center><h4>From:</h4></center>
		         <div class="input-group">

                        <span class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" id="fromdate" name="fromdate" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Due Date" data-error-msg="Due Date is required!" required>
        </div><br>
		 <center><h4>Until:</h4></center>
         <div class="input-group">
                        <span class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" id="tilldate" name="tilldate" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Due Date" data-error-msg="Due Date is required!" required>
        </div>
		</div>
		</div>
		 <button type="submit" style="margin-top:50px;background-color:#2ecc71 !important;color:white;padding:20px !important;width:100%;" href="Dashboard" class="btn btn-default">Preview Report</button>
			</form>
			<form action="Templates/layout/dailyreports/0/pdf" method="post" target="_blank">
			<input type="text" style="display:none;" id="fromdatepdf" name="fromdatepdf" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Due Date" data-error-msg="Due Date is required!" required>
			<input type="text" style="display:none;" id="tilldatepdf" name="tilldatepdf" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Due Date" data-error-msg="Due Date is required!" required>
		  <button type="submit" style="margin-top:50px;background-color:#2ecc71 !important;color:white;padding:20px !important;width:100%;" href="Dashboard" class="btn btn-default">Dowload Report as PDF</button>
		  </form>
        </div>
		
        <div class="modal-footer">
          <a type="button" href="Dashboard" class="btn btn-default" >Back to Dashboard</a>
        </div>
      </div>
      
    </div>
</div>

</modalsalesreports>

<modalinventoryreports>
<div class="modal fade" id="modal_inventory_reports" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <a type="button" href="Dashboard" class="close" >&times;</a>
          <h4 class="modal-title">Inventory Reports</h4>
        </div>
        <div class="modal-body">
		<form action="Templates/layout/inventoryreports/0/preview" method="post" target="_blank">
		<div class="col-md-12">
		<div class="row">
						 <center><h4>From:</h4></center>
		         <div class="input-group">

                        <span class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" id="fromdate" name="fromdateinventory" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Due Date" data-error-msg="Due Date is required!" required>
        </div><br>
		 <center><h4>Until:</h4></center>
         <div class="input-group">
                        <span class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" id="tilldate"  name="tilldateinventory" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Due Date" data-error-msg="Due Date is required!" required>
        </div>
		</div>
		</div>
		 <button type="submit" style="margin-top:50px;background-color:#2ecc71 !important;color:white;padding:20px !important;width:100%;" href="Dashboard" class="btn btn-default">Generate Reports</button>
		</button>
		</form>
		<form action="Templates/layout/inventoryreports/0/pdf" method="post" target="_blank">
			<input type="text" style="display:none;" id="fromdatepdf" name="fromdatepdf" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Due Date" data-error-msg="Due Date is required!" required>
			<input type="text" style="display:none;" id="tilldatepdf" name="tilldatepdf" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Due Date" data-error-msg="Due Date is required!" required>
		  <button type="submit" style="margin-top:50px;background-color:#2ecc71 !important;color:white;padding:20px !important;width:100%;" href="Dashboard" class="btn btn-default">Dowload Report as PDF</button>
		  </form>
		</div>
        <div class="modal-footer">
          <a type="button" href="Dashboard" class="btn btn-default" >Back to Dashboard</a>
        </div>
      </div>
      
    </div>
</div>
</modalinventoryreports>