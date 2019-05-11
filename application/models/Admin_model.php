<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_model{

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

  public function getDataRow2($table, $var1, $val1, $var2, $val2)
  {
    $where = array($var1 => $val1, $var2 => $val2);
    $data = $this->db->get_where($table, $where);
    return $data->row();
  }

  public function getNumRows($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->get_where($table, $where);
    return $query->num_rows();
  }

  public function getNumRows2($table, $var1, $val1, $var2, $val2)
  {
    $where = array($var1 => $val1, $var2 => $val2);
    $data = $this->db->get_where($table, $where);
    return $data->num_rows();
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

  public function sentEmail($id, $subject, $message)
  {
    $account = $this->getDataRow('view_'.$this->getDataRow('account', 'id', $id)->role, 'id', $id);
    $emailConf = $this->getDataRow('webconf', 'id', 1);
    $config = [
      'protocol' => 'sentmail',
      'smtp_host' => $emailConf->host,
      'smtp_user' => $emailConf->username,
      'smtp_pass' => $emailConf->password,
      'smtp_crypto' => $emailConf->crypto,
      'charset' => 'utf-8',
      'crlf' => 'rn',
      'newline' => "\r\n", //REQUIRED! Notice the double quotes!
      'smtp_port' => $emailConf->port
    ];
    $this->load->library('email', $config);
    $this->email->from($emailConf->email);
    $this->email->to($account->email);
    $this->email->subject($subject);
    $this->email->message('
    Yth. '.$account->fullname.'
    Di tempat.

    '.$message.'

    Atas perhatiannya kami ucapkan terima kasih.

    Admin
    ');
    $sent = $this->email->send();
    error_reporting(0);
    return 1;
  }

  public function deleteData($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->delete($table, $where);
    return $query;
  }

  //functional
  public function getRole($id)
  {
    return ($this->getDataRow('account', 'id', $id)->role);
  }


  //application
  public function cWebConf($notification)
  {
    $data['config'] = $this->admin_model->getDataRow('webconf', 'id', 1);
    $data['title'] = 'Konfigurasi Website';
    $data['view_name'] = 'webConf';
    $data['notification'] = 'webConf'.$notification;
    return $data;
  }

  public function updateEmail()
  {
    $where = array('id' => 1 );
    $data = array(
      'client_name' => $this->input->post('client_name'),
      'web_name' => $this->input->post('web_name')
    );
    $this->db->where($where);
    $update['status']  = $this->db->update('webconf',$data);
    return $update;
  }

  public function updateWallpaper()
  {
    $status['upload'] = $this->uploadPicture('login_image');
    $status['status'] = $status['upload']['status'];
    $this->updateData('webconf', 'id', 1, 'login_image', 'login_image.jpg');
    return $status;
  }

  public function cAccount($notification)
  {
    $data['account'] = $this->admin_model->getAllData('account');
    $data['title'] = 'Pengaturan Akun';
    $data['view_name'] = 'account';
    $data['notification'] = 'account'.$notification;
    return $data;
  }

  public function createAccount()
  {
    $data = array('username' => $this->input->post('username'), 'fullname' => $this->input->post('fullname'), 'role' => 'contributor', 'password'=>md5('0000'), 'display_picture' => 'no.jpg');
    $status['status'] = $this->db->insert('account', $data);
    return $status;
  }

  public function cDetailAccount($id, $notification)
  {
    $data['account'] = $this->admin_model->getDataRow('account', 'id', $id);
    $data['title'] = 'Detail Akun @'.$data['account']->username;
    $data['view_name'] = 'detailAccount';
    $data['notification'] = 'detailAccount'.$notification;
    return $data;
  }

  public function deleteAccount($id)
  {
    if (md5($this->input->post('password'))==$this->session->userdata['password']) {
      $delete['status'] = $this->deleteData('account', 'id', $id);
    } else {
      $delete['status'] = 0;
    }
    return (int)$delete['status']+1;
  }

  public function resetPassword($id)
  {
    $operation['status'] =  $this->updateData('account', 'id', $id, 'password', md5('0000'));
    return $operation;
  }

  public function cTheme($notification)
  {
    $data['theme'] = $this->getAllData('view_tema');
    $data['title'] = 'Tema KP dan TA';
    $data['view_name'] = 'theme';
    $data['notification'] = 'operation'.$notification;
    return $data;
  }

  public function createTheme()
  {
    $operation['status'] = $this->db->insert('tema', array('nama_tema' => $this->input->post('nama_tema')));
    return $operation;
  }

  public function cDetailDocument($id)
  {
    $data['detail'] = $this->getDataRow('view_document', 'id', $id);
    $data['title'] = 'Detail Dokumen';
    $data['view_name'] = 'detail';
    $data['notification'] = 'no';
    return $data;
  }

  public function updateTheme($id)
  {
    $operation['status'] = (int)($this->updateData('tema', 'id', $id, 'nama_tema', $this->input->post('nama_tema')))+2;
    return $operation;
  }

  public function deleteTheme($id)
  {
    if (md5($this->input->post('password'))==$this->session->userdata['password']) {
      $operation['status'] = (int)$this->deleteData('tema', 'id', $id)+4;
      $this->updateData('account_dosen', 'id_tema_1', $id, 'id_tema_1' , 10);
      $this->updateData('account_dosen', 'id_tema_2', $id, 'id_tema_2' , 10);
      $this->updateData('rekap_kerjapraktik', 'id_tema', $id, 'id_tema' , 10);
      $this->updateData('rekap_tugasakhir', 'id_tema', $id, 'id_tema' , 10);
      $operation['redirect'] = 'theme';
    } else {
      $operation['redirect'] = 'detailTheme/'.$id;
      $operation['status'] = 4;
    }
    return $operation;
  }

}
 ?>