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

<div data-gsap-anim="section" @if(!empty($section_id)) id="{{ $section_id }}" @endif class="block-blog-latest bg-[#f4f8fc] py-16 lg:py-24 -smt {{ $sectionClass }} {{ $section_class }}">
    <div class="c-main max-w-[1200px] mx-auto px-4">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
                <h2 data-gsap-element="header" class="text-primary ">
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

                                <h6 class=" text-carbon  ">
                                    {{ get_the_title($post->ID) }}
                                </h6>

                            </div>

                            <div class="mt-6 flex items-center gap-4 text-secondary ">
                                <span>Przeczytaj</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
  <path d="M0.190665 1.1091C-0.0631411 0.855294 -0.063763 0.443848 0.189975 0.189999C0.443816 -0.0638412 0.855925 -0.0638413 1.10977 0.189999L9.45467 8.53491L9.45468 1.19453C9.45492 0.835836 9.74575 0.544871 10.1045 0.544741C10.4635 0.544745 10.755 0.836238 10.755 1.19522L10.755 10.1045C10.7549 10.4632 10.4638 10.754 10.1052 10.7543L1.1952 10.755C0.836218 10.755 0.544719 10.4635 0.544716 10.1045C0.544717 9.74551 0.836218 9.45401 1.1952 9.45401L8.53557 9.45401L0.190665 1.1091Z" fill="#FF3437"/>
</svg>
                                </svg>
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