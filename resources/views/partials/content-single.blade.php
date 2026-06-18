@php
$categories = get_the_category();
$category = !empty($categories) ? $categories[0] : null;
$cta_bg = get_field('g_cta_bg', 'option') ?: [];
@endphp

<div data-gsap-element="bread" class="__breadcrumb c-main text-left pt-2 block">
			@if (function_exists('yoast_breadcrumb'))
			{!! yoast_breadcrumb('<p id="breadcrumbs">','</p>') !!}
			@endif
		</div>

<section data-gsap-anim="section" class="hero-blog relative overflow-visible">
    <div class="__wrapper c-main relative z-10 my-10 md:my-26 -smt">
        <div class="grid grid-cols-1 lg:grid-cols-[7fr_3fr] gap-8 lg:gap-20">
            
            <div class="__content w-full">
                <!-- <div data-gsap-element="bread" class="__breadcrumb mt-4">
                    @if (function_exists('woocommerce_breadcrumb'))
                    {!! woocommerce_breadcrumb() !!}
                    @endif
                </div> -->

                <div class="__top mt-10">
                    @if ($category)
                    <a data-gsap-element="header" href="{{ get_category_link($category->term_id) }}" class="border border-primary rounded-full text-sm px-4 py-3">{{ $category->name }}</a>
                    @endif
                    <h1 data-gsap-element="header" class="text-h1 text-primary !font-normal  mt-6">{{ get_the_title() }}</h1>
                    @if(has_excerpt())
                    <div data-gsap-element="content" class="text-white mt-4">
                        {!! get_the_excerpt() !!}
                    </div>
                    @endif

                    @if(has_post_thumbnail())
                    <div data-gsap-element="image" class="w-full img-2xl rounded-xl overflow-hidden mb-16 mt-6">
                        {!! get_the_post_thumbnail(get_the_ID(), 'large', ['class' => 'w-full object-cover']) !!}
                    </div>
                    @endif
                </div>
            </div>
            <div>
			</div>
        </div>
    </div>
</section>

@php
$content = apply_filters('the_content', get_the_content());

preg_match_all('/<h([1-4])[^>]*>(.*?)<\/h[1-4]>/', $content, $matches, PREG_SET_ORDER);

$toc = '<nav class="toc">
    <ul>';
        $used_ids = [];
        foreach ($matches as $match) {
        $level = $match[1];
        $title = strip_tags($match[2]);
        $id = sanitize_title($title);
        $base_id = $id;
        $i = 2;
        while (in_array($id, $used_ids)) {
        $id = $base_id . '-' . $i;
        $i++;
        }
        $used_ids[] = $id;
        $content = preg_replace(
        '/<h' . $level . '[^>]*>' . preg_quote($match[2], '/' ) . '<\/h' . $level . '>/' , '<h' . $level . ' id="' . $id . '">' . $match[2] . '</h' . $level . '>' ,
            $content,
            1
            );
            $toc .='<li class="toc-h' . $level . '"><a href="#' . $id . '">' . $title . '</a></li>' ;
            }
            $toc .='</ul></nav>' ;
@endphp

<div class="bg-page pt-10 pb-20">
    <div class="__content c-main grid grid-cols-1 md:grid-cols-[7fr_3fr] gap-8 lg:gap-20 items-start">

        <div id="tresc" class="__entry text-body font-normal text-base leading-relaxed ">
            {!! $content !!}
        </div>

        <div class="relative md:sticky top-0 md:top-30 h-max">
            <p class="text-h5 m-title text-primary !font-normal">
                Co znajdziesz w artykule:
            </p>
            @if(count($matches))
                {!! $toc !!}
            @endif
        </div>

    </div>
</div>

@php
$current_id = get_the_ID();
$categories = wp_get_post_categories($current_id);
$related_args = [
'category__in' => $categories,
'post__not_in' => [$current_id],
'posts_per_page' => 3,
'ignore_sticky_posts' => 1,
];
$related_query = new WP_Query($related_args);
@endphp

@if($related_query->have_posts())
<section class=" py-24 bg-[#DDEDFF] w-full">
<div class="c-main related-posts ">

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-14">
        <h3 class="text-2xl font-bold text-primary">Pozostałe wpisy</h3>
        <a href="/category/baza-wiedzy" class="inline-block rounded-full btn-secondary btn">
            Zobacz wszystkie wpisy
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @while($related_query->have_posts())
        @php($related_query->the_post())
        <article @php(post_class('bg-white radius p-6 flex flex-col'))>
            <header>
                @if(has_post_thumbnail())
                <a href="{{ get_permalink() }}">
                    {!! get_the_post_thumbnail(null, 'large', ['class' => 'featured-image radius object-cover img-m']) !!}
                </a>
                @endif

            

                <h2 class="entry-title !text-carbon text-h6 mt-4">
                    <a href="{{ get_permalink() }}">
                        {{ get_the_title() }}
                    </a>
                </h2>
            </header>

            <a class="underline-btn mt-auto pt-4" href="{{ get_permalink() }}">
                Przeczytaj
            </a>
        </article>
        @endwhile
        @php(wp_reset_postdata())
    </div>
	</div>
</section>
@endif

<!-- cta  -->
<section
    data-gsap-anim="section"
    @if(!empty($section_id)) id="{{ $section_id }}" @endif
    @class([
        'b-cta-bg  relative py-16 md:py-46 overflow-hidden bg-primary',
        $sectionClass => filled($sectionClass),
        $section_class => filled($section_class),
        $background => filled($background) && $background !== 'none',
    ])
>
    
    @if(!empty($cta_bg['image']['url']))
        <div class="absolute top-0 right-0 h-full w-full md:w-1/2 block z-0 ">
            <img 
                src="{{ $cta_bg['image']['url'] }}" 
                alt="" 
                class="w-full h-full object-cover object-center"
            />
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const headings = document.querySelectorAll('h1[id], h2[id], h3[id], h4[id]');
        const tocLinks = document.querySelectorAll('.toc ul li a');
        function updateActiveLink() {
            headings.forEach((heading) => {
                const headingTop = heading.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (headingTop < windowHeight - 300) {
                    tocLinks.forEach((link) => {
                        link.parentNode.classList.remove('active');
                    });

                    const id = heading.id;
                    const activeLink = document.querySelector(`.toc ul li a[href="#${id}"]`);
                    if (activeLink) {
                        activeLink.parentNode.classList.add('active');
                    }
                }
            });
        }
        updateActiveLink();
        window.addEventListener('scroll', updateActiveLink);
    });
</script>