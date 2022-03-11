<!doctype html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Thêm Sản Phẩm</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
		</head>
		<body>
			 <x-app-layout>
    <x-slot name="header">
       <center> <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sửa Sản Phẩm') }}
        </h2></center>
    </x-slot>
				
				<div class="py-12">
					<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
						<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
							<div class="p-6 bg-white border-b border-gray-200">
								<div class="container">
									<div class="row">
										<div class="col-md-8">
											<form action="" method="POST" role="form" enctype="multipart/form-data">
												@csrf
												<legend>Thêm Mới Sản Phẩm</legend>
												<div class="form-group">
													<label for="">Tên sản phẩm</label>
													<input type="text" class="form-control" id="" placeholder="Nhập tên" name="name" required="required">
												</div>
												<div class="form-group">
													<label for="">Mã sản phẩm</label>
													<input type="text" class="form-control" id="" placeholder="Nhập mã" name="ma" required="required">
												</div>
												<div class="form-group">
													<label for="">Danh mục sản phẩm</label>
													<select name="danhmuc" id="input" class="form-control" required="required" >
														<option value="">--Chọn Danh Mục--</option>
														@foreach($danh_muc as $dm)
														<option value="{{$dm->Ten}}"> {{$dm->Ten}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group">
													<label for="">Giá sản phẩm</label>
													<input type="text" class="form-control" id=""  name="gia" required="required">
												</div>
												<div class="form-group">
													<label for="">Giá khuyến mại</label>
													<input type="text" class="form-control" id=""  name="giakm" >
												</div>

												<div class="form-group">
													<label for="">Mô tả sản phẩm</label>
													<textarea name="mota" id="ckeditor" class="form-control" rows="0" required="required"></textarea>
												</div><br>
												<div class="form-group">
													<label for="">Ảnh sản phẩm</label>
													<input type="file" class="form-control" id=""  name="file" required="required">
												</div>
												<br>
												<div class="form-group">
													<label for="">Trạng Thái</label>
													<div class="radio">
														<label>
															<input type="radio"  id="input"  name="status" value="Còn Hàng" checked="checked" >
															
															Còn hàng
														</label><br>	
														<label>
															<input type="radio"  id="input"  name="status" value="Hết Hàng" checked="checked" >
															
															Hết hàng
														</label>
													</div> 
												</div>

												<center><button type="submit" class="btn btn-warning">Thêm Sản Phẩm</button></center>
									
												
											</form>
											
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
	CKEDITOR.replace('ckeditor');

</script>
		
		</html>
