<?php
class Client_model extends CI_Model
{
    private $table = 'clients';
    
    private $id;
    private $rut;
    private $name;
    private $lastname;
    private $gender;
    private $age;
    private $email;
    private $fingerprint;
    private $created_at;
    private $updated_at;
    private $deleted_at;
    
    const ID = 'id';
    const RUT = 'rut';
    const NAME = 'name';
    const LASTNAME = 'lastname';
    const GENDER = 'gender';
    const AGE = 'age';
    const EMAIL = 'email';
    const FINGERPRINT = 'fingerprint';
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

    public function readByEmail($email)
    {
        $this->db->select('*', false);
        $this->db->from($this->table);
        $this->db->where('email', $email, true);
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
            self::RUT => $this->rut,
            self::NAME => $this->name,
            self::LASTNAME => $this->lastname,
            self::GENDER => $this->gender,
            self::AGE => $this->age,
            self::EMAIL => $this->email,
            self::FINGERPRINT => $this->fingerprint);


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

    public function getRut()
    {
        return $this->rut;
    }

    public function setRut($rut)
    {
        $this->rut = $rut;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFingerPrint()
    {
        return $this->fingerprint;
    }

    public function setFingerPrint($fingerprint)
    {
        $this->fingerprint = $fingerprint;
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