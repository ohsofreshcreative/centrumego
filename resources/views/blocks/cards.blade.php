<!--- cards --->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-cards relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="__wrapper c-main">
		<div class="__top text-center max-w-6xl mx-auto pt-10">
			<h2 data-gsap-element="header" class="m-header">{{ strip_tags($g_cards['header']) }}</h2>
			<p data-gsap-element="txt">{{ $g_cards['text'] }}</p>
		</div>
		<div data-gsap-element="grid-layout" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-14">
			@foreach ($r_cards as $item)
			@php
			$romans = [1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII'];
			$badgeNumber = $romans[$loop->iteration] ?? $loop->iteration;
			$button = $item['button'] ?? null;
			@endphp
			<a
				href="{{ $button['url'] ?? '#' }}"
				class="group block h-full flex flex-col">
				<div class="__card relative bg-white p-8 radius transition-all duration-300 hover:translate-y-1 hover:shadow-lg h-full flex flex-col">
					<div class="absolute top-[-10px] right-3 flex w-10 h-10 items-center justify-center rounded-full text-xl font-semibold text-white bg-primary font-header">
						{{ $badgeNumber }}
					</div>
					@if (!empty($item['image']['url']))
					<img
						class="mb-4 w-8 h-8"
						src="{{ $item['image']['url'] }}"
						alt="{{ $item['image']['alt'] ?? '' }}" />
					@endif
					@if (!empty($item['title']))
					<p class="text-h7 text-carbon mb-4">
						{{ $item['title'] }}
					</p>
					@endif
					<x-icon.arrow-down
						class="__arrow w-4 h-4 pt-4 mt-auto overflow-visible text-third transition-all duration-300 group-hover:translate-y-1 group-hover:text-primary" />
				</div>
			</a>
			@endforeach
		</div>
	</div>
</section>