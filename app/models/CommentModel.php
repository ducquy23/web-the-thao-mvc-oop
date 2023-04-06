<?php
namespace App\Models;
class CommentModel extends  BaseModel {
    public $table = 'tb_comments';
    public function getListComment () {
        $sql = "SELECT tb_comments.id as 'comment_id',tb_products.title as 'title_product',content,tb_comments.created_at as 'date_comment',tb_users.username as 'user_name' FROM $this->table INNER JOIN tb_products ON tb_products.id = tb_comments.fk_products_id INNER JOIN tb_users ON tb_users.id = tb_comments.fk_users_id";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function deleteComment($id) {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}