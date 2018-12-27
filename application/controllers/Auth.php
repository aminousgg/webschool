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
			$this->session->set_flashdata('success_bio', 'Data berhasil ditambahkan');
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
			$this->session->set_flashdata('success_bio', 'Berhasil Di Ubah');
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
			$data['record'] = $this->M_user->edit_berkas($email)->row_array();
			$data['ambil']=$this->M_user->edit_bio($email)->row_array();
			// var_dump($data['bio']);die;
			if($cek>0){
				// echo "otw";
				$this->load->view('auth/v_header_auth',$data);
				$this->load->view('auth/display_berkas',$data);
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
	public function tambah_berkas(){
		if($this->session->userdata('user')["status"] == "login" && $this->session->userdata('user')["level"]=="user")
		{
			$email=$this->session->userdata('user')['nama'];
			$ambil = $this->M_user->edit_bio($email)->row_array();
			
			$kk = $_FILES['kk']['name'];
			$ext_kk = pathinfo($kk, PATHINFO_EXTENSION);
			//===
			$ijasah = $_FILES['ijasah']['name'];
			$ext_ijasah = pathinfo($ijasah, PATHINFO_EXTENSION);
			//==
			$skhu = $_FILES['skhu']['name'];
			$ext_skhu = pathinfo($skhu, PATHINFO_EXTENSION);
			//==
			$pas_foto = $_FILES['file']['name'];
			$ext_foto = pathinfo($pas_foto, PATHINFO_EXTENSION);


			if( ($ext_kk=='pdf'&&$ext_ijasah=='pdf'&&$ext_skhu=='pdf')&&($ext_foto=='jpg'||$ext_foto=='png'||$ext_foto=='jpeg') )
			{
				$a = $this->upload_kk($_POST);
				$b = $this->upload_ijasah($_POST);
				$c = $this->upload_skhu($_POST);
				$d = $this->upload_foto($_POST);
				//var_dump($_POST); die;
				$kode=rand(1000,9999);
				$data = array(
					'nisn'			=> $ambil["nisn"],
					'email'			=> $ambil["email"],
					'sekolah'		=> $this->input->post('asal_sekolah'),
					'tahun_lulus'	=> $this->input->post('tahun_lulus'),
					'kk'			=> $a['file_name'],
					'ijasah'		=> $b['file_name'],
					'skhu'			=> $c['file_name'],
					'pas_foto'		=> $d['file_name'],
					'kode_daftar'	=> $kode
				);
				//var_dump($data); die;
				$result=$this->db->insert('berkas',$data);
				if($result==true){
					$this->session->set_flashdata('success', 'Berhasil Ditambah!');
					redirect(base_url('auth/berkas'));
				}else{
					$this->session->set_flashdata('error', 'Gagal Ditambah!');
					redirect(base_url('auth/berkas'));
				}

			}else{
				$this->session->set_flashdata('error1', 'Gagal Ditambah!');
				redirect(base_url('auth/berkas'));
			}
			
		}
	}
	public function edit_berkas(){
		$email=$this->session->userdata('user')['nama'];
		$data['judul']="Bio";
		$data['record'] = $this->M_user->edit_berkas($email)->row_array();
		$data['ambil']=$this->M_user->edit_bio($email)->row_array();
		$this->load->view('auth/v_header_auth',$data);
		$this->load->view('auth/edit_berkas',$data);
	}

	public function edit_berkas_in(){
		$email=$this->session->userdata('user')['nama'];
		$data = array(
			'sekolah'		=> $this->input->post('asal_sekolah'),
			'tahun_lulus'	=> $this->input->post('tahun_lulus')
		);
		$this->db->where('email',$email);
		$result=$this->db->update('berkas',$data);
		if($result==true){
			$this->session->set_flashdata('success', 'Berhasil diupdate');
			redirect(base_url('auth/berkas'));
		}else{
			$this->session->set_flashdata('error', 'Gagal Ditambah!');
			redirect(base_url('auth/berkas'));
		}
	}

	public function edit_foto(){
		$email=$this->session->userdata('user')['nama'];
		$data['judul']="Bio";
		$data['record'] = $this->M_user->edit_berkas($email)->row_array();
		$data['ambil']=$this->M_user->edit_bio($email)->row_array();
		$this->load->view('auth/v_header_auth',$data);
		$this->load->view('auth/edit_pas_foto',$data);
	}
	public function edit_foto_in(){
		$email=$this->session->userdata('user')['nama'];
		$config['upload_path']	 = './berkas/pas_foto';
		$config['allowed_types'] = 'jpg|jpeg|png';
		if(empty($_POST['file'])){
			$config['file_name']	 = "foto_";
		}else{
			$config['file_name']	 = "foto_".$_POST['file'];
		}
		//var_dump($foto['file_name']); die;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->upload->do_upload('file');
		$foto = $this->upload->data();

		
		$data = array(
			'pas_foto'	=>  $foto['file_name']
		);
		$this->db->where('email',$email);
		$this->db->update('berkas',$data);
		
		
		$cek = $this->M_user->edit_berkas($email)->row_array();
		//var_dump($cek['pas_foto']); die;
		if($cek['pas_foto']=="foto_"){
			$data = array(
				'pas_foto'	=>  $this->input->post('foto')
			);
			$this->db->where('email',$email);
			$result=$this->db->update('berkas',$data);
			if($result==true){
				$this->session->set_flashdata('success', 'Berhasil diupdate');
				redirect(base_url('auth/berkas'));
			}else{
				$this->session->set_flashdata('error', 'Gagal Ditambah!');
				redirect(base_url('auth/berkas'));
			}
		}else{
			$this->session->set_flashdata('success', 'Berhasil diupdate');
			redirect(base_url('auth/berkas'));
		}
		
	}
	public function check(){
		
	}

	public function upload_kk($post){
		$_POST=$post;
		$config['upload_path'] 		= './berkas/pdf/kk';
		$config['allowed_types'] 	= 'pdf';
		// $config['overwrite'] 		= TRUE;
		$config['file_name']		= "KK_".$_FILES['kk']['name'];
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->upload->do_upload('kk');
		$detail_kk = $this->upload->data();
		unset($config);
		return $detail_kk;
	}
	public function upload_ijasah($post){
		$_POST=$post;
		
		$config['upload_path'] 	= './berkas/pdf/ijasah';
		$config['allowed_types'] 	= 'pdf';
		// $config['overwrite'] 		= TRUE;
		$config['file_name']		= "IJASAH_".$_FILES['ijasah']['name'];
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->upload->do_upload('ijasah');
		$detail_ijasah = $this->upload->data();
		unset($config);
		return $detail_ijasah;
	}
	public function upload_skhu($post){
		$_POST=$post;
		$config['upload_path']	 = './berkas/pdf/skhu/';
		$config['allowed_types'] = 'pdf';
		// $config['overwrite'] 	 = TRUE;
		$config['file_name']	 = "SKHU_".$_FILES['skhu']['name'];
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->upload->do_upload('skhu');
		$detail_skhu = $this->upload->data();
		unset($config);
		return $detail_skhu;
	}
	public function upload_foto($post){
		$_POST=$post;
		$config['upload_path']	 = './berkas/pas_foto';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name']	 = "foto_".$_FILES['file']['name'];
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->upload->do_upload('file');
		$detail_foto = $this->upload->data();
		unset($config);
		return $detail_foto;
	}
}