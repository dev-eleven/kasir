<?php
class inventories extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    //Product In
    public function product_in($limit, $start, $search)
    {
        $query = $this->db;
        $query->select(array('inventories.*', 'products.name as product'))
            ->from('inventories')
            ->join('products', 'inventories.product_id = products.id')
            ->where("status = 1")
            ->limit($limit, $start);

        if (isset($search['product']) && $search['product'] != '') {
            $query->where("products.name LIKE '%" . $search['product'] . "%'");
        } elseif (isset($search['price']) && $search['price'] != '') {
            $query->where("price LIKE '%" . $search['price'] . "%'");
        } elseif (isset($search['quantity']) && $search['quantity'] != '') {
            $query->where("quantity LIKE '%" . $search['quantity'] . "%'");
        } elseif (isset($search['date_in']) && $search['date_in'] != '') {
            $query->where("date_in = " . $search['date_in']);
        }

        $db = $query->get();

        return $db->result_array();
    }
    public function count_product_in()
    {
        $query = $this->db;
        $query->select("count(*) as total")
            ->from("inventories")
            ->where("status = 1");
        $db = $query->get();
        return $db->result_array();
    }

    //Product In
    public function product_out($limit, $start, $search)
    {
        $query = $this->db;
        $query->select(array('inventories.*', 'products.name as product'))
            ->from('inventories')
            ->join('products', 'inventories.product_id = products.id')
            ->where("status = 2")
            ->limit($limit, $start);

        if (isset($search['product']) && $search['product'] != '') {
            $query->where("products.name LIKE '%" . $search['product'] . "%'");
        } elseif (isset($search['price']) && $search['price'] != '') {
            $query->where("price LIKE '%" . $search['price'] . "%'");
        } elseif (isset($search['quantity']) && $search['quantity'] != '') {
            $query->where("quantity LIKE '%" . $search['quantity'] . "%'");
        } elseif (isset($search['date_out']) && $search['date_out'] != '') {
            $query->where("date_out = " . $search['date_in']);
        }

        $db = $query->get();

        return $db->result_array();
    }
    public function count_product_out()
    {
        $query = $this->db;
        $query->select("count(*) as total")
            ->from("inventories")
            ->where("status = 2");
        $db = $query->get();
        return $db->result_array();
    }


    //Default
    public function get_stock($id)
    {
        $query = $this->db;
        $query->select("stock")
            ->from("products")
            ->where("id =" . $id);
        $db = $query->get();
        return $db->result_array();
    }
    public function get_product()
    {
        $query = $this->db;
        $query->select(array('*'))
            ->from('products');
        $db = $query->get();
        return $db->result_array();
    }
    public function view($id)
    {
        $query = $this->db;
        $query->select(array('inventories.*', 'products.name as product'))
            ->from('inventories')
            ->join('products', 'inventories.product_id = products.id')
            ->where("inventories.id =" . $id);
        $db = $query->get();
        return $db->result_array();
    }
    public function add($params)
    {
        return $this->db->insert('inventories', $params);
    }
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('inventories', $data);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('inventories');
    }

}
