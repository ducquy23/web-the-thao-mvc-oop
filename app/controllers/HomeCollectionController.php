<?php
namespace App\Controllers;
use App\Models\HomeCollection;
use App\Models\HomeClientModel;

class HomeCollectionController extends BaseController {
    protected $homeCollection;
    protected $home;
    public function __construct(){
        $this->home = new HomeClientModel();
        $this->homeCollection = new HomeCollection();
    }
    public function index($id) {
        $menuHome = $this->home->showMenuHomeClient();
        $listProduct = $this->homeCollection->getProductByCategoryId($id);
        $nameCategory = $this->homeCollection->getNameParent($id);
        return $this->render('home-collections.index',compact('menuHome','listProduct','nameCategory'));
    }

}