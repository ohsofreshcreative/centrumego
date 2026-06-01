@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $nolist ? ' no-list' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';

if (!empty($background) && $background !== 'none') {
$sectionClass .= ' ' . $background;
}

$bgImageUrl = !empty($cta_bg['image']['url']) ? $cta_bg['image']['url'] : '';
@endphp

<section 
    data-gsap-anim="section" 
    @if(!empty($section_id)) id="{{ $section_id }}" @endif 
    class="b-cta-bg relative w-full overflow-hidden py-16 md:py-46 {{ $sectionClass }} {{ $section_class }}"
    style="@if($bgImageUrl) 
        background-image: linear-gradient(90deg, #0A397C 0%, #0A397C 35%, rgba(10, 57, 124, 0.5) 70%, rgba(32, 82, 152, 0) 100%), url('{{ $bgImageUrl }}'); 
        background-repeat: no-repeat; 
        background-size: cover; 
        background-position: right center;
        background-blend-mode: normal;
    @else 
        background: linear-gradient(90deg, #0A397C 0%, #205298 100%); 
    @endif"
>

	<div class="c c-main mx-auto px-6 md:px-12 relative z-10">

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
				<x-button :href="$cta_bg['button']['url']" variant="primary" data-gsap-element="btn">
					{{ $cta_bg['button']['title']}}
				</x-button>
				@endif

				@if (!empty($cta_bg['button2']['url']))
				<x-button :href="$cta_bg['button2']['url']" variant="secondary" data-gsap-element=".btn-secondary ">
					{{ $cta_bg['button2']['title']  }}
				</x-button>
				@endif

			</div>
			@endif