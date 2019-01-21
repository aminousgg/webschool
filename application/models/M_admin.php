<?php 

class M_admin extends CI_Model{
	//===========================berita============================
	function tampil_news(){
		return $this->db->get('news');
	}
	
	function news(){
		return $this->db->get('news');
	}
	public function edit_new($id){

		return $this->db->get_where('news',array('id'=>$id));
	}
	//=============================================================
	//======================event==================================
	function tampil_event(){
		return $this->db->get('event');
	}
	
	function event(){
		return $this->db->get('event');
	}
	public function edit_event($id){

		return $this->db->get_where('event',array('id'=>$id));
	}

	//===============================================
	function tampil_pendaftaran(){
		return $this->db->get('pendaftaran');
	}

	public function edit_pendaftaran($id){

		return $this->db->get_where('pendaftaran',array('id'=>$id));
	}
	function tampil_auth(){
		return $this->db->get('auth');
	}
	function tampil_bio(){
		return $this->db->get('biodata');
	}
	function tampil_berkas(){
		return $this->db->get('berkas');
	}
	//===============================================
	function tampil_contact(){
		return $this->db->get('contact');
	}

}


 ?>