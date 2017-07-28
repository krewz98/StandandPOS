<company style="font-weight:bold;font-size:15pt;"><?php echo $company_info->company_name;?> </company>
<address style="font-weight:bold;font-size:12pt;margin:0;"><?php echo $company_info->company_address;?> </address>
<br>
<table class="table table-responsive">
  <thead>
    <tr>
      <th>Item Description</th>
      <th>Item Code</th>
      <th>In</th>
      <th>Out</th>
      <th>Balance</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($inventory as $items){
      ?>
      <tr>
        <td><?php echo $items->product_desc; ?></td>
        <td><?php echo $items->product_code; ?></td>
        <td><?php echo $items->total_in; ?></td>
        <td><?php echo $items->total_out; ?></td>
        <td><?php echo $items->stock_onhand; ?></td>
      </tr>
    <?php
      }
     ?>
  </tbody>
</table>

<style>
    table {
      padding: 5px !important;
    }

    th {
      padding-top: 6px !important;
      padding-bottom: 6px !important;
      padding-left: 6px !important;
      font-size: 14px;
    }

    tr {
      padding: 6px !important;
    }

    td {
      padding-top: 6px !important;
      padding-bottom: 6px !important;
      padding-left: 6px !important;
      font-size: 14px;
    }
</style>
