<?php namespace App\Models;

  use CodeIgniter\Model;

  class M_umkm extends Model  {
    protected $table      = 'tb_umkm';
    protected $primaryKey = 'idumkm';

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
   
    public function getAllUmkm(){
      $sql = "SELECT * FROM tb_user JOIN tb_umkm USING (iduser)";
      return $this->db->query($sql)->getResult();
    }
    
    public function getJoinUserUmkm($iduser){
      $sql = "SELECT * FROM tb_user JOIN tb_umkm USING(iduser) WHERE iduser = $iduser";
      return $this->db->query($sql)->getResult();
    }

    public function insertUmkm($data){
      $builder = $this->db->table('tb_umkm');
      $builder->insert($data);
    }

    public function updateUmkm($dataset, $iduser){
      $builder = $this->db->table('tb_umkm');
      $builder->where('iduser', $iduser);
      $builder->update($dataset);
    }
  }

?>