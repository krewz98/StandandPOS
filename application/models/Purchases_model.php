<?php

class Purchases_model extends CORE_Model {
    protected  $table="purchase_order";
    protected  $pk_id="purchase_order_id";

    function __construct() {
        parent::__construct();
    }
	
function get_purchases_list($purchase_order_id=null){
        $sql="  SELECT
                  a.*
                FROM
                  purchase_order as a
                WHERE
                    a.is_deleted=FALSE AND a.is_active=TRUE
                ".($purchase_order_id==null?"":" AND a.purchase_order_id=$purchase_order_id")."
            ";
        return $this->db->query($sql)->result();
    }

    
}


?>