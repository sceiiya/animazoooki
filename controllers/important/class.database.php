<?php

// date_default_timezone_set('Asia/Manila');

require_once("connect_DB.php");

    class ClassDbConn extends DBCred{
         //mga properties

         private $Host;
         private $UName;
         private $Pass;
         private $DBName;

         public function __construct(){
            $this->Host = $this->getDbHN();
            $this->UName = $this->getDbUN();
            $this->Pass = $this->getDbPW();
            $this->DBName = $this->getDbN(); 
         }

        //mga methods ng class na to
        public function NewCon(){
            $connect = mysqli_connect($this->Host, $this->UName, $this->Pass, $this->DBName);
            return $connect; //true or false

                        // true or false
                        // if ($connect == true){
                        //     return "true";
                        // }else{
                        //     return "false";
                        // }
        }

        //method insert value
        //requires 3 arguments
        public function Insert($mysql, $table, $values){
            $dKeys ="";
            $dValues ="";
            foreach($values as $colname => $value){
                $dKeys .= "`".$colname."`,";
                $dValues .= "'".$value."',";
            }
            $dKeys = "(".substr($dKeys, 0, -1).")";
            $dValues = "(".substr($dValues, 0, -1).")";
            // echo $dKeys."<br/>".$dValues;

            $insert = "INSERT INTO `".$table."` $dKeys VALUES $dValues";
            $Result = mysqli_query($mysql, $insert);

            if ($Result == 1){
                return "true";
                mysqli_close($mysql);
            }else{
                return "false";
                mysqli_close($mysql);
            }
        }

        //method select value
        //requires 3 arguments
        public function Select($mysql, $table, $where){

            $dResult = [];
            $eSelect = "SELECT * FROM `".$table."`";

            $sWhere = "";
            //check if the where param is empty or not
            if (empty($where)){
                $qSelect = $eSelect;
            }else{
                $x = 1;
                //print all the where value given
                foreach($where as $colname => $value){
                    if ($x < sizeof($where)){
                        $sWhere .= " `$colname` = '$value' AND";
                    }else{
                        $sWhere .= " `$colname` = '$value'";
                    }
                    
                    $x++;
                }
                //concatenate  the select and where clauses
                $qSelect =$eSelect." WHERE ".$sWhere;
            }

            // //concatenate  the select and where clauses
            // $qSelect =$eSelect." WHERE ".$sWhere;

            //execute the query
            $Result = mysqli_query($mysql, $qSelect);
            // while($rows = mysqli_fetch_assoc($Result)){
            //     //store the data value
            //     $dResult[] = $rows;
            // }
            $rows = mysqli_fetch_array($Result);
            //store the data value
            $dResult = $rows;
            

            //return the data value from query
            // return $rows['id'];

            //return the data value from query
            return $dResult;
            mysqli_close($mysql);

        }

        //make a class pub func for thos type
        // $qSelect = "SELECT * FROM $dbDatabase .`products` WHERE `date_archived` IS NULL ORDER BY `id` DESC";

        //method update data
        //requires 4 arguments
        public function FetchNum($mysql, $table, $column, $value){
            if(empty($column) and empty($value)){
                $qSelect = "SELECT * FROM `".$table."`";
            }elseif($value == "NULL"){
                $qSelect = "SELECT * FROM `".$table."`  WHERE `".$column."` IS NULL";
            }else{
                $qSelect = "SELECT * FROM `".$table."`  WHERE `".$column."` = '".$value."'";
            }
            // echo $qSelect;

            //execute the query
            $Result = mysqli_query($mysql, $qSelect);
            $nTotalRows = mysqli_num_rows($Result);

            $dResult = [
                'result' => "true",
                'total' => $nTotalRows
            ];
            $dnResult = [
                'result' => "false",
                'total' => $nTotalRows
            ];
            if($nTotalRows > 0){
                return $dResult;
                mysqli_close($mysql);
            } else{
                return $dnResult;
                mysqli_close($mysql);
            }
        }

        //method update data
        //requires 4 arguments
        public function Update($mysql, $table, $values, $where){
            $Values = "";
            foreach($values as $colname => $value){
                $Values .= " `".$colname."` = '".$value."',";
            }
            $Values = substr($Values,0,-1);

            if(empty($where)){
                return false;
            }else{
                $Where = "";
                foreach($where as $colname => $value){
                    $Where .= " `$colname` =  '$value' AND";
                }
                $Where = substr($Where,0,-4);
                $update = "UPDATE `".$table."` SET ".$Values." WHERE ".$Where;
                // echo $update;
                //execute the query
                $Result = mysqli_query($mysql, $update);
                if ($Result == 1){
                    return "true";
                    mysqli_close($mysql);
                }else{
                    return "false";
                    mysqli_close($mysql);
                }
            }

        }

        //method validate data
        //requires 4 arguments
        public function ValidateExist($mysql, $table, $column, $value){
            $qSelect = "SELECT `".$column."` FROM `".$table."`  WHERE `".$column."` = '".$value."'";
            // echo $qSelect;

            //execute the query
            $Result = mysqli_query($mysql, $qSelect);
            $nTotalRows = mysqli_num_rows($Result);
            // while($rows = mysqli_fetch_assoc($Result)){
            //     //store the data value
            //     $dResult[] = $rows;
            // }
            // print_r($dResult);
            // echo "<br/>";
            // echo $nTotalRows;
            $dResult = [
                'result' => "true",
                'total' => $nTotalRows
            ];
            $dnResult = [
                'result' => "false",
                'total' => $nTotalRows
            ];
            if($nTotalRows > 0){
                return $dResult;
                mysqli_close($mysql);
            } else{
                return $dnResult;
                mysqli_close($mysql);
            }
        }

        //check if the name is guest or not
        // public function ValidateGuest(){

        // }

    }

?>