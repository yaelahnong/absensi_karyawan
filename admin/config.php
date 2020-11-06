<?php

$_CONFIG = array(
    'lang' => 'en',                             // main language
    'uploads_dir' => 'temp',                    // uploads directory
    'qrcodes_dir' => 'qrcodes',                 // qr codes directory
    'delete_old_files' => true,                 // delete periodically old files
    'file_lifetime' => 24,                      // delete files older than..(hours) from /uploads_dir and /qrcodes_dir
    'uploader' => true,                         // let users upload their own logo
    'upload_max_filesize' => 1000,              // max filesize in Kb
    'thumb_size' => 130,                        // the size of the user's uploaded thumbnail 
    'qr_bgcolor' => '#FFFFFF',                  // default background color for generated qrcodes
    'qr_color' => '#000000',                    // default foreground color for generated qrcodes
    'session_name' => 'qrSession',              // custom session name for the script
    'placeholder' => 'images/placeholder.svg',  // default placeholder
    'link' => true,                             // activate link tab
    'location' => true,                         // activate location tab
    'email' => false,                            // activate email tab
    'text' => false,                             // activate text tab
    'tel' => false,                              // activate telephone tab
    'sms' => false,                              // activate sms tab
    'whatsapp' => false,                         // activate whatsapp tab
    'wifi' => false,                             // activate wifi tab
    'vcard' => false,                            // activate v-card tab
    'paypal' => false,                           // activate PayPal tab
    'bitcoin' => false,                          // activate BitCoin tab
    'default_tab' => '#link',                   // available options: #link | #location | #email | #text | #sms | #wifi | #vcard | #paypal | #bitcoin | #whatsapp
    'detect_browser_lang' => false,             // detect browser language
    'google_api_key' => 'AIzaSyB3lCtp5rhPGI4FMDbRIp-Shq6oRGAwltc',         // https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key
    'color_primary' => '#30419b',                   // main color, used for buttons and header background. set a #hex color or false to get random colors
    );
