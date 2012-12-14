<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*ini adalah kelas yang digunakan untuk melakukan aktivitas yang berhubungan dengan project,
seperti posting project, melihat project, mengubah project, mencari project*/

class Projects extends Public_Controller{

	function __construct() {
        parent::__construct();
        $this->load->helper(array('form','url','date')); //helper form untuk syntax2 form, url untuk site_url dan base_url, date untuk mengambil waktu, digunakan untuk date expired
        $this->load->library('form_validation'); //librari ini digunakan untuk memeriksa kelengkapan isian dari form
        $this->load->model('model_project_m','',TRUE); //model_project_m di load -database dari project-
	}

	/* fungsi index untuk menampilkan project secara default */

	function index(){
		//belum diset
	}

	/*fungsi untuk tampilan tambah project baru yang pertama (berisi form-form inti)*/
	public function jendela_tambah_project(){

		$this->load->view('add_project_v');

	}

	/*fungsi untuk tampilan tambah project baru yang kedua (berisi form-form tambahan/lampiran)*/
	public function jendela_tambah_project_2(){

	/*periksa kelengkapan isian dari form pertama*/
		$this->form_validation->set_rules('title', 'Judul', 'required'); //mengatur isian dari title, harus diisi
		$this->form_validation->set_rules('budget', 'Budget', 'required'); //mengatur isian dari budget, harus diisi

		if ($this->form_validation->run() == FALSE)
		{
			/*Jika tidak lengkap maka kembali ke jendela pertama*/
			redirect('projects/jendela_tambah_project');
		}
		else
		{
			/*Jika lengkap maka lakukan operasi berikut, lalu berangkat menuju form kedua*/
			/*mengambil data POST dari halaman sebelumnya*/
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

	}

/*fungsi untuk memasukkan data-data ke dalam database*/
	public function tambah_project(){
			/*mengambil data POST dari halaman sebelumnya*/
			$data['title'] = $this->input->post('title',true);
			$data['category_id'] = $this->input->post('category_id',true);
			$data['description'] = $this->input->post('description',true);
			$data['budget'] = $this->input->post('budget',true);
			$data['date_expired'] = $this->input->post('date_expired',true);
			$data['date_updated'] = $this->input->post('date_expired',true);
			$this->model_project_m->add_project($data);
			redirect('projects/tampil_project');
    }
/*fungsi untuk menampilkan seluruh project yang telah ada (disertai paginasi)*/
    public function tampil_project(){
    	$this->load->library('pagination');
		$config['base_url'] = base_url() . 'Projects/tampil_project';
		$config['total_rows'] = count($this->model_project_m->select_all_project_semua()->result());
		$config['per_page'] = '2'; //maksimum row perhalaman
		$config['uri_segment'] = '3'; //pengaturan uri -alamat url
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);
		$data['project'] =  $this->model_project_m->select_all_project($config['per_page'],$this->uri->segment(3));
		$this->load->view('Tampil_project_v',$data);
    }
/*fungsi untuk menampilkan tampilan terakhir dari memasukkan project, berupa tampilan verifikasi, menampilkan data-data yang telah dimasukkan sebelumnya*/
    public function tampil_verifikasi_project(){
    	$data['title'] = $this->input->post('title',true);
		$data['category_id'] = $this->input->post('category_id',true);
		$data['description'] = $this->input->post('description',true);
		$data['budget'] = $this->input->post('budget',true);
		$data['date_expired'] = $this->input->post('date_expired',true);
		$data['date_updated'] = $this->input->post('date_expired',true);
		$this->load->view('Tampil_Verifikasi_Project_v',$data);
    }
}