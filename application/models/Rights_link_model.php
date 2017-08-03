<?php

class Rights_link_model extends CORE_Model{

    protected  $table="rights_links"; //table name
    protected  $pk_id="link_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function create_default_link_list(){
        $sql="INSERT IGNORE INTO `rights_links` (`link_id`, `parent_code`, `link_code`, `add_code`,`view_code`,`edit_code`,`delete_code`, `link_name`) VALUES
                                          (1,'1','1-1','1-1-a','1-1-v','1-1-e','1-1-d','Documents Management'),
                                          (2,'2','2-1','2-1-a','2-1-v','2-1-e','2-1-d','Customers Management'),
                                          (3,'3','3-1','3-1-a','3-1-v','3-1-e','3-1-d','Setup Tax'),
                                          (4,'3','3-2','3-2-a','3-2-v','3-2-e','3-2-d','Setup User Rights'),
                                          (5,'3','3-3','3-3-a','3-3-v','3-3-e','3-3-d','Create User Account'),
                                          (6,'3','3-4','3-4-a','3-4-v','3-4-e','3-4-d','Setup Company Info'),
                                          (7,'1','1-2','1-2-a','1-2-v','1-2-e','1-2-d','Service Types'),
                                          (8,'4','4-1','4-1-a','4-1-v','4-1-e','4-1-d','Service Invoice'),
                                          (9,'4','4-2','4-2-a','4-2-v','4-2-e','4-2-d','Process Accomplishments'),
                                          (10,'4','4-3','4-3-a','4-3-v','4-3-e','4-3-d','Payments'),
                                          (11,'3','3-5','3-5-a','3-5-v','3-5-e','3-5-d','Charges'),
                                          (12,'1','1-3','1-3-a','1-3-v','1-3-e','1-3-d','Services Category Management'),
                                          (13,'2','2-2','2-2-a','2-2-v','2-2-e','2-2-d','Contract Management'),
                                          (14,'5','5-1','5-1-a','5-1-v','5-1-e','5-1-d','Clients Ledger'),
                                          (15,'3','3-6','3-6-a','3-6-v','3-6-e','3-6-d','Database Backup'),
                                          (16,'5','5-2','5-2-a','5-2-v','5-2-e','5-2-d','Collection Report'),
                                          (17,'3','3-7','3-7-a','3-7-v','3-7-e','3-7-d','Chart of Accounts'),
                                          (18,'1','1-4','1-4-a','1-4-v','1-4-e','1-4-d','Account classes Management'),
                                          (19,'6','6-1','6-1-a','6-1-v','6-1-e','6-1-d','General Journal'),
                                          (20,'6','6-2','6-2-a','6-2-v','6-2-e','6-2-d','Cash Disbursement'),
                                          (21,'2','2-3','2-3-a','2-3-v','2-3-e','2-3-d','Suppliers Management'),
                                          (22,'1','1-5','1-5-a','1-5-v','1-5-e','1-5-d','Document Category Management'),
                                          (23,'1','1-6','1-6-a','1-6-v','1-6-e','1-6-d','Business Style Management'),
                                          (24,'1','1-7','1-7-a','1-7-v','1-7-e','1-7-d','Engagement Details Management'),
                                          (25,'4','4-4','4-4-a','4-4-v','4-4-e','4-4-d','Advance Payments'),
                                          (26,'5','5-3','5-3-a','5-3-v','5-3-e','5-3-d','Collection Notice'),
                                          (27,'5','5-4','5-4-a','5-4-v','5-4-e','5-4-d','Client Payment Summary'),
                                          (28,'5','5-5','5-5-a','5-5-v','5-5-e','5-5-d','Statement of Account Monitoring')

                                          ON DUPLICATE KEY UPDATE
                                          rights_links.parent_code=VALUES(rights_links.parent_code),
                                          rights_links.link_code=VALUES(rights_links.link_code),
                                          rights_links.link_name=VALUES(rights_links.link_name)
 
            ";


        $this->db->query($sql);
    }



}




?>