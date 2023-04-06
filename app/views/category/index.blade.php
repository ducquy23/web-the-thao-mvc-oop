@extends('layout.layout-admin.main')
@section('content')
    <div class="main">
        <div class="main-banner-function">
            <h3 class="text-info text-center">Quản lý danh mục</h4>
        </div>
        <div class="main-list">
            <h5 class="main-list-item">Danh sách danh mục</h5>
            <div class="main-list-action">
                <div class="main-list-action__search">
                    <form action="">
                        <button type="submit">Tìm Kiếm</button>
                        <input type="text" name="search" placeholder="Aspen Weste">
                    </form>
                </div>
                <a href="{{route('add-category')}}"><button class="btn btn-success">Add New Category</button></a>
            </div>
        </div>
        <div class="main-table">
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Created At</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="table-bordered">
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{date('d-m-Y H:i',$category->created_at)}}</td>
                        <td>{{date('d-m-Y H:i',$category->update_at)}}</td>
                        <td class="text-center">
                            <a href="{{route('edit-category/' . $category->id)}}"><button class="btn btn-info">UPDATE</button></a>
                            <a href="{{route('remove-category/' . $category->id)}}"><button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa danh mục này không ?')">DELETE</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection