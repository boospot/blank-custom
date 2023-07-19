<?php

function can_add_security_headers() {
    if (!is_user_logged_in() && !is_admin()) {
        // make array of urls to allow in CSP
        $allowed_urls = array(
            'https://www.googletagmanager.com',
            'https://analytics.google.com',
            'https://conexusre.b-cdn.net',
            'https://www.google-analytics.com',
			'https://jobs.crelate.com/',
        );
        $allowed_urls_string = implode( ' ', $allowed_urls );


        // Content Security Policy
        $csp = "default-src 'self'; "
             . "img-src 'self' data: https: $allowed_urls_string; "
             . "script-src 'self' 'unsafe-inline' 'unsafe-eval' https: $allowed_urls_string; "
             . "style-src 'self' 'unsafe-inline' https: $allowed_urls_string; "
             . "font-src 'self' data: https: $allowed_urls_string; "
             . "connect-src 'self' https:; "
             . "frame-src 'self' https:; "
             . "object-src 'none'; "
             . "base-uri 'self'; "
             . "form-action 'self' https:; "
             . "frame-ancestors 'none'; "
             . "upgrade-insecure-requests; "
             . "block-all-mixed-content; "
             . "worker-src 'none';";

            // building headers array
		$headers = array(
            "Content-Security-Policy" => $csp,
            "X-Content-Type-Options" => "nosniff",
            "X-Frame-Options" => "SAMEORIGIN",
            "Strict-Transport-Security" => "max-age=31536000; includeSubDomains",
            "X-XSS-Protection" => "1; mode=block",
            "Referrer-Policy" => "strict-origin-when-cross-origin"
        );

				// Add the headers
        foreach ($headers as $header => $value) {
            header("$header: $value");
        }
    }
}

add_action('send_headers', 'can_add_security_headers');

?>