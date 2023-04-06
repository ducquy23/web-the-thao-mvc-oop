<?php
namespace App\Controllers;
use App\Models\HomeClientModel;
use App\Models\HomeDetailClientModel;
use App\Models\ImageModel;

class HomeDetailClient extends BaseController {
    protected $home;
    protected $homeDetail;
    protected $image;
    public function __construct() {
        $this->home = new HomeClientModel();
        $this->homeDetail = new HomeDetailClientModel();
        $this->image = new ImageModel();
    }
    public function index($id,$id_cate) {
        $menuHome = $this->home->showMenuHomeClient();
        $product = $this->homeDetail->getProductById($id);
        $product_relate = $this->homeDetail->getProductRelated($id_cate);
        $product_images = $this->image->getImageById($id);
        $colors = $this->homeDetail->getProductColor($id);
        if(isset($_COOKIE['recently_viewed'])) {
            $recentlyViewed  = json_decode($_COOKIE['recently_viewed']);
        } else {
            $recentlyViewed = array();
        }
        if(!in_array($product->id,$recentlyViewed)) {
            array_unshift($recentlyViewed,$product->id);
            setcookie('recently_viewed',json_encode($recentlyViewed),time()+3600,'/');
        }
        $productViewed = $this->homeDetail->getProductViewed($recentlyViewed);
        $this->render('home_detail.index',compact('colors','menuHome','product','product_relate','productViewed','product_images'));
    }
}