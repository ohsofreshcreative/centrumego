<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-map relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="blur"></div>
	<div class="__wrapper c-main">
		<div class="__content text-center ">
			@if(!empty($g_map['header']))
			<h2 data-gsap-element="header" class="mb-8">
				{{ $g_map['header'] }}
			</h2>
			@endif
			@if(!empty($g_map['txt']))
			<div data-gsap-element="txt" class="__txt [&_iframe]:w-full  [&_iframe]:rounded-2xl w-full">
				{!! $g_map['txt'] !!}
			</div>
			@endif
		</div>
	</div>
</section>