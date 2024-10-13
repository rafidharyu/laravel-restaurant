<?php

namespace App\Http\Services;

use Illuminate\Support\Str;
use App\Models\Gallery\Video;

class VideoService
{
    public function select($paginate = null)
    {
        if ($paginate) {
            return Video::latest()->paginate($paginate);
        }

        return Video::latest()->get();
    }

    public function selectFirstBy($column, $value)
    {
        return Video::where($column, $value)->firstOrFail();
    }

    public function create($data)
    {
        $data['slug'] = Str::slug($data['name']);

        return Video::create($data);
    }

    public function update($data, $uuid)
    {
        $data['slug'] = Str::slug($data['name']);

        return Video::where('uuid', $uuid)->update($data);
    }
}

// class ThumbnailService
// {
//     public function select($paginate = null)
//     {
//         if ($paginate) {
//             return Thumbnail::latest()->paginate($paginate);
//         }

//         return Thumbnail::latest()->get();
//     }

//     public function selectFirstBy($column, $value)
//     {
//         return Thumbnail::where($column, $value)->firstOrFail();
//     }

//     public function create($data)
//     {
//         $data['slug'] = Str::slug($data['name']);

//         return Thumbnail::create($data);
//     }

//     public function update($data, $uuid)
//     {
//         $data['slug'] = Str::slug($data['name']);

//         return Thumbnail::where('uuid', $uuid)->update($data);
//     }
// }
