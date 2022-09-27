<?php

namespace App\Http\Traits;

trait FileTrait
{
    public function save_file($path, $file, $pre_name = '')
    {
        $file_name = $pre_name .
            '_' .
            time() .
            rand(11, 99) .
            '.' .
            $file->getClientOriginalExtension();
        $full_path = 'uploads' . $path . '/';
        $file->move($full_path, $file_name);
        return $file_name;
    }
}
