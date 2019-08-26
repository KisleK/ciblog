<?php
  class Users extends CI_Controller{
    public function register(){
      $data['title'] = 'Sign Up';

      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
      $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
      $this->form_validation->set_rules('password', 'Password', 'required|matches[password2]');
      $this->form_validation->set_rules('password2', 'Confirm Password', 'required');

      if($this->form_validation->run() === FALSE){
        $this->load->view('templates/header');
        $this->load->view('users/register', $data);
        $this->load->view('templates/footer');

      } else {
        // Encrypt Password
        $enc_password = md5($this->input->post('password'));

        $this->user_model->register($enc_password);

        //Set Message

        $this->session->set_flashdata('user_registered', 'You are now a registered user of ciBlog');

        redirect('posts');
      }
    }

    // Check if username exists
    function check_username_exists($username){
      $this->form_validation->set_message('check_username_exists', 'That Username Is Already In Use. Please Choose Another Username');

      if($this->user_model->check_username_exists($username)){
          return true;
      } else {
          return false;
      }
    }

    // Check if email exists
    function check_email_exists($email){
      $this->form_validation->set_message('check_email_exists', 'That Email Is Already In Use. Please Choose Another Email');

      if($this->user_model->check_email_exists($email)){
          return true;
      } else {
          return false;
      }
    }
  }