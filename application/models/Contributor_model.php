<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contributor_model extends CI_model{

  public function __construct()
  {
    $this->load->model('account_model');
  }

  //core
  public function getAllData($table)
  {
    $query = $this->db->get($table);
    return $query->result();
  }

  public function getDataRow($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->get_where($table, $where);
    return $query->row();
  }

  public function updateData($table, $varWhere, $valWhere, $varSet, $valSet)
  {
    $where = array($varWhere => $valWhere);
    $data = array($varSet => $valSet);
    $this->db->where($where);
    $status = $this->db->update($table, $data);
    return $status;
  }

  public function uploadPicture($filename)
  {
    $config['upload_path'] = APPPATH.'../assets/upload/';
    $config['overwrite'] = TRUE;
    $config['file_name']     = $filename;
    $config['allowed_types'] = 'jpg|png';
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('fileUpload')) {
      $upload['status']=0;
      $upload['message']= "Mohon maaf terjadi error saat proses upload : ".$this->upload->display_errors();
    } else {
      $upload['status']=1;
      $upload['message'] = "File berhasil di upload";
    }
    return $upload;
  }

  public function deleteData($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->delete($table, $where);
    return $query;
  }


    public function uploadFile($filename,$allowedFile)
    {
      $config['upload_path'] = APPPATH.'../assets/upload/';
      $config['overwrite'] = TRUE;
      $config['file_name']     =  str_replace(' ','_',$filename);
      $config['allowed_types'] = $allowedFile;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('fileUpload')) {
        $upload['status']=0;
        $upload['message']= "Mohon maaf terjadi error saat proses upload : ".$this->upload->display_errors();
      } else {
        $upload['status']=1;
        $upload['message'] = "File berhasil di upload";
        $upload['ext'] = $this->upload->data('file_ext');
      }
      return $upload;
    }


  //functional



  //application


  public function cDetailDocument($id)
  {
    $data['detail'] = $this->getDataRow('view_document', 'id', $id);
    $data['title'] = 'Detail Dokumen';
    $data['view_name'] = 'detail';
    $data['notification'] = 'no';
    return $data;
  }

  public function updateDocument($id)
  {
    $data = array('document_name' => $this->input->post('document_name'), 'document_info' => $this->input->post('document_info'));
    $where = array('id' => $id );
    $this->db->where($where);
    $operation['status'] = $this->db->update('document', $data);
    return $operation;
  }

  public function deleteDocument($id)
  {
    if (md5($this->input->post('password'))==$this->session->userdata['password']) {
      unlink('./assets/upload/'.$this->getDataRow('document', 'id', $id)->address);
      $operation['status'] = $this->deleteData('document', 'id', $id);
      $operation['redirect'] = 'document';
    } else {
      $operation['redirect'] = 'detail'.ucfirst($this->session->userdata['role']).'/'.$id;
      $operation['status'] = 0;
    }
    return $operation;
  }

  public function uploadRevision($id)
  {
    $upload = $this->uploadFile($this->getDataRow('document', 'id', $id)->document_name, 'pdf|xls|xlsx|doc|docx|jpg');
    if($upload['status']==1){
//      $this->updateData('document', 'id', $id, 'address', 'address' => str_replace(' ','_',$this->input->post('document_name')).$this->upload->data('file_ext'));
    }
    return $upload;

  }

}
 ?>
