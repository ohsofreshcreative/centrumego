<!--- features --->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([
        'b-features relative -smt',
        $sectionClass => filled($sectionClass),
        $section_class => filled($section_class),
        $background => filled($background) && $background !== 'none',
    ])>

    <div class="__wrapper c-main">

        <div class="__top text-center max-w-6xl mx-auto">
            <h2 data-gsap-element="header" class="m-header">
                {{ strip_tags($g_features['header']) }}
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-14">
            @foreach ($r_features as $item)
                <div
                    data-gsap-element="card"
                    class="__card relative bg-white p-8 radius transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                <div class="bg-secondary rounded-full w-14 h-14 flex justify-center items-center">
				<x-icon.check class="text-white w-{18px] overflow-visible"/></div>

                    @if (!empty($item['title']))
                        <h6 class="text-primary my-4">
                            {{ $item['title'] }}
                        </h6>
                    @endif

                    @if (!empty($item['text']))
                        <div class="__txt">
                            {!! $item['text'] !!}
                        </div>
                    @endif

                </div>
            @endforeach
        </div>

    </div>
</section>