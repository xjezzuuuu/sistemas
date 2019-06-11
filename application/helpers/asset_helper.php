<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('asset')) {
    function asset($assetName = '')
    {
        $CI = &get_instance();

        return base_url() . 'assets/' . $assetName;
    }
}
