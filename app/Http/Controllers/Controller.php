<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $imagesFolder = 'images/';

    protected function getFiles($data, $dir){
        $files = [];        
        foreach($data->getRelations()['pictures'] as $picture){
            $url = $picture->getAttributes()['url'];
            if(strpos($url, $this->imagesFolder . $dir) === 0){
                $full_path = Storage::path($url);
                $base64 = base64_encode(Storage::get($url));
                $image_data = 'data:'.mime_content_type($full_path) . ';base64,' . $base64;
                $files[$data->getAttributes()['id']][$url] = $image_data;
            }
        }
        return $files;
    }
}
