<!-- cta  -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-cta-bg relative py-16 md:py-46 overflow-hidden' ,
	])>

	@if(!empty($cta_bg['image']['url']))
	<div class="absolute inset-0 full-h"
		style="
                background-image: linear-gradient(to right, #0c4a9e 0%, #0c4a9e 50%, rgba(12, 74, 158, 0.9) 65%, rgba(12, 74, 158, 0) 80%), url('{{ $cta_bg['image']['url'] }}');
                background-position: right center;
                background-size: contain;
                background-repeat: no-repeat;
             ">
	</div>
	@endif
	<div class="blur"></div>
	<div class="c-main px-6 md:px-12 relative z-10">

		<div class="__content w-full md:max-w-2xl flex flex-col gap-6">

			<div class="__text">
				@if (!empty($cta_bg['header']))
				<h2 data-gsap-element="header" class="mb-6">
					{{ $cta_bg['header'] }}
				</h2>
				@endif

				@if (!empty($cta_bg['txt']))
				<div data-gsap-element="txt" class="text-white text-2lg font-header">
					{!! $cta_bg['txt'] !!}
				</div>
				@endif
			</div>

			@if (!empty($cta_bg['button']['url']) || !empty($cta_bg['button2']['url']))
			<div class="inline-buttons m-btn flex flex-wrap gap-4 ">

				@if (!empty($cta_bg['button']['url']))
				<x-button :href="$cta_bg['button']['url']" variant="third" data-gsap-element="btn">
					{{ $cta_bg['button']['title']}}
				</x-button>
				@endif

				@if (!empty($cta_bg['button2']['url']))
				<x-button :href="$cta_bg['button2']['url']" variant="secondary" data-gsap-element=".btn-secondary " class="btn-outline-third ">
					{{ $cta_bg['button2']['title']  }}
				</x-button>
				@endif

			</div>
			@endif
		</div> 
	</div>
</section>