@extends('layouts.app')
@section('content')
@php
$term = get_queried_object();
$categories = get_categories();
$category_header = get_field('category_header', $term);
$category_description = get_field('category_description', $term);
$category_image = get_field('category_image', $term);
$cta_bg = get_field('g_cta_bg', 'option') ?: [];

// Pobranie pól ACF dla sekcji 'bottom'
$section_id = $cta_bg['section_id'] ?? '';
$section_class = $cta_bg['section_class'] ?? '';
$flip = $cta_bg['flip'] ?? false;

// Przygotowanie klas CSS
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';

// Wygenerowanie unikalnego ID dla SVG
$unique_id = 'clip_'.uniqid();
@endphp



<div data-gsap-element="bread" class="__breadcrumb c-main text-center mx-auto justify-center flex pt-2">
	@if (function_exists('yoast_breadcrumb'))
	{!! yoast_breadcrumb('<p id="breadcrumbs">','</p>') !!}
	@endif
</div>
<div class="__wrapper c-main relative z-10 pt-24 pb-20">
	<div class="__content w-full ">
		<h2 class="m-header text-center">
			{!! $category_header ?: get_the_archive_title() !!}
		</h2>
		@if ($category_description)
		<div class="text-white text-xl md:text-2xl">
			{!! $category_description !!}
		</div>
		@endif
	</div>
	<div id="category-tabs" class="category-tabs z-20 relative rounded-full">
		<div id="category-tabs" class="category-tabs z-20 relative rounded-full">
			<div class="lg:flex lg:justify-center ">
				<div class="lg:w-fit flex flex-wrap justify-center gap-3">
					<div class=" !w-auto">
						<a href="/category/baza-wiedzy" class="__tab block rounded-full px-4 py-2 {{ is_category('baza-wiedzy') ? 'active' : '' }}">Baza wiedzy</a>
					</div>
					@foreach($categories as $category)
					@if($category->name !== 'Baza wiedzy')
					<div class="!w-auto">
						<a href="{{ get_category_link($category->term_id) }}" class="__tab block rounded-full px-4 py-2 {{ $term && $term->term_id === $category->term_id ? 'active' : '' }}">{{ $category->name }}</a>
					</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
</div>

@if (have_posts())
<div class="__posts c-main !mt-10 posts grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
	@while (have_posts()) @php(the_post())
	@includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
	@endwhile
</div>

{{-- {!! get_the_posts_navigation() !!} --}}
{!! the_posts_pagination() !!}
@else
<div class="mt-20 mb-20">
	<div class="c-main">
		<h3 class="">Brak wpisów w tej kategorii.</h3>
		<a class="main-btn m-btn" href="/wszystkie-wpisy/">Sprawdź wszystkie wpisy</a>
	</div>
</div>
@endif

<!-- cta -->
<section
	data-gsap-anim="section"
	@if(!empty($section_id)) id="{{ $section_id }}" @endif
	@class([ 'b-cta-bg -smt relative py-16 md:py-46 overflow-hidden bg-primary' ,
	$sectionClass=> filled($sectionClass),
	$section_class => filled($section_class),
	$background => filled($background) && $background !== 'none',
	])
	>

	@if(!empty($cta_bg['image']['url']))
	<div class="absolute top-0 right-0 h-full w-full md:w-1/2 block z-0 ">
		<img
			src="{{ $cta_bg['image']['url'] }}"
			alt=""
			class="w-full h-full object-cover object-center" />
		<div class="absolute inset-0" style="background: linear-gradient(90deg, #0A397C 0%, rgba(10, 57, 124, 0.4) 60%, rgba(10, 57, 124, 0) 100%);"></div>
	</div>
	@endif

	<div class="blur"></div>
	<div class="blur-top"></div>
	<div class="blur-bottom"></div>

	<div class="c-main px-6 md:px-12 relative z-10">

		<div class="__content w-full md:max-w-2xl flex flex-col gap-6 ">
			<div class="__text">
				@if (!empty($cta_bg['header']))
				<h2 data-gsap-element="header" class="mb-6 text-white">
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
			<div class="inline-buttons m-btn flex flex-wrap gap-4">

				@if (!empty($cta_bg['button']['url']))
				<x-button :href="$cta_bg['button']['url']" variant="third" data-gsap-element="btn">
					{{ $cta_bg['button']['title']}}
				</x-button>
				@endif

				@if (!empty($cta_bg['button2']['url']))
				<x-button :href="$cta_bg['button2']['url']" variant="secondary" data-gsap-element="btn-secondary" class="btn">
					{{ $cta_bg['button2']['title'] }}
				</x-button>
				@endif

			</div>
			@endif
		</div>
	</div>
</section>

@endsection