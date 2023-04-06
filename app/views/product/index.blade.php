@extends('layout.layout-admin.main')
@section('content')
    <div class="main">
        <div class="main-banner-function">
            <h3 class="text-info text-center">Quản lý sản phẩm</h4>
        </div>
        <div class="main-list">
            <h5 class="main-list-item">Danh sách sản phẩm</h5>
            <div class="main-list-action">
                <div class="main-list-action__search">
                    <form action="">
                        <button type="submit">Tìm Kiếm</button>
                        <input type="text" name="search" placeholder="Aspen Weste">
                    </form>
                </div>
                <a href="{{route('add-product')}}"><button class="btn btn-success">Add New Product</button></a>
            </div>
        </div>
        <div class="main-table">
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>Product Category</th>
                    {{--                <th>Product Brand</th>--}}
                    <th>Created At</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="table-bordered">
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->product_id}}</td>
                        <td style="width: 220px">{{$product->title}}</td>
                        <td class="text-center">
                            <img src="public/uploads/{{$product->image}}" alt="" class="img-thumbnail" width="100px">
                        </td>
                        <td>{{number_format($product->price)}} VNĐ</td>
                        <td>{{$product->category_name}}</td>
                        {{--                <td>{{$product->brand_name}}</td>--}}
                        <td>{{date('d-m-Y H:i',$product->created_product)}}</td>
                        <td>{{date('d-m-Y H:i',$product->update_product)}}</td>
                        <td class="text-center">
                            <a href="{{route('edit-product/' . $product->product_id)}}"><button class="btn btn-info">UPDATE</button></a>
                            <a href="{{route('remove-product/') . $product->product_id}}" onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')"><button class="btn btn-danger">DELETE</button></a>
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