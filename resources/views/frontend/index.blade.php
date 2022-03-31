@extends('admin.app.app')

@section('body')
<div class="page-wrapper">
	<div class="page-content">






		<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">

			@forelse ($product_data as $product)
			<a href="{{ route('product.show', $product->id) }}">
				<div class="col">
					<div class="card">
						<img style="height: 250px; width:100%" src="{{ url('storage/product/' . $product->photo) }}" class="card-img-top" alt="...">
						
						<div class="card-body">
							<h6 class="card-title cursor-pointer">{{ $product->headline }}</h6>
							<div class="clearfix">
								
								<p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary">{{ $product->price }} tk</span><span>{{ $product->sprice }} tk </span></p>
							</div>
							<div class="d-flex align-items-center mt-3 fs-6">
							  <div class="cursor-pointer">
								<i class='bx bxs-star text-warning'></i>
								<i class='bx bxs-star text-warning'></i>
								<i class='bx bxs-star text-warning'></i>
								<i class='bx bxs-star text-warning'></i>
								<i class='bx bxs-star text-secondary'></i>
							  </div>	
							  <p class="mb-0 ms-auto">4.2(182)</p>
							</div>
						</div>
					</div>
				</div>
			</a>
			@empty
				
			@endforelse


			



		</div><!--end row-->


	</div>
</div>
@endsection