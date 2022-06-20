<?php

namespace App\Models;

use CodeIgniter\Model;

class M_ads extends Model
{
  protected $table      = 'tb_ads';
  protected $primaryKey = 'idads';

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

  function __construct()
  {
    $this->db = db_connect();
  }

  public function getAllAds()
  {
    $sql = "SELECT * FROM tb_ads";
    return $this->db->query($sql)->getResult();
  }

  public function getAdsById($idads)
  {
    $sql = "SELECT * FROM tb_ads WHERE idads = $idads";
    return $this->db->query($sql)->getResult();
  }
  public function countAdsByName($ads_name)
  {
    $sql = "SELECT count(idads) as hitung FROM tb_ads WHERE ads_name = '$ads_name'";
    return $this->db->query($sql)->getResult();
  }

  public function insertAds($dataset)
  {
    $builder = $this->db->table('tb_ads');
    $builder->insert($dataset);
  }

  public function updateAds($dataset, $idads)
  {
    $builder = $this->db->table('tb_ads');
    $builder->where('idads', $idads);
    $builder->update($dataset);
  }

  public function switchAdsStatus($ads_status, $idads)
  {
    $builder = $this->db->table('tb_ads');
    $builder->set('ads_status', $ads_status);
    $builder->where('idads', $idads);
    $builder->update();
  }

  public function getVoucherByUmkm($idumkm)
  {
    $sql = "SELECT * FROM tb_user JOIN tb_umkm USING (iduser) 
        RIGHT JOIN tr_umkm_ads_owned USING (idumkm)
        LEFT JOIN tb_ads USING (idads)
        WHERE idumkm = $idumkm";
    return $this->db->query($sql)->getResult();
  }

  public function getJumlahVoucherByUmkm($idumkm)
  {
    $sql = "SELECT SUM(ads_amount) as jumlah_voucher FROM tb_user JOIN tb_umkm USING (iduser) 
        RIGHT JOIN tr_umkm_ads_owned USING (idumkm)
        LEFT JOIN tb_ads USING (idads)
        WHERE idumkm = $idumkm";
    return $this->db->query($sql)->getResult();
  }
}
