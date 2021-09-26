<?php

class Evis_App_Model extends CI_Model {
    
    public function admin_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email', $data['admin_email']);
        $this->db->where('admin_password', $data['admin_password']);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function save_admin_info()
    {
        $data = array();
        $data['admin_name'] = $this->input->post('admin_name', true);
        $data['admin_email'] = $this->input->post('admin_email', true);
        $data['admin_password'] = $this->input->post('admin_password', true);
        $this->db->insert('tbl_admin',$data);
    }
    
    public function select_all_admin($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_admin LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function search_admin($admin_name)
    {
        $sql = "SELECT * FROM tbl_admin WHERE admin_name LIKE '%$admin_name%'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_admin_by_id($admin_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id',$admin_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_admin_info()
    {
        $data=array();
        $data['admin_name'] = $this->input->post('admin_name', true);
        $data['admin_email'] = $this->input->post('admin_email', true);
        $data['admin_password'] = $this->input->post('admin_password', true);
        $admin_id=$this->input->post('admin_id',true);
        $this->db->where('admin_id',$admin_id);
        $this->db->update('tbl_admin',$data);
    }
    
    public function delete_admin_by_id($admin_id)
    {
        $this->db->where('admin_id',$admin_id);
        $this->db->delete('tbl_admin');
    }

    public function select_all_income_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_income_category');
        $query_result=$this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function save_income_info()
    {
        $data=array();
        $data['income_category'] = $this->input->post('income_category', true); 
        $data['net_income'] = $this->input->post('net_income', true); 
        $data['income_received_amount'] = $this->input->post('income_received_amount', true);
        $data['income_receivable'] = $this->input->post('income_receivable', true); 
        $data['comment'] = $this->input->post('comment', true);
        $this->db->insert('tbl_income',$data);
    }

    public function select_all_income($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_income AS i, tbl_income_category AS c WHERE i.income_category=c.income_category ORDER BY i.income_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_income_details_by_id($income_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_income');
        $this->db->where('income_id',$income_id);
        $this->db->join('tbl_income_category', 'tbl_income_category.income_category = tbl_income.income_category', 'left');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function delete_income_by_id($income_id)
    {
        $this->db->where('income_id',$income_id);
        $this->db->delete('tbl_income');
    }
    
    public function save_income_category_info()
    {
        $data=array();
        $data['income_category_name'] = $this->input->post('income_category_name', true); 
        $this->db->insert('tbl_income_category',$data);
    }
    
    public function select_income_category($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_income_category ORDER BY income_category DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_income_category_by_id($income_category)
    {
        $this->db->select('*');
        $this->db->from('tbl_income_category');
        $this->db->where('income_category',$income_category);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_income_category_info()
    {
        $data=array();
        $data['income_category_name'] = $this->input->post('income_category_name', true); 
        $income_category=$this->input->post('income_category',true);
        $this->db->where('income_category',$income_category);
        $this->db->update('tbl_income_category',$data);
    }
    
    public function delete_income_category_by_id($income_category)
    {
        $this->db->where('income_category',$income_category);
        $this->db->delete('tbl_income_category');
    }
    
    public function select_all_expense_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_expense_category');
        $query_result=$this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function save_expense_info()
    {
        $data=array();
        $data['expense_category'] = $this->input->post('expense_category', true); 
        $data['net_expense'] = $this->input->post('net_expense', true); 
        $data['expense_paid_amount'] = $this->input->post('expense_paid_amount', true); 
        $data['expense_payable'] = $this->input->post('expense_payable', true);
        $data['comment'] = $this->input->post('comment', true);
        $this->db->insert('tbl_expense',$data);
    }
    
    public function select_all_expense($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_expense AS e, tbl_expense_category AS c WHERE e.expense_category=c.expense_category ORDER BY e.expense_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_expense_details_by_id($expense_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_expense');
        $this->db->where('expense_id',$expense_id);
        $this->db->join('tbl_expense_category', 'tbl_expense_category.expense_category = tbl_expense.expense_category', 'left');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function delete_expense_by_id($expense_id)
    {
        $this->db->where('expense_id',$expense_id);
        $this->db->delete('tbl_expense');
    }
    
    public function save_expense_category_info()
    {
        $data=array();
        $data['expense_category_name'] = $this->input->post('expense_category_name', true); 
        $this->db->insert('tbl_expense_category',$data);
    }
    
    public function select_expense_category($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_expense_category ORDER BY expense_category DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_expense_category_by_id($expense_category)
    {
        $this->db->select('*');
        $this->db->from('tbl_expense_category');
        $this->db->where('expense_category',$expense_category);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_expense_category_info()
    {
        $data=array();
        $data['expense_category_name'] = $this->input->post('expense_category_name', true); 
        $expense_category=$this->input->post('expense_category',true);
        $this->db->where('expense_category',$expense_category);
        $this->db->update('tbl_expense_category',$data);
    }
    
    public function delete_expense_category_by_id($expense_category)
    {
        $this->db->where('expense_category',$expense_category);
        $this->db->delete('tbl_expense_category');
    }
    
    public function select_income_report_info($start,$end)
    {
        $sql = "SELECT * FROM tbl_income AS i, tbl_income_category AS c WHERE i.income_category=c.income_category AND i.income_time BETWEEN '$start' AND '$end'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function select_total_income($start,$end)
    {
        $sql = "SELECT SUM(income_received_amount) AS total, SUM(income_receivable) AS due FROM tbl_income WHERE (income_time BETWEEN '$start' AND '$end')";
        $result = $this->db->query($sql)->row();
        return $result;   
    }
    
    public function select_expense_report_info($start,$end)
    {
        $sql = "SELECT * FROM tbl_expense AS e, tbl_expense_category AS c WHERE e.expense_category=c.expense_category AND e.expense_time BETWEEN '$start' AND '$end'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function select_total_expense($start,$end)
    {
        $sql = "SELECT SUM(expense_paid_amount) AS total, SUM(expense_payable) AS due FROM tbl_expense WHERE (expense_time BETWEEN '$start' AND '$end')";
        $result = $this->db->query($sql)->row();
        return $result;   
    }
}