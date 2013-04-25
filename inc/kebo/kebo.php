<?php

/*
 * To change this template, choose Tools | Templates
 */

/*
 * Add the Foundation init JS to Footer.
 */
function kebo_insert_foundation_js() {
    
    echo '
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(document).foundation(function (response) {
                    console.log(response.errors);
                });
            });
        </script>
        ';
    
}
add_action('wp_footer', 'kebo_insert_foundation_js');