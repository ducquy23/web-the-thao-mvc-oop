<?php
namespace App\Models;
class HomeCollection extends BaseModel {
    public function getProductByCategoryId($id) {
        $sql = "SELECT * FROM tb_products WHERE fk_cate_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
}