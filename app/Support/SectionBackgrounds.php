<?php

namespace App\Support;

class SectionBackgrounds
{
	/**
	 * @return array<string, string>
	 */
	public static function choices(): array
	{
		return [
			'none' => 'Brak (domyślne)',
			'section-white' => 'Białe',
			'section-light' => 'Jasne',
			'section-brand' => 'Marki',
			'section-gradient' => 'Gradient',
			'section-dark' => 'Ciemne',
			'section-soft-blue' => 'Jasnoniebieskie',
			'section-lighter-grad' => 'Gradient pionowy',
			'section-light-horizontal' => 'Gradient poziomy',
		];
	}
}
