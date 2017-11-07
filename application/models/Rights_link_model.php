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
        $sql="INSERT IGNORE INTO `rights_links` (`link_id`, `parent_code`, `link_code`, `add_code`,`access_code`,`edit_code`,`delete_code`, `link_name`) VALUES
                                          (1,'1','1-1','1-1-a','1-1','1-1-e','1-1-d','Documents Management'),
                                          (2,'2','2-1','2-1-a','2-1','2-1-e','2-1-d','Customers Management'),
                                          (3,'3','3-1','3-1-a','3-1','3-1-e','3-1-d','Setup Tax'),
                                          (4,'3','3-2','3-2-a','3-2','3-2-e','3-2-d','Setup User Rights'),
                                          (5,'3','3-3','3-3-a','3-3','3-3-e','3-3-d','Create User Account'),
                                          (6,'3','3-4',null,'3-4',null,null,'Setup Company Info'),
                                          (7,'1','1-2','1-2-a','1-2','1-2-e','1-2-d','Service Types'),
                                          (8,'4','4-1','4-1-a','4-1','4-1-e',null,'Service Invoice (Processing)'),
                                          (9,'4','4-2','4-2-a','4-2',null,null,'Process Accomplishments'),
                                          (10,'4','4-3','4-3-a','4-3','4-3-e','4-3-d','Payments'),
                                          (11,'3','3-5','3-5-a','3-5','3-5-e','3-5-d','Charges'),
                                          (12,'1','1-3','1-3-a','1-3','1-3-e','1-3-d','Services Category Management'),
                                          (13,'2','2-2','2-2-a','2-2','2-2-e','2-2-d','Contract Management'),
                                          (14,'5','5-1',null,'5-1',null,null,'Clients Ledger (Print)'),
                                          (15,'3','3-6',null,'3-6',null,null,'Database Backup (Backup)'),
                                          (16,'5','5-2',null,'5-2',null,null,'Collection Report (Print)'),
                                          (17,'1','1-5','1-5-a','1-5','1-5-e','1-5-d','Document Category Management'),
                                          (18,'1','1-6','1-6-a','1-6','1-6-e','1-6-d','Business Style Management'),
                                          (19,'4','4-4','4-4-a','4-4',null,'4-4-d','Advance Payments'),
                                          (20,'5','5-3',null,'5-3',null,null,'Collection Notice (Print)'),
                                          (21,'5','5-4',null,'5-4',null,null,'Client Payment Summary (Print)'),
                                          (22,'5','5-5',null,'5-5',null,null,'Statement of Account Monitoring (Print)')

                                          ON DUPLICATE KEY UPDATE
                                          rights_links.parent_code=VALUES(rights_links.parent_code),
                                          rights_links.link_code=VALUES(rights_links.link_code),
                                          rights_links.access_code=VALUES(rights_links.access_code),
                                          rights_links.add_code=VALUES(rights_links.add_code),
                                          rights_links.edit_code=VALUES(rights_links.edit_code),
                                          rights_links.delete_code=VALUES(rights_links.delete_code),
                                          rights_links.link_name=VALUES(rights_links.link_name)
 
            ";


        $this->db->query($sql);
    }



}




?>