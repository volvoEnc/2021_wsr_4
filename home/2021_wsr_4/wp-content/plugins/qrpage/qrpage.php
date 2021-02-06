<?php
/*
 * Plugin Name: QRPage
 *
 */
add_shortcode('qrpage', function ($attrs) {
    $script = "
<div id='qrcode'></div>
<script type='text/javascript'>
    new QRCode(document.getElementById('qrcode'), {
        text: '".get_page_link()."',
        width: 128,
        height: 128 
    });
</script>";
    return $script;
});