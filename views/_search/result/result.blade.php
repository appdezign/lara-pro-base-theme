<section class="module-sm">
	<div class="container">

		<div class="row">

			<div class="col-12 main-content">

				{{-- Page Title --}}
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<div class="page-title mb-48">
							<h1 class="mb-2 mb-md-0">Zoekresultaten</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-8 offset-lg-2">

						@if($data->singleEntity)

							{{ html()->form('GET', route('special.search.modresult', ['module' => $data->singleEntity->getEntityKey()]))
								->attributes(['accept-charset' => 'UTF-8'])
								->open() }}

							<div class="row form-group">
								<div class="col-sm-10">
									{{ html()->text('keywords', $data->keywords)->class('form-control') }}
								</div>
								<div class="col-sm-2">
									{{ html()->button('Go', 'submit')->class('btn btn-primary save-button') }}
								</div>
							</div>

							{{ html()->form()->close() }}

						@else

							{{ html()->form('GET', route('special.search.result'))
								->attributes(['accept-charset' => 'UTF-8'])
								->open() }}

							<div class="row form-group">
								<div class="col-sm-10">
									{{ html()->text('keywords', $data->keywords)->class('form-control') }}
								</div>
								<div class="col-sm-2">
									{{ html()->button('Go', 'submit')->class('btn btn-primary save-button') }}
								</div>
							</div>

							{{ html()->form()->close() }}

						@endif

						@foreach($data->results as $resourceSlug => $resrc)

							@if($resrc->objects->count() > 0)

								<div class="row">
									<div class="col-sm-9 offset-sm-3">
										<h2 class="mb-24 mt-48">
											{{ ucfirst(_q($resrc->entity->getModule() . '::' . $resourceSlug . '.entity.title')) }}
										</h2>
									</div>
								</div>

								@foreach($resrc->objects as $result)

									<div class="row pt-20 pb-20" style="border-bottom:solid 1px #eee;">
										<div class="col-sm-3">
											@if($result->hasFeatured())
												<img data-src="{{ _cimg($result->getFeatured()->filename, 180, 180) }}"
												     alt="{{ $result->getFeatured()->seo_alt }}"
												     title="{{ $result->getFeatured()->seo_title }}"
												     width="180" height="180" class="lazyload"/>
											@else
												<div class="d-flex h-100 justify-content-center align-items-center bg-secondary">
													{!! Theme::img('images/lara8-logo.svg', 'alt', 'brand', ['width' => '60', 'style' => 'opacity: .5;']) !!}
												</div>
											@endif
										</div>
										<div class="col-sm-9">

											<h3 class="h4">
												<a href="{{ $result->url }}">
													{{ $result->title }}
												</a>
											</h3>

											@if(!empty($result->body))
												<p>{!! substr(strip_tags($result->body),0,150) !!} ...</p>
											@elseif(!empty($result->lead))
												<p>{!! substr(strip_tags($result->lead),0,150) !!} ...</p>
											@endif
											<a href="{{ $result->url  }}">lees meer</a>

										</div>
									</div>

								@endforeach

								<hr>

							@endif

						@endforeach

					</div>
				</div>

			</div>

		</div>

	</div>
</section>


