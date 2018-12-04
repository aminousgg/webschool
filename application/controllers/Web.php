<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('url');
		$this->load->model('M_user');
		$this->load->model('M_login');
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->library('user_agent');
	}

	function login(){
		if($this->session->userdata('user')["status"] == "login" && $this->session->userdata('user')["level"]=="user"){
			redirect(base_url('auth/biodata'));
		}else{
			$data['judul'] = "Login";
			$this->load->view('auth/v_header_auth',$data);
			$this->load->view('auth/v_login',$data);
		}
	 	
	}
	function aksi_login(){

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		//var_dump($username);die;
		$where = array(
			'email' => $email,
			'password' => md5($password)
			);
		$cek = $this->M_login->cek_login("auth",$where)->num_rows();
		$query = $this->M_login->cek_login("auth",$where)->row_array();
		if($cek > 0){
			
			if($query['status']=="aktif"){
				$data_session = array(
				'nama' 		=> $email,
				'status' 	=> "login",
				'level'		=> "user"
				);
	
			$this->session->set_userdata('user',$data_session);
			redirect(base_url('auth/biodata'));
			
			}else{
				$this->session->set_flashdata('belumaktif', 'Gagal Login!');
				redirect(base_url('web/login'));
			}
			
	
		}else{
			$this->session->set_flashdata('errorpassword', 'Gagal Login!');
			redirect(base_url('web/login'));
		}
	}

	function logout(){
		$this->session->unset_userdata('user')["nama"];
		$this->session->unset_userdata('user')["level"];
		$this->session->unset_userdata('user')["level"];
		//$this->session->sess_destroy('user');
		redirect(base_url('web/index'));
	}

	public function index(){		
		$data['judul'] = "Home";
		$data['event'] = $this->M_user->tampil_event()->result();
		$data['news'] = $this->M_user->tampil_news()->result();
		$this->load->view('v_header',$data);
		$this->load->view('v_index',$data);
		$this->load->view('v_footer',$data);
	}
///==============================================================registrasi
	public function pendaftaran(){		
		$data['judul'] = "Pendaftaran";
		// $this->load->view('v_header',$data);
		$this->load->view('auth/v_header_auth',$data);
		$this->load->view('auth/v_pendaftaran',$data);
		// $this->load->view('v_footer',$data);
	}
	
	//==============================================
	
	public function about(){		
		$data['judul'] = "About";
		$this->load->view('v_header',$data);
		$this->load->view('v_about',$data);
		$this->load->view('v_footer',$data);
	}
	//========================kontak
	public function contact(){		
		$data['judul'] = "Contact";
		$this->load->view('v_header',$data);
		$this->load->view('v_contact',$data);
		$this->load->view('v_footer',$data);
	}
	function contact_user(){
		if(isset($_POST['kirim'])){
			//var_dump($_FILES['gambar']['name']);die;
			$nama = $this->input->post('nama_depan').' '.$this->input->post('nama_belakang');
			//var_dump($nama);
			$data = array(
				'nama'			=> $nama,
				'email'			=> $this->input->post('email'),
				'subjek'		=> $this->input->post('subjek'),
				'pesan'			=> $this->input->post('pesan'));
				
			//var_dump($data);die;
			$this->db->insert('contact',$data);
			echo "<script>
						alert('Pesan terkirim');
						document.location.href = 'contact';
					</script>";
			//redirect('web/contact');
		}else{
			$data['judul'] = 'Contact user';
			// $this->template->load('admin/v_header','admin/v_tambah_news','admin/v_footer',$data);
			$this->load->view('v_header',$data);
			$this->load->view('v_contact',$data);
			$this->load->view('v_footer',$data);
		}
	}

	//===========================================
	public function event(){

		$data['user'] = $this->M_user->tampil_event()->result();		
		$data['judul'] = "Event";
		$this->load->view('v_header',$data);
		$this->load->view('v_event',$data);
		$this->load->view('v_footer',$data);
	}
	public function news(){


		$data['user'] = $this->M_user->tampil_news()->result();	
		$data['judul'] = "News";
		$this->load->view('v_header',$data);
		$this->load->view('v_news',$data);
		$this->load->view('v_footer',$data);
		//var_dump($data['user']);die;
	}

}