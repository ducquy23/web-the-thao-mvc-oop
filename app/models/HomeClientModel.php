<?php
namespace App\Models;
use App\Models\CategoryModel;
class HomeClientModel extends BaseModel {
    public function showMenuHomeClient() {
        $categories = new CategoryModel();
        return $categories->getCategory();
    }
    public function getCategoryBall() {
        $sql = "SELECT * FROM tb_categories WHERE parent_id = 53 LIMIT 4";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getCategoryShoes() {
        $sql = "SELECT * FROM tb_categories WHERE parent_id = 30 LIMIT 4";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getProductByCategory($id) {
        $sql = "SELECT * FROM tb_products WHERE fk_cate_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    public function getProductBall() {
        $sql = "SELECT * FROM tb_products WHERE fk_cate_id = 67";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getProductShoes() {
        $sql = "SELECT * FROM tb_products WHERE fk_cate_id = 54";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getExerciseEquipment() {
        $sql = "SELECT * FROM tb_categories WHERE parent_id = 64";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function checkUser($email,$password) {
        $sql = "SELECT * FROM tb_users WHERE email = ? AND password = ?";
        $this->setQuery($sql);
        return $this->loadRow([$email,$password]);
    }
    public function checkEmailDuplicate($email) {
        $sql = "SELECT email FROM tb_users WHERE email = ?";
        $this->setQuery($sql);
        return $this->loadRow([$email]);
    }
}