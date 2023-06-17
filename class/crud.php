<?php
    class crud{
        private $host='localhost';
        private $user='root';
        private $password='';
        private $database='hotel';
        private $connection;

        public function __construct(){
            $this->connection=new mysqli($this->host,$this->user,$this->password,$this->database);
        }

        public function common_select($table,$fields='*',$condition=false,$sort_field=false,$sort='ASC'){
            $result=array();
            $error=false;
            $sql="select $fields from $table where deleted_at is null ";
            if(is_array($condition)){
                $sql.=" and ";
                foreach($condition as $k=>$v){
                    $sql.="$k='$v' and ";
                }
                $sql=rtrim($sql,'and ');
            }
            if($sort_field){
                $sql.=" order by $sort_field $sort";
            }
            $rs=$this->connection->query($sql);
            if($rs){
                if($rs->num_rows > 0){
                    while($r=$rs->fetch_object()){
                        array_push($result,$r);
                    }
                }
                
            }else{
                $error=$this->connection->error();
            }
            $return = array('data'=>$result,'error'=>$error);
            return $return;
        }

        public function common_select_single($table,$fields='*',$condition=false,$sort_field=false,$sort='ASC'){
            $result="";
            $error=false;
            $sql="select $fields from $table where deleted_at is null ";
            if(is_array($condition)){
                $sql.=" and ";
                foreach($condition as $k=>$v){
                    $sql.="$k='$v' and ";
                }
                $sql=rtrim($sql,'and ');
            }
            if($sort_field){
                $sql.=" order by $sort_field $sort";
            }
            $rs=$this->connection->query($sql);
            if($rs){
                if($rs->num_rows > 0){
                    while($r=$rs->fetch_object()){
                        $result=$r;
                    }
                }
                
            }else{
                $error=$this->connection->error();
            }
            $return = array('data'=>$result,'error'=>$error);
            return $return;
        }

        public function common_create($table,$data){
            $result="";
            $error=false;
            $sql="insert into $table set ";
            if(is_array($data)){
                foreach($data as $k=>$v){
                    $sql.="$k='$v',";
                }
                $sql=rtrim($sql,',');
            }
            $rs=$this->connection->query($sql);
            if($rs){
                $result=$this->connection->insert_id;
            }else{
                $error=$this->connection->error();
            }
            $return = array('data'=>$result,'error'=>$error);
            return $return;
        }

        public function common_update($table,$data,$condition){
            $result="";
            $error=false;
            $sql="update $table set ";
            if(is_array($data)){
                foreach($data as $k=>$v){
                    $sql.="$k='$v',";
                }
                $sql=rtrim($sql,',');
            }

            if(is_array($condition)){
                $sql.=" where ";
                foreach($condition as $k=>$v){
                    $sql.="$k='$v' and ";
                }
                $sql=rtrim($sql,'and ');
            }

            $rs=$this->connection->query($sql);
            if($rs){
                $result=$this->connection->affected_rows;
            }else{
                $error=$this->connection->error();
            }
            $return = array('data'=>$result,'error'=>$error);
            return $return;
        }

        public function common_delete($table,$condition){
            $result="";
            $error=false;
            $sql="delete from $table ";
            
            if(is_array($condition)){
                $sql.=" where ";
                foreach($condition as $k=>$v){
                    $sql.="$k='$v' and ";
                }
                $sql=rtrim($sql,'and ');
            }

            $rs=$this->connection->query($sql);
            if($rs){
                $result=$this->connection->affected_rows;
            }else{
                $error=$this->connection->error();
            }
            $return = array('data'=>$result,'error'=>$error);
            return $return;
        }

        public function common_select_query($sql){
            $result=array();
            $error=false;
            $rs=$this->connection->query($sql);
            if($rs){
                if($rs->num_rows > 0){
                    while($r=$rs->fetch_object()){
                        array_push($result,$r);
                    }
                }
                
            }else{
                $error=$this->connection->error();
            }
            $return = array('data'=>$result,'error'=>$error);
            return $return;
        }
    }
?>