@extends('layout.layout-admin.main')
@section('content')
    <div class="main">
        <div class="main-header text-center">
            <h3 class="main-header__title">Thêm mới thương hiệu</h3>
        </div>
        <div class="main-header__form container">
            <form action="{{route('add-post-brand')}}" method="post">
                <div class="form-group">
                    <label for="name">Tên thương hiệu</label>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="Nhập tên thương hiệu">
                </div>
                <div class="form-submit text-center">
                    <button type="submit" name="add-brand" class="btn btn-success">Add New Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection