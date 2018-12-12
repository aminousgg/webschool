<?php 
 
class Auth extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('M_user');
		$this->load->model('M_login');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->library('user_agent');
	}
 
	public function prosesregister()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[auth.email]|valid_email|valid_emails|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[15]|xss_clean');
		$this->form_validation->set_message('required', 'Mohon Maaf! Harap mengisi kolom <b>%s</b>.');
		$this->form_validation->set_message('is_unique', 'Mohon Maaf! <b>%s</b> sudah digunakan.');
		$this->form_validation->set_message('min_length', 'Mohon Maaf! <b>%s</b> minimal 8 karakter.');
		$this->form_validation->set_message('max_length', 'Mohon Maaf! <b>%s</b> maksimal 15 karakter.');
		$this->form_validation->set_message('valid_email', 'Mohon Maaf! Harap Memasukkan <b>%s</b> yang Benar.');
		$this->form_validation->set_message('valid_emails', 'Mohon Maaf! Harap Memasukkan <b>%s</b> yang Benar.');

		if($this->form_validation->run() == FALSE)
		{
			$email=$this->input->post('email', TRUE);
			$cek=$this->M_login->cek_login("auth",array('email'=>$email))->num_rows();
			if($cek>0){
				
				$this->session->set_flashdata('double_data', 'Gagal Mendaftar!');
				redirect(base_url('web/pendaftaran'));
			}
		}
		else
		{
			if(preg_match("/gmail.com/", $this->input->post('email', TRUE)) || preg_match("/yahoo.com/", $this->input->post('email', TRUE)) ) 
			{
				date_default_timezone_set("Asia/Jakarta");
				$data = array(
					'email' => $this->input->post('email', TRUE),
					'password' => md5($this->input->post('password', TRUE)),
					'token' => md5($this->input->post('email', TRUE)),
					'waktu' => date('Y-m-d H:i:s'),
					'status' => 'Belum Aktif',
				);
				$ci = get_instance();
				$ci->load->library('email');
				$email = $this->input->post('email');
				$code = md5($this->input->post('email'));
				$config['protocol'] = "smtp";
				$config['smtp_host'] = "ssl://smtp.gmail.com";
				$config['smtp_port'] = "465";
				$config['smtp_user'] = "cobasekolahku@gmail.com";
				$config['smtp_pass'] = "123akusayangkamu";
				$config['charset'] = "utf-8";
				$config['mailtype'] = "html";
				$config['newline'] = "\r\n";
				
				$ci->email->initialize($config);
				$isi = '<table>';
				$isi .= '<tr><td><h4>Aktifasi akun pendaftaranmu</h4></td></tr>';
				$isi .= '<tr><td><p>Halo <b>' . $email . '</b> terima kasih telah melakukan pendaftaran di (bla bla). Kami beritahukan kepada Anda untuk melakukan aktivasi akun agar bisa digunakan.</p></td></tr>';
				$isi .= '<tr><td><a href="http://localhost/webschool/auth/aktivasi/'.$code.' ">AKTIVASI AKUN</a></td></tr>';
				$isi .= '<tr><td><p>Terima Kasih</p></td></tr>';
				$isi .= '</table>';
				$ci->email->from('noreply@printmedia.com', 'My School');
				$ci->email->to($email);
				$ci->email->subject('AKTIFASI AKUN Pendaftaran');
				$ci->email->message($isi);
				$this->email->send();
				$data = $this->M_user->Insert_auth('auth', $data);
				
				$this->session->set_flashdata('success', 'Berhasil Mendaftar!');
				redirect(base_url('web/pendaftaran'));
			} 
			else 
			{ 
				$this->session->set_flashdata('error', 'Gagal Mendaftar!');
				redirect(base_url('web/pendaftaran'));
			}  
		}
	}

	public function aktivasi($token)
	{
		$this->M_user->aktivasi($token);
		$where = array('token' => $token);
		$data = $this->M_user->GetWhere('auth', $where);
		$data = array('data' => $data);
		$data['judul'] = "Aktivasi";
		$this->load->view('auth/v_header_auth',$data);
		$this->load->view('auth/v_sukses_aktivasi',$data);
	}

	public function biodata(){
		if($this->session->userdata('user')["status"] == "login" && $this->session->userdata('user')["level"]=="user"){
			$data['judul'] = "Bio";
			$email=$this->session->userdata('user')['nama'];
			$cek=$this->M_login->cek_login("biodata",array('email'=>$email))->num_rows();
			if($cek>0){
				// echo "otw";
				$data['record'] = $this->M_user->edit_bio($email)->row_array();
				$this->load->view('auth/v_header_auth',$data);
				$this->load->view('auth/display_bio',$data);
				//redirect(base_url('auth/display_bio'));
			}else{
				$this->load->view('auth/v_header_auth',$data);
				$this->load->view('auth/v_bio',$data);
			}
			
		}else{
			$data['judul'] = "Login";
			$this->load->view('auth/v_header_auth',$data);
			$this->load->view('auth/v_login',$data);
		}
	}
	public function bio_in(){
		$nama=$this->input->post('nama', TRUE).' '.$this->input->post('nama1', TRUE);
		$data = array(
			'nama'	=>	$nama,
			'email'	=>	$this->session->userdata('user')['nama'],
			'gender'=>	$this->input->post('gender', TRUE),
			'nisn'	=>	$this->input->post('nisn', TRUE),
			'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
			'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
			'alamat'=>	$this->input->post('alamat', TRUE),
		);
		$result=$this->M_user->Insert_auth('biodata', $data);
		if($result==true){
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan');
			redirect(base_url('auth/berkas'));
		}else{
			$this->session->set_flashdata('error', 'Gagal ditambahkan');
			redirect(base_url('auth/biodata'));
		}
	}
	public function edit_bio(){
		$email=$this->session->userdata('user')['nama'];
		$data['judul']="Bio";
		$data['record'] = $this->M_user->edit_bio($email)->row_array();
		$this->load->view('auth/v_header_auth',$data);
		$this->load->view('auth/edit_bio',$data);
	}
	public function edit_bio_in(){
		$email=$this->session->userdata('user')['nama'];
		$nama=$this->input->post('nama', TRUE).' '.$this->input->post('nama1', TRUE);
		$data = array(
			'nama'	=>	$nama,
			'email'	=>	$this->session->userdata('user')['nama'],
			'gender'=>	$this->input->post('gender', TRUE),
			'nisn'	=>	$this->input->post('nisn', TRUE),
			'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
			'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
			'alamat'=>	$this->input->post('alamat', TRUE),
		);
		$this->db->where('email',$email);
		$result=$this->db->update('biodata',$data);
		if($result==true){
			$this->session->set_flashdata('success_ubah', 'Berhasil Di Ubah');
			redirect(base_url('auth/berkas'));
		}else{
			$this->session->set_flashdata('error', 'Gagal Mengubah');
			redirect(base_url('auth/biodata'));
		}
	}


	public function berkas(){
		if($this->session->userdata('user')["status"] == "login" && $this->session->userdata('user')["level"]=="user"){
			$data['judul'] = "Bio";
			$email=$this->session->userdata('user')['nama'];
			$cek=$this->M_login->cek_login("berkas",array('email'=>$email))->num_rows();

			if($cek>0){
				echo "otw";
				$this->load->view('auth/v_header_auth',$data);
				// tampilan display person
			}else{
				$this->load->view('auth/v_header_auth',$data);
				$this->load->view('auth/v_bio_akademik',$data);
			}
			
		}else{
			$data['judul'] = "Login";
			$this->load->view('auth/v_header_auth',$data);
			$this->load->view('auth/v_login',$data);
		}
	}
}