<?php
  class Users extends CI_Controller{

    //Register User

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

    // Log in User

     public function login(){
      $data['title'] = 'Sign In';

      
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
  
      if($this->form_validation->run() === FALSE){
        $this->load->view('templates/header');
        $this->load->view('users/login', $data);
        $this->load->view('templates/footer');

      } else {
          
        //Get Username

      $username = $this->input->post('username');

      //Get and encrypt password
      $password = md5($this->input->post('password'));

      //Login User
      $user_id = $this->user_model->login($username, $password);

      if($user_id){
          // Create session

          $user_data = array(
              'user_id' => $user_id,
              'username' => $username,
              'logged_in' => true
          );

          $this->session->set_userdata($user_data);

         //Set Message
        $this->session->set_flashdata('user_loggedin', 'You are now logged in to ciBlog');

        redirect('posts');
      } else {
         //Set Message

        $this->session->set_flashdata('login_failed', 'Invalid Username or Password');

        redirect('users/login');
      }
      }
    }

    //log user out
    public function logout(){
      //unset user data
      $this->session->unset_userdata('logged_in');
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('username');

       //Set Message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out of ciBlog');

        redirect('users/login');
    }


    // Check if username exists
    public function check_username_exists($username){
      $this->form_validation->set_message('check_username_exists', 'That Username Is Already In Use. Please Choose Another Username');

      if($this->user_model->check_username_exists($username)){
          return true;
      } else {
          return false;
      }
    }

    // Check if email exists
    public function check_email_exists($email){
      $this->form_validation->set_message('check_email_exists', 'That Email Is Already In Use. Please Choose Another Email');

      if($this->user_model->check_email_exists($email)){
          return true;
      } else {
          return false;
      }
    }
  }