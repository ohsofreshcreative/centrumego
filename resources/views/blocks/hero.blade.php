<!-- hero  -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-hero relative pt-4 overflow-visible min-h-[600px] flex flex-col justify-between ' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="blur bg-secondary"></div>
	<div class="c-wider grid grid-cols-1 xl:grid-cols-2 items-stretch overflow-visible ">

		<div class="__content relative flex flex-col justify-center items-start z-20 pt-16 pb-16 xl:py-0 px-4 sm:px-6 xl:pl-8 xl:pr-12 w-full box-border mr-auto xl:ml-auto max-w-[620px]">

			<div class="w-full text-left">
				<h1 data-gsap-element="header" class="m-header text-h3 text-primary">
					{{ $g_hero['title'] }}
				</h1>
				<div data-gsap-element="txt" class="text-carbon mb-8">
					{!! $g_hero['txt'] !!}
				</div>
				<div class="inline-buttons m-btn flex flex-wrap gap-4 mb-8 md:mb-2 justify-start ">
					@if (!empty($g_hero['button1']))
					<x-button :href="$g_hero['button1']['url']" variant="third" data-gsap-element="btn">
						{{ $g_hero['button1']['title'] }}
					</x-button>
					@endif
					@if (!empty($g_hero['button2']))
					<x-button :href="$g_hero['button2']['url']" variant="secondary" data-gsap-element="btn">
						{{ $g_hero['button2']['title'] }}
					</x-button>
					@endif
				</div>
			</div>
		</div>
		<div class="__img relative z-10 overflow-visible w-full min-h-[300px] sm:min-h-[400px] xl:min-h-[650px] px-4 sm:px-6 xl:px-0">
			<img src="{{ $g_hero['image']['url'] }}" alt="{{ $g_hero['image']['alt'] }}" class="w-[calc(100%-32px)] sm:w-[calc(100%-48px)] xl:w-full h-full object-cover object-center absolute inset-y-0 left-4 sm:left-6 xl:left-0 rounded-2xl" />
		</div>
	</div>

</section>