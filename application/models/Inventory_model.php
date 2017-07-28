<?php

class Inventory_model extends CORE_Model {
    protected  $table="inventory";
    protected  $pk_id="inventory_id";

    function __construct() {
        parent::__construct();
    }

    function get_inventory_list($inventory_id=null){
        $sql="  SELECT
                  a.*
                FROM
                  inventory as a
                WHERE
                    a.is_deleted=FALSE AND a.is_active=TRUE
                ".($inventory_id==null?"":" AND a.inventory_id=$inventory_id")."
            ";
        return $this->db->query($sql)->result();
    }

    function get_inventory_onhand_list_filter($inventoryfromdate,$inventorytodate){
        $sql="SELECT products.product_id,product_desc,product_code,products.sale_cost,tax_rate,products.product_id,
              ( (COALESCE(dii.totalreceive,0)+COALESCE(sda.total_added_stock,0))-(COALESCE(pii.totalsales,0)+COALESCE(sdd.total_deducted_stock,0)+COALESCE(ii.total_issued_qty,0)) )
              as stock_onhand,(COALESCE(dii.totalreceive,0)+COALESCE(sda.total_added_stock,0)) as total_in,COALESCE(pii.totalsales,0)+COALESCE(sdd.total_deducted_stock,0)+COALESCE(ii.total_issued_qty,0) as total_out FROM products
              LEFT JOIN
              (
              SELECT SUM(dr_qty) as totalreceive,product_id FROM delivery_invoice_items
              LEFT JOIN delivery_invoice ON
              delivery_invoice_items.dr_invoice_id=delivery_invoice.dr_invoice_id
              WHERE date_received BETWEEN '".$inventoryfromdate."' AND '".$inventorytodate."'
              GROUP BY product_id
              ) as dii
              ON products.product_id=dii.product_id
              LEFT JOIN
              (
              SELECT SUM(pos_qty) as totalsales,product_id FROM pos_invoice_items
              LEFT JOIN pos_invoice ON
              pos_invoice_items.pos_invoice_id=pos_invoice.pos_invoice_id
              WHERE transaction_date BETWEEN '".$inventoryfromdate."' AND '".$inventorytodate."'
              GROUP BY product_id
              ) as pii
              ON products.product_id=pii.product_id
              LEFT JOIN
              (
              SELECT date_adjusted,SUM(added_stock) as total_added_stock,SUM(minus_stock) as total_deducted_stock,product_id FROM stock_details
              WHERE date_adjusted BETWEEN '".$inventoryfromdate."' AND '".$inventorytodate."'
              GROUP BY product_id
              ) as sda
              ON products.product_id=sda.product_id
              LEFT JOIN
              (
              SELECT SUM(minus_stock) as total_deducted_stock,product_id FROM stock_details
              WHERE date_adjusted BETWEEN '".$inventoryfromdate."' AND '".$inventorytodate."'
              GROUP BY product_id
              ) as sdd
              ON products.product_id=sdd.product_id
              LEFT JOIN
              (
              SELECT SUM(is_qty) as total_issued_qty,product_id FROM issuance_items
              LEFT JOIN issuance ON
              issuance_items.issuance_id=issuance.issuance_id
              WHERE date_issued BETWEEN '".$inventoryfromdate."' AND '".$inventorytodate."'
              GROUP BY product_id
              ) as ii
              ON products.product_id=ii.product_id WHERE products.is_deleted=0
              ";
        return $this->db->query($sql)->result();
    }

    function get_inventory_onhand_list(){
        $sql="SELECT products.product_id,product_desc,product_code,products.sale_cost,tax_rate,products.product_id,
              ( (COALESCE(dii.totalreceive,0)+COALESCE(sda.total_added_stock,0))-(COALESCE(pii.totalsales,0)+COALESCE(sdd.total_deducted_stock,0)+COALESCE(ii.total_issued_qty,0)) )
              as stock_onhand,(COALESCE(dii.totalreceive,0)+COALESCE(sda.total_added_stock,0)) as total_in,COALESCE(pii.totalsales,0)+COALESCE(sdd.total_deducted_stock,0)+COALESCE(ii.total_issued_qty,0) as total_out FROM products
              LEFT JOIN
              (
              SELECT SUM(dr_qty) as totalreceive,product_id FROM delivery_invoice_items
              LEFT JOIN delivery_invoice ON
              delivery_invoice_items.dr_invoice_id=delivery_invoice.dr_invoice_id
              GROUP BY product_id
              ) as dii
              ON products.product_id=dii.product_id
              LEFT JOIN
              (
              SELECT SUM(pos_qty) as totalsales,product_id FROM pos_invoice_items
              LEFT JOIN pos_invoice ON
              pos_invoice_items.pos_invoice_id=pos_invoice.pos_invoice_id
              GROUP BY product_id
              ) as pii
              ON products.product_id=pii.product_id
              LEFT JOIN
              (
              SELECT date_adjusted,SUM(added_stock) as total_added_stock,SUM(minus_stock) as total_deducted_stock,product_id FROM stock_details
              GROUP BY product_id
              ) as sda
              ON products.product_id=sda.product_id
              LEFT JOIN
              (
              SELECT SUM(minus_stock) as total_deducted_stock,product_id FROM stock_details
              GROUP BY product_id
              ) as sdd
              ON products.product_id=sdd.product_id
              LEFT JOIN
              (
              SELECT SUM(is_qty) as total_issued_qty,product_id FROM issuance_items
              GROUP BY product_id
              ) as ii
              ON products.product_id=ii.product_id WHERE products.is_deleted=0
              ";
        return $this->db->query($sql)->result();
    }
}
?>