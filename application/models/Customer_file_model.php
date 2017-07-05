<?php
    class Customer_file_model extends CORE_model {
        protected $table="customers_files";
        protected $pk_id="customer_file_id";
        protected $fk_id="contract_id";

        function __construct()
        {
            parent::__construct();
        }

        function get_customer_doc_count($contract_id,$document_type_id=null){
            $sql="SELECT dt.*,
                  IFNULL(dc.documents_count,0)as documents_count,
                  IF(ISNULL(cdt.document_type_id),0,1)as doc_type_stat

                FROM document_types as dt


                LEFT JOIN

                (
                SELECT cdt.document_type_id,cdt.contract_id FROM customers_doc_types as cdt
                WHERE cdt.`contract_id`=$contract_id
                )as cdt ON cdt.document_type_id=dt.document_type_id

                LEFT JOIN

                (
                SELECT cf.document_type_id,COUNT(cf.document_type_id) as documents_count

                FROM customers_files as cf
                WHERE cf.contract_id=$contract_id AND cf.is_deleted=0

                GROUP BY cf.document_type_id

                ) as dc ON dc.document_type_id=dt.document_type_id
                WHERE dt.is_deleted=FALSE AND dt.is_active=TRUE

                ".($document_type_id==null?"":" AND dt.document_type_id=$document_type_id")."

                ORDER BY dt.document_type";

            return $this->db->query($sql)->result();

        }


    }
?>