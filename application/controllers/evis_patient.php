<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Patient extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) 
        {
            redirect('evis_login', 'refresh');
        }
    }
    
    public function add_patient() 
    {
        $data = array();
        $data['title'] = 'Add Patient';
        $data['dashboard'] = $this->load->view('add_patient', $data, true);
        $this->load->view('master', $data);
    }

    public function save_patient()
    {
        $data=array();
        $data['patient_name'] = $this->input->post('patient_name', true);
        /** IF THEY DO NOT SELECT A IMAGE **/
	foreach ($_FILES as $eachFile)
	{
            if ($eachFile['size'] > 0)
            {
                /** START IMAGE RESIZE **/
                $config['upload_path'] = 'img/patient_image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '10240';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('patient_image')) {
                        $error = $this->upload->display_errors();
                        echo $error;
                        exit();
                } else {
                        $fdata = $this->upload->data();
                        $up['main'] = $config['upload_path'] . $fdata['file_name'];
                }
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'img/patient_image/';
                $config['source_image'] = $up['main'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['overwrite'] = TRUE;
                $config['maintain_ratio'] = true;
                $config['width'] = '270';
                $config['height'] = '329';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                        $error = $this->image_lib->display_errors();
                        echo $error;
                        exit();
                } else {
                        $index = 'patient_image';
                        $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thumb' . $fdata['file_ext'];
                        unlink($fdata['full_path']);
                        }
                /** END IMAGE RESIZE **/
            }
	}
        /** END OF IF THEY DO NOT SELECT A IMAGE **/
        $data['patient_fathers_name'] = $this->input->post('patient_fathers_name', true);
        $data['patient_mothers_name'] = $this->input->post('patient_mothers_name', true);
        $data['patient_legal_guardian'] = $this->input->post('patient_legal_guardian', true);
        $data['patient_present_address'] = $this->input->post('patient_present_address', true);
        $data['patient_permanent_address'] = $this->input->post('patient_permanent_address', true);
        $data['patient_NID'] = $this->input->post('patient_NID', true);
        $data['patient_contact_mobile_1'] = $this->input->post('patient_contact_mobile_1', true);
        $data['patient_contact_mobile_2'] = $this->input->post('patient_contact_mobile_2', true);
        $data['patient_monthly_installment'] = $this->input->post('patient_monthly_installment', true);
        $data['patient_age'] = $this->input->post('patient_age', true);
        $data['patient_education'] = $this->input->post('patient_education', true);
        $data['patient_material_status'] = $this->input->post('patient_material_status', true);
        $data['patient_addition_name'] = $this->input->post('patient_addition_name', true);
        $data['patient_drug_addicted_length'] = $this->input->post('patient_drug_addicted_length', true);
        $data['patient_last_dose'] = $this->input->post('patient_last_dose', true);
        $data['patient_admission_date'] = $this->input->post('patient_admission_date', true);
        $data['patient_admission_id'] = $this->input->post('patient_admission_id', true);
        $this->evis_patient_model->save_patient_info($data);
        $sdata = array();
        $sdata['save_patient'] = 'Patient Admission Successed';
        $this->session->set_userdata($sdata);
        redirect('evis_patient/add_patient');
    }

    public function manage_patient()
    {
        $data = array();
        $data['title'] = 'Manage Patient';
        $config['base_url'] = base_url() . 'evis_patient/manage_patient/';
        $config['total_rows'] = $this->db->count_all('tbl_patient');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_patient'] = $this->evis_patient_model->select_all_patient($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_patient', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_patient($patient_info)
    {
        $data = array();
        $data['search_patient'] = $this->evis_patient_model->search_patient($patient_info);
        $this->load->view('search/patient_search', $data);
    }
    
    public function payment_history($patient_id) 
    {
        $data = array();
        $data['title'] = 'Payment History';
        $data['patient_id'] = $patient_id;
        $data['payment_history'] = $this->evis_patient_model->select_patient_payment_by_id($patient_id);
        $data['dashboard'] = $this->load->view('payment_history', $data, true);
        $this->load->view('master', $data);
    }
    
    public function download_patient_payment_history($patient_id) 
    {
        $data = array();
        $data['patient_info'] = $this->evis_patient_model->select_patient_by_id($patient_id);
        $data['payment_history'] = $this->evis_patient_model->select_patient_payment_by_id($patient_id);
        $this->load->view('download_patient_payment_history', $data);
        $html = $this->output->get_output();        
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("patient_payment_history.pdf");
    }
        
    public function download_patient_preview($patient_id) 
    {
        $data = array();
        $data['title'] = 'Download Preview';
        $data['patient_info'] = $this->evis_patient_model->select_patient_by_id($patient_id);
        $data['dashboard'] = $this->load->view('download_patient_preview', $data, true);
        $this->load->view('master', $data);
    }

    public function download_patient_form($patient_id)
    {
        $data = array();
        $data['patient_info'] = $this->evis_patient_model->select_patient_by_id($patient_id);
        $this->load->view('download_patient_form', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("patient_form.pdf");
    }
   
    public function edit_patient($patient_id) 
    {
        $data = array();
        $data['title'] = 'Edit Patient';
        $data['patient_info'] = $this->evis_patient_model->select_patient_by_id($patient_id);
        $data['dashboard'] = $this->load->view('edit_patient', $data, true);
        $sdata = array();
        $sdata['edit_patient'] = 'Update Patient Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_patient() 
    {
        $this->evis_patient_model->update_patient_info();
        redirect('evis_patient/manage_patient');
    }

    public function delete_patient($patient_id) 
    {
        $this->evis_patient_model->delete_patient_by_id($patient_id);
        redirect('evis_patient/manage_patient');
    }    

    public function add_payment() 
    {
        $data = array();
        $data['title'] = 'Add Payment';
        $data['all_patient'] = $this->evis_patient_model->select_patient_list();
        $data['dashboard'] = $this->load->view('add_payment', $data, true);
        $this->load->view('master', $data);
    }
    
    public function show_patient_information($patient_id)
    {
        $data = array();
        $data['select_patient'] = $this->evis_patient_model->select_patient_by_id($patient_id);
        $this->load->view('patient_information', $data);
    }
    
    public function save_payment() 
    {
        $this->form_validation->set_rules('patient_id', 'Patient', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Patient');
        $this->form_validation->set_rules('payment_receipt_no', 'Receipt No', 'required');
        $this->form_validation->set_rules('payment_date', 'Payment Date', 'required');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'Form Validation Error';
            $data['dashboard'] = $this->load->view('add_payment', $data, true);
            $this->load->view('master', $data);
        } 
        else 
        {
            $this->evis_patient_model->save_payment_info();
            $this->evis_patient_model->update_payment_due();
            $sdata = array();
            $sdata['save_payment'] = 'PAYMENT PROCEED SUCCESSFULLY';
            $this->session->set_userdata($sdata);
            redirect('evis_patient/add_payment');
        }
    }
    
    public function manage_payment() 
    {
        $data = array();
        $data['title'] = 'Manage Payment';
        $config['base_url'] = base_url() . 'evis_patient/manage_payment/';
        $config['total_rows'] = $this->db->count_all('tbl_payment');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_payment'] = $this->evis_patient_model->select_all_payment($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_payment', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_payment($payment_info)
    {
        $data = array();
        $data['search_payment'] = $this->evis_patient_model->search_payment($payment_info);
        $this->load->view('search/payment_search', $data);
    }
    
    public function payment_details($payment_id) 
    {
        $data = array();
        $data['title'] = 'View Payment Details';
        $data['payment_info'] = $this->evis_patient_model->select_payment_by_id($payment_id);
        $data['dashboard'] = $this->load->view('view_payment_details', $data, true);
        $this->load->view('master', $data);
    }
    
    public function delete_payment($payment_id) 
    {
        $this->evis_patient_model->delete_payment_by_id($payment_id);
        $this->evis_patient_model->delete_income_payment_by_id($payment_id);
        redirect('evis_patient/manage_payment');
    }
}