<!-- boxes  -->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([ 'b-boxes relative -smt' ,
    $sectionClass=> filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
    ])>
    <div class="blur"></div>
    <div class="blur-right"></div>
    <div class="__wrapper c-main relative">
        <div class="__col grid grid-cols-1 md:grid-cols-[3fr_7fr] gap-8 lg:gap-20">
            @if (!empty($g_boxes['image']))
            <div data-gsap-element="img" class="__img order1">
                <img class="object-cover w-full h-full aspect-[3/2] __img radius-img" src="{{ $g_boxes['image']['url'] }}" alt="{{ $g_boxes['image']['alt'] ?? '' }}">
            </div>
            @endif
            
            <div class="__content order2">
                @if(!empty($g_boxes['header']))
                <h2 data-gsap-element="header" class="text-primary">
                    {{ $g_boxes['header'] }}
                </h2>
                @endif
            </div>

            @if(!empty($g_boxes['txt']))
            <div data-gsap-element="txt" class="__txt">
                {!! $g_boxes['txt'] !!}
            </div>
            @endif
        </div>

        @if(!empty($r_boxes))
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-14">
            @foreach($r_boxes as $card)
            <div class="group relative bg-white px-8 py-8 radius">
                @if(!empty($card['card_image']['url']))
                <div class="w-16 h-16 mb-5 flex items-center justify-center bg-primary rounded-full text-white relative overflow-visible">
                    <span class="absolute top-1 left-1 w-3 h-3 bg-[#037AC2] rounded-full"></span>
                    <img src="{{ $card['card_image']['url'] }}"
                        alt="{{ $card['card_title'] }}"
                        class="w-8 h-8 object-contain" />
                </div>
                @endif
                
                @if(!empty($card['card_title']))
                <h6 class="text-primary mb-4">
                    {{ $card['card_title'] }}
                </h6>
                @endif

                @if(!empty($card['card_text']))
                <p class="text-gray-600">
                    {{ $card['card_text'] }}
                </p>
                @endif

                @if(!empty($card['card_link']))
                <a href="{{ $card['card_link']['url'] }}"
                    target="{{ $card['card_link']['target'] ?: '_self' }}"
                    class="text-primary font-semibold inline-flex items-center gap-2 mt-8 transition-colors after:absolute after:inset-0 after:z-10">
                    <span>{{ $card['card_link']['title'] }}</span>
                    <x-icon.red_arrow class="shrink-0 transform group-hover:translate-x-1 transition-transform text-[#FF3437]" />
                </a>
                @endif
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>