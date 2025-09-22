@if(!empty($widgetObjects))

	<h2 class="h1 mb-md-48 mb-24 pb-xl-16 pb-lg-8 pb-md-0 pb-sm-8">
		What Our Clients Say About Us
	</h2>

	<!-- Tabs -->
	<div class="row gy-4 gx-md-4 gx-3" data-aos="fade-up">

		<!-- Nav tabs -->
		<div class="col-lg-4 col-sm-5 order-sm-1 order-2">
			<ul class="nav nav-tabs flex-column" role="tablist">

				@foreach($widgetObjects as $widgetObject)
					<li class="nav-item mb-16">
						<a href="#testimonial-{{ $widgetObject->id }}"
						   class="nav-link flex-md-row flex-sm-column align-items-md-center align-items-sm-start align-items-center p-md-24 p-16 rounded-3 fw-normal @if($loop->index == 0) active @endif"
						   data-bs-toggle="tab" role="tab">
							@if($widgetObject->hasThumbOrFeatured())
								@include('_img.lazy', ['lzobj' => $widgetObject->getThumbOrFeatured(), 'lzw' => 96, 'lzh' => 96, 'dw' => 56, 'dh' => 56,'ar' => '1x1', 'cl' => 'rounded-circle', 'cnt' => true, 'cntclass' => 'me-md-16 me-sm-0 me-16 mb-md-0 mb-sm-8'])
							@endif
							<div>
								<span class="d-block mb-0 fs-lg fw-semibold">{{ $widgetObject->title }}</span>
								{{ $widgetObject->role }}
							</div>
						</a>
					</li>
				@endforeach

			</ul>
		</div>

		<!-- Tabs content -->
		<div class="col-sm-7 offset-lg-1 order-sm-2 order-1">
			<div class="tab-content ps-lg-0 ps-md-24">

				@foreach($widgetObjects as $widgetObject)
					<div class="tab-pane fade @if($loop->index == 0) show active @endif"
					     id="testimonial-{{ $widgetObject->id }}" role="tabpanel">

						<h4 class="mb-16" style="max-width: 22.875rem;">
							{{ $widgetObject->quoteshort }}
						</h4>

						<div class="fs-14 text-nowrap">
							@for($i = 1; $i <= $widgetObject->stars; $i++)
								<i class="fas fa-star text-warning"></i>
							@endfor
							@for($i = 1; $i <= 5 - $widgetObject->stars; $i++)
								<i class="fas fa-star text-muted"></i>
							@endfor
						</div>
						<p class="mt-md-24 mt-16 pt-lg-16 pt-md-8 mb-0 fs-lg">
							{!! $widgetObject->lead !!}
						</p>
					</div>
				@endforeach

			</div>
		</div>
	</div>
@endif
