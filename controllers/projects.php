<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*ini adalah kelas yang digunakan untuk melakukan aktivitas yang berhubungan dengan project,
seperti posting project, melihat project, mengubah project, mencari project*/

class Projects extends Public_Controller{

	function __construct() {
        parent::__construct();
        $this->load->helper(array('form','url','date')); //helper form untuk syntax2 form, url untuk site_url dan base_url, date untuk mengambil waktu, digunakan untuk date expired
        $this->load->library('form_validation'); //librari ini digunakan untuk memeriksa kelengkapan isian dari form
        $this->load->model('ProjectModel','',TRUE); //model_project_m di load -database dari project-
        $this->load->model('model_project_m','',TRUE);
	}

	/* fungsi index untuk menampilkan project secara default */
	function index(){
		//belum diset
	}

	/*
		Tambah project -> pilihan tipe project (regular,trial,kontes) => projects/PilihTypeProject
		Form project Regular(type_id = 1) => projects/TambahProject/1/1
		Form project Trial(type_id = 2) => projects/TambahProject/2/1
		Form project Kontes(type_id = 3) => projects/TambahProject/3/1
		Regular -> Pilih fitur => projects/TambahProject/1/2
		Trial -> Pilih fitur => projects/TambahProject/2/2
		Kontes -> Pilih fitur => projects/TambahProject/3/2
		Regular/Trial/Kontes -> Verifikasi Form => projects/VerifikasiProject
	*/
	public function PilihTypeProject(){
		/*
		Perlu ditambahkan cek Session
		Fungsi ini berfungsi untuk menampilkan jendela pilihan tipe dari Project yang akan dibuat
		Pilihan yang tersedia : Regular, Trial, Kontes
		View yang berhubungan dengan Fungsi ini : PilihTypeProjectView.php
		*/
		$this->load->view('PilihTypeProjectView');
	}
	public function TambahProject($type_id,$stage){
		/*
		Perlu ditambahkan cek Session
		Fungsi ini berperan dalam menampilkan form project baru sesuai dengan masukkan:
		$type_id -> 2 => Regular, 3 => Trial, 4 => Kontes Lomba
		$stage -> 2 => Main Form, 3 => Feature Form
		View yang terlibat dalam fungsi ini:
		- TambahProjectRegularMainView.php
		- TambahProjectRegularFeatureView.php
		- TambahProjectTrialMainView.php
		- TambahProjectTrialFeatureView.php
		- TambahProjectKontesMainView.php
		- TambahProjectKontesFeatureView.php
		*/
		//ditambahkan penangkapan id user
		if($type_id == 1 && $stage == 1){
			$type_id = $this->input->post('type');
			$stage = 2;
		}
		if($stage == 2){
			switch($type_id){
				case 2 : {
					//Setiap variable di ubah ke dalam bentuk array
					$data['type_id'] = $type_id;
					$data['stage'] = $stage;
					$this->load->view('TambahProjectRegularMainView',$data);
					break;
				}
				case 3 :{
					$data['type_id'] = $type_id;
					$data['stage'] = $stage;
					$this->load->view('TambahProjectTrialMainView',$data);
					break;
				}
				case 4 :{
					$data['type_id'] = $type_id;
					$data['stage'] = $stage;
					$this->load->view('TambahProjectKontesMainView',$data);
					break;
				}
			}
		}else if($stage == 3){
			switch($type_id){
				case 2 : {
					$data['type_id'] = $type_id;
					$data['stage'] = $stage;
					$tanggal = $this->input->post('tanggal',true);
					$bulan = $this->input->post('bulan',true);
					$tahun = $this->input->post('tahun',true);
					$date_expired = $tahun."-".$bulan."-".$tanggal;
					$data['title'] = $this->input->post('title',true);
					$data['category_id'] = $this->input->post('category_id',true);
					$data['description'] = $this->input->post('description',true);
					$data['budget'] = $this->input->post('budget',true);
					$data['date_expired'] = $date_expired;
					$data['date_updated'] = $date_expired;
					$this->load->view('TambahProjectRegularFeatureView',$data);
					break;
				}
				case 3 :{
					$data['type_id'] = $type_id;
					$data['stage'] = $stage;
					$tanggal = $this->input->post('tanggal',true);
					$bulan = $this->input->post('bulan',true);
					$tahun = $this->input->post('tahun',true);
					$date_expired = $tahun."-".$bulan."-".$tanggal;
					$data['title'] = $this->input->post('title',true);
					$data['category_id'] = $this->input->post('category_id',true);
					$data['description'] = $this->input->post('description',true);
					$data['budget'] = $this->input->post('budget',true);
					$data['date_expired'] = $date_expired;
					$data['date_updated'] = $date_expired;
					$this->load->view('TambahProjectTrialFeatureView',$data);
					break;
				}
				case 4 :{
					$data['type_id'] = $type_id;
					$data['stage'] = $stage;
					$tanggal = $this->input->post('tanggal',true);
					$bulan = $this->input->post('bulan',true);
					$tahun = $this->input->post('tahun',true);
					$date_expired = $tahun."-".$bulan."-".$tanggal;
					$data['title'] = $this->input->post('title',true);
					$data['category_id'] = $this->input->post('category_id',true);
					$data['description'] = $this->input->post('description',true);
					$data['budget'] = $this->input->post('budget',true);
					$data['date_expired'] = $date_expired;
					$data['date_updated'] = $date_expired;
					$this->load->view('TambahProjectKontesFeatureView',$data);
					break;
				}
			}
		}
	}
	public function VerifikasiProject(){
		/*
		Perlu ditambahkan cek Session
		Fungsi ini berperan di tahap akhir pembuatan project.
		Dipakai untuk menampilkan setiap masukkan yang telah dimasukkan oleh user
		di page-page sebelumnya
		View yang terlibat dalam fungsi ini: VerifikasiProjectView.php
		*/
		$data['title'] = $this->input->post('title',true);
		$data['category_id'] = $this->input->post('category_id',true);
		$data['description'] = $this->input->post('description',true);
		$data['budget'] = $this->input->post('budget',true);
		$data['date_expired'] = $this->input->post('date_expired',true);
		$data['date_updated'] = $this->input->post('date_expired',true);
		$this->load->view('VerifikasiProjectView',$data);
	}
	public function SimpanProject(){
		/*
		Perlu ditambahkan cek Session
		Fungsi ini berperan ketika pembuat Project 
		telah melakukan verifikasi terhadap form project.
		Project baru ditambahkan ke dalam database 
		ipro_project.
		Hanya berisi syntax-syntax yang menangkap 
		masukkan-masukkan dari page sebelumnya.
		View akan dialihkan ke : TampilProjectView.php
		Model yang digunakan : ProjectModel
		Fungsi Model yang digunakan : TambahProjectDatabase
		*/
		$data['title'] = $this->input->post('title',true);
		$data['category_id'] = $this->input->post('category_id',true);
		$data['description'] = $this->input->post('description',true);
		$data['budget'] = $this->input->post('budget',true);
		$data['date_expired'] = $this->input->post('date_expired',true);
		$data['date_updated'] = $this->input->post('date_expired',true);
		$this->ProjectModel->TambahProjectDatabase($data);
		redirect('projects/TampilProject');
    }

    public function TampilProject(){
    	$this->load->library('pagination');
		$config['base_url'] = base_url() . 'Projects/TampilProject';
		$config['total_rows'] = count($this->ProjectModel->PilihSemuaProject()->result());
		$config['per_page'] = '10'; //maksimum row perhalaman
		$config['uri_segment'] = '3'; //pengaturan uri -alamat url
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);
		$data['project'] =  $this->ProjectModel->PilihProjectPerPage($config['per_page'],$this->uri->segment(3));
		//print_r($data);
		$this->load->view('TampilProjectView',$data);
    }

    public function TampilDetailProject($project_id){
    	$data['project'] = $this->ProjectModel->PilihProjectTerpilih($project_id)->result();
    	$data['bidder'] = $this->ProjectModel->TampilBidderProject($project_id)->result();
    	$this->load->view('TampilDetailProjectView',$data);
    }

    public function CariProject(){
    	$keyword = $this->input->post('keyword',true);
    	$this->load->library('pagination');
		$config['base_url'] = base_url() . 'Projects/CariProject';
		$config['total_rows'] = count($this->ProjectModel->HasilPencarianProject($keyword)->result());
		$config['per_page'] = '10'; //maksimum row perhalaman
		$config['uri_segment'] = '3'; //pengaturan uri -alamat url
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);
		$data['project'] =  $this->ProjectModel->HasilPencarianProjectPerPage($config['per_page'],$this->uri->segment(3),$keyword);
		//print_r($data);
		$this->load->view('TampilProjectView',$data);
    }

    public function UrutProject(){
    	$sortKey = $this->input->post('sortKey');
    	if($sortKey == 1){
	    	redirect('projects/UrutProjectTitle');
		}else if($sortKey == 2){
			redirect('projects/UrutProjectBudget');
		}
    }

    public function UrutProjectTitle(){
    	$this->load->library('pagination');
		$config['base_url'] = base_url() . 'Projects/UrutProjectTitle';
		$config['total_rows'] = count($this->ProjectModel->PilihSemuaProject()->result());
		$config['per_page'] = '10'; //maksimum row perhalaman
		$config['uri_segment'] = '3'; //pengaturan uri -alamat url
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);
		$data['project'] =  $this->ProjectModel->HasilPengurutanProjectTitle($config['per_page'],$this->uri->segment(3));
		//print_r($data);
		$this->load->view('TampilProjectView',$data);
    }

    public function UrutProjectBudget(){
    	$this->load->library('pagination');
		$config['base_url'] = base_url() . 'Projects/UrutProjectBudget';
		$config['total_rows'] = count($this->ProjectModel->PilihSemuaProject()->result());
		$config['per_page'] = '10'; //maksimum row perhalaman
		$config['uri_segment'] = '3'; //pengaturan uri -alamat url
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);
		$data['project'] =  $this->ProjectModel->HasilPengurutanProjectBudget($config['per_page'],$this->uri->segment(3));
		//print_r($data);
		$this->load->view('TampilProjectView',$data);
    }

    /* FUNGSI-FUNGSI SEBELUMNYA YANG SUDAH DI NON-AKTIFKAN */

    /*public function jendela_tambah_project(){
    	$this->load->view('add_project_v');
    }*/
	/*fungsi untuk tampilan tambah project baru yang kedua (berisi form-form tambahan/lampiran)*/
	/*public function jendela_tambah_project_2(){

	/*periksa kelengkapan isian dari form pertama
		$this->form_validation->set_rules('title', 'Judul', 'required'); //mengatur isian dari title, harus diisi
		
		if ($this->form_validation->run() == FALSE)
		{
			/*Jika tidak lengkap maka kembali ke jendela pertama
			redirect('projects/jendela_tambah_project');
		}
		else
		{
			/*Jika lengkap maka lakukan operasi berikut, lalu berangkat menuju form kedua
			/*mengambil data POST dari halaman sebelumnya
			$tanggal = $this->input->post('tanggal',true);
			$tanggal = $tanggal;
			$bulan = $this->input->post('bulan',true);
			$tahun = $this->input->post('tahun',true);
			$date_expired = $tahun."-".$bulan."-".$tanggal;
			$data['title'] = $this->input->post('title',true);
			$data['category_id'] = $this->input->post('category_id',true);
			$data['description'] = $this->input->post('description',true);
			$data['budget'] = $this->input->post('budget',true);
			$data['date_expired'] = $date_expired;
			$data['date_updated'] = $date_expired;
			$this->load->view('add_project_v_2',$data);
		}

	}*/
/*fungsi untuk menampilkan seluruh project yang telah ada (disertai paginasi)*/
    /*public function tampil_project(){
    	$this->load->library('pagination');
		$config['base_url'] = base_url() . 'Projects/tampil_project';
		$config['total_rows'] = count($this->model_project_m->select_all_project_semua()->result());
		$config['per_page'] = '10'; //maksimum row perhalaman
		$config['uri_segment'] = '3'; //pengaturan uri -alamat url
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);
		$data['project'] =  $this->model_project_m->select_all_project($config['per_page'],$this->uri->segment(3));
		//print_r($data);
		$this->load->view('Tampil_project_v',$data);
    }*/
	//fungsi untuk menampilkan tampilan terakhir dari memasukkan project, berupa tampilan verifikasi, menampilkan data-data yang telah dimasukkan sebelumnya
    /*public function tampil_verifikasi_project(){
    	$data['title'] = $this->input->post('title',true);
		$data['category_id'] = $this->input->post('category_id',true);
		$data['description'] = $this->input->post('description',true);
		$data['budget'] = $this->input->post('budget',true);
		$data['date_expired'] = $this->input->post('date_expired',true);
		$data['date_updated'] = $this->input->post('date_expired',true);
		$this->load->view('Tampil_Verifikasi_Project_v',$data);
    }*/

    /*public function tampil_selected_project($project_id){
    	$data['project'] = $this->model_project_m->select_selected_project($project_id)->result();
    	$data['bidder'] = $this->model_project_m->select_bidder_project($project_id)->result();
    	$this->load->view('tampil_selected_project_v',$data);
    }*/

    /*public function tambah_project(){
		//mengambil data POST dari halaman sebelumnya
		$data['title'] = $this->input->post('title',true);
		$data['category_id'] = $this->input->post('category_id',true);
		$data['description'] = $this->input->post('description',true);
		$data['budget'] = $this->input->post('budget',true);
		$data['date_expired'] = $this->input->post('date_expired',true);
		$data['date_updated'] = $this->input->post('date_expired',true);
		$this->model_project_m->add_project($data);
		redirect('projects/tampil_project');
    }*/

    /*public function search_project(){
    	$keyword = $this->input->post('keyword',true);
    	$this->load->library('pagination');
		$config['base_url'] = base_url() . 'Projects/tampil_project';
		$config['total_rows'] = count($this->model_project_m->select_all_project_search($keyword)->result());
		$config['per_page'] = '10'; //maksimum row perhalaman
		$config['uri_segment'] = '3'; //pengaturan uri -alamat url
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);
		$data['project'] =  $this->model_project_m->select_search_project($config['per_page'],$this->uri->segment(3),$keyword);
		//print_r($data);
		$this->load->view('Tampil_project_v',$data);
    }*/

    /*public function sort_project(){
    	$sortKey = $this->input->post('sortKey');
    	if($sortKey == 1){
	    	$this->load->library('pagination');
			$config['base_url'] = base_url() . 'Projects/tampil_project';
			$config['total_rows'] = count($this->model_project_m->select_all_project_semua()->result());
			$config['per_page'] = '10'; //maksimum row perhalaman
			$config['uri_segment'] = '3'; //pengaturan uri -alamat url
			$config['full_tag_open'] = '<p>';
			$config['full_tag_close'] = '</p>';
			$this->pagination->initialize($config);
			$data['project'] =  $this->model_project_m->select_all_project_ascTitle($config['per_page'],$this->uri->segment(3));
			//print_r($data);
			$this->load->view('Tampil_project_v',$data);
		}else if($sortKey == 2){
			$this->load->library('pagination');
			$config['base_url'] = base_url() . 'Projects/tampil_project';
			$config['total_rows'] = count($this->model_project_m->select_all_project_semua()->result());
			$config['per_page'] = '10'; //maksimum row perhalaman
			$config['uri_segment'] = '3'; //pengaturan uri -alamat url
			$config['full_tag_open'] = '<p>';
			$config['full_tag_close'] = '</p>';
			$this->pagination->initialize($config);
			$data['project'] =  $this->model_project_m->select_all_project_ascBudget($config['per_page'],$this->uri->segment(3));
			//print_r($data);
			$this->load->view('Tampil_project_v',$data);
		}
    }*/

    
}
