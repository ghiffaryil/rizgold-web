<?php 
class a_database {
	private $host;
	private $user;
	private $pass;
	private $db;
	public $koneksi;
	private $s_nama_database; // Added this line

	public function __construct() {
		$this->db_connect();
		$this->s_nama_database = "db_rizgold_kemitraan";
	}

	public function __destruct() {
		mysqli_close($this->db_connect());
	}

	private function db_connect(){
		$this->host = 'localhost';
		$this->user = 'root';
		$this->pass = '';
		$this->db = 'db_rizgold_kemitraan';

		$this->koneksi = new mysqli($this->host, $this->user, $this->pass, $this->db);
		return $this->koneksi;
	}
}
