<?php

class Vendors_model extends CORE_Model {
    protected  $table="vendors";
    protected  $pk_id="vendor_id";

    function __construct() {
        parent::__construct();
    }

    function get_vendor_list($vendor_id=null){
        $sql="  SELECT
                  a.*
                FROM
                  vendors as a
                WHERE
                    a.is_deleted=FALSE AND a.is_active=TRUE
                ".($vendor_id==null?"":" AND a.vendor_id=$vendor_id")."
            ";
        return $this->db->query($sql)->result();
    }
}
?>