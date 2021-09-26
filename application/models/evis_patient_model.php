<?php

class Evis_Patient_Model extends CI_Model {
    
    public function select_sum_income()
    {
        $sql = "SELECT SUM(income_received_amount) AS total_income FROM tbl_income ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_sum_income_receivable()
    {
        $sql = "SELECT SUM(income_receivable) AS total_income_receivable FROM tbl_income ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_sum_expense()
    {
        $sql = "SELECT SUM(expense_paid_amount) AS total_expense FROM tbl_expense ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_sum_expense_payable()
    {
        $sql = "SELECT SUM(expense_payable) AS total_expense_payable FROM tbl_expense ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_total_patient_due()
    {
        $sql = "SELECT SUM(patient_due) AS total_patient_due FROM tbl_patient ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_total_patient()
    {
        $sql = "SELECT count(patient_id) AS total_patient FROM tbl_patient WHERE patient_status=1 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function save_patient_info($data)
    {
        $this->db->insert('tbl_patient',$data);
    }
    
    public function select_all_patient($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_patient ORDER BY patient_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function search_patient($patient_info)
    {
        $sql = "SELECT * FROM tbl_patient WHERE patient_name LIKE '%$patient_info%' OR patient_admission_id LIKE '%$patient_info%' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_patient_payment_by_id($patient_id)
    {
        $sql = "SELECT * FROM tbl_patient AS p, tbl_payment AS t WHERE p.patient_id=t.patient_id AND t.patient_id=$patient_id ORDER BY t.patient_id DESC ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
     public function select_patient_by_id($patient_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_patient');
        $this->db->where('patient_id',$patient_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_patient_info()
    {
        $data=array();
        $data['patient_name'] = $this->input->post('patient_name', true);
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
        $patient_id = $this->input->post('patient_id', true);
        $this->db->where('patient_id',$patient_id);
        $this->db->update('tbl_patient',$data);
    }
    
    public function delete_patient_by_id($patient_id)
    {
        $this->db->where('patient_id',$patient_id);
        $this->db->delete('tbl_patient');
    }
    
    public function select_patient_list()
    {
        $this->db->select('*');
        $this->db->from('tbl_patient');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_payment_info()
    {
        $data=array();
        $data['patient_id'] = $this->input->post('patient_id', true); 
        $data['payment_receipt_no'] = $this->input->post('payment_receipt_no', true); 
        $data['payment_balance'] = $this->input->post('payment_balance', true);
        $data['payment_paid'] = $this->input->post('payment_paid', true); 
        $data['payment_due'] = $this->input->post('payment_due', true); 
        $data['payment_date'] = $this->input->post('payment_date', true); 
        $data['payment_due_date'] = $this->input->post('payment_due_date', true); 
        $data['payment_comment'] = $this->input->post('payment_comment', true); 
        $this->db->insert('tbl_payment',$data);
        $payment_id=$this->db->insert_id();
        $payment=array();
        $payment['payment_id'] = $payment_id;
        $payment['income_category'] = 1; 
        $payment['net_income'] = $this->input->post('payment_balance', true);
        $payment['income_received_amount'] = $this->input->post('payment_paid', true); 
        $payment['income_receivable'] = $this->input->post('payment_due', true);  
        $this->db->insert('tbl_income',$payment);
    }

    public function update_payment_due()
    {
        $data=array();
        $data['patient_due'] = $this->input->post('payment_due', true); 
        $patient_id=$this->input->post('patient_id',true);
        $this->db->where('patient_id',$patient_id);
        $this->db->update('tbl_patient',$data);
    }

    public function select_all_payment($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_payment AS p, tbl_patient AS t WHERE p.patient_id=t.patient_id ORDER BY payment_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function search_payment($payment_info)
    {
        $sql = "SELECT * FROM tbl_payment AS p, tbl_patient AS t WHERE p.patient_id=t.patient_id AND t.patient_name LIKE '%$payment_info%' OR p.payment_receipt_no LIKE '%$payment_info%' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_payment_by_id($payment_id)
    {
        $sql = "SELECT * FROM tbl_payment AS p, tbl_patient AS t WHERE p.patient_id=t.patient_id AND p.payment_id=$payment_id ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function delete_payment_by_id($payment_id)
    {
        $this->db->where('payment_id',$payment_id);
        $this->db->delete('tbl_payment');
    }
    
    public function delete_income_payment_by_id($payment_id)
    {
        $this->db->where('payment_id',$payment_id);
        $this->db->delete('tbl_income');
    }
}