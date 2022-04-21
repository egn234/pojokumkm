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
  
    public function getAllPengelola(){
      $sql = "SELECT * FROM tb_umkm JOIN tb_user USING (iduser)";
      return $this->db->query($sql)->getResult();
    }

  }

?>