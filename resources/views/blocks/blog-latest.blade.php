@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';
@endphp

<div data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="b-blog-latest  py-16 lg:py-24 -smt {{ $sectionClass }} {{ $section_class }}">
	<div class="c-main">
		<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
			<h2 data-gsap-element="header" class="">
				{{ $posts_settings['title'] ?? 'Baza wiedzy' }}
			</h2>
			@if (!empty($posts_settings['button']))
			<x-button
				:href="$posts_settings['button']['url']"
				:target="$posts_settings['button']['target'] ?? '_self'"
				variant="secondary"
				class=""
				data-gsap-element="btn">
				{{ $posts_settings['button']['title'] }}
			</x-button>
			@endif
		</div>
		<div data-gsap-element="grid-layout" class="__posts-grid relative w-full">
			@if(!empty($posts))
			<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
				@foreach($posts as $post)
				<a href="{{ get_permalink($post->ID) }}" class="group relative bg-white p-6 radius  flex flex-col justify-between h-full">
					<div>
						@if(has_post_thumbnail($post->ID))
						<div class=" rounded-2xl aspect-[4/3] mb-6 ">
							<img src="{{ get_the_post_thumbnail_url($post->ID, 'large') }}"
								alt="{{ get_the_title($post->ID) }}"
								class="w-full h-full object-cover rounded-2xl" />
						</div>
						@endif
						<h6 class="text-carbon">
							{{ get_the_title($post->ID) }}
						</h6>
					</div>
					<div class="mt-6 flex items-center gap-2 text-secondary ">
						<span>Przeczytaj</span>
						<x-icon.red_arrow class="shrink-0 transform group-hover:translate-x-1 transition-transform text-[#FF3437]" />
					</div>
				</a>
				@endforeach
			</div>
			@else
			<div class="text-center text-gcarbon">
				Brak wpisów na blogu do wyświetlenia.
			</div>
			@endif
		</div>

	</div>
</div>