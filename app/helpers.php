<?php
if (!function_exists('unset_array')) {
    function unset_array($data, $array = [])
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                if (in_array($key, $array)) {
                    unset($data[$key]);
                }
            }
            return $data;
        } else {
            unset($data);

            return true;
        }
    }
}
