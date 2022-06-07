<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_kategori;
use App\Models\M_produk;
use App\Models\M_umkm;

class Seller extends BaseController
{

    function __construct()
    {
        $this->m_kategori = new M_kategori();
        $this->m_produk = new M_produk();
        $this->m_umkm = new M_umkm();
    }

    public function index()
    {
        $search = (isset($_GET['search'])) ? explode(" ", $_GET['search']) : "";
        $kategori = (isset($_GET['kategori'])) ? $_GET['kategori'] : [];
        $idumkm = (isset($_GET['id'])) ? $_GET['id'] : "";

        if ($idumkm == "") {
            return redirect()->to(base_url());
        }

        if (isset($_GET['search']) || isset($_GET['kategori'])) {
            if ($_GET['search'] == "" && isset($_GET['kategori'])) {
                $keyword = ["category_name LIKE '%$kategori[0]%'"];

                //LOOP BUAT CARI KATEGORI
                for ($i = 1; $i < count($kategori); $i++) {
                    array_push($keyword, "OR category_name LIKE '%$kategori[$i]%' ");
                }   
            }else{
                $keyword = ["product_name LIKE '%$search[0]%'"];
                //LOOP BUAT CARI NAMA PRODUK
                for ($i = 1; $i < count($search); $i++) {
                    array_push($keyword, "OR product_name LIKE '%$search[$i]%' ");
                }
                //LOOP BUAT CARI KATEGORI
                for ($i = 0; $i < count($kategori); $i++) {
                    array_push($keyword, "OR category_name LIKE '%$kategori[$i]%' ");
                }
            }

            $query = implode(" ", $keyword);
            $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

            // Jumlah data per halaman
            $limit = 10;
            $limitStart = ($page - 1) * $limit;

            $allProduk = count($this->m_produk->getProdukByIdUmkmSeller($idumkm, $limit, $limitStart, $search, $query));

            $jumlahPage = ceil($allProduk / $limit);
            $getAllkategori = $this->m_kategori->getAllKategori();
            $getUmkm = $this->m_umkm->getUmkmByIdUmkm($idumkm);
            $l_produk = $this->m_produk->getProdukByIdUmkmSeller($idumkm, $limit, $limitStart, $search, $query);
        } else {
            $allProduk = count($this->m_produk->getProdukByIdUmkm($idumkm));
            $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

            // Jumlah data per halaman
            $limit = 10;
            $jumlahPage = ceil($allProduk / $limit);
            $limitStart = ($page - 1) * $limit;
            $getAllkategori = $this->m_kategori->getAllKategori();
            $getUmkm = $this->m_umkm->getUmkmByIdUmkm($idumkm);
            $l_produk = $this->m_produk->getProdukByIdUmkmSeller($idumkm, $limit, $limitStart);
        }

        $data = [
            'title_meta' => view('homepage_partial/title-meta', ['title' => 'Seller']),
            'l_produk' => $l_produk,
            'jumlahPage' => $jumlahPage,
            'dataUmkm' => $getUmkm,
            'l_page' => $page,
            'kategori' => $getAllkategori,
            'idumkm' => $idumkm,
            'jumlahProduk' => $allProduk

        ];
        return view('seller-page', $data);
    }

    public function id($idproduk)
    {
        $detil_produk = $this->m_produk->getProdukById($idproduk)[0];
        $link_produk = $this->m_produk->getLinkProdukByIdProduk($idproduk);

        $see_also = $this->m_produk->getProdukByIdLimit($detil_produk->idumkm, 3);

        $data = [
            'title_meta' => view('homepage_partial/title-meta', ['title' => $detil_produk->product_name]),
            'l_detail' => $detil_produk,
            'see_also' => $see_also,
            'l_link' => $link_produk
        ];
        return view('detail-produk', $data);
    }
}
