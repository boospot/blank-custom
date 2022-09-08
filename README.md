# blank-custom

This is a custom plugin designed for custom codes, functions, styles, scripts and fonts by BooSpot.com.

- Download the plugin files
- change folder name to website name and append custom in the end. ie "examplewebsite-custom"
- edit init.php file and change plugin name as well
- zip all the files and upload the plugin.
- For oxygen builder comment out `wp_enqueue_style( 'custom-style' );` and uncomment `add_action( 'wp_head', 'wpdd_enqueue_css_after_oxygens', 1000000 );`. it will add custom style.css after oxygen css files.
- for GTM, uncomment GTM.php file inclusion code in init.php and change GTM settings in GTM.php file.
- To remove unwanted css and js from the website uncomment bloat-remover.php and edit the file.
