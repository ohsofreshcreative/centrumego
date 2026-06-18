<!-- proces  -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-proces relative py-16' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	@php
	$roman_numerals = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X'];
	@endphp
	<div class="__wrapper c-narrow text-carbon">
		@if (!empty($g_proces['header']))
		<h2 data-gsap-element="header" class="mb-16 text-center">
			{{ strip_tags($g_proces['header']) }}
		</h2>
		@endif
		<div class="relative flex flex-col gap-8">
			<div class="absolute left-5 top-10 bottom-0 w-px bg-secondary-100"></div>
			@foreach ($r_proces as $index => $item)
			<div data-gsap-element="card" class="flex gap-6 sm:gap-10 w-full">
				<div class="w-10 flex justify-center shrink-0 pt-6">
					<div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center relative z-10">
						<span class="text-white text-xl">
							{{ $roman_numerals[$index] ?? ($index + 1) }}
						</span>
					</div>
				</div>
				<div class="flex-1 bg-section-light radius p-8 w-full h-full items-stretch">
					@if (!empty($item['title']))
					<h4 class="mb-4">
						{{ $item['title'] }}
					</h4>
					@endif
					@if (!empty($item['text']))
					<div class="__txt">
						{!! $item['text'] !!}
					</div>
					@endif
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>




