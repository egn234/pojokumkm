<?php namespace App\Models;

	use CodeIgniter\Model;

	class M_produk extends Model	{
	 	protected $table      = 'tb_produk';
    protected $primaryKey = 'idproduk';

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
  
    public function getAllProduk(){
      $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic,
        tb_kategori.idkategori AS idkategori,
        tb_kategori.category_name AS category_name 
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          LEFT JOIN tb_kategori USING (idkategori)";

      return $this->db->query($sql)->getResult();
    }

    public function getProdukByIdUmkm($idumkm){
      $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic 
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          WHERE idumkm = $idumkm";

      return $this->db->query($sql)->getResult();
    }

    public function countProdukByIdKategori($idkategori){
      $sql = "SELECT count(idproduk) AS hitung FROM tb_produk 
        RIGHT JOIN tb_kategori USING (idkategori)
        WHERE idkategori = $idkategori";
      
      return $this->db->query($sql)->getResult();
    }
  }
?>