<?php
session_start();
class Connection {
		public $hostname 	= 'localhost';
		public $username 	= 'root';
		public $password	= '';
		// public $dbname 		= 'shopping_kaoyai';
		public $dbname 		= 'atsamatd_atsamatd';
		public $pdo;
		public function __construct($status = false){
            if($status == true):
                $this->openConnection();
            else:
            endif;
		}
        public function __destruct()
        {
            $this->closeConnection();
        }
		public function openConnection(){
			try{
				$server = @$_SERVER['SERVER_NAME'];
				if($server == 'localhost'):
					$conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname;",$this->username,$this->password);
					$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					// echo json_encode(array('status'=>'connection is successfully.'));
				else:
					$conn = new PDO("mysql:host=$this->hostname;dbname=atsamatd_atsamatd;","atsamatd_root","atsamatd");
					$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				endif;
				
				return $this->pdo = $conn;
				
			}catch(PDOException $err){
				echo $err->getMessage();
			}
		}
		public function closeConnection(){
			$this->pdo 	= null;
		}
		public function authenUsers(){
			$login_status = isset($_SESSION['LOGIN_STATUS']) ? $_SESSION['LOGIN_STATUS'] : '';
			if($login_status === 1):

				header("Location: index.php");
				exit;
			else:

			endif;
		}
		public function authenPermission(){
			$login_status 	= isset($_SESSION['LOGIN_STATUS']) 		? $_SESSION['LOGIN_STATUS'] : '';
			$username 		= isset($_SESSION['AUTHEN_USERNAME']) 	? $_SESSION['AUTHEN_USERNAME'] : '';
			$password 		= isset($_SESSION['AUTHEN_PASSWORD']) 	? $_SESSION['AUTHEN_PASSWORD'] : '';

			if($login_status !== 1):
				if(empty($username) && empty($password)):
					header("Location: login.php");
					exit;
				else:

				endif;
			else:

			endif;
		}
		public function id_encrypt($id){
			$privateKey = "id-123";
			$iv = "asdfghzxcv12340k";
			$sslID = openssl_encrypt($id,'AES-256-CBC',$privateKey,0,$iv);
			return $sslID;
		}
		public function id_decrypt($id_encrypt){
			$privateKey = "id-123";
			$iv = "asdfghzxcv12340k";
			$sslID = openssl_decrypt($id_encrypt,'AES-256-CBC',$privateKey,0,$iv);
			return $sslID;
		}
}

?>