
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-cta-bg relative py-16 md:py-46  ' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
<div class="blur"></div>
	<div class="c-main mx-auto px-6 md:px-12 relative z-10">

		<div class="__content max-w-xl md:max-w-2xl flex flex-col gap-6 text-white">

			<div class="__text flex flex-col gap-4">
				@if (!empty($cta_bg['header']))
				<h2 data-gsap-element="header" class=" text-white">
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
			<div class="inline-buttons m-btn flex flex-wrap gap-4 pt-2">

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