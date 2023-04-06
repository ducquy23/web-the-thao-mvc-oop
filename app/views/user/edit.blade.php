@extends('layout.layout-admin.main')
@section('content')
    <div class="main">
        <div class="main-header text-center">
            <h3 class="main-header__title">Sửa người dùng</h3>
        </div>
        <div class="main-header__form container">
            <form action="{{route('edit-post-user/') . $user->id }}" method="post">
                <div class="form-group">
                    <label for="username">Tên người dùng</label>
                    <input type="text" class="form-control" name="username" id="username"
                           placeholder="Nhập tên người dùng" value="{{$user->username}}">
                </div>
                <div class="form-group">
                    <label for="password">Tên mật khẩu</label>
                    <input type="text" class="form-control" name="password" id="password"
                           placeholder="Nhập tên mật khẩu" value="{{$user->password}}">
                </div>
                <div class="form-group">
                    <label for="email">Tên email</label>
                    <input type="email" class="form-control" name="email" id="email"
                           placeholder="Nhập email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="active">Chọn active</label>
                    <select name="active" id="active" class="form-control">
                        <option value="{{($user->active == 0) ? 0 : 1 }}" selected>{{($user->active == 0) ? "Kích hoạt" : "Khóa" }}</option>
                        <option value="0">Kích hoạt</option>
                        <option value="1">Khóa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="role">Chọn role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="{{($user->role == 0) ? 0 : 1 }}" selected>{{($user->role == 0) ? "Client" : "Admin" }}</option>
                        <option value="0">Client</option>
                        <option value="1">Admin</option>
                    </select>
                </div>

                <div class="form-submit text-center">
                    <button type="submit" name="edit-user" class="btn btn-info">Update User</button>
                </div>
            </form>
        </div>
    </div>
@endsection