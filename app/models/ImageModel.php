<?php
namespace App\Models;
class ImageModel extends BaseModel {
    protected $table = 'tb_product_images';
    public function DeleteImage($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function UpdateImage($id,$path) {
        $sql = "UPDATE $this->table SET path = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$path,$id]);
    }
    public function getImageById($id) {
        $sql = "SELECT * FROM $this->table WHERE fk_product_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
}