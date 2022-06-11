<?php

namespace App\Controllers\pengelola;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\M_umkm;
use App\Models\M_order;
use App\Models\M_pengelola;


class Order extends \App\Controllers\BaseController
{

    public function __construct()
    {
        $this->m_umkm = new M_umkm();
        $this->m_order = new M_order();
        $this->m_pengelola = new M_pengelola();
    }

    public function index()
    {
        return redirect()->to(base_url('pengelola/order/list'));
    }

    public function list()
    {
        $iduser = session()->get('iduser');
        $l_order = $this->m_order->getOrderan();
        $detilUser = $this->m_pengelola->getJoinUserPengelola($iduser)[0];

        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'List Orderan']),
            'l_order' => $l_order,
            'detail_user' => $detilUser
        ];

        return view('pengelola/order/list-orderan', $data);
    }


    public function detail($idorder)
    {
        $detilUser = $this->m_pengelola->getJoinUserPengelola(session()->get('iduser'))[0];
        $detail_orderan = $this->m_order->getOrderById($idorder)[0];

        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Detail Orderan']),
            'detail_orderan' => $detail_orderan,
            'detail_user' => $detilUser
        ];

        return view('pengelola/order/detail-order', $data);
    }

    public function update_status()
    {
        $idorder = $_POST['idorder'];
        $idumkm = $_POST['idumkm'];
        $idads = $_POST['idads'];
        $item_amount = $_POST['item_amount'];

        $dataset = [
            'status' => "Terverifikasi"
        ];

        $l_order = $this->m_order->getOwnedByIdUmkm($idumkm, $idads);
        if (count($l_order) == 0) {
            $datasetowned = [
                'idumkm' => $idumkm,
                'idads' => $idads,
                'ads_amount' => $item_amount
            ];
            $this->m_order->updateStatus($dataset, $idorder, $datasetowned);
        } else {
            $new_amount = $item_amount + $l_order[0]->ads_amount;
            $datasetowned = [
                'ads_amount' => $new_amount
            ];
            $this->m_order->updateStatusAndOwned($dataset, $idorder, $datasetowned, $idumkm, $idads);
        }
        $alert = view(
            'partials/notification-alert',
            [
                'notif_text' => 'Pesanan Terverifikasi',
                'status' => 'success'
            ]
        );

        session()->setFlashdata('notif', $alert);
        return redirect()->to(base_url('pengelola/order/list'));
    }
}
