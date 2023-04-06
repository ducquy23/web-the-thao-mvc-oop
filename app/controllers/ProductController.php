<?php

namespace App\Controllers;
use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\ColorModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BaseModel;

class ProductController extends BaseController {
    public $product;
    public $category;
    public $brand;
    public $color;
    public function __construct() {
        $this->product = new ProductModel();
        $this->category = new CategoryModel();
        $this->brand = new BrandModel();
        $this->color = new ColorModel();
    }

    public function ListProduct() {
        $products = $this->product->getProduct();
        $this->render('product.index', compact('products'));
    }
    public function AddProduct() {
        $categories = $this->category->getCategory();
        $brands = $this->brand->getBrand();
        $colors = $this->color->getColor();
        $this->render('product.add', compact('categories','brands','colors'));
    }
    public function AddPostProduct() {
        if (isset($_POST['add-product'])) {
            $colors = $_POST['colors'];
            $title = $_POST['title'];
            $price = $_POST['price'];
            $fk_cate_id = $_POST['category'];
            $description = $_POST['desc'];
            $file_img = $_FILES['image'];
            $uploadedFiles = array();
            $brand = $_POST['brand'];
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            if (empty($title) || empty($price) || empty($description)) {
                push_notification('danger', ['Vui lòng không bỏ trống'], 'add-product');
            }
            if (!is_numeric($price)) {
                push_notification('danger', ['Vui lòng nhập số cho trường giá'], 'add-product');
            }
            if ($price < 0) {
                push_notification('danger', ['Vui lòng không nhập số âm cho trường giá'], 'add-product');
            }
            if (empty($file_name)) {
                push_notification('danger', ['Vui lòng chọn ảnh'], 'add-product');
            }
            move_uploaded_file($file_tmp,'public/uploads/' . $file_name);
            $result = $this->product->insertProduct(NULL, $title, $price, $file_name, $description, $fk_cate_id, time(),$brand);
            if ($result) {
                $last_id = $this->product->getLastId();
                foreach ($_FILES['gallery']['tmp_name'] as $key => $tmp_name) {
                    $file_name = $_FILES['gallery']['name'][$key];
                    $file_tmp = $_FILES['gallery']['tmp_name'][$key];
                    move_uploaded_file($file_tmp,"public/uploads/" . $file_name);
                    $uploadedFiles[] = $file_name;
                }
                foreach($uploadedFiles as $key => $value){
                    $this->product->insertImages(NULL,$value,$last_id);
                }
                foreach ($colors as $id_color) {
                    $this->product->insertProductColor(NULL,$last_id,$id_color);
                }
                push_notification('success', ['Thêm mới sản phẩm thành công'], 'list-product');
            }
        }

    }

    public function RemoveProduct($id) {
        $this->product->deleteProduct($id);
        push_notification('success', ['Xóa sản phẩm thành công'], 'list-product');
    }

    public function EditProduct($id) {
        $current_color = $this->product->getColorById($id);
        $product = $this->product->getDetailProduct($id);
        $categories = $this->category->getCategory();
        $brands = $this->brand->getBrand();
        $colors = $this->color->getColor();
        $images = $this->product->getImages($id);
        return $this->render('product.edit', compact('categories', 'product','brands','images','current_color','colors'));
    }

    public function EditPostProduct($id) {
        if (isset($_POST['edit-product'])) {
            $colors = isset($_POST['colors']) ? $_POST['colors'] : [];
            $title = $_POST['title'];
            $price = $_POST['price'];
            $fk_cate_id = $_POST['category'];
            $description = $_POST['desc'];
            $file_name = $_FILES['image']['name'];
            $brand = $_POST['brand'];
            $galleries = $_FILES['galleries'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $image_old = $_POST['image_old'];
            $current_color = $this->product->getColorById($id);
            $uploadedFiles = array();
            if (empty($title) || empty($price) || empty($description)) {
                push_notification('danger', ['Vui lòng không bỏ trống'], 'edit-product/' . $id);
            }
            if (!is_numeric($price)) {
                push_notification('danger', ['Vui lòng nhập số cho trường giá'], 'edit-product/' . $id);
            }
            if ($price < 0) {
                push_notification('danger', ['Vui lòng không nhập số âm cho trường giá'], 'edit-product/' . $id);
            }
            if(empty($file_name)) {
                $file_name = $image_old;
            }
            move_uploaded_file($file_tmp,'public/uploads/' . $file_name);
            $this->product->updateProduct($id,$title,$price,$file_name,$description,$fk_cate_id,time(),$brand);
            foreach ($_FILES['galleries']['tmp_name'] as $key => $tmp_name) {
                $file_name = $_FILES['galleries']['name'][$key];
                $file_tmp = $_FILES['galleries']['tmp_name'][$key];
                move_uploaded_file($file_tmp,"public/uploads/" . $file_name);
                $uploadedFiles[] = $file_name;
            }
            if(!$galleries['name'][0] == '') {
                foreach($uploadedFiles as $key => $value){
                    $this->product->insertImages(NULL,$value,$id);
                }
            }
            foreach ($colors as $id_color) {
                $this->product->insertProductColor(NULL,$id,$id_color);
            }
            push_notification('success', ['cập nhập sản phẩm thành công'], 'edit-product/' . $id);
        }
    }
    public function RemoveProductColor($id,$id_pro) {
        $this->product->deleteProductColor($id,$id_pro);
        push_notification('success', ['xóa màu sắc sản phẩm thành công'], 'edit-product/' . $id_pro);
    }

}