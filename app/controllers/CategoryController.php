<?php

namespace App\Controllers;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public $category;

    public function __construct()
    {
        $this->category = new CategoryModel();
    }

    public function ListCategory()
    {
        $categories = $this->category->getCategory();
        return $this->render('category.index', compact('categories'));
    }

    public function AddCategory()
    {
        $this->render('category.add');
    }

    public function AddPostCategory()
    {
        if (isset($_POST['add-category'])) {
            $name = $_POST['name'];
            if (empty($name)) {
                push_notification('danger', ['Vui lòng không bỏ trống'], 'add-category');
            }
            $result = $this->category->insertProduct(NULL, $name, time());
            if ($result) {
                push_notification('success', ['Thêm mới sản phẩm thành công'], 'list-category');
            }
        }

    }
    public function RemoveCategory($id) {
        try {
            $this->category->deleteCategory($id);
            push_notification('success',['Xóa danh mục sản phẩm thành công'],'list-category');
        } catch (\PDOException) {
            push_notification('danger',['Vui lòng xóa hết sản phẩm thuộc danh mục'],'list-category');
        }
    }

    public function EditCategory($id)
    {
        $category = $this->category->getDetailCategory($id);
        $this->render('category.edit',compact('category'));
    }
    public function EditPostCategory($id) {
        if(isset($_POST['update-category'])) {
            $name = $_POST['name'];
            if(empty($name)) {
                push_notification('danger',['Vui lòng không bỏ trống'],'edit-category/'. $id);
            }
            $result = $this->category->updateCategory($id,$name,time());
            if($result) {
                push_notification('success',['Cập nhập danh mục thành công'],'list-category');
            }
        }
    }

}
