@extends('layout.layout-admin.main')
@section('content')
    <div class="main">
        <div class="main-header text-center">
            <h3 class="main-header__title">Thêm mới danh mục</h3>
        </div>
        <div class="main-header__form container">
            <form action="{{route('add-post-category')}}" method="post">
                <div class="form-group">
                    <label for="name">Tên danh mục</label>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="Nhập tên danh mục">
                </div>
                <div class="form-submit text-center">
                    <button type="submit" name="add-category" class="btn btn-success">Add New Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection