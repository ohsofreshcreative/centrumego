<!--- category-posts -->

<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-category-posts relative -smt' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])>
	<div class="blur"></div>
	<div class="c-main">
		<div class="__content   mb-12">
			<h2 data-gsap-element="title" class="text-primary  mb-6">{{ $posts_settings['title'] }}</h2>
			@if(!empty($posts_settings['text']))
			<div data-gsap-element="txt" class="">
				{!! $posts_settings['text'] !!}
			</div>
			@endif
			@if (!empty($posts_settings['button']))
			<a data-gsap-element="btn" class="inline-flex items-center rounded-full py-3 px-6  transition-all duration-300" href="{{ $posts_settings['button']['url'] }}">
				{{ $posts_settings['button']['title'] }}
			</a>
			@endif
		</div>
		<div data-gsap-element="grid-layout" class="__posts-grid relative w-full">
			@if(!empty($posts))
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
				@foreach($posts as $post)
				<div class="group relative bg-white pl-8 py-8 radius b-shadow hover:shadow-md  flex flex-col  text-left h-full">

					<div class="w-16 h-16 mb-5 flex items-center justify-center bg-primary rounded-full text-white relative overflow-visible">
						<span class="absolute top-1 left-1 w-3 h-3 bg-[#037AC2] rounded-full"></span>

						@if($show_image && has_post_thumbnail($post->ID))
						<img src="{{ get_the_post_thumbnail_url($post->ID, 'thumbnail') }}"
							alt="{{ get_the_title($post->ID) }}"
							class="w-8 h-8 object-contain" />
						@endif
					</div>

					<h6 class="text-primary mb-4">
						{{ get_the_title($post->ID) }}
					</h6>

					<a href="{{ get_permalink($post->ID) }}" class="text-primary font-semibold inline-flex items-center gap-2.5 mt-auto  transition-colors after:absolute after:inset-0 after:z-10">
						<span>Dowiedz się więcej</span>
						<x-icon.red_arrow class="shrink-0 transform group-hover:translate-x-1 transition-transform text-[#FF3437]" />
					</a>

				</div>
				@endforeach
			</div>
			@else
			<div class="no-posts bg-white p-6 radius text-center text-gray-400 shadow-sm">
				Brak postów do wyświetlenia.
			</div>
			@endif
		</div>

	</div>
</section>