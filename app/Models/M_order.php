<?php namespace App\Models;

  use CodeIgniter\Model;

  class M_order extends Model  {
    protected $table      = 'tb_order';
    protected $primaryKey = 'idorder';

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
   
    public function getAllOrder(){
      $sql = "SELECT * FROM tb_order";
      return $this->db->query($sql)->getResult();
    }

    public function getOrderByUmkm($idumkm){
      $sql = "SELECT * FROM tb_order 
        JOIN tb_umkm USING (idumkm) 
        JOIN tb_user USING (iduser) 
        JOIN tb_ads USING(idads)
        WHERE idumkm = $idumkm";
      return $this->db->query($sql)->getResult();
    }
  }

?>