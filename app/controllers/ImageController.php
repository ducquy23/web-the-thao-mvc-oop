<?php
namespace App\Controllers;
use App\Models\ImageModel;

class ImageController extends BaseController {
    protected $image;
    public function __construct() {
        $this->image = new ImageModel();
    }

    public function RemoveProduct($id,$id_product) {
        $this->image->DeleteImage($id);
        push_notification('success',['Xóa ảnh thành công'],'edit-product/' . $id_product);
    }

}