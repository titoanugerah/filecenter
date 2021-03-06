<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    error_reporting(0);
    $this->load->model('account_model');
  }

  public function login()
  {
    if ($this->input->post('loginValidation')) {
      $account = $this->account_model->loginValidation();
      $status = $account['status'];
      if ($status==1) {$this->session->set_userdata($account['account']); redirect(base_url('dashboard'));} else {  $data['content'] = $this->account_model->cLogin($status);}
    } else {
      $data['content'] = $this->account_model->cLogin(1);
    }
    $this->load->view('login', $data);
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url(''));
  }

  public function dashboard()
  {
    $data['content'] = $this->account_model->cDashboard();
    $this->load->view('template', $data);
  }

  public function profile()
  {
    $update['status'] = 2;
    if ($this->input->post('updateAccount')) {
      $update = $this->account_model->updateAccount();
      if ($update['status']==1) {$this->session->set_userdata($update['session']);}
    } elseif ($this->input->post('uploadFile')) {
      $update = $this->account_model->updatePicture();
      if ($update['status']==4) {$this->session->set_userdata($update['session']);}
    } elseif ($this->input->post('deleteFile')) {
      $delete = $this->account_model->deleteDP($this->session->userdata['display_picture']);
      if ($delete['status']==1) {$this->session->set_userdata($delete['session']);}
    }
    $data['content'] = $this->account_model->cProfile($update['status']);
    $this->load->view('template', $data);
  }


  public function error404()
  {
    $data['content'] = $this->account_model->cError404();
    $this->load->view('template', $data);
  }

  public function document()
  {
    $update['file'] = null;
    if($this->input->post('uploadFile')){$update = $this->account_model->processUploadFile();}
    elseif($this->input->post('findFile')){$update['file'] = $this->input->post('document_name');}
    $data['content'] = $this->account_model->cDocument($update['file']);
    if ($this->session->userdata['login']==1) {
      $this->load->view('template', $data);
    } else {
      $this->load->view('template1', $data);

    }

  }

  public function download($id)
  {
    $this->load->helper('download');
    force_download('./assets/upload/'.$this->account_model->getDataRow('document', 'id', $id)->address, null);
  }
}

 ?>
