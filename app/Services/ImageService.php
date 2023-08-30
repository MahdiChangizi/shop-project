<?php
namespace App\Services;

use Illuminate\Support\Str;

class ImageService {

    public $imageName;
    public $directory;

    public function save($image, $directoryName = null)
    {
        $this->imageName = now()->day . Str::random(5) . '.' . $image->extension();
        $this->directory = '/assets/images/' . $directoryName . '/' . now()->year . '/' . now()->month . '/' . now()->day;
        $image->move(public_path($this->directory), $this->imageName);
    }

    public function saveImageDb()
    {
        return $this->directory . '/' . $this->imageName;
    }
}
