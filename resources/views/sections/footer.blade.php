@php
$contact = get_field('g_contact_info', 'option');
$image = get_field('logo', 'option');
$socials = get_field('social_media', 'option');
@endphp
<footer class="footer relative z-10 -spt overflow-hidden">
	<div class="__wrapper c-main">
		<div class="grid grid-cols-1 md:grid-cols-2 items-center pb-8 border-b border-[#99B5DE] text-carbon">

			<div class="flex shrink-0 gap-12 items-center">
				@if($image)
				<a href="{{ home_url('/') }}" class="shrink-0 inline-block">
					<img
						src="{{ $image['url'] }}"
						alt="{{ $image['alt'] ?? '' }}"
						class="h-14 w-auto object-contain">
				</a>
				@endif

				@if(!empty($contact['txt']))
				<div data-gsap-element="txt" class="__txt ">
					{!! $contact['txt'] !!}
				</div>
				@endif
			</div>

			<div class="flex justify-end gap-12 ">


				<a data-gsap-element="txt" href="tel:{{ $g_contact_1['phone'] }}" class="flex items-center gap-2">
					<img class="" src="/wp-content/themes/centrumego/resources/images/phone.svg">
					<span>{!! $contact['phone'] !!}</span>
				</a>

				<a data-gsap-element="txt" href="mailto:{{ $g_contact_1['mail'] }}" class="flex items-center gap-2">
					<img class="" src="/wp-content/themes/centrumego/resources/images/mail.svg">
					<span>{!! $contact['mail'] !!}</span>
				</a>

				@if(!empty($socials))
				<div class="flex items-center gap-2">
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
		<div class="__widgets grid gap-1 md:gap-6 py-26">
			@for ($i = 1; $i <= 4; $i++)
				@if (is_active_sidebar('sidebar-footer-' . $i))
				<div>@php(dynamic_sidebar('sidebar-footer-' . $i))</div>
		@endif
		@endfor
	</div>
	</div>
	<div class="w-full border-t border-[#99B5DE]">
		<div class="c-main flex flex-col md:flex-row justify-between gap-6 py-10 footer-bottom">
			<p class="">Copyright ©2026 <?php echo get_bloginfo('name'); ?>. All Rights Reserved</p>
			<p class="flex gap-2">Designed &amp; Developed by
				<a target="_blank" href="https://www.ohsofresh.pl" title="OhSoFresh"><img class="oh" src="/wp-content/themes/centrumego/resources/images/ohsofresh.svg"></a>
			</p>
		</div>
	</div>

	<img class="absolute top-[-10%] right-[-15%] h-[1200px] w-auto   w-auto opacity-10 object-cover z-1" src="/wp-content/themes/centrumego/resources/images/shape.svg">

</footer>