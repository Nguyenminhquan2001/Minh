<!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Quản Lý Danh Mục</title>
        <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>
    <body> <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <center> {{ __('Quản Lý Danh Mục') }}</center>
        </h2>
    </x-slot>
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
                                        <a class="btn btn-info" href="{{route('themdanhmuc')}}" role="button">Thêm Danh Mục</a> 

                                    </div>

                                </div>


                            </div>
                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm3">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên danh mục</th>
                                                <th>Hàng Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($danh_muc as $dm)
                                          <tr>
                                           <td>{{$loop->index + 1}}</td>
                                           <td>{{$dm->Ten}}</td>
                                           
                                           <td>
                                               <a class="btn btn-danger" href="{{route('editdanhmuc',['id'=>$dm->id])}}"> sửa</a>
                                             
                                               <a class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa danh mục {{$dm->Ten}}')"  href="{{route('deletedm',['id'=>$dm->id])}}"> xóa</a>
                                           </td>

                                       </tr>
                                       @endforeach
                                   </tbody> 
                                   
                               </table>   

                               {{$danh_muc->links()}}
                            

                        </div>
                    </div>        
                </div>    
            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>

</body>
<script type="text/javascript">
    $(document).ready(function() {
        $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert-success").slideUp(500);
        });
    });
</script>
</html>
