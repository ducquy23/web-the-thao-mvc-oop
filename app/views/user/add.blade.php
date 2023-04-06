@extends('layout.layout-admin.main')
@section('content')
    <div class="main">
        <div class="main-header text-center">
            <h3 class="main-header__title">Thêm mới người dùng</h3>
        </div>
        <div class="main-header__form container">
            <form action="{{route('add-post-user')}}" method="post">
                <div class="form-group">
                    <label for="username">Tên người dùng</label>
                    <input type="text" class="form-control" name="username" id="username"
                           placeholder="Nhập tên người dùng">
                </div>
                <div class="form-group">
                    <label for="password">Tên mật khẩu</label>
                    <input type="text" class="form-control" name="password" id="password"
                           placeholder="Nhập tên mật khẩu">
                </div>
                <div class="form-group">
                    <label for="email">Tên email</label>
                    <input type="email" class="form-control" name="email" id="email"
                           placeholder="Nhập email">
                </div>
                <div class="form-group">
                    <label for="active">Chọn active</label>
                    <select name="active" id="active" class="form-control">
                        <option value="0">Kích hoạt</option>
                        <option value="1">Khóa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="role">Chọn role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="0">Client</option>
                        <option value="1">Admin</option>
                    </select>
                </div>

                <div class="form-submit text-center">
                    <button type="submit" name="add-user" class="btn btn-success">Add New User</button>
                </div>
            </form>
        </div>
    </div>
@endsection