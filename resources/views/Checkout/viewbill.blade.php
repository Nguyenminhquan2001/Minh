<!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Quản Lý Đơn Hàng</title>
        <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>
    <body> <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <center> {{ __('Chi tiết đơn hàng') }}</center>
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
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm3">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Use_name</th>
                                                <th>Checkout_id</th>                    
                                                <th>Email</th>
                                                <th>Phone_number</th>
                                                <th>Address</th>
                                                <th>Note</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($Checkout as $CK)
                                          
                                          <tr>
                                           <td>{{$loop->index + 1}}</td>                   
                                           <td>{{$CK->Ho}} {{$CK->Ten}}</td>
                                           <td>{{$CK->id}}</td>
                                           <td>{{$CK->Email}}</td>
                                           <td>{{$CK->SDT}}</td>
                                           <td>{{$CK->Diachi}}</td>
                                           <td>{{$CK->Note}}</td> 
                                        
                                       </tr>  
                                       @endforeach
                                   </tbody> 
                                   
                               </table>   
                            

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
