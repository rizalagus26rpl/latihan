<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    class Login_Model extends CI_Model {

        public function CekUser()
        {
            $username = $this->input->post('Username');
            $password = $this->input->post('Password');

            $query = $this->db->where('username', $username)
                              ->where('password', $password)
                              ->get('user');
            
            if($query->num_rows() > 0) {
                $user = array_shift($query->result_array());
                $data = array('username' => $username, 'logged_in' => TRUE, 'id' => $user['id']);
                $this->session->set_userdata($data);

                return TRUE;
            } else {
                return FALSE;
            }

        }
    }
?>
