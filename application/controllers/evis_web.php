<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Web extends CI_Controller {
    
    public function index()
    {
        $data = array();
        $data['title'] = 'Home';
        $data['content'] = $this->load->view('public/content', $data, true);
        $this->load->view('public/master', $data);
    }
}