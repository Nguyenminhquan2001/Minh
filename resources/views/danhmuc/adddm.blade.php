<!doctype html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Thêm Danh Mục</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<body>
				 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm Danh Mục') }}
        </h2>
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
												<legend>Thêm Mới Danh Mục</legend>
												<div class="form-group">
													<label for="">Tên danh mục</label>
													<input type="text" class="form-control" id="" placeholder="Nhập tên" name="name" required="required">
												</div>
												

												<center><button type="submit" class="btn btn-primary">Thêm Danh Mục</button></center>
												
											</form>
											
										</div>
										
									</div>
									
								</div>
							</body>
						</div>
					</div>
				</div>
			</div>

</x-app-layout>
</body>
		</head>
		</html>
