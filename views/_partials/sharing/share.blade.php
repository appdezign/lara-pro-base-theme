@if(($entity->getResourceSlug() == 'page' && isset($data->page) && $data->page->ishome == 0) || ($entity->getCgroup() == 'entity' && $activeroute->getMethod() == 'show'))

	<section class="lara-section">
		<div class="container pb-8">

			<h3 class="mb-8 text-center">Share</h3>

			<div class="flex justify-center">

				<!-- AddToAny BEGIN -->
				<div class="a2a_kit a2a_kit_size_48 a2a_default_style a2a_flex_style justify-center !gap-2">
					<a class="a2a_button_facebook !grow-0"></a>
					<a class="a2a_button_x !grow-0"></a>
					<a class="a2a_button_linkedin !grow-0"></a>
					<a class="a2a_button_email !grow-0"></a>
				</div>
				<script defer src="https://static.addtoany.com/menu/page.js"></script>
				<!-- AddToAny END -->

			</div>

		</div>
	</section>

@endif