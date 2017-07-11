<?php

class Documents_model extends CORE_Model {
    protected  $table="document_types";
    protected  $pk_id="document_type_id";

    function __construct() {
        parent::__construct();
    }

    function get_documents_list($document_type_id=null){
        $sql="  SELECT
                  d.*,
                  dc.document_category_id,
                  dc.document_category
                FROM
                  document_types as d
                  LEFT JOIN document_category as dc ON dc.document_category_id=d.document_category_id 
                  AND dc.is_deleted=FALSE AND dc.is_active=TRUE
                WHERE
                    d.is_deleted=FALSE AND d.is_active=TRUE 
                ".($document_type_id==null?"":" AND d.document_type_id=$document_type_id")."
            ";
        return $this->db->query($sql)->result();
    }

    function create_default_documents() 
    {
      $sql="INSERT IGNORE INTO `document_types` (`document_type_id`, `document_type`, `document_category_id`, `document_type_description`) 
              VALUES 
              (1,'Certificate of Registration (2303)', 1, ''),
              (2,'DTI Certificate', 1,''),
              (3,'SEC Certificate with GIS', 1, ''),
              (4,'Articles of Partnership & By Laws', 1,''),
              (5,'Articles of Incorporation and By Laws', 1, ''),
              (6,'Barangay Clearance', 1,''),
              (7,'Mayors Permit', 1, ''),
              (8,'Lease of Contract / Land Title', 1,''),
              (9,'SSS, PHIC & HDMF Registration ', 2, ''),
              (10,'CTC', 2,''),
              (11,'Government ID of Owner/Signatory/OIC (At least 2)', 2, ''),
              (12,'Latest Income Tax Return', 3, ''),
              (13,'Percentage Tax', 3, ''),
              (14,'VAT Return', 3, ''),
              (15,'Expanded WT', 3, ''),
              (16,'WT on Compensation', 3, '')
            ";


          $this->db->query($sql);
    }
}
?>