<?php
namespace App\Models;
class ProductModel extends BaseModel {
    protected $table = 'tb_products';
    public function getProduct() {
        $sql = "SELECT tb_products.id as 'product_id',tb_brands.name as 'brand_name',$this->table.update_at as 'update_product',price,title,image,tb_categories.name as 'category_name',$this->table.created_at as 'created_product' FROM $this->table 
        INNER JOIN tb_categories ON tb_products.fk_cate_id = tb_categories.id INNER JOIN tb_brands ON tb_brands.id = tb_products.fk_brand_id";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function insertProduct($id,$title,$price,$image,$description,$fk_cate_id,$created_at,$brand) {
        $sql = "INSERT INTO $this->table (id,title,price,image,description,fk_cate_id,created_at,fk_brand_id) VALUE(?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$title,$price,$image,$description,$fk_cate_id,$created_at,$brand]);
    }
    public function deleteProduct($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        $this->execute([$id]);
    }
    public function getDetailProduct($id) {
        $sql = "SELECT tb_brands.name as 'brand_name',tb_brands.id as 'brand_id',tb_products.id as 'product_id',price,title,image,description,tb_categories.name 'cate_name',tb_categories.id as 'cate_id' 
                FROM $this->table 
                JOIN tb_categories ON $this->table.fk_cate_id = tb_categories.id
                INNER JOIN tb_brands ON tb_brands.id = tb_products.fk_brand_id
                WHERE $this->table.id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateProduct($id,$title,$price,$image,$description,$fk_cate_id,$update_at,$brand) {
        $sql = "UPDATE $this->table SET title = ?,price = ?,image = ?,description = ?,fk_cate_id = ?,update_at = ?,fk_brand_id = ? WHERE id = ?";
        $this->setQuery($sql);
        $this->execute([$title,$price,$image,$description,$fk_cate_id,$update_at,$brand,$id]);
    }
    public function getLastId()
    {
        return parent::getLastId();
    }
    public function insertImages($id,$path,$fk_product_id) {
        $sql = "INSERT INTO tb_product_images (id,path,fk_product_id) VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$path,$fk_product_id]);
    }
    public function getImages($id) {
        $sql = "SELECT * FROM tb_product_images WHERE fk_product_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function insertProductColor($id,$id_pro,$id_col) {
        $sql = "INSERT INTO tb_product_colors (product_color_id,fk_product_id,fk_color_id) VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$id_pro,$id_col]);
    }
    public function getColorById($id) {
        $sql = "SELECT product_color_id,fk_product_id,fk_color_id,color,hex_code FROM tb_product_colors INNER JOIN tb_colors ON tb_colors.id = tb_product_colors.fk_color_id WHERE fk_product_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function updateProductColor($id,$fk_color_id) {
        $sql = "UPDATE tb_product_colors SET fk_color_id = ? WHERE fk_product_id = ?";
        $this->setQuery($sql);
        return $this->execute([$fk_color_id,$id]);
    }
    public function deleteProductColor($id,$id_pro) {
        $sql = "DELETE FROM tb_product_colors WHERE  fk_color_id = ? AND fk_product_id = ?";
        $this->setQuery($sql);
        return $this->execute([$id,$id_pro]);
    }
}