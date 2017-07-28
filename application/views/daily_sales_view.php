<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from avenxo.kaijuthemes.com/ui-typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:09:25 GMT -->
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
    <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">

    <!--/twitter typehead-->
    <link href="assets/plugins/twittertypehead/twitter.typehead.css" rel="stylesheet">


    <!-- Datepicker --->
    <link href="assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">






    <style>
	.datepicker{z-index:9999 !important}
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

        .dropdown-menu > .active > a,.dropdown-menu > .active > a:hover{
            background-color: dodgerblue;
        }

        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }

        .custom_frame{

            border: 1px solid lightgray;
            margin: 1% 1% 1% 1%;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .numeric{
            text-align: right;
        }

        @media screen and (max-width: 1000px) {
            .custom_frame{
                padding-left:5%;

            }
        }

        @media screen and (max-width: 480px) {

            table{
                min-width: 700px;
            }




            .dataTables_filter{
                min-width: 700px;
            }

            .dataTables_info{
                min-width: 700px;
            }

            .dataTables_paginate{
                float: left;
                width: 100%;
            }
        }




    </style>
</head>

<body class="animated-content"  style="font-family: tahoma;" onload="loadmodal()">

<?php echo $_top_navigation; ?>

<div id="wrapper">
<div id="layout-static">


<?php echo $_side_bar_navigation;

?>


<div class="static-content-wrapper white-bg">

  <!-- Modal -->
<div class="modal fade" id="modal_inventory_reports" role="dialog">
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
                        <input type="text" name="fromdate" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Due Date" data-error-msg="Due Date is required!" required>
        </div><br>
		 <center><h4>Until:</h4></center>
         <div class="input-group">
                        <span class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" name="tilldate" class="date-picker form-control" value="<?php echo date("m/d/Y"); ?>" placeholder="Due Date" data-error-msg="Due Date is required!" required>
        </div>
		</div>
		</div>
		 <button type="submit" style="margin-top:50px;background-color:#2ecc71 !important;color:white;padding:20px !important;width:100%;" href="Dashboard" class="btn btn-default">Generate Reports</button>
        </div>
		</form>
        <div class="modal-footer">
          <a type="button" href="Dashboard" class="btn btn-default" >Back to Dashboard</a>
        </div>
      </div>
      
    </div>
</div>



</div>


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



<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/js/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>



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




$(document).ready(function(){



    var initializeControls=function(){



        var createToolBarButton=function(){
            var _btnNew='';

            $("div.toolbar").html(_btnNew);
        }();





        $('.date-picker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
			

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






    var bindEventHandlers=(function(){
        var detailRows = [];

        $('#tbl_transaction_receipt tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
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
                    "url":"Templates/layout/dailyreports/"+ d.pos_payment_id,
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



        $('#btn_new').click(function(){
            _txnMode="new";
            //$('.toggle-fullscreen').click();
            clearFields($('#frm_deliveries'));
            showList(false);
        });

        $('#btn_browse').click(function(event){
            event.preventDefault();
            $('input[name="file_upload[]"]').click();
        });


        $('#btn_receive_po').click(function(){
            $('#tbl_po_list tbody').html('<tr><td colspan="7"><center><br /><img src="assets/img/loader/ajax-loader-lg.gif" /><br /><br /></center></td></tr>');
            dt_po.ajax.reload( null, false );
            $('#modal_po_list').modal('show');
        });


        $('#btn_remove_photo').click(function(event){
            event.preventDefault();
            $('img[name="img_user"]').attr('src','assets/img/anonymous-icon.png');
        });








        $('#tbl_transaction_receipt tbody').on('click','button[name="remove_info"]',function(){
            _selectRowObj=$(this).closest('tr');
            var data=dt.row(_selectRowObj).data();
            _selectedID=data.dr_invoice_id;

            $('#modal_confirmation').modal('show');
        });






        $('#btn_yes').click(function(){
            removePurchaseInvoice().done(function(response){
                showNotification(response);
                dt.row(_selectRowObj).remove().draw();
            });
        });





        $('input[name="file_upload[]"]').change(function(event){
            var _files=event.target.files;

            $('#div_img_user').hide();
            $('#div_img_loader').show();


            var data=new FormData();
            $.each(_files,function(key,value){
                data.append(key,value);
            });

            //console.log(_files);

            $.ajax({
                url : 'Users/transaction/upload',
                type : "POST",
                data : data,
                cache : false,
                dataType : 'json',
                processData : false,
                contentType : false,
                success : function(response){
                    //console.log(response);
                    //alert(response.path);
                    $('#div_img_loader').hide();
                    $('#div_img_user').show();
                    $('img[name="img_user"]').attr('src',response.path);

                }
            });

        });

        $('#btn_cancel').click(function(){
            showList(true);
        });



        $('#btn_save').click(function(){

            if(validateRequiredFields($('#frm_deliveries'))){
                if(_txnMode=="new"){
                    createDeliverInvoice().done(function(response){
                        showNotification(response);
                        dt.row.add(response.row_added[0]).draw();
                        clearFields($('#frm_deliveries'));
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                }else{
                    updatePurchaseOrder().done(function(response){
                        showNotification(response);
                        dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                        clearFields($('#frm_deliveries'));
                        showList(true);
                    }).always(function(){
                        showSpinningProgress($('#btn_save'));
                    });
                }

            }

        });



        $('#tbl_items > tbody').on('click','button[name="remove_item"]',function(){
            $(this).closest('tr').remove();
            reComputeTotal();
        });


    })();


    var validateRequiredFields=function(f){
        var stat=true;

        $('div.form-group').removeClass('has-error');
        $('input[required],textarea[required],select[required]',f).each(function(){

            if($(this).is('select')){
                if($(this).select2('val')==0||$(this).select2('val')==null){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }
            }else{
                if($(this).val()==""){
                    showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                    $(this).closest('div.form-group').addClass('has-error');
                    $(this).focus();
                    stat=false;
                    return false;
                }
            }



        });

        return stat;
    };


    var createDeliverInvoice=function(){
        var _data=$('#frm_deliveries,#frm_items').serializeArray();

        var tbl_summary=$('#tbl_delivery_summary');
        _data.push({name : "summary_discount", value : tbl_summary.find(oTableDetails.discount).text()});
        _data.push({name : "summary_before_discount", value :tbl_summary.find(oTableDetails.before_tax).text()});
        _data.push({name : "summary_tax_amount", value : tbl_summary.find(oTableDetails.tax_amount).text()});
        _data.push({name : "summary_after_tax", value : tbl_summary.find(oTableDetails.after_tax).text()});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Deliveries/transaction/create",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var updatePurchaseOrder=function(){
        var _data=$('#frm_deliveries,#frm_items').serializeArray();

        var tbl_summary=$('#tbl_delivery_summary');
        _data.push({name : "summary_discount", value : tbl_summary.find(oTableDetails.discount).text()});
        _data.push({name : "summary_before_discount", value :tbl_summary.find(oTableDetails.before_tax).text()});
        _data.push({name : "summary_tax_amount", value : tbl_summary.find(oTableDetails.tax_amount).text()});
        _data.push({name : "summary_after_tax", value : tbl_summary.find(oTableDetails.after_tax).text()});
        _data.push({name : "dr_invoice_id" ,value : _selectedID});

        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Deliveries/transaction/update",
            "data":_data,
            "beforeSend": showSpinningProgress($('#btn_save'))
        });
    };

    var removePurchaseInvoice=function(){
        return $.ajax({
            "dataType":"json",
            "type":"POST",
            "url":"Deliveries/transaction/delete",
            "data":{dr_invoice_id : _selectedID}
        });
    };

    var showList=function(b){
        if(b){
            $('#div_user_list').show();
            $('#div_user_fields').hide();
        }else{
            $('#div_user_list').hide();
            $('#div_user_fields').show();
        }
    };

    var showNotification=function(obj){
        PNotify.removeAll(); //remove all notifications
        new PNotify({
            title:  obj.title,
            text:  obj.msg,
            type:  obj.stat
        });
    };



    var showSpinningProgress=function(e){
        $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
    };

    var clearFields=function(f){
        $('input:not(.date-picker),textarea',f).val('');
        $(f).find('input:first').focus();
        $('#tbl_items > tbody').html('');
    };


    function format ( d ) {

        //return


    };


    var getFloat=function(f){
        return parseFloat(accounting.unformat(f));
    };

    var newRowItem=function(d){


        return '<tr>'+
        '<td width="10%"><input name="dr_qty[]" type="text" class="numeric form-control" value="'+ d.dr_qty+'"></td>'+

        '<td width="30%">'+d.product_desc+'</td>'+
        '<td width="11%"><input name="dr_price[]" type="text" class="numeric form-control" value="'+accounting.formatNumber(d.dr_price,2)+'" style="text-align:right;"></td>'+
        '<td width="11%"><input name="dr_discount[]" type="text" class="numeric form-control" value="'+ accounting.formatNumber(d.dr_discount,2)+'" style="text-align:right;"></td>'+
        '<td style="display: none;" width="11%"><input name="dr_line_total_discount[]" type="text" class="numeric form-control" value="'+ accounting.formatNumber(d.dr_line_total_discount,2)+'" readonly></td>'+
        '<td width="11%"><input name="dr_tax_rate[]" type="text" class="numeric form-control" value="'+ accounting.formatNumber(d.dr_tax_rate,2)+'"></td>'+
        '<td width="11%" align="right"><input name="dr_line_total_price[]" type="text" class="numeric form-control" value="'+ accounting.formatNumber(d.dr_line_total_price,2)+'" readonly></td>'+
        '<td style="display: none;"><input name="dr_tax_amount[]" type="text" class="numeric form-control" value="'+ d.dr_tax_amount+'" readonly></td>'+
        '<td style="display: none;"><input name="dr_non_tax_amount[]" type="text" class="numeric form-control" value="'+ d.dr_non_tax_amount+'" readonly></td>'+
        '<td style="display: none;"><input name="product_id[]" type="text" class="numeric form-control" value="'+ d.product_id+'" readonly></td>'+
        '<td align="center"><button type="button" name="remove_item" class="btn btn-default"><i class="fa fa-trash"></i></button></td>'+
        '</tr>';
    };



    var reComputeTotal=function(){
        var rows=$('#tbl_items > tbody tr');
        var tbl_summary=$('#tbl_delivery_summary');

        var discounts=0; var before_tax=0; var after_tax=0; var tax_amount=0;

        $.each(rows,function(){
            discounts+=parseFloat(accounting.unformat($(oTableItems.total_line_discount,$(this)).find('input.numeric').val()));
            before_tax+=parseFloat(accounting.unformat($(oTableItems.net_vat,$(this)).find('input.numeric').val()));
            tax_amount+=parseFloat(accounting.unformat($(oTableItems.vat_input,$(this)).find('input.numeric').val()));
            after_tax+=parseFloat(accounting.unformat($(oTableItems.total,$(this)).find('input.numeric').val()));
        });

        tbl_summary.find(oTableDetails.discount).html(accounting.formatNumber(discounts,2));
        tbl_summary.find(oTableDetails.before_tax).html(accounting.formatNumber(before_tax,2));
        tbl_summary.find(oTableDetails.tax_amount).html(accounting.formatNumber(tax_amount,2));
        tbl_summary.find(oTableDetails.after_tax).html('<b>'+accounting.formatNumber(after_tax,2)+'</b>');

    };



    var reInitializeNumeric=function(){
        $('.numeric').autoNumeric('init');
    };



    var resetSummary=function(){
        var tbl_summary=$('#tbl_delivery_summary');
        tbl_summary.find(oTableDetails.discount).html('0.00');
        tbl_summary.find(oTableDetails.before_tax).html('0.00');
        tbl_summary.find(oTableDetails.tax_amount).html('0.00');
        tbl_summary.find(oTableDetails.after_tax).html('<b>0.00</b>');
    };




});




</script>

<script>
	$('#modal_inventory_reports').modal({
  backdrop: 'static',
  keyboard: false
})

</script>
</body>


</html>