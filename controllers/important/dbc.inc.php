<?php
//For default time in database lets use this one here so no problem in all controllers
    date_default_timezone_set('Asia/Manila');

    class DbClass {
        private $host = "animazoooki.wd49p.com";
        private $user = "u955154186_animazoooki_D";
        private $pass = "lU3^=wqKW";
        private $dbname = "u955154186_animazoooki";

        public function connect() {
            $connect = mysqli_connect($this->host, $this->user, $this->pass);
            return $connect;
        }

        // SELECT
        public function select($conn, $table, $where) {
            $aResult = [];
            $eSelect = "SELECT * FROM `$this->dbname`.`".$table."`";

            if (empty($where)) {
                $qSelect = $eSelect;
            } else {
                $sWhere = "";
                foreach($where as $colName => $value) {
                    $sWhere .= " `$colName` = '$value' AND";
                }
                $sWhere = substr($sWhere, 0, -4);
                $qSelect = $eSelect." WHERE ".$sWhere;
            }

            $result = mysqli_query($conn, $qSelect);
            while($rows = mysqli_fetch_assoc($result)) {
                $aResult[] = $rows;
            }
            return $aResult;
        }

        //INSERT
        public function insert($conn, $table, $values) {
            $sColumn = "";
            $sValues = "";

            foreach($values as $colname => $value) {
                $sColumn .= "`".$colname."`,";
                $sValues .= "'".$value."',";
            }

            $sColumn = "(".substr($sColumn, 0, -1).")";
            $sValues = "(".substr($sValues, 0, -1).")";

            $eInsert = "INSERT INTO `$this->dbname`.`".$table."` $sColumn VALUES $sValues";
            $qInsert = mysqli_query($conn, $eInsert);

            return $qInsert;
        }
        
        //UPDATE AND DELETE
        public function update($conn, $table, $values, $where) {

            $sValues = "";

            foreach($values as $colname => $value) {
                $sValues .= "`".$colname."` = '".$value."',";
            }
            $sValues = substr($sValues, 0, -1);

            if (empty($where)) {
                return false;
            } else {
                $sWhere = "";
                foreach($where as $colname => $value) {
                    $sWhere .= "`$colname` = '$value' AND";
                }
                $sWhere = substr($sWhere, 0, -4);
                $eUpdate = "UPDATE `$this->dbname`.`$table` SET " .$sValues. " WHERE " .$sWhere. "";
                $qUpdate = mysqli_query($conn, $eUpdate);
            }
            return $qUpdate;
        }
    }
