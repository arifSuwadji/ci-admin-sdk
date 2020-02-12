<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('admin/ModelPengguna');
        $this->load->model('admin/ModelHalamanMenu');
    }

    public function index($page = 'halaman_menu/data'){
        if(!file_exists(APPPATH.'views/pages/admin/'.$page.'.php')){
            show_404();
        }

        if(isset($this->session->userdata['adminManajemen'])){
            $dataAdmin = $this->ModelPengguna->idAdmin($this->session->userdata['adminManajemen']['pengguna_id']);
            $row = $dataAdmin->row_array();
            $data = array();
            $current_url = $this->uri->segment(1);
            if($this->uri->segment(2)){
                $current_url .= '/'.$this->uri->segment(2);
            }
            $data['filejs'] = base_url().'public/admin/assets/menu.js';
            $data['dataJson'] = base_url().'admin/menuJson';
            $data['tambahData'] = base_url().'admin/tambahMenu';
            $data['editData'] = base_url().'admin/editMenu';
            $data['hapusData'] = base_url().'admin/hapusMenu';
            $data['gantiPassword'] = '';
            $data['current_url'] = $current_url;
            $data['fixed'] = 'fixed';
            if($row){
                $dataGrup = $this->ModelPengguna->idGrup($row['pengguna_grup'])->row_array();
                $data['nama_pengguna'] = $row['nama_pengguna'];
                $data['nama_grup'] = $dataGrup['nama_grup'];
                $data['pengguna_grup'] = $row['pengguna_grup'];
                $data['errmsg'] = $this->input->get() ? $this->input->get('errmsg') : '';
                $data['menuHalaman'] = $this->ModelHalamanMenu->byUrl($current_url)->row();
                $data['menuPriviliges'] = $this->ModelHalamanMenu->byPeta($row['pengguna_grup'], 'ya');
                $dataButtonHalaman = $this->ModelHalamanMenu->byPeta($row['pengguna_grup'],'tidak');
                $arrayData = array();
                $object = (object) array();
                $objectOut = (object) array();
                foreach($dataButtonHalaman->result() as $hal){
                    array_push($arrayData, [$hal->halaman_menu => $hal->pengguna_grup]);
                }
                foreach($arrayData as $key => $value){
                    foreach($value  as $key2 => $value2){
                        $object->$key2 = $value2;
                    }
                }
                foreach($object as $key => $value){
                    $objectOut->$key = $value;
                }
                $data['buttonPriviliges'] = $objectOut;
            }
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/menu', $data);
            $this->load->view('pages/admin/'.$page, $data);
            $this->load->view('templates/admin/footer', $data);
        }else{
            $data = array();
            $data['nama_pengguna'] = $_GET ? $_GET['nama_pengguna'] : '';
            $data['password'] = $_GET ? $_GET['password'] : '';
            $data['errmsg'] = $_GET ? $_GET['errmsg'] : '';
            $this->load->view('pages/admin/login', $data);
        }
    }

    public function dataJson(){
        $draw = (int)$_GET['draw'];
        $value = $_GET['search']['value'];
        $start = (int)$_GET['start'];
        $length = (int)$_GET['length'];
        $column = (int)$_GET['order'][0]['column'];
        $sort = $_GET['order'][0]['dir'];
        $recodsTotal = $this->ModelHalamanMenu->countMenu($value);
        $listMenu = $this->ModelHalamanMenu->listMenu($value, $start, $length, $column, $sort);
        $results = array();
        $dataAdmin = $this->ModelPengguna->idAdmin($this->session->userdata['adminManajemen']['pengguna_id']);
        $row = $dataAdmin->row_array();
        $idHalamanEdit = 4;
        $idHalamanHapus = 6;
        if($row){
            $dataHalaman = $this->ModelHalamanMenu->byPetaHalaman($row['pengguna_grup'], $idHalamanHapus);
            $privilegesDelete = $dataHalaman->row_array();
            $dataHalamanEdit = $this->ModelHalamanMenu->byPetaHalaman($row['pengguna_grup'], $idHalamanEdit);
            $privilegesDetail = $dataHalamanEdit->row_array();
            foreach ($listMenu->result() as $list) {
                $aktifMenu = 'Ya';
                if($list->aktif_menu == 'tidak'){$aktifMenu = 'Tidak';}
                array_push($results, [
                    'menu_id' => $list->menu_id, 'judul_menu' => $list->judul_menu, 'sub_judul_menu' => $list->sub_judul_menu, 'url_menu' => $list->url_menu, 'icon_menu' => $list->icon_menu, 'aktif_menu' => $aktifMenu, $idHalamanHapus => $privilegesDelete['pengguna_grup'], $idHalamanEdit => $privilegesDetail['pengguna_grup']]);
            }
        }
        $response = array(
            "draw" =>  $draw,
            "recordsTotal" => $recodsTotal,
            "recordsFiltered" => $recodsTotal,
            "value" => $value,
            "start" => $start,
            "length" => $length,
            "column" => $column,
            "sort" => $sort,
            "data" => $results
        );
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
        exit;
    }

    public function tambah($page = 'halaman_menu/tambah'){
        if(!file_exists(APPPATH.'views/pages/admin/'.$page.'.php')){
            show_404();
        }

        if(isset($this->session->userdata['adminManajemen'])){
            $dataAdmin = $this->ModelPengguna->idAdmin($this->session->userdata['adminManajemen']['pengguna_id']);
            $row = $dataAdmin->row_array();
            $data = array();
            $data['filejs'] = '';
            $current_url = $this->uri->segment(1);
            if($this->uri->segment(2)){
                $current_url .= '/'.$this->uri->segment(2);
            }
            $data['current_url'] = $current_url;
            $data['fixed'] = 'fixed';
            if($row){
                $dataGrup = $this->ModelPengguna->idGrup($row['pengguna_grup'])->row_array();
                $data['nama_pengguna'] = $row['nama_pengguna'];
                $data['nama_grup'] = $dataGrup['nama_grup'];
                $data['pengguna_grup'] = $row['pengguna_grup'];
                $data['errmsg'] = $this->input->get() ? $this->input->get('errmsg') : '';
                $data['menuHalaman'] = $this->ModelHalamanMenu->byUrl($current_url)->row();
                $data['menuPriviliges'] = $this->ModelHalamanMenu->byPeta($row['pengguna_grup'], 'ya');
                $data['judulMenu'] = '';
                $data['subJudulMenu'] = '';
                $data['urlMenu'] = '';
                $data['iconMenu'] = '';
                $data['aktifMenu'] = '';
                $dataButtonHalaman = $this->ModelHalamanMenu->byPeta($row['pengguna_grup'],'tidak');
                $arrayData = array();
                $object = (object) array();
                $objectOut = (object) array();
                foreach($dataButtonHalaman->result() as $hal){
                    array_push($arrayData, [$hal->halaman_menu => $hal->pengguna_grup]);
                }
                foreach($arrayData as $key => $value){
                    foreach($value  as $key2 => $value2){
                        $object->$key2 = $value2;
                    }
                }
                foreach($object as $key => $value){
                    $objectOut->$key = $value;
                }
                $data['buttonPriviliges'] = $objectOut;
            }
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/menu', $data);
            $this->load->view('pages/admin/'.$page, $data);
            $this->load->view('templates/admin/footer', $data);
        }else{
            $data = array();
            $data['nama_pengguna'] = $_GET ? $_GET['nama_pengguna'] : '';
            $data['password'] = $_GET ? $_GET['password'] : '';
            $data['errmsg'] = $_GET ? $_GET['errmsg'] : '';
            $this->load->view('pages/admin/login', $data);
        }
    }

    public function tambahBaru($page = 'halaman_menu/tambah'){
        $this->form_validation->set_rules('sub_judul_menu', 'Sub Judul Menu', 'required', array('required' => '%s belum diisi'));
        $this->form_validation->set_rules('judul_menu', 'Judul Menu', 'required', array('required' => '%s belum diisi'));
        $this->form_validation->set_rules('url_menu', 'Url Menu', 'required', array('required' => '%s belum dipilih'));
        $this->form_validation->set_rules('icon_menu', 'Icon Menu', 'required', array('required' => '%s belum diisi'));
        $this->form_validation->set_rules('aktif_menu', 'Aktif Menu', 'required', array('required' => '%s belum dipilih'));
        $data = array();
        $data['judulMenu'] = $this->input->post('judul_menu');
        $data['subJudulMenu'] = $this->input->post('sub_judul_menu');
        $data['urlMenu'] = $this->input->post('url_menu');
        $data['iconMenu'] = $this->input->post('icon_menu');
        $data['aktifMenu'] = $this->input->post('aktif_menu');
        $data['errmsg'] = '';
        $data['filejs'] = '';
        $current_url = $this->uri->segment(1);
        if($this->uri->segment(2)){
            $current_url .= '/'.$this->uri->segment(2);
        }
        $data['current_url'] = $current_url;
        $data['fixed'] = '';
        $dataAdmin = $this->ModelPengguna->idAdmin($this->session->userdata['adminManajemen']['pengguna_id']);
        $row = $dataAdmin->row_array();
        if($row){
            $dataGrup = $this->ModelPengguna->idGrup($row['pengguna_grup'])->row_array();
            $data['nama_pengguna'] = $row['nama_pengguna'];
            $data['nama_grup'] = $dataGrup['nama_grup'];
            $data['pengguna_grup'] = $row['pengguna_grup'];
            $data['menuHalaman'] = $this->ModelHalamanMenu->byUrl($current_url)->row();
            $data['menuPriviliges'] = $this->ModelHalamanMenu->byPeta($row['pengguna_grup'], 'ya');
            $dataButtonHalaman = $this->ModelHalamanMenu->byPeta($row['pengguna_grup'],'tidak');
            $arrayData = array();
            $object = (object) array();
            $objectOut = (object) array();
            foreach($dataButtonHalaman->result() as $hal){
                array_push($arrayData, [$hal->halaman_menu => $hal->pengguna_grup]);
            }
            foreach($arrayData as $key => $value){
                foreach($value  as $key2 => $value2){
                    $object->$key2 = $value2;
                }
            }
            foreach($object as $key => $value){
                $objectOut->$key = $value;
            }
            $data['buttonPriviliges'] = $objectOut;
        }
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/menu', $data);
            $this->load->view('pages/admin/'.$page, $data);
            $this->load->view('templates/admin/footer', $data);
        }else{
            $insert = array();
            $insert['judul_menu'] = $this->input->post('judul_menu');
            $insert['sub_judul_menu'] = $this->input->post('sub_judul_menu');
            $insert['url_menu'] = $this->input->post('url_menu');
            $insert['icon_menu'] = $this->input->post('icon_menu');
            $insert['aktif_menu'] = $this->input->post('aktif_menu');
            $this->db->insert('halaman_menu', $insert);
            $errmsg = '';
            $this->db->affected_rows() != 1 ? $errmsg = 'gagal' : $errmsg = 'berhasil';
            if($errmsg == 'gagal'){
                redirect(base_url().'admin/tambahMenu?errmsg='.$errmsg.'&judul_menu='.$this->input->post('judul_menu').'&url_menu'.$this->input->post('url_menu').'=&icon_menu='.$this->input->post('icon_menu').'&aktif_menu='.$this->input->post('aktif_menu'));
            }else if($errmsg == 'berhasil'){
                redirect(base_url().'admin/menu');
            }
        }
    }

    public function edit($page = 'halaman_menu/edit'){
        if(!file_exists(APPPATH.'views/pages/admin/'.$page.'.php')){
            show_404();
        }

        if(isset($this->session->userdata['adminManajemen'])){
            $dataAdmin = $this->ModelPengguna->idAdmin($this->session->userdata['adminManajemen']['pengguna_id']);
            $row = $dataAdmin->row_array();
            $data = array();
            $data['filejs'] = '';
            $current_url = $this->uri->segment(1);
            if($this->uri->segment(2)){
                $current_url .= '/'.$this->uri->segment(2);
            }
            $data['current_url'] = $current_url;
            $data['fixed'] = 'fixed';
            $data['menu_id_edit'] = $this->uri->segment(3);
            if($row){
                $dataGrup = $this->ModelPengguna->idGrup($row['pengguna_grup'])->row_array();
                $data['nama_pengguna'] = $row['nama_pengguna'];
                $data['nama_grup'] = $dataGrup['nama_grup'];
                $data['pengguna_grup'] = $row['pengguna_grup'];
                $data['errmsg'] = $this->input->get() ? $this->input->get('errmsg') : '';
                $data['menuHalaman'] = $this->ModelHalamanMenu->byUrl($current_url)->row();
                $data['menuPriviliges'] = $this->ModelHalamanMenu->byPeta($row['pengguna_grup'], 'ya');
                $dataMenu = $this->ModelHalamanMenu->byId($this->uri->segment(3))->row();
                $data['judulMenu'] = $dataMenu->judul_menu;
                $data['subJudulMenu'] = $dataMenu->sub_judul_menu;
                $data['urlMenu'] = $dataMenu->url_menu;
                $data['iconMenu'] = $dataMenu->icon_menu;
                $data['aktifMenu'] = $dataMenu->aktif_menu;
                $dataButtonHalaman = $this->ModelHalamanMenu->byPeta($row['pengguna_grup'],'tidak');
                $arrayData = array();
                $object = (object) array();
                $objectOut = (object) array();
                foreach($dataButtonHalaman->result() as $hal){
                    array_push($arrayData, [$hal->halaman_menu => $hal->pengguna_grup]);
                }
                foreach($arrayData as $key => $value){
                    foreach($value  as $key2 => $value2){
                        $object->$key2 = $value2;
                    }
                }
                foreach($object as $key => $value){
                    $objectOut->$key = $value;
                }
                $data['buttonPriviliges'] = $objectOut;
            }
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/menu', $data);
            $this->load->view('pages/admin/'.$page, $data);
            $this->load->view('templates/admin/footer', $data);
        }else{
            $data = array();
            $data['nama_pengguna'] = $_GET ? $_GET['nama_pengguna'] : '';
            $data['password'] = $_GET ? $_GET['password'] : '';
            $data['errmsg'] = $_GET ? $_GET['errmsg'] : '';
            $this->load->view('pages/admin/login', $data);
        }
    }

    public function update($page = 'halaman_menu/edit'){
        $this->form_validation->set_rules('sub_judul_menu', 'Sub Judul Menu', 'required', array('required' => '%s belum diisi'));
        $this->form_validation->set_rules('judul_menu', 'Judul Menu', 'required', array('required' => '%s belum diisi'));
        $this->form_validation->set_rules('url_menu', 'Url Menu', 'required', array('required' => '%s belum dipilih'));
        $this->form_validation->set_rules('icon_menu', 'Icon Menu', 'required', array('required' => '%s belum diisi'));
        $this->form_validation->set_rules('aktif_menu', 'Aktif Menu', 'required', array('required' => '%s belum dipilih'));
        $data = array();
        $data['judulMenu'] = $this->input->post('judul_menu');
        $data['subJudulMenu'] = $this->input->post('sub_judul_menu');
        $data['urlMenu'] = $this->input->post('url_menu');
        $data['iconMenu'] = $this->input->post('icon_menu');
        $data['aktifMenu'] = $this->input->post('aktif_menu');
        $data['errmsg'] = '';
        $data['filejs'] = '';
        $current_url = $this->uri->segment(1);
        if($this->uri->segment(2)){
            $current_url .= '/'.$this->uri->segment(2);
        }
        $data['current_url'] = $current_url;
        $data['fixed'] = '';
        $data['menu_id_edit'] = $this->input->post('menu_id_edit');
        $dataAdmin = $this->ModelPengguna->idAdmin($this->session->userdata['adminManajemen']['pengguna_id']);
        $row = $dataAdmin->row_array();
        if($row){
            $dataGrup = $this->ModelPengguna->idGrup($row['pengguna_grup'])->row_array();
            $data['nama_pengguna'] = $row['nama_pengguna'];
            $data['nama_grup'] = $dataGrup['nama_grup'];
            $data['pengguna_grup'] = $row['pengguna_grup'];
            $data['menuHalaman'] = $this->ModelHalamanMenu->byUrl($current_url)->row();
            $data['menuPriviliges'] = $this->ModelHalamanMenu->byPeta($row['pengguna_grup'], 'ya');
            $dataButtonHalaman = $this->ModelHalamanMenu->byPeta($row['pengguna_grup'],'tidak');
            $arrayData = array();
            $object = (object) array();
            $objectOut = (object) array();
            foreach($dataButtonHalaman->result() as $hal){
                array_push($arrayData, [$hal->halaman_menu => $hal->pengguna_grup]);
            }
            foreach($arrayData as $key => $value){
                foreach($value  as $key2 => $value2){
                    $object->$key2 = $value2;
                }
            }
            foreach($object as $key => $value){
                $objectOut->$key = $value;
            }
            $data['buttonPriviliges'] = $objectOut;
        }
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/menu', $data);
            $this->load->view('pages/admin/'.$page, $data);
            $this->load->view('templates/admin/footer', $data);
        }else{
            $update = array();
            $update['judul_menu'] = $this->input->post('judul_menu');
            $update['sub_judul_menu'] = $this->input->post('sub_judul_menu');
            $update['url_menu'] = $this->input->post('url_menu');
            $update['icon_menu'] = $this->input->post('icon_menu');
            $update['aktif_menu'] = $this->input->post('aktif_menu');
            $this->db->where('menu_id', $this->input->post('menu_id_edit'));
            $this->db->update('halaman_menu', $update);
            $errmsg = '';
            $this->db->affected_rows() != 1 ? $errmsg = 'gagal' : $errmsg = 'berhasil';
            if($errmsg == 'gagal'){
                redirect(base_url().'admin/editMenu/'.$this->input->post('menu_id_edit').'?errmsg='.$errmsg.'&judul_menu='.$this->input->post('judul_menu').'&url_menu'.$this->input->post('url_menu').'=&icon_menu='.$this->input->post('icon_menu').'&aktif_menu='.$this->input->post('aktif_menu'));
            }else if($errmsg == 'berhasil'){
                redirect(base_url().'admin/menu');
            }
        }
    }

    public function hapus(){
        $idMenu = $this->input->post('menu_id');
        $this->ModelHalamanMenu->deleteById($idMenu);
        $response = array(
            "status" => "success",
            "message" => "Data Berhasil dihapus"
        );
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }
}