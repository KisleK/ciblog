<?php
  class Contacts extends CI_Controller{
    public function create(){
      $data['title'] = 'Send Email';


      // $this->form_validation->set_rules('name', 'Name', 'required');
      // $this->form_validation->set_rules('email', 'Email', 'required');
      // $this->form_validation->set_rules('subject', 'Subject', 'required');
      // $this->form_validation->set_rules('message', 'Message', 'required');

        $from_email = "kyle_kuhn1@hotmail.com";
        $to_email = $this->input->post('email');
        //Load email library
        $this->email->from($from_email, 'Identification');
        $this->email->to($to_email);
        $this->email->subject('Send Email Codeigniter');
        $this->email->message('The email send using codeigniter library');





      // if($this->form_validation->run() === FALSE){
      //   $this->load->view('templates/header');
      //   $this->load->view('contacts/create', $data);
      //   $this->load->view('templates/footer');
      // } 
      if($this->email->send()){
            $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
        }




        // else {
      //   $this->contact_model->create_contact();
      //   $this->session->set_flashdata('post_created', 'Email Sent');
      //   redirect('');
      // }

      else {
            $this->session->set_flashdata("email_sent","You have encountered an error");
            $this->load->view('contacts/create');
        
          redirect('');

    }
  }
}
