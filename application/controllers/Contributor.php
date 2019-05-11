<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contributor extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('contributor_model');
    error_reporting(0);
    if (!$this->session->userdata['login']) {
      redirect(base_url('login'));
    } elseif ($this->session->userdata['role']!='contributor') {
      redirect(base_url('error404'));
    }
  }
  public function detailContributor($id)
  {
    if ($this->input->post('updateDocument')) {$operation = $this->contributor_model->updateDocument($id);}
    elseif ($this->input->post('deleteDocument')) {$operation = $this->contributor_model->deleteDocument($id); if($operation['status']==1){redirect(base_url($operation['redirect']));}}
    elseif ($this->input->post('uploadDocument')) {$operation = $this->contributor_model->uploadRevision($id);}
    $data['content'] = $this->contributor_model->cDetailDocument($id);
    $this->load->view('template', $data);

  }


}
 ?>
