<?php
class Database{

    private $db_host = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_name = "test";
    
    private $conn = false;
    private $mysqli = "";
    private $result = array();
    
     function __construct(){
        if(!$this->conn){
            
            $this->mysqli = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name); 

            $this->conn = true; 
            if($this->mysqli->connect_error){
                array_push($this->result, $this->mysqli->connect_error);
                return false;
            }
            else{
                return true;
            }
        }
    }
    
    
    // insert data
    public function insert($table, $parms=array()){
         if($this->tableExists($table)){
          
            $table_column = implode(', ', array_keys($parms));            
            $table_value = implode("', '", $parms);

            $sql = "INSERT INTO $table ($table_column) VALUES ('$table_value')";
            $result = $this->mysqli->query($sql);
            
            if($result){
                 array_push($this->result , $this->mysqli->insert_id);
                 return true;
            }
            else{
                array_push($this->result , $this->mysqli->error);
                return false;
            }

          }
         else{
            return false;

        }
    }

    //update data
    public function update($table, $parms=array(), $where=null){
        if($this->tableExists($table)){

            $args = array();

            foreach($parms as $key => $value){
                $args[] = "$key = '$value'";
            }

        
             $sql = "UPDATE $table SET ".implode(', ', $args);
            
             if($where != null){
                $sql.= " WHERE $table.$where";
             }

              if($this->mysqli->query($sql)){
                 array_push($this->result , $this->mysqli->affected_rows);
              }
             else{
                 array_push($this->result , $this->mysqli->error);
             }
         }
        else{
            return false;
        }
    }
    
    // delete the data 
    public function delete($table, $where=null){
        if($this->tableExists($table)){
            $sql = "DELETE FROM $table";
            if($where!=null){
            $sql .= " WHERE $table.$where";

            }
            if($this->mysqli->query($sql)){
                array_push($this->result , $this->mysqli->affected_rows);
                }
            else{
                array_push($this->result , $this->mysqli->error);
            }

        }
        else{
            return false;
        }
    }

    // select data
    public function select(){

    }

    public function getResult(){
        $val = $this->result;
        $this->result = array();
        return $val;
    }
    private function tableExists($table){
         $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
         $tableInDB = $this->mysqli->query($sql);
         if($tableInDB){
            if($tableInDB->num_rows == 1){
                return true;
            }
            else{
                array_push($this->result, $table."does not exists");
                return false;
            }
         }
    }   


    // close the connection
    function __desturct(){
        if($this->conn){
            if($this->mysqli->close()){
                $this->conn = false;
                return true;
            }
        }
        else{
            return false;
        }
    }


}



?>