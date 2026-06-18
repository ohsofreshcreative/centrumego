<!-- steps  -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-steps relative -smt -smb' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="blur"></div>

	<div class="__wrapper c-main">
		<div class="__col grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 items-center">

			@if (!empty($g_steps['image']))
			<div data-gsap-element="img" class="__img order1 w-full">
				<img class="object-cover w-full h-full rounded-2xl aspect-[4/3] "
					src="{{ $g_steps['image']['url'] }}"
					alt="{{ $g_steps['image']['alt'] ?? '' }}">
			</div>
			@endif

			<div class="__content order2 flex flex-col justify-center w-full ">
				@if(!empty($g_steps['header']))
				<h2 data-gsap-element="header" class="mb-6 ">
					{{ $g_steps['header'] }}
				</h2>
				@endif
				@if(!empty($g_steps['txt']))
				<div data-gsap-element="txt" class="__txt text-carbon">
					{!! $g_steps['txt'] !!}
				</div>
				@endif
				@if (!empty($g_steps['button']))
				<div class="m-btn flex inline-buttons">
					<x-button
						:href="$g_steps['button']['url']"
						variant="third"
						data-gsap-element="btn">
						{{ $g_steps['button']['title'] }}
					</x-button>
				</div>
				@endif
			</div>
		</div>
		@if(!empty($r_steps))
		<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
			@foreach ($r_steps as $item)
			@php
			$romans = [1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V'];
			$badgeNumber = $romans[$loop->iteration] ?? $loop->iteration;

			$badgeColors = [
			0 => 'background-color: #007AC2;',
			1 => 'background-color: #0A397C;',
			2 => 'background-color: #051D3E;',
			];

			$currentStyle = $badgeColors[$loop->index] ?? 'background-color: #051D3E;';
			@endphp

			<div data-gsap-element="card" class="relative bg-white p-10 radius shadow-sm">
				<div class=" absolute top-[-28px] left-8 flex w-[56px] h-[56px] items-center justify-center rounded-full text-2xl font-semibold text-white " style="{{ $currentStyle }}" />{{ $badgeNumber }}
			</div>

			@if (!empty($item['title']))
			<h6 class="text-primary mb-4">{{ $item['title'] }}</h6>
			@endif
			@if (!empty($item['text']))
			<p class="text-carbon">{{ $item['text'] }}</p>
			@endif
		</div>
		@endforeach
	</div>
	@endif
	</div>
</section>