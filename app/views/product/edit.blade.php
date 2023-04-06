@extends('layout.layout-admin.main')
@section('content')
    <div class="main">
        <div class="main-header text-center">
            <h3 class="main-header__title">Sửa sản phẩm</h3>
        </div>
        <div class="main-header__form container">
            <form action="{{route('edit-post-product/' . $product->product_id)}}" method="post"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="image_old" value="{{$product->image}}">
                    <label for="title">Tiêu đề sản phẩm</label>
                    <input type="text" class="form-control" name="title" id="title"
                           placeholder="Nhập tiêu đề sản phẩm" value="{{$product->title}}">
                </div>
                <div class="form-group">
                    <label for="price">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="price" id="price"
                           placeholder="Nhập giá sản phẩm" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label for="category">Danh mục sản phẩm</label>
                    <select name="category" class="form-control" id="category">
                        <option value="{{$product->cate_id}}" selected>{{$product->cate_name}}</option>
                        @foreach($categories as $category)
                            @if($category->id == $product->id)
                                <h2>Hello</h2>
                            @endif
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand">Thương hiệu sản phẩm</label>
                    <select name="brand" class="form-control" id="brand">
                        <option value="{{$product->brand_id}}">{{$product->brand_name}}</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="color">Màu sắc hiện có của sản phẩm</label> <br>
                    <div class="form-group-color-box">
                        @if(empty($current_color))
                            <p style="color: red">Màu sắc hiện đang trống</p>
                        @endif
                        @foreach($current_color as $key => $color)
                            <div class="form-group-color">
                                <div class="form-input-check-box">
                                    <span class="form-color" style="background-color: {{$color->hex_code}}"></span>
                                    <a onclick="return confirm('Bạn có muốn xóa màu này không ?')" href="{{BASE_URL . 'remove-product-color/' . $color->fk_color_id . '/' . $color->fk_product_id}}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Thêm màu sắc</label>
                    <div class="form-group-color-box" style="background-color: #c9cccf">
                        @foreach($colors as $key => $color)
                            <div class="form-group-color">
                                <input type="checkbox" name="colors[]" value="{{$color->id}}">
                                <span class="form-color" style="background-color: {{$color->hex_code}}"></span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Ảnh sản phẩm</label> <br>
                    <input type="file" name="image" id="image"> <br>
                    <img src="{{BASE_URL}}public/uploads/{{$product->image}}" alt="" class="img-thumbnail"
                         width="150px" style="margin: 10px 0">
                </div>
                <div class="form-group">
                    <label for="">Thư viện ảnh</label> <br>
                    <input type="file" name="galleries[]" class="mt-2 mb-2" multiple="">
                    <div class="bg-light p-5 rounded block-image">
                        @foreach($images as $image)
                            <div class="box-image-block">
                                <img src="{{BASE_URL}}public/uploads/{{$image->path}}" width="210px" height="250px"
                                     style="object-fit: contain;border: 2px solid black;border-radius: 8px" alt=""
                                     class="img-fluid ml-4 mr-4 mt-3">
                                <a href="{{BASE_URL .'remove-image/' . $image->id . '/' . $product->product_id}}"
                                   onclick="return confirm('Bạn có muốn xóa ảnh này không ?')"
                                   class="btn btn-danger btn-delete-image">Xóa</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{--                <a href="{{BASE_URL . 'list-category'}}">Link khác</a>--}}
                <div class="form-group">
                    <label for="desc">Mô tả sản phẩm</label>
                    <textarea name="desc" id="editor" cols="30" rows="10"
                              class="form-control">{{$product->description}}</textarea>
                </div>
                <div class="form-submit text-center">
                    <button type="submit" name="edit-product" class="btn btn-info">Update Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection