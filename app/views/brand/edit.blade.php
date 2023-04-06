@extends('layout.layout-admin.main')
@section('content')
    <div class="main">
        <div class="main-header text-center">
            <h3 class="main-header__title">Sửa thương hiệu</h3>
        </div>
        <div class="main-header__form container">
            <form action="{{route('edit-post-brand/' . $brand->id)}}" method="post">
                <div class="form-group">
                    <label for="name">Tên thương hiệu</label>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="Nhập tên thương hiệu" value="{{$brand->name}}">
                </div>
                <div class="form-submit text-center">
                    <button type="submit" name="edit-brand" class="btn btn-info">Update Brand</button>
                </div>
            </form>
        </div>
    </div>
@endsection