


<?php
class FileUpload extends CI_Model {

// $this->db->insert('ImgUpload',array(  
// 'Img' => $data['userfile']     
// ));  
// }

public function do_upload($alldata)
	{
		$this->db->where('id', 0);
	 $this->db->update('imgupload',$alldata);
	}


	public function getPdf()
	{
		$this->db->where('id', 0);
	return $this->db->get('imgupload')->result_array();
	}
}

?>