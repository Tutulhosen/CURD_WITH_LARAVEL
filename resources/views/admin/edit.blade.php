



<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('frontend/assets/images/favicon-32x32.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('frontend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('frontend/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('frontend/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('frontend/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/assets/css/icons.css"') }} rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/header-colors.css') }}" />
	<title>Adimaya-edit</title>
</head>

<body>
	<!--wrapper-->
	<div style="background-color: black" class="wrapper">
		<!--sidebar wrapper -->

		<!--end header -->
		<!--start page wrapper -->
		<div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3"><a href="{{ route('product.index') }}">Adimaya</a></div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
        
          <div class="card">
              <div class="card-body p-4">
                  <h5 class="card-title">Edit  Product</h5>
                  <hr>

                  @if ($errors->any())
                  <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-danger"><i class="bx bxs-message-square-x"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-danger">Danger Alerts</h6>
                            <div style="color: red" >{{ $errors->first() }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                      
                  @endif

				  @if (Session::has('success'))
				  <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
					<div class="d-flex align-items-center">
						<div class="font-35 text-success"><i class="bx bxs-check-circle"></i>
						</div>
						<div class="ms-3">
							<h6 class="mb-0 text-success">Success Alerts</h6>
							<div style="color: green">{{ Session::get('success') }}</div>
						</div>
					</div>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
					  
				  @endif

                   <form action="{{ route('product.update', $product_id->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
					@method('PATCH')
                    <div class="row">
                        <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                         <div class="mb-3">
                             <label for="inputProductTitle" class="form-label">Product Title</label>
                             <input value="{{ $product_id->headline }}" name="headline" type="text" class="form-control" id="inputProductTitle" placeholder="Enter product title" value="{{ old('headline') }}">
                           </div>

                           <div class="mb-3">
                             <label for="inputProductDescription" class="form-label">Description</label>
                             <textarea value="{{ $product_id->description }}" name="desc" class="form-control" id="inputProductDescription" rows="3"></textarea>
                           </div>

                           <div class="mb-3">
                             <label for="inputProductDescription" class="form-label">Product Images</label> <br>
                             <input  name="photo" id="image-uploadify" type="file"><div class="imageuploadify well"><div class="imageuploadify-overlay"><i class="fa fa-picture-o"></i></div><div class="imageuploadify-images-list text-center"><i class="bx bxs-cloud-upload"></i><span type="button" class="btn btn-default"></button></div></div>
                           </div>

                         </div>
                        </div>
                        <div class="col-lg-4">
                         <div class="border border-3 p-4 rounded">
                           <div class="row g-3">
                             <div class="col-md-6">
                                 <label for="inputPrice" class="form-label">Price</label>
                                 <input value="{{ $product_id->price }}" name="price" type="text" class="form-control" id="inputPrice" placeholder="00.00" value="{{ old('price') }}">
                               </div>
							   <div class="col-md-6">
								<label for="inputPrice" class="form-label">Sell price</label>
								<input value="{{ $product_id->sprice }}" name="sprice" type="text" class="form-control" id="inputPrice" placeholder="00.00" value="{{ old('sprice') }}">
							  </div>

                               <div class="col-12">
                                 <label for="inputProductType" class="form-label">Product Type</label>
                                 <select name="type" class="form-select" id="inputProductType">
                                     <option></option>
                                     <option value="Cloth">Cloth</option>
                                     <option value="Jewellery">Jewellery</option>
                                     <option value="Shoes">Shoes</option>
                                   </select>
                               </div>
                               <div class="col-12">
                                 <label for="inputVendor" class="form-label">Catatogy</label>
                                 <select name="catagory" class="form-select" id="inputVendor">
                                     <option></option>
                                     <option value="Men">Men</option>
                                     <option value="Women">Women</option>
                                     <option value="Child">Child</option>
                                   </select>
                               </div>


                               <div class="col-12">
                                   <div class="d-grid">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                   </div>
                               </div>
                           </div> 
                       </div>
                       </div>
                    </div><!--end row-->
                   </form>



              </div>
          </div>
        
        </div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Backgrounds</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('frontend/assets/js/app.js') }}"></script>
</body>

</html>