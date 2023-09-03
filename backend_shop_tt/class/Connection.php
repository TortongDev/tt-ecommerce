<?php

class Connection {
		public $hostname 	= 'localhost';
		public $username 	= 'root';
		public $password	= '';
		public $dbname 		= 'shopping_kaoyai';
		public $pdo;
		public function __construct($status = false){

            if($status == true):
                $this->openConnection();
            else:
                echo "fasle";
            endif;
		}
        public function __destruct()
        {
            $this->closeConnection();
        }
		public function openConnection(){
			try{
				$conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname;",$this->username,$this->password);
				$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                // echo json_encode(array('status'=>'connection is successfully.'));
				return $this->pdo = $conn;
				
			}catch(PDOException $err){
				echo $err->getMessage();
			}
		}
		public function closeConnection(){
			$this->pdo 	= null;
		}
}




?>