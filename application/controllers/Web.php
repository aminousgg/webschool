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
			$this->load->view('auth/v_login');
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
		$this->load->view('auth/v_pendaftaran',$data);
		// $this->load->view('v_footer',$data);
	}

	public function display_person(){
		//var_dump($this->session->userdata('level')); die;
		if($this->session->userdata('user')["status"] == "login" && $this->session->userdata('user')["level"]=="user"){
			$where = array(
					'username' => $this->session->userdata('user')["nama"]);
		
			$data['record'] = $this->M_login->cek_login("pendaftaran",$where)->row_array();

			$data['judul'] = "Halaman daftar";
			$this->load->view('v_header',$data);
			$this->load->view('v_display_person',$data);
			$this->load->view('v_footer',$data);

		}
		else{

			$this->load->view('auth/v_login');
		}		
			
	}

	function daftar(){
		if(isset($_POST['daftar'])){
			
			//var_dump($nama);
			$usr = str_replace(' ', '', $this->input->post('nama'));
			$username = strtolower($usr.strval(rand(10,100)));
			$kode = rand(1000,9999);
			if($this->input->post('password')!==$this->input->post('password1')){
				echo "<script>
						alert('password tdk sesuai');
						document.location.href = 'pendaftaran';
					</script>";

					//redirect('web/pendaftaran');
			}
			else{

				$data = array(
				'nama'			=> $this->input->post('nama'),
				'gender'		=> $this->input->post('gender'),
				'tempat_lahir'	=> $this->input->post('tempat_lahir'),
				'tgl_lahir' 	=> $this->input->post('tanggal'),
				'alamat'		=> $this->input->post('alamat'),
				'asal_sekolah'	=> $this->input->post('asal_sekolah'),
				'tahun_lulus'	=> $this->input->post('tahun_lulus'),
				'username'		=> $username,
				'password'		=> md5($this->input->post('password')),
				'kode_daftar'	=> $kode);
				
				//var_dump($data);die;
				$this->db->insert('pendaftaran',$data);
				//var_dump(mysqli_affected_rows($this->db->insert('pendaftaran',$data))); die;
				//view_display($username,$this->input->post('password'));
				echo "<script>
						alert('Berhasil Mendaftar');
					</script>";

				$user_name = $username;
				$password = $this->input->post('password');
				$where = array(
					'username' => $user_name,
					'password' => md5($password)
					);
				$cek = $this->M_login->cek_login("pendaftaran",$where)->num_rows();
				if($cek > 0){
		 
					$data_session = array(
						'nama' 		=> $username,
						'status' 	=> "login",
						'level'		=> "user"
						);
 
				$this->session->set_userdata('user',$data_session);
		 
					redirect(base_url("Display_person"));
		 
				}else{
					echo "<script>
						alert('password/username salah');
						document.location.href = 'pendaftaran';
					</script>";
				}	
			}
			//redirect('web/pendaftaran');
		}else{
			// $data['judul'] = 'daftar';
			// // $this->template->load('admin/v_header','admin/v_tambah_news','admin/v_footer',$data);
			// $this->load->view('v_header',$data);
			// $this->load->view('v_contact',$data);
			// $this->load->view('v_footer',$data);
			echo "Data tak masuk";
		}
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