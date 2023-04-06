<?php
namespace App\Models;
class BrandModel extends BaseModel {
    protected $table = 'tb_brands';
    public function getBrand() {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function insertBrand($id,$name,$created_at) {
        $sql = "INSERT INTO $this->table (id,name,created_at) VALUES(?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute([$id,$name,$created_at]);
    }
    public function deleteBrand($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function getDetailBrand($id) {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateBrand($id,$name,$update_at) {
        $sql = "UPDATE $this->table SET name = ?,update_at = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name,$update_at,$id]);
    }
}