<?php

namespace App\Models;

use CodeIgniter\Model;

class M_order extends Model
{
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

  function __construct()
  {
    $this->db = db_connect();
  }

  public function getAllOrder()
  {
    $sql = "SELECT * FROM tb_order";
    return $this->db->query($sql)->getResult();
  }

  public function getOrderan()
  {
    $sql = "SELECT a.*, b.umkm_name FROM `tb_order` AS a JOIN tb_umkm AS b ON a.idumkm = b.idumkm";
    return $this->db->query($sql)->getResult();
  }

  public function getOrderById($idorder)
  {
    $sql = "SELECT a.*, b.umkm_name, b.iduser FROM `tb_order` AS a JOIN tb_umkm AS b ON a.idumkm = b.idumkm WHERE a.idorder = $idorder";
    return $this->db->query($sql)->getResult();
  }

  public function getOrderByUmkm($idumkm)
  {
    $sql = "SELECT * FROM tb_order 
        JOIN tb_umkm USING (idumkm) 
        JOIN tb_user USING (iduser) 
        JOIN tb_ads USING(idads)
        WHERE idumkm = $idumkm
        ORDER BY tb_order.date_ordered DESC ";
    return $this->db->query($sql)->getResult();
  }

  public function insertOrder($dataset)
  {
    $builder = $this->db->table('tb_order');
    $builder->insert($dataset);
  }

  public function updateOrder($dataset, $idorder)
  {
    $builder = $this->db->table('tb_order');
    $builder->where('idorder', $idorder);
    $builder->update($dataset);
  }

  public function updateStatus($dataset, $idorder, $datasetowned)
  {
    $builder = $this->db->table('tb_order');
    $builder->where('idorder', $idorder);
    $builder->update($dataset);

    $sqlbuilder = $this->db->table('tr_umkm_ads_owned');
    $sqlbuilder->insert($datasetowned);
  }

  public function updateStatusAndOwned($dataset, $idorder, $datasetowned, $idumkm, $idads)
  {
    $builder = $this->db->table('tb_order');
    $builder->where('idorder', $idorder);
    $builder->update($dataset);

    $sqlbuilder = $this->db->table('tr_umkm_ads_owned');
    $sqlbuilder->where('idumkm', $idumkm);
    $sqlbuilder->where('idads', $idads);
    $sqlbuilder->update($datasetowned);
  }

  public function getOwnedByIdUmkm($idumkm, $idads)
  {
    $sql = "SELECT * FROM `tr_umkm_ads_owned` WHERE idumkm = $idumkm AND idads = $idads";
    return $this->db->query($sql)->getResult();
  }

  public function useVoucher($dataset, $datasetOwned, $idumkm, $idads)
  {
    $builder = $this->db->table('tr_umkm_ads_used');
    $builder->insert($dataset);

    $sqlbuilder = $this->db->table('tr_umkm_ads_owned');
    $sqlbuilder->where('idumkm', $idumkm);
    $sqlbuilder->where('idads', $idads);
    $sqlbuilder->update($datasetOwned);
  }
}
