<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sửa Sản Phẩm</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- <script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
</head>
<body>
	
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sửa Sản Phẩm') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<form action="" method="POST" role="form" enctype="multipart/form-data">
					@csrf
					<legend>Sửa Sản Phẩm</legend>

					<div class="form-group">
						<label for="">Tên sản phẩm</label>
						<input type="text" class="form-control" id="" placeholder="Nhập tên" name="name" value="{{$san_pham->Tensanpham}}">
					</div>
					<div class="form-group">
						<label for="">Mã sản phẩm</label>
						<input type="text" class="form-control" id="" placeholder="Nhập mã" name="ma" value="{{$san_pham->Masp}}">
					
					<div class="form-group">
						<label for="">Danh mục sản phẩm</label>
						<select name="danhmuc" id="input" class="form-control" required="required" >
						<option value=""></option>
						@foreach($danh_muc as $dm)
						<option value="{{$dm->Ten}}" {{($dm->Ten == $san_pham->Danhmuc)?'selected':""}} > {{$dm->Ten}}</option>
						@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="">Giá sản phẩm</label>
						<input type="text" class="form-control" id=""  name="gia" value="{{$san_pham->Giasp}}">
                     </div>
                     <div class="form-group">
						<label for="">Giá khuyến mại</label>
						<input type="text" class="form-control" id=""  name="giakm" value="{{$san_pham->GiaKM}}">
                     </div>

                      <div class="form-group">
						<label for="">Mô tả sản phẩm</label>
						<textarea name="mota" id="ckeditor" class="form-control" rows="3" required="required">{{$san_pham->Mota}}></textarea>
                     </div>
                     <div class="form-group">
						<label for="">Ảnh sản phẩm</label>
						<input type="file" class="form-control" id=""  name="file">
						<img src="../Uploads/{{$san_pham->image}}" alt="Uploads/{{$san_pham->image}}" width="100px">
						
                     </div>
                      <div class="form-group">
						<label for="">Trạng Thái</label>
						<input type="text" class="form-control" id=""  name="status" value="{{$san_pham->Status}}"  >
                     </div>

					<center></a><button type="submit" class="btn btn-primary" onclick="return confirm('Bạn chắc chắn muốn sửa sản phẩm ')">Sửa</button></center>
					
				</form>
				
			</div>
			
		</div>
		
	</div>

               </div>
            </div>
        </div>
    </div>
    </x-app-layout>
    <script type="text/javascript">
	CKEDITOR.replace('ckeditor');

</script>
</body>
</html>

