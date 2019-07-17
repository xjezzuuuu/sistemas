<?php
class Ticket_model extends CI_Model
{
    private $table = 'ticket';
    
    private $id;
    private $name;
    private $type;
    private $price;
    private $quantity;
    private $event_id;
    private $created_at;
    private $updated_at;
    private $deleted_at;
    
    const ID = 'id';
    const NAME = 'name';
    const TYPE = 'type';
    const PRICE = 'price';
    const QUANTITY = 'quantity';
    const EVENT_ID = 'event_id';
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

    public function readById($id)
    {
        $this->db->select('*', false);
        $this->db->from($this->table);
        $this->db->where('id', $id, true);
        $this->db->where('deleted_at', null);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array()[0];
        } else {
            return null;
        }
    }

    public function readByEvent($event_id)
    {
        $this->db->select('*', false);
        $this->db->from($this->table);
        $this->db->where('event_id', $event_id, true);
        $this->db->where('deleted_at', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert()
    {
        $bool = $this->db->insert($this->table, $this->getDataArrayUser());
        $this->id = $this->db->insert_id();
        return $bool;
    }

    public function update()
    {
        $this->db->where(self::ID, $this->id, true);
        $bool = $this->db->update($this->table, $this->getDataArrayUser());
        return $bool;
    }

    public function delete()
    {
        $this->db->where(self::ID, $this->id, true);
        $bool = $this->db->update($this->table, $this->getArrayDelete());
        return $bool;
    }

    private function getArrayDelete()
    {
        return array(
            self::DELETED_AT => $this->deleted_at,
        );
    }

    private function getDataArrayUser()
    {
        $data = array(
            self::NAME => $this->name,
            self::TYPE => $this->type,
            self::PRICE => $this->price,
            self::QUANTITY => $this->quantity,
            self::EVENT_ID => $this->event_id);

        if ($this->created_at != '') {
            $data = array_merge($data, [self::CREATED_AT => $this->created_at]);
        }

        if ($this->updated_at != '') {
            $data = array_merge($data, [self::UPDATED_AT => $this->updated_at]);
        }
        return $data;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getEventId()
    {
        return $this->event_id;
    }

    public function setEventId($event_id)
    {
        $this->event_id = $event_id;
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