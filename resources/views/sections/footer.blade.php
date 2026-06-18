@php
$contact = get_field('g_contact_info', 'option');
$image = get_field('logo', 'option');
$socials = get_field('social_media', 'option');
@endphp
<footer class="footer relative z-10 -spt overflow-hidden">
<div class="blur bg-secondary absolute "></div>
    <div class="__wrapper c-main">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-y-8 py-6 pb-8 border-b border-[#99B5DE] text-carbon">

            <div class="flex flex-col sm:flex-row sm:items-center gap-6 lg:gap-12">
                @if($image)
                <a href="{{ home_url('/') }}" class="shrink-0 inline-block">
                    <img
                        src="{{ $image['url'] }}"
                        alt="{{ $image['alt'] ?? '' }}"
                        class="h-14 w-auto object-contain">
                </a>
                @endif

                @if(!empty($contact['txt']))
                <div data-gsap-element="txt" class="__txt text-left">
                    {!! $contact['txt'] !!}
                </div>
                @endif
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-6 lg:gap-12 lg:ml-auto">
                
                <div class="flex flex-col sm:flex-row gap-4 lg:gap-6">
                    <a data-gsap-element="txt" href="tel:{{ $contact['phone'] }}" class="flex items-center gap-2 shrink-0">
                        <img class="" src="/wp-content/themes/centrumego/resources/images/phone.svg">
                        <span>{!! $contact['phone'] !!}</span>
                    </a>
                    <a data-gsap-element="txt" href="mailto:{{ $contact['mail'] }}" class="flex items-center gap-2 shrink-0">
                        <img class="" src="/wp-content/themes/centrumego/resources/images/mail.svg">
                        <span>{!! $contact['mail'] !!}</span>
                    </a>
                </div>

                @if(!empty($socials))
                <div class="flex items-center gap-3 shrink-0">
                    @foreach($socials as $social)
                    @if(!empty($social['url']) && !empty($social['platform']))
                    <a href="{{ $social['url'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="shrink-0 inline-block"
                        aria-label="{{ ucfirst($social['platform']) }}">
                        <img src="/wp-content/themes/centrumego/resources/images/social_media/{{ $social['platform'] }}.svg" alt="">
                    </a>
                    @endif
                    @endforeach
                </div>
                @endif

            </div>

        </div>
    </div>

    <div class="__wrapper c-main z-10">
        <div class="__widgets grid gap-1 md:gap-6 py-10 md:py-26">
            @for ($i = 1; $i <= 4; $i++)
                @if (is_active_sidebar('sidebar-footer-' . $i))
                <div>@php(dynamic_sidebar('sidebar-footer-' . $i))</div>
                @endif
            @endfor
        </div>
    </div>

    <div class="w-full border-t border-[#99B5DE]">
        <div class="c-main flex flex-col md:flex-row justify-between gap-6 py-10 footer-bottom">
            <p class="">Copyright ©2026 {{ get_bloginfo('name') }}. All Rights Reserved</p>
            <p class="flex gap-2">Designed &amp; Developed by
                <a target="_blank" href="https://www.ohsofresh.pl" title="OhSoFresh"><img class="oh" src="/wp-content/themes/centrumego/resources/images/ohsofresh.svg"></a>
            </p>
        </div>
    </div>

    <img class="absolute top-[-10%] right-[-30%] md:right-[-0%] h-[1300px] lg:h-[1200px] w-auto opacity-10 object-cover z-1 overflow-visible" src="/wp-content/themes/centrumego/resources/images/shape.svg">

</footer>