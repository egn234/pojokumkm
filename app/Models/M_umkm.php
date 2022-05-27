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
    
    public function getUmkmByIdUmkm($idumkm){
      $sql = "SELECT * FROM tb_user JOIN tb_umkm USING(iduser) WHERE idumkm = $idumkm";
      return $this->db->query($sql)->getResult();
    }
    
    public function getJoinUserUmkm($iduser){
      $sql = "SELECT * FROM tb_user JOIN tb_umkm USING(iduser) WHERE iduser = $iduser";
      return $this->db->query($sql)->getResult();
    }

    public function getLinkUmkmByIdUmkm($idumkm){
      $sql = "SELECT * FROM tb_umkm_link WHERE idumkm = $idumkm";
      return $this->db->query($sql)->getResult();
    }

    public function countUmkmByIdUser($iduser){
      $sql = "SELECT count(idumkm) as hitung FROM tb_umkm WHERE iduser = $iduser";
      return $this->db->query($sql)->getResult();
    }

    public function countLinkUmkmByIdUmkm($idumkm){
      $sql = "SELECT count(idumkmlink) AS hitung FROM tb_umkm_link WHERE idumkm = $idumkm";
      return $this->db->query($sql)->getResult();
    }

    public function insertUmkm($data){
      $builder = $this->db->table('tb_umkm');
      $builder->insert($data);
    }

    public function insertLinkUmkm($data){
      $builder = $this->db->table('tb_umkm_link');
      $builder->insert($data);
    }

    public function deleteLinkUmkm($idumkmlink){
      $sql = "DELETE FROM tb_umkm_link WHERE idumkmlink = $idumkmlink";
      return $this->db->query($sql);
    }

    public function updateUmkm($dataset, $iduser){
      $builder = $this->db->table('tb_umkm');
      $builder->where('iduser', $iduser);
      $builder->update($dataset);
    }
  }

?>