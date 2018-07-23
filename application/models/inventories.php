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

    //Product Out
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

    //Product Borrowed
    public function product_borrowed($limit, $start, $search)
    {
        $query = $this->db;
        $query->select(array('inventories.*', 'products.name as product'))
            ->from('inventories')
            ->join('products', 'inventories.product_id = products.id')
            ->where("status = 3")
            ->limit($limit, $start);

        if (isset($search['product']) && $search['product'] != '') {
            $query->where("products.name LIKE '%" . $search['product'] . "%'");
        } elseif (isset($search['price']) && $search['price'] != '') {
            $query->where("price LIKE '%" . $search['price'] . "%'");
        } elseif (isset($search['quantity']) && $search['quantity'] != '') {
            $query->where("quantity LIKE '%" . $search['quantity'] . "%'");
        } elseif (isset($search['date_lent']) && $search['date_lent'] != '') {
            $query->where("date_lent = " . $search['date_in']);
        }

        $db = $query->get();

        return $db->result_array();
    }
    public function count_product_borrowed()
    {
        $query = $this->db;
        $query->select("count(*) as total")
            ->from("inventories")
            ->where("status = 3");
        $db = $query->get();
        return $db->result_array();
    }

    //Product Returned
    public function product_returned($limit, $start, $search)
    {
        $query = $this->db;
        $query->select(array('inventories.*', 'products.name as product'))
            ->from('inventories')
            ->join('products', 'inventories.product_id = products.id')
            ->where("status = 4")
            ->limit($limit, $start);

        if (isset($search['product']) && $search['product'] != '') {
            $query->where("products.name LIKE '%" . $search['product'] . "%'");
        } elseif (isset($search['price']) && $search['price'] != '') {
            $query->where("price LIKE '%" . $search['price'] . "%'");
        } elseif (isset($search['quantity']) && $search['quantity'] != '') {
            $query->where("quantity LIKE '%" . $search['quantity'] . "%'");
        } elseif (isset($search['date_back']) && $search['date_back'] != '') {
            $query->where("date_back = " . $search['date_back']);
        }

        $db = $query->get();

        return $db->result_array();
    }
    public function count_product_returned()
    {
        $query = $this->db;
        $query->select("count(*) as total")
            ->from("inventories")
            ->where("status = 4");
        $db = $query->get();
        return $db->result_array();
    }

    //Product Broken
    public function product_broken($limit, $start, $search)
    {
        $query = $this->db;
        $query->select(array('inventories.*', 'products.name as product'))
            ->from('inventories')
            ->join('products', 'inventories.product_id = products.id')
            ->where("status = 5")
            ->limit($limit, $start);

        if (isset($search['product']) && $search['product'] != '') {
            $query->where("products.name LIKE '%" . $search['product'] . "%'");
        } elseif (isset($search['price']) && $search['price'] != '') {
            $query->where("price LIKE '%" . $search['price'] . "%'");
        } elseif (isset($search['quantity']) && $search['quantity'] != '') {
            $query->where("quantity LIKE '%" . $search['quantity'] . "%'");
        } elseif (isset($search['date_broken']) && $search['date_broken'] != '') {
            $query->where("date_broken = " . $search['date_broken']);
        }

        $db = $query->get();

        return $db->result_array();
    }
    public function count_product_broken()
    {
        $query = $this->db;
        $query->select("count(*) as total")
            ->from("inventories")
            ->where("status = 5");
        $db = $query->get();
        return $db->result_array();
    }

    //Product Lost
    public function product_lost($limit, $start, $search)
    {
        $query = $this->db;
        $query->select(array('inventories.*', 'products.name as product'))
            ->from('inventories')
            ->join('products', 'inventories.product_id = products.id')
            ->where("status = 6")
            ->limit($limit, $start);

        if (isset($search['product']) && $search['product'] != '') {
            $query->where("products.name LIKE '%" . $search['product'] . "%'");
        } elseif (isset($search['price']) && $search['price'] != '') {
            $query->where("price LIKE '%" . $search['price'] . "%'");
        } elseif (isset($search['quantity']) && $search['quantity'] != '') {
            $query->where("quantity LIKE '%" . $search['quantity'] . "%'");
        } elseif (isset($search['date_lost']) && $search['date_lost'] != '') {
            $query->where("date_lost = " . $search['date_lost']);
        }

        $db = $query->get();

        return $db->result_array();
    }
    public function count_product_lost()
    {
        $query = $this->db;
        $query->select("count(*) as total")
            ->from("inventories")
            ->where("status = 6");
        $db = $query->get();
        return $db->result_array();
    }

    //reports
    public function report($limit, $start, $search)
    {
        $query = $this->db;
        $query->select(array('inventories.*', 'products.name as product'))
            ->from('inventories')
            ->join('products', 'inventories.product_id = products.id')
            ->limit($limit, $start);

        if (isset($search['start']) && isset($search['end'])) {
            if ($search['status'] == 1) {
                $query->where("date_in BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 2) {
                $query->where("date_out BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 3) {
                $query->where("date_lent BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 4) {
                $query->where("date_back BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 5) {
                $query->where("date_broken BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 6) {
                $query->where("date_lost BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            }
        } elseif (isset($search['product']) && $search['product'] != '') {
            $query->where("products.name LIKE '%" . $search['product'] . "%'");
        } elseif (isset($search['price']) && $search['price'] != '') {
            $query->where("price LIKE '%" . $search['price'] . "%'");
        } elseif (isset($search['quantity']) && $search['quantity'] != '') {
            $query->where("quantity LIKE '%" . $search['quantity'] . "%'");
        } elseif (isset($search['status']) && $search['status'] != "all") {
            $query->where("status = " . $search['status']);
        }

        $db = $query->get();
        return $db->result_array();
    }
    public function count_report($search)
    {
        $query = $this->db;
        $query->select("count(*) as total")
            ->from("inventories")
            ->join('products', 'inventories.product_id = products.id');

        if (isset($search['start']) && isset($search['end'])) {
            if ($search['status'] == 1) {
                $query->where("date_in BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 2) {
                $query->where("date_out BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 3) {
                $query->where("date_lent BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 4) {
                $query->where("date_back BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 5) {
                $query->where("date_broken BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 6) {
                $query->where("date_lost BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            }
        } elseif (isset($search['product']) && $search['product'] != '') {
            $query->where("products.name LIKE '%" . $search['product'] . "%'");
        } elseif (isset($search['price']) && $search['price'] != '') {
            $query->where("price LIKE '%" . $search['price'] . "%'");
        } elseif (isset($search['quantity']) && $search['quantity'] != '') {
            $query->where("quantity LIKE '%" . $search['quantity'] . "%'");
        } elseif (isset($search['status']) && $search['status'] != "all") {
            $query->where("status = " . $search['status']);
        }

        $db = $query->get();
        return $db->result_array();
    }
    public function print_report($search)
    {
        $query = $this->db;
        $query->select(array('inventories.*', 'products.name as product'))
            ->from('inventories')
            ->join('products', 'inventories.product_id = products.id');

        if (isset($search['start']) && isset($search['end'])) {
            if ($search['status'] == 1) {
                $query->where("date_in BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 2) {
                $query->where("date_out BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 3) {
                $query->where("date_lent BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 4) {
                $query->where("date_back BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 5) {
                $query->where("date_broken BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } elseif ($search['status'] == 6) {
                $query->where("date_lost BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            } else {
                $query->where("date_in BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
                $query->where("date_out BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
                $query->where("date_lent BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
                $query->where("date_back BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
                $query->where("date_broken BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
                $query->where("date_lost BETWEEN '" . $search['start'] . "' AND '" . $search['end'] . "'");
            }
        } elseif (isset($search['product']) && $search['product'] != '') {
            $query->where("products.name LIKE '%" . $search['product'] . "%'");
        } elseif (isset($search['price']) && $search['price'] != '') {
            $query->where("price LIKE '%" . $search['price'] . "%'");
        } elseif (isset($search['quantity']) && $search['quantity'] != '') {
            $query->where("quantity LIKE '%" . $search['quantity'] . "%'");
        } elseif (isset($search['status']) && $search['status'] != "all") {
            $query->where("status = " . $search['status']);
        }

        $db = $query->get();
        return $db->result_array();
    }

    //Default
    public function get_stock($id)
    {
        $query = $this->db;
        $query->select(array("stock"))
            ->from("products")
            ->where("id =" . $id);
        $db = $query->get();
        return $db->result_array();
    }
    public function get_inventorie($id)
    {
        $query = $this->db;
        $query->select(array("product_id", "quantity"))
            ->from('inventories')
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
