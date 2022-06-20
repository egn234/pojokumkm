<?php

namespace App\Models;

use CodeIgniter\Model;

class M_produk extends Model
{
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

  function __construct()
  {
    $this->db = db_connect();
  }

  public function getAllProduk($query = "")
  {
    if ($query != "") {
      $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic,
        tb_kategori.idkategori AS idkategori,
        tb_kategori.category_name AS category_name 
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          LEFT JOIN tb_kategori USING (idkategori)
          WHERE (product_status = 'on') 
        AND ($query)";
    } else {
      $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic,
        tb_kategori.idkategori AS idkategori,
        tb_kategori.category_name AS category_name 
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          LEFT JOIN tb_kategori USING (idkategori)
          WHERE (product_status = 'on')";
    }

    return $this->db->query($sql)->getResult();
  }

  public function getProdukById($idproduk)
  {
    $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic,
        tb_kategori.idkategori AS idkategori,
        tb_kategori.category_name AS category_name 
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          LEFT JOIN tb_kategori USING (idkategori)
          WHERE idproduk = $idproduk";

    return $this->db->query($sql)->getResult();
  }

  public function getProdukByIdUmkm($idumkm)
  {
    $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic,
        tb_kategori.idkategori AS idkategori,
        tb_kategori.category_name AS category_name 
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          LEFT JOIN tb_kategori USING (idkategori)
          WHERE idumkm = $idumkm";

    return $this->db->query($sql)->getResult();
  }

  public function getKategoriProdukByUmkm($idumkm)
  {
    $sql = "SELECT tb_produk.*,
    tb_user.iduser AS iduser,
    tb_umkm.idumkm AS idumkm,
    tb_umkm.umkm_name AS umkm_name,
    tb_umkm.umkm_pic AS umkm_pic,
    tb_kategori.idkategori AS idkategori,
    tb_kategori.category_name AS category_name
    FROM tb_user
    RIGHT JOIN tb_umkm USING (iduser) 
    RIGHT JOIN tb_produk USING (idumkm) 
    LEFT JOIN tb_kategori USING (idkategori) 
    WHERE idumkm = $idumkm 
    GROUP BY category_name";
    return $this->db->query($sql)->getResult();
  }

  public function getProdukUmkmTerbaru($idumkm)
  {
    $sql = "SELECT * FROM tb_produk WHERE idumkm = $idumkm ORDER BY idproduk DESC";
    return $this->db->query($sql)->getResult();
  }

  public function getHomeProduct($lim = 0, $start = 0, $search = "", $query = "")
  {
    $limit = ($lim != 0) ? $lim : 4;
    $strt = ($start != 0) ? $start : 0;
    if ($search != "") {
      $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic,
        tb_kategori.idkategori AS idkategori,
        tb_kategori.category_name AS category_name 
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          LEFT JOIN tb_kategori USING (idkategori)
        WHERE (product_status = 'on') 
        AND ($query) LIMIT " . $strt . "," . $limit;
    } else {
      $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name,
        tb_kategori.category_name AS category_name 
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          LEFT JOIN tb_kategori USING (idkategori)
          WHERE product_status = 'on'
          ORDER BY idproduk DESC LIMIT " . $strt . "," . $limit;
    }

    return $this->db->query($sql)->getResult();
  }

  public function getHomeProductRand($idkategori)
  {
    $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name,
        tb_kategori.category_name AS category_name 
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          LEFT JOIN tb_kategori USING (idkategori)
        WHERE idkategori = $idkategori
        AND product_status = 'on'
        ORDER BY idproduk DESC LIMIT 4";
    return $this->db->query($sql)->getResult();
  }

  public function getProdukByIdLimit($idumkm, $lim)
  {
    $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name,
        tb_kategori.category_name AS category_name 
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          LEFT JOIN tb_kategori USING (idkategori)
        WHERE idumkm = $idumkm
        AND product_status = 'on'
        ORDER BY idproduk DESC LIMIT $lim";
    return $this->db->query($sql)->getResult();
  }

  public function countProdukByIdKategori($idkategori)
  {
    $sql = "SELECT count(idproduk) AS hitung FROM tb_produk 
        RIGHT JOIN tb_kategori USING (idkategori)
        WHERE idkategori = $idkategori";

    return $this->db->query($sql)->getResult();
  }

  public function countLinkProdukByIdProduk($idproduk)
  {
    $sql = "SELECT count(idprodlink) AS hitung FROM tb_produk_link WHERE idproduk = $idproduk";
    return $this->db->query($sql)->getResult();
  }

  public function getLinkProdukByIdProduk($idproduk)
  {
    $sql = "SELECT * FROM tb_produk_link WHERE idproduk = $idproduk";
    return $this->db->query($sql)->getResult();
  }

  public function insertProduk($data)
  {
    $builder = $this->db->table('tb_produk');
    $builder->insert($data);
  }

  public function updateProduk($dataset, $idproduk)
  {
    $builder = $this->db->table('tb_produk');
    $builder->where('idproduk', $idproduk);
    $builder->update($dataset);
  }

  public function deleteProdukByIdProduk($idproduk)
  {
    $sql = "DELETE FROM tb_produk WHERE idproduk = $idproduk";
    return $this->db->query($sql);
  }

  public function insertProdukLink($data)
  {
    $builder = $this->db->table('tb_produk_link');
    $builder->insert($data);
  }

  public function deleteLinkProduk($idprodlink)
  {
    $sql = "DELETE FROM tb_produk_link WHERE idprodlink = $idprodlink";
    return $this->db->query($sql);
  }

  public function deleteLinkProdukByIdProduk($idproduk)
  {
    $sql = "DELETE FROM tb_produk_link WHERE idproduk = $idproduk";
    return $this->db->query($sql);
  }

  // * Seller
  public function getProdukByIdUmkmSeller($idumkm, $lim = 0, $start = 0, $search = "", $query = "")
  {
    $limit = ($lim != 0) ? $lim : 4;
    $strt = ($start != 0) ? $start : 0;
    if ($search != "") {
      $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic,
        tb_kategori.idkategori AS idkategori,
        tb_kategori.category_name AS category_name 
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          LEFT JOIN tb_kategori USING (idkategori)
          WHERE idumkm = $idumkm
          AND ($query)
          ORDER BY idproduk DESC LIMIT " . $strt . "," . $limit;
    } else {
      $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic,
        tb_kategori.idkategori AS idkategori,
        tb_kategori.category_name AS category_name 
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          LEFT JOIN tb_kategori USING (idkategori)
          WHERE idumkm = $idumkm
          ORDER BY idproduk DESC LIMIT " . $strt . "," . $limit;
    }

    return $this->db->query($sql)->getResult();
  }

  public function getProdukAds($idproduk)
  {
    $sql = "SELECT * FROM `tr_umkm_ads_used` WHERE idproduk = $idproduk";
    return $this->db->query($sql)->getResult();
  }

  public function getProdukAdsRandom($query = "")
  {
    $tgl = date('Y-M-d H:i:s');
    if ($query != "") {
      $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic,
        tb_kategori.idkategori AS idkategori,
        tb_kategori.category_name AS category_name,
        tr_umkm_ads_used.ads_date_finished AS deadline
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          JOIN tr_umkm_ads_used USING (idproduk)
          LEFT JOIN tb_kategori USING (idkategori)
        WHERE tr_umkm_ads_used.ads_date_finished > '$tgl' 
        AND tb_produk.product_status = 'on'
        AND ($query) 
    ORDER BY RAND() LIMIt 3";
    } else {
      $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic,
        tb_kategori.idkategori AS idkategori,
        tb_kategori.category_name AS category_name,
        tr_umkm_ads_used.ads_date_finished AS deadline
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          JOIN tr_umkm_ads_used USING (idproduk)
          LEFT JOIN tb_kategori USING (idkategori)
        WHERE tr_umkm_ads_used.ads_date_finished > '$tgl' 
        AND tb_produk.product_status = 'on' 
    ORDER BY RAND() LIMIt 3";
    }

    return $this->db->query($sql)->getResult();
  }

  public function getAllAdsProduk($lim = 0, $start = 0, $search = "", $query = "")
  {
    $limit = ($lim != 0) ? $lim : 4;
    $strt = ($start != 0) ? $start : 0;
    $tgl = date('Y-M-d H:i:s');

    if ($search != "") {
      $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic,
        tb_kategori.idkategori AS idkategori,
        tb_kategori.category_name AS category_name,
        tr_umkm_ads_used.ads_date_finished AS deadline
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          JOIN tr_umkm_ads_used USING (idproduk)
          LEFT JOIN tb_kategori USING (idkategori)
        WHERE tr_umkm_ads_used.ads_date_finished > '$tgl' 
        AND tb_produk.product_status = 'on' 
        AND ($query) LIMIT " . $strt . "," . $limit;
    } else {
      $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic,
        tb_kategori.idkategori AS idkategori,
        tb_kategori.category_name AS category_name,
        tr_umkm_ads_used.ads_date_finished AS deadline
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          JOIN tr_umkm_ads_used USING (idproduk)
          LEFT JOIN tb_kategori USING (idkategori)
        WHERE tr_umkm_ads_used.ads_date_finished > '$tgl' 
        AND tb_produk.product_status = 'on'
          ORDER BY idproduk DESC LIMIT " . $strt . "," . $limit;
    }

    return $this->db->query($sql)->getResult();
  }

  public function getProdukAdsAll()
  {
    $sql = "SELECT * FROM `tr_umkm_ads_used`";
    return $this->db->query($sql)->getResult();
  }

  public function getProdukAdsByIdUmkm($idumkm)
  {
    $sql = "SELECT tb_produk.*, 
        tb_user.iduser AS iduser, 
        tb_umkm.idumkm AS idumkm, 
        tb_umkm.umkm_name AS umkm_name, 
        tb_umkm.umkm_pic AS umkm_pic,
        tb_kategori.idkategori AS idkategori,
        tb_kategori.category_name AS category_name,
        tr_umkm_ads_used.ads_date_finished AS deadline
        FROM tb_user RIGHT JOIN tb_umkm USING (iduser) 
          RIGHT JOIN tb_produk USING (idumkm)
          JOIN tr_umkm_ads_used USING (idproduk)
          LEFT JOIN tb_kategori USING (idkategori)
        WHERE tr_umkm_ads_used.ads_date_finished > now() 
        AND tb_produk.product_status = 'on'
        AND tb_umkm.idumkm = $idumkm";
    return $this->db->query($sql)->getResult();
  }
}
