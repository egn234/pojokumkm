<?php namespace App\Models;

	use CodeIgniter\Model;

	class M_kategori extends Model	{
	 	protected $table      = 'tb_kategori';
    protected $primaryKey = 'idkategori';

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
  
    public function getAllKategori(){
      $sql = "SELECT * FROM tb_kategori";
      return $this->db->query($sql)->getResult();
    }

    public function getKategoriById($idkategori){
      $sql = "SELECT * FROM tb_kategori WHERE idkategori = $idkategori";
      return $this->db->query($sql)->getResult();
    }

    public function getKategoriAktif(){
      $sql = "SELECT * FROM tb_kategori WHERE category_status = 'on'"; 
      return $this->db->query($sql)->getResult();
    }

    public function getIdKategoriRand(){
      $sql = "SELECT idkategori FROM tb_kategori WHERE category_status = 'on' ORDER BY RAND() LIMIt 1";
      return $this->db->query($sql)->getResult();
    }

    public function countKategoriByName($category_name){
      $sql = "SELECT count(idkategori) AS hitung FROM tb_kategori WHERE BINARY category_name = '$category_name'";
      return $this->db->query($sql)->getResult();
    }

    public function insertKategori($data){
      $builder = $this->db->table('tb_kategori');
      $builder->insert($data);
    }

    public function aktifkanKategori($idkategori){
      $builder = $this->db->table('tb_kategori');
      $builder->set('category_status', 'on');
      $builder->where('idkategori', $idkategori);
      $builder->update();
    }

    public function nonaktifkanKategori($idkategori){
      $builder = $this->db->table('tb_kategori');
      $builder->set('category_status', 'off');
      $builder->where('idkategori', $idkategori);
      $builder->update();
    }

    public function deleteKategori($idkategori){
      $sql = "DELETE FROM tb_kategori WHERE idkategori = $idkategori";
      return $this->db->query($sql);
    }

    public function updateKategori($dataset, $idkategori){
      $builder = $this->db->table('tb_kategori');
      $builder->where('idkategori', $idkategori);
      $builder->update($dataset);
    }
  }
?>