<!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Quản Lý Sản Phẩm</title>
        <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>
    <body>
    
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{route('sanpham')}}"><img src="{{asset('img/logo.svg')}}  " alt="logo"  ></a>
                     </div>

                     <!-- Navigation Links -->
                     <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('sanpham')" :active="request()->routeIs('sanpham')">
                            {{ __('Quản lý sản phẩm') }}
                        </x-nav-link>
                                <x-nav-link :href="route('danhmuc')" :active="request()->routeIs('danhmuc')">
                            {{ __('Quản lý danh mục') }}
                        </x-nav-link>
                    </div>
                   
                </div>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                             <div class="container-fluid">
                                <div class="row">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="btn close" data-dismiss="alert" aria-hidden="true">&times;
                                        </button>
                                        <strong>{{Session::get('success')}}</strong>

                                    </div>
                                    @endif
                                    <div class="col-md-2">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <a class="btn btn-info" href="{{route('themsanpham')}}" role="button">Thêm Sản Phẩm</a> 

                                            </div>

                                        </div>


                                    </div>
                                    <div class="col-md-10">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm3">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên Sản phẩm</th>
                                                        <th>Mã Sản phẩm</th>
                                                        <th>Danh Mục</th>
                                                        <th>Giá</th>
                                                        <th>Mô Tả</th>
                                                        <th>Ảnh Sản Phẩm</th>
                                                        <th>Trạng Thái</th>
                                                        <th>Hàng Động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach($san_pham as $pro)
                                                  <tr>
                                                     <td>{{$loop->index + 1}}</td>
                                                     <td>{{$pro->Tensanpham}}</td>
                                                     <td>{{$pro->Masp}}</td>
                                                     <td>{{$pro->Danhmuc}}</td>
                                                     <td>{{$pro->Giasp}}</td>
                                                     <td>{{$pro->Mota}}</td>
                                                     <td><a href="Uploads/{{$pro->image}}"><img src="Uploads/{{$pro->image}}" alt="" width="100px" height="100px"></a></td>
                                                     <td>{{$pro->Status}}</td>
                                                     <td>
                                                         <a class="btn btn-danger" href="{{route('editsanpham',['id'=>$pro->id])}}"> sửa</a>

                                                         <a class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm {{$pro->Tensanpham}}')"  href="{{route('delete',['id'=>$pro->id])}}"> xóa</a>
                                                     </td>

                                                 </tr>
                                                 @endforeach
                                             </tbody>
                                         </table>   

                                         {{$san_pham->links()}}


                                     </div>
                                 </div>       
                             </div>    
                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>
 </div>
</nav>

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert-success").slideUp(500);
        });
    });
</script>
</html>
