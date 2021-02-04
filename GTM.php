<?php

// google tag manager excluding admin and shop manager

add_action( 'wp_head', function () {
	if ( current_user_can( 'administrator' ) || current_user_can( 'shop_manager' ) ) {
		return null;
	}
	?>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-XXXXX');</script>
    <!-- End Google Tag Manager -->
	<?php
}
);
add_action( 'ct_before_builder', function () {
	if ( current_user_can( 'administrator' ) || current_user_can( 'shop_manager' ) ) {
		return null;
	}
	?>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXX"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
	<?php
}
);