<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class SaveImage {


    public $imageName;
    public $directory;
    public $imagePath;

    public function save($file, $directory, $height = 320, $width = 240)
    {
        $this->directory = 'assets/images/' . trim($directory, '/') . '/' . now()->year . '/' . now()->month . '/' . now()->day;
        $this->imageName = date("YmWdhms") . '_' . Str::random(10) . '.' . $file->extension();
        $this->imagePath = storage_path('app/public/' . $this->directory);

        if ($file) {
            try {
                if (!File::exists($this->imagePath)) {
                    File::makeDirectory($this->imagePath, 0777, true, true);
                }
                $img = Image::make($file)->resize($height, $width);
                $img->save($this->imagePath . '/' . $this->imageName);
            } catch (\Exception $e) {
                File::delete(storage_path($this->directory));
            }
        }
    }

    public function saveImageDb()
    {
        return $this->imagePath . '/' . $this->imageName;
    }
























}
