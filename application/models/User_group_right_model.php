<?php

class User_group_right_model extends CORE_Model{

    protected  $table="user_group_rights"; //table name
    protected  $pk_id="user_rights_id"; //primary key id
    protected  $fk_id="user_group_id"; //primary key id


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function get_user_group_rights($user_group_id){
        $sql="SELECT rl.link_code,rl.link_name,rl.add_code,rl.access_code,rl.edit_code,rl.delete_code,
            IF(ISNULL(ugr.link_code),0,1)as is_allowed

            FROM rights_links as rl

            LEFT JOIN

            (SELECT x.link_code FROM user_group_rights as x WHERE x.user_group_id=$user_group_id)as ugr


            ON rl.link_code=ugr.link_code";
        return $this->db->query($sql)->result();
    }

        function get_user_group_references($user_group_id){
        $sql="SELECT rl.link_code,rl.link_name,rl.access_code,rl.add_code,rl.access_code,rl.edit_code,rl.delete_code,
            IF(ISNULL(ugr.link_code),0,1)as is_allowed,
            IF(ISNULL(ugr.access_code),0,1)as access_is_allowed,
            IF(ISNULL(ugr.add_code),0,1)as add_is_allowed,
            IF(ISNULL(ugr.edit_code),0,1)as edit_is_allowed,
            IF(ISNULL(ugr.delete_code),0,1)as delete_is_allowed

            FROM rights_links as rl

            LEFT JOIN

            (SELECT x.link_code,x.access_code,x.add_code,x.edit_code,x.delete_code FROM user_group_rights as x WHERE x.user_group_id=$user_group_id)as ugr


            ON rl.link_code=ugr.link_code
   
            
            ORDER BY rl.link_code ASC";
        return $this->db->query($sql)->result();
    }

    function get_user_group_report($user_group_id){
        $sql="SELECT rl.link_code,rl.link_name,rl.access_code,rl.add_code,rl.access_code,rl.edit_code,rl.delete_code,
            IF(ISNULL(ugr.link_code),0,1)as is_allowed,
            IF(ISNULL(ugr.access_code),0,1)as access_is_allowed,
            IF(ISNULL(ugr.add_code),0,1)as add_is_allowed,
            IF(ISNULL(ugr.edit_code),0,1)as edit_is_allowed,
            IF(ISNULL(ugr.delete_code),0,1)as delete_is_allowed

            FROM rights_links as rl

            LEFT JOIN

            (SELECT x.link_code,x.access_code,x.add_code,x.edit_code,x.delete_code FROM user_group_rights as x WHERE x.user_group_id=$user_group_id)as ugr


            ON rl.link_code=ugr.link_code
            WHERE rl.link_code LIKE '5-%'
            
            ORDER BY rl.link_code ASC";
        return $this->db->query($sql)->result();
    }




}




?>