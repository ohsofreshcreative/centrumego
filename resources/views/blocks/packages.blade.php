<!-- packages  -->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([ 'b-packages relative -smt ' ,
    $sectionClass=> filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
    ])>
    <div class="blur"></div>
    <div class="blur-right"></div>
    <div class="__wrapper c-main relative ">
        <div class="__col grid grid-cols-1 md:grid-cols-[3fr_7fr]  gap-8 lg:gap-20">
            <div class="__content order2 grid grid-cols-1 md:grid-cols-[4fr_6fr] gap-8 lg:gap-12">
                @if(!empty($g_packages['header']))
                <h2 data-gsap-element="header" class="text-primary">
                    {{ $g_packages['header'] }}
                </h2>
                @endif
            </div>

            @if(!empty($g_packages['txt']))
            <div data-gsap-element="txt" class="__txt text-xl">
                {!! $g_packages['txt'] !!}
            </div>
            @endif
        </div>
        
        @if(!empty($r_packages))
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-14">
            @foreach($r_packages as $card)
            <div data-gsap-element="card" class="group relative bg-white pl-8 py-8 radius transition-all duration-300 flex flex-col text-left hover:shadow-lg hover:translate-y-1 ">
                @if(!empty($card['card_image']['url']))
                <div class="w-16 h-16 mb-5 flex items-center justify-center bg-primary rounded-full text-white relative overflow-visible">
                    <span class="absolute top-1 left-1 w-3 h-3 bg-[#037AC2] rounded-full"></span>
                    <img src="{{ $card['card_image']['url'] }}"
                        alt="{{ $card['card_title'] }}"
                        class="w-8 h-8 object-contain" />
                </div>
                @endif
                @if(!empty($card['card_title']))
                <h6 class="text-primary mb-4 line-clamp-2">
                    {{ $card['card_title'] }}
                </h6>
                @endif

                @if(!empty($card['card_text']))
                <p class="text-gray-600 ">
                    {{ $card['card_text'] }}
                </p>
                @endif

                @if(!empty($card['card_link']))
                <x-button
                    :href="$card['card_link']['url']"
                    variant="third"
                    data-gsap-element="btn"
                    :target="$card['card_link']['target'] ?? '_self'">
                    {{ $card['card_link']['title'] }}
                </x-button>
                @endif
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>