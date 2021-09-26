<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_App extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) 
        {
            redirect('evis_login', 'refresh');
        }
    }
    
    public function index()
    {
        $data = array();
        $data['title'] = 'Dashboard';
        $data['total_income'] = $this->evis_patient_model->select_sum_income();
        $data['total_income_receivable'] = $this->evis_patient_model->select_sum_income_receivable();
        $data['total_expense'] = $this->evis_patient_model->select_sum_expense();
        $data['total_expense_payable'] = $this->evis_patient_model->select_sum_expense_payable();
        $data['total_patient_due'] = $this->evis_patient_model->select_total_patient_due();
        $data['total_patient'] = $this->evis_patient_model->select_total_patient();
        $data['dashboard'] = $this->load->view('dashboard', $data, true);
        $this->load->view('master', $data);
    }
    
    public function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $sdata['exception'] = 'You are Successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('evis_login');
    }
    
    public function add_admin() 
    {
        $data = array();
        $data['title'] = 'Add Admin';
        $data['dashboard'] = $this->load->view('add_admin', $data, true);
        $this->load->view('master', $data);
    }

    public function save_admin()
    {
        $this->form_validation->set_rules('admin_password', 'Password', 'trim|required|min_length[6]|max_length[250]|matches[conform_password]|xss_clean');
        $this->form_validation->set_rules('conform_password', 'Password Confirmation', 'trim|required');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'Password Does Not Match';
            $data['dashboard'] = $this->load->view('add_admin', $data, true);
            $this->load->view('master', $data);
        } 
        else 
        {
            $this->evis_app_model->save_admin_info($data);
            $sdata = array();
            $sdata['save_admin'] = 'New Admin Created';
            $this->session->set_userdata($sdata);
            redirect('evis_app/add_admin');
        }
    }

    public function manage_admin()
    {
        $data = array();
        $data['title'] = 'Manage Admin';
        $config['base_url'] = base_url() . 'evis_app/manage_admin/';
        $config['total_rows'] = $this->db->count_all('tbl_admin');
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
        $data['all_admin'] = $this->evis_app_model->select_all_admin($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_admin', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_admin($admin_name)
    {
        $data = array();
        $data['search_admin'] = $this->evis_app_model->search_admin($admin_name);
        $this->load->view('search/admin_search', $data);
    }

    public function edit_admin($admin_id) 
    {
        $data = array();
        $data['title'] = 'Edit Admin';
        $data['admin_info'] = $this->evis_app_model->select_admin_by_id($admin_id);
        $data['dashboard'] = $this->load->view('edit_admin', $data, true);
        $sdata = array();
        $sdata['edit_admin'] = 'Update Admin Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_admin() 
    {
        $this->evis_app_model->update_admin_info();
        redirect('evis_app/manage_admin');
    }

    public function delete_admin($admin_id) 
    {
        $this->evis_app_model->delete_admin_by_id($admin_id);
        redirect('evis_app/manage_admin');
    }
    
    public function add_income_category()
    {
        $data = array();
        $data['title'] = 'Add Income Category';
        $data['dashboard'] = $this->load->view('add_income_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_income_category()
    {
        $this->evis_app_model->save_income_category_info();
        $sdata = array();
        $sdata['save_income_category'] = 'Income Category Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_app/add_income_category');
    }
    
    public function manage_income_category() 
    {
        $data = array();
        $data['title'] = 'Manage Income Category';
        $config['base_url'] = base_url() . 'evis_app/manage_income_category/';
        $config['total_rows'] = $this->db->count_all('tbl_income_category');
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
        $data['all_income_category'] = $this->evis_app_model->select_income_category($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_income_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_income_category($income_category_id) 
    {
        $data = array();
        $data['title'] = 'Edit Income Category';
        $data['income_category_info'] = $this->evis_app_model->select_income_category_by_id($income_category_id);
        $data['dashboard'] = $this->load->view('edit_income_category', $data, true);
        $sdata = array();
        $sdata['edit_income_category'] = 'Update Income Category Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }
    
    public function update_income_category() 
    {
        $this->evis_app_model->update_income_category_info();
        redirect('evis_app/manage_income_category');
    }
    
    public function delete_income_category($income_category) 
    {
        $this->evis_app_model->delete_income_category_by_id($income_category);
        redirect('evis_app/manage_income_category');
    }
    
    public function add_income()
    {
        $data = array();
        $data['title'] = 'Add Income';
        $data['all_income_category'] = $this->evis_app_model->select_all_income_category();
        $data['dashboard'] = $this->load->view('add_income', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_income()
    {
        $this->form_validation->set_rules('income_category', 'Income Category', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Income Category');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'Form Validation Error';
            $data['all_income_category'] = $this->evis_app_model->select_all_income_category();
            $data['dashboard'] = $this->load->view('add_income', $data, true);
            $this->load->view('master', $data);
        } 
        else 
        {
            $this->evis_app_model->save_income_info();
            $sdata = array();
            $sdata['save_income'] = 'Income Saved';
            $this->session->set_userdata($sdata);
            redirect('evis_app/add_income');
        }
    }
    
    public function manage_income() 
    {
        $data = array();
        $data['title'] = 'Manage Income';
        $config['base_url'] = base_url() . 'evis_app/manage_income/';
        $config['total_rows'] = $this->db->count_all('tbl_income');
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
        $data['all_income'] = $this->evis_app_model->select_all_income($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_income', $data, true);
        $this->load->view('master', $data);
    }
    
    public function income_details($income_id) 
    {
        $data = array();
        $data['title'] = 'Income Details';
        $data['income_details'] = $this->evis_app_model->select_income_details_by_id($income_id);
        $data['dashboard'] = $this->load->view('income_details', $data, true);
        $this->load->view('master', $data);
    }
    
    public function delete_income($income_id) 
    {
        $this->evis_app_model->delete_income_by_id($income_id);
        redirect('evis_app/manage_income');
    }
    
    public function delete_income_payment($income_id,$payment_id) 
    {
        $this->evis_app_model->delete_income_by_id($income_id);
        $this->evis_patient_model->delete_payment_by_id($payment_id);
        redirect('evis_app/manage_income');
    }
    
    public function add_expense_category()
    {
        $data = array();
        $data['title'] = 'Add Expense Category';
        $data['dashboard'] = $this->load->view('add_expense_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_expense_category()
    {
        $this->evis_app_model->save_expense_category_info();
        $sdata = array();
        $sdata['save_expense_category'] = 'Expense Category Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_app/add_expense_category');
    }
    
    public function manage_expense_category() 
    {
        $data = array();
        $data['title'] = 'Manage Expense Category';
        $config['base_url'] = base_url() . 'evis_app/manage_expense_category/';
        $config['total_rows'] = $this->db->count_all('tbl_expense_category');
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
        $data['all_expense_category'] = $this->evis_app_model->select_expense_category($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_expense_category', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_expense_category($expense_category) 
    {
        $data = array();
        $data['title'] = 'Edit Expense Category';
        $data['expense_category_info'] = $this->evis_app_model->select_expense_category_by_id($expense_category);
        $data['dashboard'] = $this->load->view('edit_expense_category', $data, true);
        $sdata = array();
        $sdata['edit_expense_category'] = 'Update Expense Category Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }
    
    public function update_expense_category() 
    {
        $this->evis_app_model->update_expense_category_info();
        redirect('evis_app/manage_expense_category');
    }
    
    public function delete_expense_category($expense_category) 
    {
        $this->evis_app_model->delete_expense_category_by_id($expense_category);
        redirect('evis_app/manage_expense_category');
    }
    
    public function add_expense()
    {
        $data = array();
        $data['title'] = 'Add Expense';
        $data['all_expense_category'] = $this->evis_app_model->select_all_expense_category();
        $data['dashboard'] = $this->load->view('add_expense', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_expense()
    {
        $this->form_validation->set_rules('expense_category', 'Expense Category', 'required|greater_than[0]');
        $this->form_validation->set_message('greater_than', 'Please Select Expense Category');
        if ($this->form_validation->run() == False)
        {
            $data = array();
            $data['title'] = 'Form Validation Error';
            $data['all_expense_category'] = $this->evis_app_model->select_all_expense_category();
            $data['dashboard'] = $this->load->view('add_expense', $data, true);
            $this->load->view('master', $data);
        } 
        else 
        {
            $this->evis_app_model->save_expense_info();
            $sdata = array();
            $sdata['save_expense'] = 'Expense Saved';
            $this->session->set_userdata($sdata);
            redirect('evis_app/add_expense');
        }
    }

    public function manage_expense() 
    {
        $data = array();
        $data['title'] = 'Manage Expense';
        $config['base_url'] = base_url() . 'evis_app/manage_expense/';
        $config['total_rows'] = $this->db->count_all('tbl_expense');
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
        $data['all_expense'] = $this->evis_app_model->select_all_expense($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_expense', $data, true);
        $this->load->view('master', $data);
    }
    
    public function expense_details($expense_id) 
    {
        $data = array();
        $data['title'] = 'Expense Details';
        $data['expense_details'] = $this->evis_app_model->select_expense_details_by_id($expense_id);
        $data['dashboard'] = $this->load->view('expense_details', $data, true);
        $this->load->view('master', $data);
    }
    
    public function delete_expense($expense_id) 
    {
        $this->evis_app_model->delete_expense_by_id($expense_id);
        redirect('evis_app/manage_expense');
    }

    public function income_report()
    {
        $data = array();
        $data['title'] = 'Income Report';
        $data['dashboard'] = $this->load->view('income_report', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_income_report()
    {
        $data = array();
        $data['title'] = 'Income Report';
        $start = $this->input->post('start', true);
        $end = $this->input->post('end', true);
        $data['start'] = $start;
        $data['end'] = $end;
        $data['income_report_info'] = $this->evis_app_model->select_income_report_info($start,$end,$data);
        $data['total_income'] = $this->evis_app_model->select_total_income($start,$end,$data);
        $data['dashboard'] = $this->load->view('download_income_report_sheet', $data, true);
        $this->load->view('master', $data);
    }
    
    public function download_income_report($start,$end)
    {
        $data = array();
        $data['income_report_info'] = $this->evis_app_model->select_income_report_info($start,$end);
        $data['total_income'] = $this->evis_app_model->select_total_income($start,$end);       
        $data['start'] = $start;
        $data['end'] = $end;
        $this->load->view('download_income_report_form', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("income_report.pdf");
    }
    
    public function expense_report()
    {
        $data = array();
        $data['title'] = 'Expense Report';
        $data['dashboard'] = $this->load->view('expense_report', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_expense_report()
    {
        $data = array();
        $data['title'] = 'Expense Report';
        $start = $this->input->post('start', true);
        $end = $this->input->post('end', true);
        $data['start'] = $start;
        $data['end'] = $end;
        $data['expense_report_info'] = $this->evis_app_model->select_expense_report_info($start,$end,$data);
        $data['total_expense'] = $this->evis_app_model->select_total_expense($start,$end,$data);
        $data['dashboard'] = $this->load->view('download_expense_report_sheet', $data, true);
        $this->load->view('master', $data);
    }
    
    public function download_expense_report($start,$end)
    {
        $data = array();
        $data['start'] = $start;
        $data['end'] = $end;
        $data['expense_report_info'] = $this->evis_app_model->select_expense_report_info($start,$end,$data);
        $data['total_expense'] = $this->evis_app_model->select_total_expense($start,$end,$data);
        $this->load->view('download_expense_report_form', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("expense_report.pdf");
    }
    
    public function total_report()
    {
        $data = array();
        $data['title'] = 'Total Report';
        $data['dashboard'] = $this->load->view('total_report', $data, true);
        $this->load->view('master', $data);
    }
    
    public function search_total_report()
    {
        $data = array();
        $data['title'] = 'Income Expense Report';
        $start = $this->input->post('start', true);
        $end = $this->input->post('end', true);
        $data['start'] = $start;
        $data['end'] = $end;
        $data['income_report_info'] = $this->evis_app_model->select_income_report_info($start,$end,$data);
        $data['expense_report_info'] = $this->evis_app_model->select_expense_report_info($start,$end,$data);
        $data['total_income'] = $this->evis_app_model->select_total_income($start,$end,$data);
        $data['total_expense'] = $this->evis_app_model->select_total_expense($start,$end,$data);
        $data['dashboard'] = $this->load->view('download_total_report_sheet', $data, true);
        $this->load->view('master', $data);
    }
    
    public function download_total_report($start,$end)
    {
        $data = array();
        $data['start'] = $start;
        $data['end'] = $end;
        $data['income_report_info'] = $this->evis_app_model->select_income_report_info($start,$end,$data);
        $data['expense_report_info'] = $this->evis_app_model->select_expense_report_info($start,$end,$data);
        $data['total_income'] = $this->evis_app_model->select_total_income($start,$end,$data);
        $data['total_expense'] = $this->evis_app_model->select_total_expense($start,$end,$data);
        $this->load->view('download_total_report_form', $data);
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("total_report.pdf");
    }
    
    public function about()
    {
        $data = array();
        $data['title'] = 'Evis Technology';
        $data['dashboard'] = $this->load->view('about', $data, true);
        $this->load->view('master', $data);
    }
}