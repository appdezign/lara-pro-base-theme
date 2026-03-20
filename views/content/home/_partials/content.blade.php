@if($data->object)

	<div class="grid grid-cols-12 gap-4">

		@if($data->object->hasFeatured())

			<div class="col-span-12 md:col-span-6">
				<div class="aspect-4/3">
					@include('_img.glide', ['media' => $data->object->featured(), 'width' => 1280, 'height' => 960, 'class' => 'rounded shadow-sm'])
				</div>
			</div>
			<div class="col-span-12 md:col-span-6 md:pl-4 lg:pl-8 xl:pl-12 flex">
				<div class="self-center">
					<h1 class="heading text-2xl font-bold mb-8">{{ $data->object->title }}</h1>

					{!! $data->object->body !!}

					@if(array_key_exists('about', $data->eroutes->page))
						<div class="cta mt-8">
						<a href="{{ route($data->eroutes->page['about']) }}"
						   class="btn btn-primary">More about us</a>
						</div>
					@endif
				</div>
			</div>

		@else
			<div class="col-span-12 md:col-span-10 md:col-start-2 lg:col-span-8 lg:col-start-3 xl:col-span-6 xl:col-start-4">
				<div class="text-center">
					<h1 class="heading text-2xl font-bold text-gray-900 mb-8">{{ $data->object->title }}</h1>

					{!! $data->object->body !!}

					@if(array_key_exists('about', $data->eroutes->page))
						<div class="cta mt-8">
							<a href="{{ route($data->eroutes->page['about']) }}"
							   class="btn btn-primary">More about us</a>
						</div>
					@endif

				</div>
			</div>
		@endif

	</div>

@endif