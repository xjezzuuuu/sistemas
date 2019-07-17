<?php
class Event_model extends CI_Model
{
    private $table = 'event';
    
    private $id;
    private $name;
    private $date;
    private $capacity;
    private $address;
    private $city;
    private $country;
    private $created_at;
    private $updated_at;
    private $deleted_at;
    
    const ID = 'id';
    const NAME = 'name';
    const DATE = 'date';
    const CAPACITY = 'capacity';
    const ADDRESS = 'address';
    const CITY = 'city';
    const COUNTRY = 'country';
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

    public function insert()
    {
        $bool = $this->db->insert($this->table, $this->getDataArrayClient());
        $this->id = $this->db->insert_id();
        return $bool;
    }

    public function update()
    {
        $this->db->where(self::ID, $this->id, true);
        $bool = $this->db->update($this->table, $this->getDataArrayClient());
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

    private function getDataArrayClient()
    {
        $data = array(
            self::NAME => $this->name,
            self::DATE => $this->date,
            self::CAPACITY => $this->capacity,
            self::ADDRESS => $this->address,
            self::CITY => $this->city,
            self::COUNTRY => $this->country);


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

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
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