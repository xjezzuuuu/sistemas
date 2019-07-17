<?php
class Invoice_model extends CI_Model
{
    private $table = 'invoice';
    
    private $folio;
    private $price;
    private $date;
    private $client_id;
    private $payment_method_id;
    private $created_at;
    private $updated_at;
    private $deleted_at;
    
    const FOLIO = 'folio';
    const PRICE = 'price';
    const DATE = 'date';
    const CLIENT_ID = 'client_id';
    const PAYMENT_METHOD_ID = 'payment_method_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    public function readAll()
    {
        $this->db->select('*', false);
        $this->db->from($this->table);
        $this->db->where('deleted_at', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function readByFolio($folio)
    {
        $this->db->select('*', false);
        $this->db->from($this->table);
        $this->db->where('folio', $folio, true);
        $this->db->where('deleted_at', null);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array()[0];
        } else {
            return null;
        }
    }

    public function insert()
    {
        $bool = $this->db->insert($this->table, $this->getDataArrayClient());
        $this->folio = $this->db->insert_folio();
        return $bool;
    }

    public function update()
    {
        $this->db->where(self::folio, $this->folio, true);
        $bool = $this->db->update($this->table, $this->getDataArrayClient());
        return $bool;
    }

    public function delete()
    {
        $this->db->where(self::folio, $this->folio, true);
        $bool = $this->db->update($this->table, $this->getArrayDelete());
        return $bool;
    }

    private function getArrayDelete()
    {
        return array(
            self::DELETED_AT => $this->deleted_at,
        );
    }

    private function getDataArrayClient()
    {
        $data = array(
            self::PRICE => $this->price,
            self::DATE => $this->date,
            self::CLIENT_ID => $this->client_id,
            self::PAYMENT_METHOD_ID => $this->payment_method_id);

            if ($this->created_at != '') {
                $data = array_merge($data, [self::CREATED_AT => $this->created_at]);
            }
    
            if ($this->updated_at != '') {
                $data = array_merge($data, [self::UPDATED_AT => $this->updated_at]);
            }
        
        return $data;
    }

    public function getfolio()
    {
        return $this->folio;
    }

    public function setfolio($folio)
    {
        $this->folio = $folio;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getClientId()
    {
        return $this->client_id;
    }

    public function setClientId($client_id)
    {
        $this->clientid = $client_id;
    }

    public function getPaymentMethodId()
    {
        return $this->payment_method_id;
    }

    public function setPaymentMethodId($payment_method_id)
    {
        $this->payment_method_id = $payment_method_id;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    public function setDeletedAt($deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }
}