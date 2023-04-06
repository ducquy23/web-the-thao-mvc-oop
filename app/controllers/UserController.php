<?php
namespace App\Controllers;
use App\Models\UserModel;
class UserController extends BaseController {
    public $user;
    public function __construct() {
        $this->user = new UserModel();
    }
    public function ListUser() {
        $users = $this->user->getListUser();
        return $this->render('user.index',compact('users'));
    }
    public function AddUser() {
        $this->render('user.add');
    }
    public function AddPostUser() {
        if(isset($_POST['add-user'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $active = $_POST['active'];
            $role = $_POST['role'];
            if(empty($username) || empty($password) || empty($email)) {
                push_notification('danger',['Vui lòng không bỏ trống'],'add-user');
            }
            if(strlen($password) < 6) {
                push_notification('danger',['Vui nhập password > 6 kí tự'],'add-user');
            }
            $result = $this->user->insertUser(NULL,$username,$password,$active,$role,$email,time());
            if($result) {
                push_notification('success',['Thêm mới user thành công'],'list-user');
            }
        }
    }
    public function RemoveUser ($id) {
        $this->user->deleteUser($id);
        push_notification('success',['Xóa người dùng thành công'],'list-user');
    }
    public function EditUser($id) {
        $user = $this->user->getDetailUser($id);
        $this->render('user.edit',compact('user'));
    }
    public function EditPostUser($id) {
        if(isset($_POST['edit-user'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $active = $_POST['active'];
            $role = $_POST['role'];
            if(empty($username) || empty($password) || empty($email)) {
                push_notification('danger',['Vui lòng không bỏ trống'],'edit-user/' . $id);
            }
            if(strlen($password) < 6) {
                push_notification('danger',['Vui nhập password > 6 kí tự'],'edit-user/' . $id);
            }
            $result = $this->user->updateUser($id,$username,$password,$active,$role,$email,time());
            if($result) {
                push_notification('success',['Update user thành công'],'list-user');
            }
        }
    }
}