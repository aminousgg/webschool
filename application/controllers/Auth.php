<?php 
 
class Auth extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('M_user');
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
			$data['judul'] = "Pendaftaran";
			// $this->load->view('v_header',$data);
			$this->load->view('v_pendaftaran',$data);
			// $this->load->view('v_footer',$data);
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

	//===================login
	// public function login()
	// {
	// 	$this->load->view('auth/Login');
	// }
	// public function proseslogin()
	// {		
	// 	$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[15]|xss_clean');
	// 	$this->form_validation->set_message('required', 'Mohon Maaf! Harap mengisi kolom <b>%s</b>.');
	// 	$this->form_validation->set_message('min_length', 'Mohon Maaf! <b>%s</b> minimal %s karakter.');
	// 	$this->form_validation->set_message('max_length', 'Mohon Maaf! <b>%s</b> maksimal %s karakter.');
	// 	$email=$this->input->post('email');
	// 	$password=$this->input->post('password');
		
	// 	if($this->form_validation->run() == FALSE)
	// 	{
	// 		$this->load->view('auth/login');
	// 	}
	// 	else
	// 	{
	// 		$this->M_user->loginUser();
	// 	}		
	// }

	public function aktivasi($token)
	{
		$this->M_user->aktivasi($token);
		$where = array('token' => $token);
		$data = $this->M_user->GetWhere('auth', $where);
		$data = array('data' => $data);
		$this->load->view('auth/v_sukses_aktivasi');
	}

	public function biodata(){
		if($this->session->userdata('user')["status"] == "login" && $this->session->userdata('user')["level"]=="user"){
			$this->load->view('auth/v_bio');
		}else{
			$this->load->view('auth/v_login');
		}
	}
}