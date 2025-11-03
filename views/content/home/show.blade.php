@extends('layout')

@section('content')

	<!-- About -->
	@if(!empty($data->object))
		<section class="container my-48 py-lg-48 py-md-24 py-16">
			<div class="row gy-4 py-xl-16">
				<div class="col-12 d-flex">
					<div class="align-self-center ps-lg-0 ps-md-24">

						<h1 class="h1 mb-lg-24 mb-16">{{ $data->object->title }}</h1>

						<p class="mb-24 pb-lg-16 fs-lg">{!! $data->object->body !!}</p>

						@if(array_key_exists('about', $data->eroutes['page']))
							<a href="{{ route($data->eroutes['page']['about']) }}"
							   class="btn btn-lg btn-outline-primary">More about us</a>
						@endif

					</div>
				</div>
			</div>
		</section>
	@endif

@endsection

