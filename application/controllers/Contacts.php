<?php
  class Contacts extends CI_Controller{
    public function create(){
      $data['title'] = 'Send Email';
      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('subject', 'Subject', 'required');
      $this->form_validation->set_rules('message', 'Message', 'required');
      if($this->form_validation->run() === FALSE){
        $this->load->view('templates/header');
        $this->load->view('contacts/create', $data);
        $this->load->view('templates/footer');
      } else {
        $this->contact_model->create_contact();
        $this->session->set_flashdata('post_created', 'Email Sent');
        redirect('');
      }
    }
  }
