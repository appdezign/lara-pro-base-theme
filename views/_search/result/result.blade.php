<section class="lara-section">
	<div class="container">

		{{-- Page Title --}}
		<div class="grid grid-cols-12">
			<div class="responsive-col-span-8">
				<h1 class="mb-8">Zoekresultaten</h1>
			</div>
		</div>

		<div class="grid grid-cols-12">
			<div class="responsive-col-span-8">

				@if($data->singleEntity)

					{{ html()->form('GET', route('special.search.modresult', ['module' => $data->singleEntity->getEntityKey()]))
						->attributes(['accept-charset' => 'UTF-8'])
						->open() }}

					<div class="grid grid-cols-12 form-group">
						<div class="col-sm-10">
							{{ html()->text('keywords', $data->keywords)->class('form-control') }}
						</div>
						<div class="col-sm-2">
							{{ html()->button('Go', 'submit')->class('btn btn-primary') }}
						</div>
					</div>

					{{ html()->form()->close() }}

				@else

					{{ html()->form('GET', route('special.search.result'))
						->attributes(['accept-charset' => 'UTF-8'])
						->open() }}

					<div class="grid grid-cols-12 gap-4">
						<div class="col-span-12 sm:col-span-10">
							{{ html()->text('keywords', $data->keywords)->class('input w-full') }}
						</div>
						<div class="col-span-12 sm:col-span-2">
							{{ html()->button('Go', 'submit')->class('btn btn-primary w-full') }}
						</div>
					</div>

					{{ html()->form()->close() }}

				@endif

				@foreach($data->results as $resourceSlug => $resrc)

					@if($resrc->objects->count() > 0)

						<div class="grid grid-cols-12">
							<div class="col-span-12 sm:col-span-9 sm:col-start-4">
								<h2 class="mb-24 mt-48">
									{{ ucfirst(_q($resrc->entity->getModule() . '::' . $resourceSlug . '.entity.title')) }}
								</h2>
							</div>
						</div>

						@foreach($resrc->objects as $result)

							<div class="grid grid-cols-12 gap-8 pt-4 pb-4" style="border-bottom:solid 1px #eee;">
								<div class="col-span-12 sm:col-span-3">
									@if($result->hasFeatured())
										<div class="aspect-4/3">
											<img data-src="{!! glideUrl($result->featured()->path, 480, 360) !!}"
											     alt="{{ $result->featured()->alt }}"
											     title="{{ $result->featured()->title }}"
											     width="480" height="360" class="lazyload"/>
										</div>
									@else
										<div class="flex h-full justify-center items-center bg-secondary">
											{!! Theme::img('images/company-logo.png', 'Lara CMS', 'brand', ['width' => '60', 'style' => 'opacity: .5;']) !!}
										</div>
									@endif
								</div>
								<div class="col-span-12 sm:col-span-9">

									<h3 class="h4">
										<a href="{{ route($result->routename, ['slug' => $result->slug]) }}">
											{{ $result->title }}
										</a>
									</h3>

									@if(!empty($result->body))
										<p>{!! substr(strip_tags($result->body),0,150) !!} ...</p>
									@elseif(!empty($result->lead))
										<p>{!! substr(strip_tags($result->lead),0,150) !!} ...</p>
									@endif
									<a href="{{ route($result->routename, ['slug' => $result->slug]) }}" class="text-primary">
										lees meer
									</a>

								</div>
							</div>

						@endforeach

						<hr>

					@endif

				@endforeach

			</div>
		</div>

	</div>

</section>


