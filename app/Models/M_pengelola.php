<?php namespace App\Models;

  use CodeIgniter\Model;

  class M_pengelola extends Model  {
    protected $table      = 'tb_pengelola';
    protected $primaryKey = 'idpengelola';

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
  
    public function getAllPengelola(){
      $sql = "SELECT * FROM tb_pengelola JOIN tb_user USING (iduser)";
      return $this->db->query($sql)->getResult();
    }

    public function countPengelolaByIdUser($iduser){
      $sql = "SELECT count(idpengelola) as hitung FROM tb_pengelola WHERE iduser = $iduser";
      return $this->db->query($sql)->getResult();
    }
    
    public function getJoinUserPengelola($iduser){
      $sql = "SELECT * FROM tb_user JOIN tb_pengelola USING(iduser) WHERE iduser = $iduser";
      return $this->db->query($sql)->getResult();
    }

    public function insertPengelola($data){
      $builder = $this->db->table('tb_pengelola');
      $builder->insert($data);
    }

    public function updatePengelola($dataset, $iduser){
      $builder = $this->db->table('tb_pengelola');
      $builder->where('iduser', $iduser);
      $builder->update($dataset);
    }
  }

?>