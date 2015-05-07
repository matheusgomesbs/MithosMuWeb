<?php

namespace MithosNews\Util;

class News {
    
    public static function newsType($type) {
        $types = config('news.types');
        if (isset($types[$type])) {
            return '<span style="color:' . $types[$type]['color'] . '">[' . $types[$type]['name'] . ']</span>';
        } else {
            return '';
        }
    }
    
}