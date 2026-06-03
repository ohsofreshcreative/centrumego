<!--- proces --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-proces relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>

	<div class="__wrapper c-main">
		<div class="">
			<div class="__top grid grid-cols-1 lg:grid-cols-2 items-center gap-10 relative z-10">
				@if (!empty($g_proces['header']))
				<h3 data-gsap-element="header" class=" text-secondary-dark m-header">{{ strip_tags($g_proces['header']) }}</h3>
				@endif
				<div data-gsap-element="txt" class="w-full md:w-2/3 ml-auto">{{ strip_tags($g_proces['txt']) }}</div>
			</div>

			<img class="absolute left-1/2 -translate-x-1/2 top-10" src="{{ $g_proces['image']['url'] }}" alt="{{ $g_proces['image']['alt'] ?? '' }}" />
		</div>

		<div class="flex flex-col gap-6 mt-10">
			@foreach ($r_proces as $item)
			<div data-gsap-element="card" class="__card relative bg-white p-8">
				@if (!empty($item['image']['url']))
				<img class="mb-6" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
				@endif
				@if (!empty($item['title']))
				<p class="text-h5">{{ $item['title'] }}</p>
				@endif
				@if (!empty($item['text']))
				<p class="">{{ $item['text'] }}</p>
				@endif
			</div>
			@endforeach
		</div>
	</div>

</section>