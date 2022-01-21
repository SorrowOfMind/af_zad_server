<?php

namespace app\utils;

class SanitizeHelper
{
    public static function sanitizeData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        return $data;
    }
}