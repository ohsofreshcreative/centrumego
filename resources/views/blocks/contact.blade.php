<!--- contact --->

<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([ 'b-contact relative  -smt' ,
    $sectionClass=> filled($sectionClass),
    $section_class => filled($section_class),
    $background => filled($background) && $background !== 'none',
    ])>

    <div class="__wrapper c-main relative z-2 lg:py-16 py-10 px-10 bg-cover bg-center radius" style="background-image:linear-gradient(rgba(5,7,54,0.48), rgba(5, 7, 54,0.48)), url('{{ $g_contact_1['image']['url'] }}');">

        <div class="relative grid grid-cols-1 lg:grid-cols-2 items-end gap-10 z-10">
            <div class="__content lg:px-10">
                <h2 data-gsap-element="header" class="!text-white mb-4">{!! $g_contact_1['header'] !!}</h2>
                @if(!empty($g_contact_1['txt']))
                <div data-gsap-element="txt" class="__txt text-white max-w-xl">
                    {!! $g_contact_1['txt'] !!}
                </div>
                @endif
            </div>
            <div data-gsap-element="form" class="bg-white radius px-4 py-10 md:p-10">
                <h4 class="!text-[#3C3F44] mb-4">{!! $g_contact_2['title'] !!}</h4>
                {!! do_shortcode($g_contact_2['shortcode']) !!}
            </div>
        </div>
    </div>

</section>