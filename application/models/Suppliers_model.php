<?php

class Suppliers_model extends CORE_Model {
    protected  $table="suppliers";
    protected  $pk_id="supplier_id";

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_supplier_list($supplier_id=null) {
        $sql="  SELECT
                  a.*,b.photo_path
                FROM
                  suppliers as a
                LEFT JOIN
                    supplier_photos as b
                ON
                  a.supplier_id=b.supplier_id
                WHERE
                    a.is_deleted=FALSE AND a.is_active=TRUE
                ".($supplier_id==null?"":" AND a.supplier_id=$supplier_id")."
            ";
        return $this->db->query($sql)->result();
    }
}
?>