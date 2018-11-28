<?php 

class M_user extends CI_Model{
	function tampil_news(){
		return $this->db->get('news');
	}

	function tampil_event(){
		return $this->db->get('event');
	}
	
	function news(){
		return $this->db->get('news');
	}
	public function edit_new($id){

		return $this->db->get_where('news',array('id'=>$id));
	}

	///============================
	public function contact(){
		return $this->db->get('contact');
	}
	//============================
	public function pendaftaran(){
		return $this->db->get('pendaftaran');
	}

	public function Insert_auth($table,$data){
		$res = $this->db->insert($table, $data); 
        return $res;
	}

	public function aktivasi($email)
    {
        $data = array(
            'status' => 'aktif',
        );
        $this->db->from('auth');
        $this->db->where('token', $email);
        $this->db->update('auth', $data);
        return true;
	}
	public function GetWhere($table, $data){
        $res=$this->db->get_where($table, $data);
        return $res->result_array();
    }

}


 ?>