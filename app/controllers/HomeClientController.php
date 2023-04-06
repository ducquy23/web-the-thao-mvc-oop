<?php
namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\HomeClientModel;
use Phroute\Phroute\Route;
use App\Models\UserModel;
class HomeClientController extends BaseController {
    protected $home;
    protected $user;
    public function __construct() {
        $this->home = new HomeClientModel();
        $this->user = new UserModel();
    }

    public function index() {
        $categoryBalls = $this->home->getCategoryBall();
        $categoryShoes = $this->home->getCategoryShoes();
        $menuHome = $this->home->showMenuHomeClient();
        $ballProducts = $this->home->getProductBall();
        $shoesProducts = $this->home->getProductShoes();
        $exerciseEquipments = $this->home->getExerciseEquipment();
        $this->render('home.index',compact('exerciseEquipments','menuHome','categoryBalls','categoryShoes','ballProducts','shoesProducts'));
    }
    public function ShowCateBall($id) {
        $categoryBalls = $this->home->getCategoryBall();
        $categoryShoes = $this->home->getCategoryShoes();
        $menuHome = $this->home->showMenuHomeClient();
        $ballProducts = $this->home->getProductByCategory($id);
        $shoesProducts = $this->home->getProductShoes();
        $exerciseEquipments = $this->home->getExerciseEquipment();
        $this->render('home.index',compact('menuHome','categoryBalls','categoryShoes','ballProducts','shoesProducts','exerciseEquipments'));
    }
    public function ShowCateShoes($id) {
        $categoryBalls = $this->home->getCategoryBall();
        $categoryShoes = $this->home->getCategoryShoes();
        $menuHome = $this->home->showMenuHomeClient();
        $shoesProducts = $this->home->getProductByCategory($id);
        $ballProducts = $this->home->getProductBall();
        $exerciseEquipments = $this->home->getExerciseEquipment();
        $this->render('home.index',compact('menuHome','categoryBalls','categoryShoes','shoesProducts','ballProducts','exerciseEquipments'));
    }
    public function HandlerLogin() {
        $menuHome = $this->home->showMenuHomeClient();
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            return $this->render('account.login',compact('menuHome'));
        } else {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (empty($email) && empty($password)) {
                push_notification('red', ['Vui lòng không bỏ trống email hoặc password'], 'handler-login');
            }
            if (empty($email)) {
                push_notification('red', ['Vui lòng không bỏ trống email'], 'handler-login');
            }
            if (empty($password)) {
                push_notification('red', ['Vui lòng không bỏ trống password'], 'handler-login');
            }
            $checkUser = $this->home->checkUser($email, $password);
            if (is_object($checkUser)) {
                $_SESSION['user'] = $checkUser;
                return $this->render('account.login', compact('menuHome'));
            } else {
                push_notification('red', ['Tài khoản hoặc mật khẩu không chính xác'], 'handler-login');
                return $this->render('account.login', compact('menuHome'));
            }
        }
    }
    public function ShowFormLogin() {
        $menuHome = $this->home->showMenuHomeClient();
        return $this->render('account.login',compact('menuHome'));
    }
    public function HandlerLogout() {
        unset($_SESSION['user']);
        push_notification('green',[''],'');
    }
    public function ShowFormRegister() {
        $menuHome = $this->home->showMenuHomeClient();
        return $this->render('account.register',compact('menuHome'));
    }
    public function HandlerRegister() {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($username) || empty($email) || empty($password)) {
            push_notification('red',['Vui lòng không bỏ trống'],'register');
        }
        if(empty($username)) {
            push_notification('red',['Vui lòng không bỏ trống fullname'],'register');
        }
        if(empty($email)) {
            push_notification('red',['Vui lòng không bỏ trống email'],'register');
        }
        if(empty($password)) {
            push_notification('red',['Vui lòng không bỏ trống password'],'register');
        }
        $checkEmailDuplicate = $this->home->checkEmailDuplicate($email);
        if(is_object($checkEmailDuplicate)) {
            push_notification('red',['Email này đã được đăng ký'],'register');
        } else {
            $result = $this->user->insertUser(NULL, $username, $password, 0, 0, $email, time());
            if ($result) {
                push_notification('green', ['Đăng ký thành công'], 'register');
            }
        }

    }
}