@extends('layout.layout-admin.main')
@section('content')
    <div class="main">
        <div class="main-header text-center">
            <h3 class="main-header__title">Sửa danh mục</h3>
        </div>
        <div class="main-header__form container">
            <form action="{{route('edit-post-category/' .$category->id )}}" method="post">
                <div class="form-group">
                    <label for="name">Tên danh mục</label>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="Nhập tên danh mục" value="{{$category->name}}">
                </div>
                <div class="form-submit text-center">
                    <button type="submit" name="update-category" class="btn btn-info">Update Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection