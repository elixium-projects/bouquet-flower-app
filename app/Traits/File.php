<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;

trait File
{
    public function Upload($file, $path)
    {
        $imageName = time() . "-" . str()->random(50) . "." . $file->extension();

        FacadesStorage::disk("public")->putFileAs($path, $file, $imageName);

        return $imageName;
    }
}
