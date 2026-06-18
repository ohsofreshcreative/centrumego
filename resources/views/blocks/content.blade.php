<!-- content  -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-content relative -smt ' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="blur"></div>
	<div class="__wrapper c-main">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

			@if (!empty($g_content['image']))
			<div data-gsap-element="img" class="__img order1 w-full">
				<img class="w-full h-full  rounded-2xl"
					src="{{ $g_content['image']['url'] }}"
					alt="{{ $g_content['image']['alt'] ?? '' }}">
			</div>
			@endif
			<div class="__content order2 flex flex-col justify-center w-full ">
				@if(!empty($g_content['header']))
				<h2 data-gsap-element="header" class=" mb-6">
					{{ $g_content['header'] }}
				</h2>
				@endif
				@if(!empty($g_content['txt']))
				<div data-gsap-element="txt" class="__txt text-carbon">
					{!! $g_content['txt'] !!}
				</div>
				@endif
				@if (!empty($g_content['button1']) || !empty($g_content['button2']))
				<div class="inline-buttons m-btn flex gap-3">
					@if (!empty($g_content['button1']))
					<x-button
						:href="$g_content['button1']['url']"
						variant="primary"
						data-gsap-element="btn">
						{{ $g_content['button1']['title'] }}
					</x-button>
					@endif
					@if (!empty($g_content['button2']))
					<x-button
						:href="$g_content['button2']['url']"
						:variant="str_contains($section_class ?? '', 'other-btn') ? 'secondary' : 'third'"
						data-gsap-element="btn">
						{{ $g_content['button2']['title'] }}
					</x-button>
					@endif
				</div>
				@endif
				@if (!empty($g_content['hint']))
				<div data-gsap-element="box" class="__hint flex items-center radius border border-dashed border-primary p-6 gap-4 mt-6">
					@if (!empty($g_content['image_hint']['url']))
					<img
						class="max-w-10 aspect-square overflow-visible  object-contain"
						src="{{ $g_content['image_hint']['url'] }}"
						alt="{{ $g_content['image_hint']['alt'] ?? '' }}">
					@endif

					@if (!empty($g_content['header_hint']))
					<div class="text-primary text-lg w-full !font-semibold">
						{{ $g_content['header_hint'] }}
					</div>
					@endif
				</div>
				@endif
			</div>
		</div>
	</div>
</section>