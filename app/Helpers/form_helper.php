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