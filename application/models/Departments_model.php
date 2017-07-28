<?php

class Departments_model extends CORE_Model {
    protected  $table="departments";
    protected  $pk_id="department_id";

    function __construct() {
        parent::__construct();
    }

    function get_department_list($department_id=null) {
        $sql="  SELECT
                  a.*
                FROM
                  departments as a
                WHERE
                    a.is_deleted=FALSE AND a.is_active=TRUE
                ".($department_id==null?"":" AND a.department_id=$department_id")."
            ";
        return $this->db->query($sql)->result();
    }
}
?>