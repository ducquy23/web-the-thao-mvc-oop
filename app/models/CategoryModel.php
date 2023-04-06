<?php
namespace App\Models;
class CategoryModel extends BaseModel {
    protected $table = 'tb_categories';
    public function getCategory() {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function insertProduct($id,$name,$created_at) {
        $sql = "INSERT INTO $this->table (id,name,created_at) VALUES(?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute([$id,$name,$created_at]);
    }
    public function deleteCategory($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function getDetailCategory($id) {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateCategory($id,$name,$update_at) {
        $sql = "UPDATE $this->table SET name = ?,update_at = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name,$update_at,$id]);
    }
}