<?php
namespace App\Models;
class HomeDetailClientModel extends BaseModel {
    public function getProductById($id) {
        $sql = "SELECT * FROM tb_products WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function getColorById($id) {
        $sql = "SELECT * FROM tb_products_colors WHERE fk_product_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function getSizeById($id) {
        $sql = "SELECT * FROM tb_products_size WHERE fk_product_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function getProductRelated($id) {
        $sql = "SELECT * FROM tb_products WHERE  fk_cate_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function getProductViewed($id) {
        $placeholders = rtrim(str_repeat('?, ', count($id)), ', ');
        $sql = "SELECT * FROM tb_products WHERE id IN ($placeholders) ORDER BY id DESC LIMIT 6";
        $this->setQuery($sql);
        return $this->loadAllRows($id);
    }
    public function getProductColor($id) {
        $sql = "SELECT fk_product_id,fk_color_id,color,hex_code FROM tb_product_colors 
                INNER JOIN tb_products ON tb_products.id = tb_product_colors.fk_product_id 
                INNER JOIN tb_colors ON tb_colors.id = tb_product_colors.fk_color_id 
                WHERE fk_product_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
}
