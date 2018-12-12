<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('url');
		$this->load->model('M_admin');
		$this->load->model('M_login');
		// if ($this->session->userdata('username')=="") {
		// 	redirect('login');
		// }
	
		//  else if(!$this->session->userdata('level') =="admin"){
		//  	redirect(base_url("menu/guru"));
		//  }
	}

	function login(){
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){

			$where = array(
					'username' => $this->session->userdata('admin')["nama"]);
		
			$data['record'] = $this->M_login->cek_login("akun_admin",$where)->row_array();
			//var_dump($data['record']);die;

			//$data['record'] = $this->M_admin->edit_new($id)->row_array();
			$data['news'] = $this->M_admin->tampil_news()->result();
			$data['event'] = $this->M_admin->tampil_event()->result();
			$data['pendaftaran'] = $this->M_admin->tampil_pendaftaran()->result();
			$data['contact'] = $this->M_admin->tampil_contact()->result();
			$this->load->view('admin/v_header',$data);
			$this->load->view('admin/v_aside',$data);
			$this->load->view('admin/v_dashboard',$data);
			$this->load->view('admin/v_footer',$data);

		}else{
			$this->load->view('admin/v_admin_login');
		}
	 	
	}
	function aksi_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//var_dump($username);die;
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->M_login->cek_login("akun_admin",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' 		=> $username,
				'status' 	=> "login",
				'level'		=> "admin"
				);
 
			$this->session->set_userdata('admin',$data_session);

			//var_dump($this->session->userdata('admin','status'));die;
 
			redirect(base_url("Admin"));
 
		}else{
			$this->session->set_flashdata('error', 'gagal login');
			$this->load->view('admin/v_admin_login');
		}
	}

	function logout(){
		$this->session->unset_userdata('admin')["nama"];
		$this->session->unset_userdata('admin')["level"];
		$this->session->unset_userdata('admin')["level"];
		//$this->session->sess_destroy('admin');
		redirect(base_url('admin/index'));
	}

	function index(){
		//echo "admin broo";
		//$data['user'] = $this->M_admin->tampil_data()->result();

		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
			
			$where = array(
					'username' => $this->session->userdata('admin')["nama"]);
		
			$data['record'] = $this->M_login->cek_login("akun_admin",$where)->row_array();
			//var_dump($data['record']);die;
			$data['usr']=$where['username'];
			$data['judul']="Dashboard";
			//$data['record'] = $this->M_admin->edit_new($id)->row_array();
			$data['news'] = $this->M_admin->tampil_news()->result();
			$data['event'] = $this->M_admin->tampil_event()->result();
			$data['pendaftaran'] = $this->M_admin->tampil_pendaftaran()->result();
			$data['contact'] = $this->M_admin->tampil_contact()->result();
			// $this->session->unset_userdata('admin')["nama"];
			// $this->session->unset_userdata('admin')["level"];
			// $this->session->unset_userdata('admin')["level"]; die;
			$this->load->view('admin/v_header',$data);
			$this->load->view('admin/v_aside',$data);
			$this->load->view('admin/v_dashboard',$data);
			$this->load->view('admin/v_footer',$data);

		}else{
			$this->load->view('admin/v_admin_login');
		}
	}
//=====================================================CRUD BERITA=========================================================
	 public function news(){

	 	if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
			$data['user'] = $this->M_admin->tampil_news()->result();	
			$data['judul'] = "Halaman news";

			$data['usr']=$this->session->userdata('admin')["nama"];

			$this->load->view('admin/v_header',$data);
			$this->load->view('admin/v_aside',$data);
			$this->load->view('admin/v_tampil',$data);
			$this->load->view('admin/v_footer',$data);
		}else{
			$this->load->view('admin/v_admin_login',$data);
		}	
		
	}
	function tambah_news(){

		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){

			if(isset($_POST['tambah'])){
				//var_dump($_FILES['gambar']['name']);die;
				

				$config['upload_path'] 		= './assets/img/';
				$config['allowed_types'] 	= 'jpg|jpeg|png|gif';

				$this->load->library('upload',$config);
				$this->upload->do_upload('gambar');
				$hasil 	= $this->upload->data();
				
				$data = array(
					'tanggal'			=> $this->input->post('tanggal'),
					'gambar'			=> $hasil['file_name'],
					'judul'				=> $this->input->post('judul'),
					'isi'				=> $this->input->post('isi'),
					'sumber'			=> $this->input->post('sumber'));
					
					
				$result=$this->db->insert('news',$data);
				//var_dump($this->db->insert('news',$data)); die;
				if($result==true){
					$this->session->set_flashdata('success', 'Berhasil Ditambah!');

					// echo "<script>
					// 		alert('Berhasil ditambah');
					// 		document.location.href = 'news';
					// 	</script>";
					redirect(base_url('admin/news'));
				}else{
					$this->session->set_flashdata('error', 'Gagal Ditambah!');
					redirect(base_url('admin/news'));
				}
				
			}else{
				$data['judul'] = 'tambah news';
				// $this->template->load('admin/v_header','admin/v_tambah_news','admin/v_footer',$data);

				$data['usr']=$this->session->userdata('admin')["nama"];

				$this->load->view('admin/v_header',$data);
				$this->load->view('admin/v_aside',$data);
				$this->load->view('admin/v_tambah_news',$data);
				$this->load->view('admin/v_footer',$data);
			}
			
		}else{
			$this->load->view('admin/v_admin_login');
		}
	}

	public function news_edit()
	{
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
			$this->load->model('M_admin');
			$id=$this->uri->segment(3);
			$data['record'] = $this->M_admin->edit_new($id)->row_array();
			//var_dump($data);die;
			
			$data['usr']=$this->session->userdata('admin')["nama"];
			$data['judul']="Halaman news";
			$this->load->view('admin/v_header',$data);
			$this->load->view('admin/v_aside',$data);
			$this->load->view('admin/v_edit_news',$data);
			$this->load->view('admin/v_footer',$data);
		}else{
			$this->load->view('admin/v_admin_login');
		}
	}

	public function news_edit_in()
	{
				$id = $this->input->post('id');
				
				$data = array(
					'tanggal'	=> $this->input->post('tanggal'),
					'judul'		=> $this->input->post('judul'),
					'isi'		=> $this->input->post('isi'),
					'sumber'	=> $this->input->post('sumber'));
					
				$this->db->where('id',$id);
				$result=$this->db->update('news',$data);
				if($result==true){
					$this->session->set_flashdata('success', 'Berhasil di edit');
					redirect(base_url('admin/news'));
				}else{
					$this->session->set_flashdata('error', 'Gagal update');
					redirect(base_url('admin/news'));
				}

				//redirect('admin/news');
	}
	public function news_hapus($id){
		$result=$this->db->delete('news',array('id'=>$id));
		if($result==true){
			$this->session->set_flashdata('success', 'Berhasil di Hapus');
			redirect(base_url('admin/news'));
		}else{
			$this->session->set_flashdata('error', 'Gagal menghapus');
			redirect(base_url('admin/news'));
		}
		//redirect('admin/news');
	}

	public function ubah_gambar()
	{
		$id = $this->input->post('id');

		$config['upload_path'] 		= './assets/img';
		$config['allowed_types'] 	= 'jpg|jpeg|png|gif';

		// var_dump($_POST); die;
		$this->load->library('upload',$config);
		$this->upload->do_upload('gambar');
		$nama_gambar = $_FILES['file']['name'];
		$hasil 	= $this->upload->data();
		//$id=$this->input->post('id');
		$data = array(
					'gambar'	=> $hasil['file_name']);
		$this->db->where('id',$id);

		$result=$this->db->update('news',$data);
		if($result==true){
			$this->session->set_flashdata('success', 'Gambar telah diubah');
			redirect(base_url('admin/news'));
		}else{
			$this->session->set_flashdata('error', 'Gagal mengubah');
			redirect(base_url('admin/news'));
		}

	}
//========================================================================================================================

//=============================================CRUD EVENT================================================================
	public function event(){
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){

			$data['user'] = $this->M_admin->tampil_event()->result();	
			$data['judul'] = "Halaman event";
			
			$data['usr']=$this->session->userdata('admin')["nama"];
			
			$this->load->view('admin/v_header',$data);
			$this->load->view('admin/v_aside',$data);
			$this->load->view('admin/v_tampil_event',$data);
			$this->load->view('admin/v_footer',$data);
		
		}else{
			$data['report']="belum";
			$this->load->view('admin/v_admin_login');
		}
		
	}
	function tambah_event(){
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){

			if(isset($_POST['tambah'])){
				$data = array(
					'tanggal'			=> $this->input->post('tanggal'),
					'penyelenggara'		=> $this->input->post('penyelenggara'),
					'nama_event'		=> $this->input->post('nama_event'),
					'tempat'			=> $this->input->post('tempat'));
					
					
				$result=$this->db->insert('event',$data);
				if($result==true){
					$this->session->set_flashdata('success', 'Berhasil Ditambah!');
					redirect('admin/event');
				}else{
					$this->session->set_flashdata('error', 'Gagal Ditambah!');
					redirect('admin/event');
				}
				
			}else{
				$data['judul'] = 'tambah event';
				// $this->template->load('admin/v_header','admin/v_tambah_news','admin/v_footer',$data);
				$data['usr']=$this->session->userdata('admin')["nama"];
				$this->load->view('admin/v_header',$data);
				$this->load->view('admin/v_aside',$data);
				$this->load->view('admin/v_tambah_event',$data);
				$this->load->view('admin/v_footer',$data);
			}
		
		}else{
			$this->load->view('admin/v_admin_login');
		}

			
	}

	public function event_edit()
	{
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){
			
			$this->load->model('M_admin');
			$id=$this->uri->segment(3);
			$data['record'] = $this->M_admin->edit_event($id)->row_array();
			//var_dump($data);die;
			$data['judul']="Halaman event";
			$data['usr']=$this->session->userdata('admin')["nama"];
			$this->load->view('admin/v_header',$data);
			$this->load->view('admin/v_aside',$data);
			$this->load->view('admin/v_edit_event',$data);
			$this->load->view('admin/v_footer',$data);

		}else{
			$this->load->view('admin/v_admin_login');
		}
	}

	public function event_edit_in()
	{
			$id=$this->input->post('id');

			$data = array(
				'tanggal'			=> $this->input->post('tanggal'),
				'penyelenggara'		=> $this->input->post('penyelenggara'),
				'nama_event'		=> $this->input->post('nama_event'),
				'tempat'			=> $this->input->post('tempat'));

			$this->db->where('id',$id);
			$result=$this->db->update('event',$data);
			if($result==true){
				$this->session->set_flashdata('success', 'Berhasil diupdate');
				redirect('admin/event');
			}else{
				$this->session->set_flashdata('error', 'Gagal Mengubah!');
				redirect('admin/event');
			}
			//redirect('admin/event');
	}
	public function event_hapus($id){
		$result=$this->db->delete('event',array('id'=>$id));
		if($result==true){
			$this->session->set_flashdata('success', 'Berhasil di Hapus');
			redirect(base_url('admin/event'));
		}else{
			$this->session->set_flashdata('error', 'Gagal menghapus');
			redirect(base_url('admin/event'));
		}
		//redirect('admin/event');
	}
//================================================VIEW DISPLAY PENDAFTAR=================================
	public function pendaftaran(){
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){

			$data['user'] = $this->M_admin->tampil_pendaftaran()->result();	
			$data['judul'] = "Pendaftaran";

			$data['usr']=$this->session->userdata('admin')["nama"];
			
			$this->load->view('admin/v_header',$data);
			$this->load->view('admin/v_aside',$data);
			$this->load->view('admin/v_tampil_pendaftaran',$data);
			$this->load->view('admin/v_footer',$data);
		
		}else{
			$this->load->view('admin/v_admin_login');
		}
		
	}

	public function pendaftaran_edit()
	{

			$this->load->model('M_admin');
			$id=$this->uri->segment(3);
			$data['record'] = $this->M_admin->edit_pendaftaran($id)->row_array();
			//var_dump($data);die;
			$data['judul'] = "Pendaftaran";
			$data['usr']=$this->session->userdata('admin')["nama"];
			
			$this->load->view('admin/v_header',$data);
			$this->load->view('admin/v_aside',$data);
			$this->load->view('admin/v_edit_pendaftaran',$data);
			$this->load->view('admin/v_footer',$data);
	}

	public function pendaftaran_edit_in()
	{
		$id=$this->input->post('id');

		$data = array(
				'nama'			=> $this->input->post('nama'),
				'gender'		=> $this->input->post('gender'),
				'tempat_lahir'	=> $this->input->post('tempat_lahir'),
				'tgl_lahir' 	=> $this->input->post('tanggal'),
				'alamat'		=> $this->input->post('alamat'),
				'asal_sekolah'	=> $this->input->post('asal_sekolah'),
				'tahun_lulus'	=> $this->input->post('tahun_lulus'),
				'username'		=> $this->input->post('username'),
				'password'		=> $this->input->post('password'),
				'kode_daftar'	=> $this->input->post('kode_daftar'));

		$this->db->where('id',$id);
		$result=$this->db->update('pendaftaran',$data);
		if($result==true){
			$this->session->set_flashdata('success', 'Berhasil di Ubah');
			redirect(base_url('admin/pendaftaran'));
		}else{
			$this->session->set_flashdata('error', 'Gagal Mengubah');
			redirect(base_url('admin/pendaftaran'));
		}
		//redirect('admin/pendaftaran');
	}
	public function pendaftaran_hapus($id){
		$result=$this->db->delete('pendaftaran',array('id'=>$id));
		if($result==true){
			$this->session->set_flashdata('success', 'Berhasil di Hapus');
			redirect(base_url('admin/pendaftaran'));
		}else{
			$this->session->set_flashdata('error', 'Gagal menghapus');
			redirect(base_url('admin/pendaftaran'));
		}
		//redirect('admin/pendaftaran');
	}


//==================================================VIEW DISPLAY CONTACT======================================
	public function contact(){
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){

			$data['user'] = $this->M_admin->tampil_contact()->result();	
			$data['judul'] = "Halaman contact";

			$data['usr']=$this->session->userdata('admin')["nama"];
			// $this->load->view('admin/v_aside',$data);

			$this->load->view('admin/v_header',$data);
			$this->load->view('admin/v_aside',$data);
			$this->load->view('admin/v_tampil_contact',$data);
			$this->load->view('admin/v_footer',$data);
		
		}else{
			$this->load->view('admin/v_admin_login');
			
		}
		
	}

//==================================================KALENDER=====================================
	public function calender(){
		if($this->session->userdata('admin')["status"] == "login" && $this->session->userdata('admin')["level"]=="admin"){

			$data['user'] = $this->M_admin->tampil_contact()->result();	
			$data['judul'] = "Halaman calender";

			$data['usr']=$this->session->userdata('admin')["nama"];
			// $this->load->view('admin/v_aside',$data);

			$this->load->view('admin/v_header',$data);
			$this->load->view('admin/v_aside',$data);
			$this->load->view('admin/v_calender',$data);
			$this->load->view('admin/v_footer',$data);
		
		}else{
			$this->load->view('admin/v_admin_login');
		}
	}

	
}