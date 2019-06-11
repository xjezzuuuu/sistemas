<?php
class User_model extends CI_Model
{
    private $table = 'users';
    
    private $id;
    private $name;
    private $last_name;
    private $email;
    private $password;
    private $image;
    private $created_at;
    private $updated_at;
    private $deleted_at;
    
    const ID = 'id';
    const NAME = 'name';
    const LAST_NAME = 'last_name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const IMAGE = 'image';
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
            self::LAST_NAME => $this->last_name,
            self::EMAIL => $this->email);
        
        if ($this->password != '') {
            $data = array_merge($data, [self::PASSWORD => $this->password]);
        }

        if ($this->image != '') {
            $data = array_merge($data, [self::IMAGE => $this->image]);
        }

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

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
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