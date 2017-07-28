<?php

class Customers_model extends CORE_Model{

    protected  $table="customers"; //table name
    protected  $pk_id="customer_id"; //primary key id



    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_customer_list($customer_id=null){
        $sql="  SELECT
                  a.*,b.photo_path
                FROM
                  customers as a
                LEFT JOIN
                    customer_photos as b
                ON
                  a.customer_id=b.customer_id
                WHERE
                    a.is_deleted=FALSE AND a.is_active=TRUE
                ".($customer_id==null?"":" AND a.customer_id=$customer_id")."
            ";
        return $this->db->query($sql)->result();
    }




}




?>