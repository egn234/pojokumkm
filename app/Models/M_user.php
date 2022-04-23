<?php namespace App\Models;

	use CodeIgniter\Model;

	class M_user extends Model	{
	 	protected $table      = 'tb_user';
    protected $primaryKey = 'iduser';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    function __construct(){
      $this->db = db_connect();
    }
 	
    public function getAllUser(){
      $sql = "SELECT * FROM tb_user";
      return $this->db->query($sql)->getResult();
    }

    public function getAllNewUser(){
      $sql = "SELECT * FROM tb_user 
              LEFT JOIN tb_umkm USING (iduser)
              LEFT JOIN tb_pengelola USING (iduser)
              WHERE idumkm IS NULL
              AND idpengelola IS NULL";
      return $this->db->query($sql)->getResult();
    }

    public function getUser($username){
      $sql = "SELECT * FROM tb_user WHERE username = '$username'";
      return $this->db->query($sql)->getResult();
    }

    public function getUserById($iduser){  
      $sql = "SELECT * FROM tb_user WHERE iduser = $iduser";
      return $this->db->query($sql)->getResult();
    }

    public function countUsername($username){
      $sql = "SELECT count(iduser) as hitung FROM tb_user WHERE username = '$username'";
      return $this->db->query($sql)->getResult();
    }

    public function countUserByEmail($email){
      $sql = "SELECT count(iduser) as hitung FROM tb_user WHERE email = '$email'";
      return $this->db->query($sql)->getResult();
    }

    public function cekEmailTerdaftar($email, $iduser){
      $sql = "SELECT count(iduser) as hitung FROM tb_user WHERE email = '$email' AND iduser != $iduser";
      return $this->db->query($sql)->getResult();
    }

    public function updateEmail($email, $iduser){
      $builder = $this->db->table('tb_user');
      $builder->set('email', $email);
      $builder->where('iduser', $iduser);
      $builder->update();
    }

    public function insertUser($data){
      $builder = $this->db->table('tb_user');
      $builder->insert($data);
    }

    public function updatePassword($pass, $iduser){
      $builder = $this->db->table('tb_user');
      $builder->set('pass', $pass);
      $builder->where('iduser', $iduser);
      $builder->update();
    }

    public function aktifkanUser($iduser){
      $builder = $this->db->table('tb_user');
      $builder->set('flag', 1);
      $builder->where('iduser', $iduser);
      $builder->update();
    }

    public function nonaktifkanUser($iduser){
      $builder = $this->db->table('tb_user');
      $builder->set('flag', 0);
      $builder->where('iduser', $iduser);
      $builder->update();
    }

    public function deleteUser($iduser){
      $sql = "DELETE FROM tb_user WHERE iduser = $iduser";
      return $this->db->query($sql);
    }
	}

?>