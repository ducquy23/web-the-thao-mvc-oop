<?php

namespace App\Controllers;

use App\Models\BrandModel;

class BrandController extends BaseController
{
    public $brand;

    public function __construct()
    {
        $this->brand = new BrandModel();
    }
    public function listBrand()
    {
        $brands = $this->brand->getBrand();
        return $this->render('brand.index', compact('brands'));
    }

    public function AddBrand()
    {
        $this->render('brand.add');
    }
//
    public function AddPostBrand()
    {
        if (isset($_POST['add-brand'])) {
            $name = $_POST['name'];
            if (empty($name)) {
                push_notification('danger', ['Vui lòng không bỏ trống'], 'add-brand');
            }
            $result = $this->brand->insertBrand(NULL, $name, time());
            if ($result) {
                push_notification('success', ['Thêm mới danh mục'], 'list-brand');
            }
        }

    }
    public function RemoveBrand($id) {
        $this->brand->deleteBrand($id);
        push_notification('success',['Xóa thương hiệu sản phẩm thành công'],'list-brand');
    }
//
    public function EditBrand($id)
    {
        $brand = $this->brand->getDetailBrand($id);
        $this->render('brand.edit',compact('brand'));
    }
    public function EditPostBrand($id) {
        if(isset($_POST['edit-brand'])) {
            $name = $_POST['name'];
            $result = $this->brand->updateBrand($id,$name,time());
            if($result) {
                push_notification('success',['Cập nhập thương hiệu thành công'],'list-brand');
            }
        }
    }

}
