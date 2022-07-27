<?php

class Database {

    protected $db;
    public $ERROR;
    public $Id;

    function __construct() {
        $this->db = new mysqli("localhost", "root", "", "itpfaisa_hotel");
    }

    public function VD($data) {
        return htmlentities(strip_tags(trim(mysqli_real_escape_string($this->db, $data))));
    }

    public function insert($table, $arr) {
        $sql = "";
        foreach ($arr as $key => $value) {
            if ($sql != "") {
                $sql .= ", ";
            }
            $sql .= "{$key}='{$value}'";
        }

        $sql = "insert into {$table} set " . $sql;
        //echo $sql;
        if ($this->db->query($sql)) {
            $this->Id = $this->db->insert_id;
            return TRUE;
        } else {
            $this->ERROR = $this->db->error;
            return FALSE;
        }
    }

    public function update($table, $arr, $where) {
        $sql = "";
        foreach ($arr as $key => $value) {
            if ($sql != "") {
                $sql .= ", ";
            }
            $sql .= "{$key}='{$value}'";
        }

        $sql = "update {$table} set " . $sql;

        $temp = "";
        if ($where) {
            foreach ($where as $key => $value) {
                if ($temp != "") {
                    $temp .= " and ";
                }
                $temp .= "{$key}='{$value}'";
            }
            $sql .= " where $temp";
        }

        // echo $sql;
        return $this->db->query($sql);
    }

    public function view($table, $order = NULL, $where = NULL, $select = NULL, $rel = NULL) {
        $select = ($select == NULL) ? "*" : $select;
        $sql = "SELECT $select FROM $table";

        $temp1 = "";
        if ($rel) {
            foreach ($rel as $key => $value) {
                if ($temp1 != "") {
                    $temp1 .= " and ";
                }
                $temp1 .= "{$key}={$value}";
            }
        }
        $temp2 = "";
        if ($where) {
            foreach ($where as $key => $value) {
                if ($temp2 != "") {
                    $temp2 .= " and ";
                }
                $temp2 .= "{$key}='{$value}'";
            }
        }
        if ($temp1 != "" || $temp2 != "") {
            if ($temp1 != "" && $temp2 != "") {
                $sql .= " where $temp1 and $temp2";
            } else if ($temp1 != "") {
                $sql .= " where $temp1";
            } else if ($temp2 != "") {
                $sql .= " where $temp2";
            }
        }
        if ($order) {
            $sql .= " order by {$order[0]} {$order[1]}";
        }
        //echo $sql;
        return $this->db->query($sql);
    }

    public function delete($table, $id) {
        $sql = "delete from $table where id=$id";
        $this->db->query($sql);
        return $this->db->affected_rows;
    }

    public function search($sdate, $edate, $adult= NULL, $child= NULL, $rtypeid = NULL) {
        $sql = "SELECT
                        room.id,
                        room.code,
                        room.price,
                        room.discount,
                        room.description,
                        room.picture1
                        
                    FROM
                        room
                    LEFT JOIN roombooking ON roombooking.roomid = room.id
                    WHERE
                        room.id NOT IN(
                        SELECT
                            bkk.roomid
                        FROM
                            roombooking bkk
                        WHERE
                            bkk.startdate >=(
                            SELECT
                                MIN(bk.startdate)
                            FROM
                                roombooking bk
                            WHERE
                                bk.enddate > '$sdate' AND bk.id = bkk.id
                        ) && bkk.startdate <= '$edate'
                    )";
        if($adult >0){
           $sql .= " AND room.adult = $adult";
        }
        if($child >0){
           $sql .= " AND room.child = $child";
        }
        if($rtypeid >0){
           $sql .= " AND roomtypeid = $rtypeid";
        }
        //echo $sql;
         return $this->db->query($sql);
    }

}

/*
$db = new Database();
$table = "users, city, country";
$order = array("users.id", "desc");
$where = array(
    "users.id" => 5,
    "city.name" => "Dhaka"
);
$select = "users.id, users.name, city.name ctname, country.name cname";
$rel = array(
    "users.cityid" => "city.id",
    "city.countryid" => "country.id"
);
$db->view($table, $order, $where, $select, $rel);
die();
?>
 */
