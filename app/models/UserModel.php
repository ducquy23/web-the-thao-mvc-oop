<?php
namespace App\Models;
class UserModel extends BaseModel {
    protected $table = 'tb_users';
    public function getListUser() {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function insertUser($id,$username,$password,$active,$role,$email,$created_at) {
        $sql = "INSERT INTO $this->table (id,username,password,active,role,email,created_at) VALUES (?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$username,$password,$active,$role,$email,$created_at]);
    }
    public function deleteUser($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function getDetailUser($id) {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateUser($id,$username,$password,$active,$role,$email,$update_at) {
        $sql = "UPDATE $this->table SET username = ?,password = ?,active = ?,role = ?,email = ?,update_at = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$username,$password,$active,$role,$email,$update_at,$id]);
    }
}