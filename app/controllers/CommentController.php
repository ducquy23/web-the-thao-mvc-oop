<?php
namespace App\Controllers;
use App\Models\CommentModel;
class CommentController extends BaseController {
    public $comment;
    public function __construct() {
        $this->comment = new CommentModel();
    }
    public function ListComment() {
        $comments = $this->comment->getListComment();
        return $this->render('comment.index',compact('comments'));
    }
    public function RemoveComment($id) {
        $this->comment->deleteComment($id);
        push_notification('success',['Xóa bình luận thành công'],'list-comment');
    }
}