<?php

function add_headers_to_htaccess( $rules ) {

   // Build the CSP-Allowed URL List.
    $allowed_urls = array(
        'https://www.googletagmanager.com',
        'https://analytics.google.com',
        'https://www.google-analytics.com',
        'https://noelachocolate.com/',
        'https://fonts.gstatic.com',
        'https://fonts.googleapis.com',
        'https://cdnjs.cloudflare.com'
    );
    $allowed_urls_string = implode ( ' ', $allowed_urls);

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

    $new_rules = "\n## START CUSTOM HEADERS\n" .

    "<IfModule mod_headers.c>

        # Content Security Policy
        Header set Content-Security-Policy \"$csp\"

        # X-Content-Type-Options
        Header set X-Content-Type-Options \"nosniff\"

        # X-Frame-Options
        Header set X-Frame-Options \"SAMEORIGIN\"

        # Strict-Transport-Security
        Header set Strict-Transport-Security \"max-age=31536000; includeSubDomains\"

        # X-XSS-Protection
        Header set X-XSS-Protection \"1; mode=block\"

        # Referrer-Policy
        Header set Referrer-Policy \"strict-origin-when-cross-origin\"

    </IfModule>

    ## END CUSTOM HEADERS\n";

    $header_start = strpos($rules, '## START CUSTOM HEADERS');
    $header_end = strpos($rules, '## END CUSTOM HEADERS');

    if ($header_start !== false && $header_end !== false) {
        // +20 here accounts for length of string '## END CUSTOM HEADERS'
        $existing_rules = substr($rules, $header_start, ($header_end - $header_start) + 20);
        $rules = str_replace($existing_rules, $new_rules, $rules);
    } else {
        // If no rules exist, prepend the new rules
        $rules = $new_rules . $rules;
    }

    return $rules;
}

add_filter('mod_rewrite_rules', 'add_headers_to_htaccess');

?>