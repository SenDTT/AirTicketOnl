<?php


if (!function_exists('form_error_class')) {
    function form_error_class($attribute, $errors)
    {
        return $errors->first($attribute, 'has-error');
    }
}

if (!function_exists('form_error_message')) {
    function form_error_message($attribute, $errors)
    {
        return $errors->first($attribute,
            '<p class="block-helper text-danger">:message</p>');
    }
}

if (!function_exists('format_currency')) {
    function format_currency($number)
    {
        $number = number_format($number,0,',','.');
        return $number;
    }
}