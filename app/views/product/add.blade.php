@extends('layout.layout-admin.main')
@section('content')
    <div class="main">
        <div class="main-header text-center">
            <h3 class="main-header__title">Thêm mới sản phẩm</h3>
        </div>
        <div class="main-header__form container">
            <form action="{{route('add-post-product')}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Tiêu đề sản phẩm</label>
                    <input type="text" class="form-control" name="title" id="title"
                           placeholder="Nhập tiêu đề sản phẩm">
                </div>
                <div class="form-group">
                    <label for="price">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="price" id="price"
                           placeholder="Nhập giá sản phẩm">
                </div>
                <div class="form-group">
                    <label for="category">Danh mục sản phẩm</label>
                    <select name="category" class="form-control" id="category">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand">Thương hiệu sản phẩm</label>
                    <select name="brand" class="form-control" id="brand">
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="color">Màu sắc của sản phẩm</label> <br>
                    <div class="form-group-color-box">
                        @foreach($colors as $color)
                        <div class="form-group-color"><input type="checkbox" value="{{$color->id}}" name="colors[]"><span class="form-color" style="background-color: {{$color->hex_code}}"></span></div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Ảnh đại diện sản phẩm</label> <br>
                    <input type="file" name="image" id="image">
                </div>
                <div class="form-group">
                    <label for="image">Thư viện ảnh</label> <br>
                    <input type="file" multiple="" name="gallery[]" id="gallery">
                </div>
                <div class="form-group">
                    <label for="desc">Mô tả sản phẩm</label>
                    <textarea name="desc" id="editor" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-submit text-center">
                    <button type="submit" name="add-product" class="btn btn-success">Add New Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection