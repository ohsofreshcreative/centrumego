@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!-- banner --->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	class="b-banner relative overflow-visible {{ $sectionClass }} {{ $section_class }}">

	<div class=" __wrapper c-wide relative radius z-20 py-20" style="background-image:linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ $g_banner['image']['url'] }}'); background-size:cover; background-position:center;">
		<div class="__inside c-main relative">
			<div class="__content py-20">

				<div>
					<h1 data-gsap-element="header" class=" text-white">
						{!! $g_banner['title'] !!}
					</h1>
					<div data-gsap-element="txt" class="text-lg text-white mt-2 w-full md:w-1/2">
						{!! $g_banner['txt'] !!}
					</div>
					@if (!empty($g_banner['button1']))
					<div class="inline-buttons m-btn">
						<a data-gsap-element="button" class="white-btn left-btn"
							href="{{ $g_banner['button1']['url'] }}"
							target="{{ $g_banner['button1']['target'] }}">
							{{ $g_banner['button1']['title'] }}
						</a>
						@if (!empty($g_banner['button2']))
						<a data-gsap-element="button" class="main-btn"
							href="{{ $g_banner['button2']['url'] }}"
							target="{{ $g_banner['button2']['target'] }}">
							{{ $g_banner['button2']['title'] }}
						</a>
						@endif
					</div>
					@endif
				</div>
			</div>


			<a href="#banner-next"
				aria-label="Przewiń do następnej sekcji"
				class="js-banner-next absolute left-0 -bottom-30 bg-secondary hover:bg-secondary-hover transition-all rounded-full w-16 h-16 flex items-center justify-center cursor-pointer animate-bounce ml-6">
				<img src="/wp-content/uploads/2026/05/arrow-down.svg" alt="" />
			</a>
		</div>

</section>