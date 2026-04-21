<?php
/**
 * Template Tags – reusable helpers
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return inline SVG for social icons
 */
function amal_get_social_icon( string $name ): string {
	$icons = [
		'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>',
		'tiktok'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.32 6.32 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.22 8.22 0 0 0 4.8 1.52V6.76a4.85 4.85 0 0 1-1.03-.07z"/></svg>',
		'twitter'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
		'facebook'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
		'snapchat'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12.206.793c.99 0 4.347.276 5.93 3.821.529 1.193.403 3.219.299 4.847l-.003.06c-.022.31.172.memorize.49.555.415.108 1.122.272 1.122.99 0 .691-.783.928-1.018.928-.31 0-.49-.057-.757-.057-.54 0-.94.362-1.032.98-.082.567.17.978.17 1.437 0 1.627-2.716 4.22-6.677 4.22-3.957 0-6.674-2.593-6.674-4.22 0-.46.255-.87.172-1.437-.092-.618-.492-.98-1.03-.98-.266 0-.447.057-.757.057-.235 0-1.018-.237-1.018-.928 0-.718.71-.882 1.122-.99.29-.074.49-.245.49-.55v-.065c-.105-1.628-.23-3.654.3-4.847C7.856 1.069 11.215.793 12.206.793z"/></svg>',
	];

	return $icons[ $name ] ?? '';
}
