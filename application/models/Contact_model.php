<?php
    class Contact_model extends CI_Model{

      public function __construct(){
        $this->load->database();
      }

      public function create_contact(){
        $data = array(
          'name' => $this->input->post('name'),
          'email' => $this->input->post('email'),
          'message' => $this->input->post('message'),
          'subject' => $this->input->post('subject')
        );

            return $this->db->insert('contacts', $data);
        
      }
    }