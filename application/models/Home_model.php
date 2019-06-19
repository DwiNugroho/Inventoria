<?php

class Home_model extends CI_model
{

    public function getAllTotal()
    {
        return [
            'users' => $this->getTotalUsers(),
            'suppliers' => $this->getTotalSuppliers(),
            'ruangan' => $this->getTotalRuangan()
        ];
    }

    public function getTotalUsers()
    {
        return $this->db->get('users')->num_rows();
    }

    public function getTotalSuppliers()
    {
        $this->db->where('status', '1');
        return $this->db->get('suppliers')->num_rows();
    }

    public function getTotalRuangan()
    {
        $this->db->where('status', '1');
        return $this->db->get('ruangan')->num_rows();
    }
}
