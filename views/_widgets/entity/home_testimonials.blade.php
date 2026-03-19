@if($widgetObjects)

	<div class="grid grid-cols-12 gap-2">
		<!-- Tab Navigation -->
		<div class="col-span-12 md:col-span-5 lg:col-span-4">
			<div class="flex flex-row md:flex-col justify-between md:justify-start gap-2" role="tablist">

				@foreach($widgetObjects as $widgetObject)
					<a
							@class([
								 'tab-button',
								 'tab-button-vertical',
								 'grow-1',
								 'active' => $loop->iteration == 1,
							 ])
							data-tab="tab{{ $loop->iteration }}"
							role="tab"
							aria-selected="@if($loop->iteration == 1) true @else false @endif"
							aria-controls="panel{{ $loop->iteration }}"
					>

						<div class="grid grid-cols-1 md:grid-cols-[3.5rem_auto] justify-stretch">
							<div class="rounded-full overflow-hidden w-[3.5rem] mx-auto h-[3.5rem] mb-4 md:mb-0 text-center">
								@if($widgetObject->hasThumb())
									@include('_img.glide', ['media' => $widgetObject->thumb(), 'width' => 96, 'height' => 96, 'dwidth' => 56, 'dheight' => 56, 'ratio' => 'square', 'class' => 'rounded-circle', 'cntclass' => 'me-md-16 me-sm-0 me-16 mb-md-0 mb-sm-8' ])
								@endif
							</div>
							<div class="ps-0 md:ps-6  items-center">
								<div class="text-sm">
									<div class="font-bold">{{ $widgetObject->title }}</div>
									<div class="hidden md:block">{{ $widgetObject->role }}</div>
								</div>
							</div>
						</div>
					</a>
				@endforeach

			</div>
		</div>

		<!-- Tab Content -->
		<div class="col-span-12 md:col-span-7 lg:col-start-6 h-full">

			@foreach($widgetObjects as $widgetObject)
				<div id="panel{{ $loop->iteration }}"
				     @class([
						 'tab-content',
						 'h-full',
						 'p-2',
						 'active' => $loop->iteration == 1,
					 ])
				     role="tabpanel"
				     aria-labelledby="tab{{ $loop->iteration }}"
				>
					<h4 class="mb-4" style="max-width: 22.875rem;">
						{{ $widgetObject->quoteshort }}
					</h4>
					<div class="flex flex-row text-sm">
						@for($i = 0; $i < $widgetObject->stars; $i++)
							<x-heroicon-s-star class="w-5 h-5 text-warning"/>
						@endfor
						@for($i = $widgetObject->stars; $i < 5; $i++)
							<x-heroicon-s-star class="w-5 h-5 text-gray-300"/>
						@endfor
					</div>
					<p class="mt-4 md:mt-6 lg:pt-4 md:pt-2 mb-0">
						{!! strip_tags($widgetObject->lead) !!}
					</p>
				</div>
			@endforeach

		</div>
	</div>
@endif

