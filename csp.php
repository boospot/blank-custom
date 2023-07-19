<?php
function add_security_headers( $headers ) {
    if ( ! is_user_logged_in() ) {
        $headers['X-Content-Type-Options'] = 'nosniff';
        $headers['X-XSS-Protection'] = '1; mode=block';
        $headers['X-Frame-Options'] = 'SAMEORIGIN';
        $headers['Strict-Transport-Security'] = 'max-age=31536000; includeSubDomains; preload';
        
        $allowed_urls = array(
            'https://www.googletagmanager.com',
            'https://analytics.google.com',
            'https://conexusre.b-cdn.net',
            'https://www.google-analytics.com',
						'https://jobs.crelate.com/',
        );

        $allowed_urls_string = implode( ' ', $allowed_urls );

        $headers['Content-Security-Policy'] = "default-src 'self' $allowed_urls_string; script-src 'self' 'unsafe-inline' 'unsafe-eval' $allowed_urls_string; style-src 'self' 'unsafe-inline' $allowed_urls_string; img-src 'self' data: $allowed_urls_string; font-src 'self' $allowed_urls_string;";

    }

    return $headers;
}
add_filter( 'wp_headers', 'add_security_headers' );
?>