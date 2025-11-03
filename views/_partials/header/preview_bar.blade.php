@if(Auth::check() && $ispreview)
	<section class="preview-bar">
		<div class="container">
			<div class="row">
				<div class="col-12 text-start text-md-center preview-bar-inner">
					<div class="float-end">[ {{ Auth::user()->name }} ]</div>
					Lara CMS Preview
				</div>
			</div>
		</div>
	</section>
@endif