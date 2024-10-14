<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Gallery\Video;
use App\Http\Services\FileService;
use App\Http\Services\VideoService;
use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;

class VideoController extends Controller
{
    public function __construct(
        private FileService $fileService,
        private VideoService $videoService
    ) {}

    public function index()
    {
        return view('backend.video.index', [
            'videos' => $this->videoService->select(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoRequest $request)
    {
        $data = $request->validated();

        try {
            if ($request->hasFile('file')) {
                $data['file'] = $this->fileService->upload($data['file'], 'videos');
            }

            // if ($request->hasFile('thumbnail')) {
            //     $data['thumbnail'] = $this->fileService->upload($data['thumbnail'], 'videos/thumbnail');
            // }

            $this->videoService->create($data);

            return redirect()->route('panel.video.index')->with('success', 'video has been created');
        } catch (\Exception $err) {
            if (isset($data['file'])) {
                $this->fileService->delete($data['file']);
            }

            // if (isset($data['thumbnail'])) {
            //     $this->fileService->delete($data['thumbnail']);
            // }

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        return view('backend.video.show', [
            'video' => $this->videoService->selectFirstBy('uuid', $uuid)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        return view('backend.video.edit', [
            'video' => $this->videoService->selectFirstBy('uuid', $uuid)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoRequest $request, string $uuid)
    {
        $data = $request->validated();

        $getVideo = $this->videoService->selectFirstBy('uuid', $uuid);

        try {
            // jika upload
            if ($request->hasFile('file')) {
                // hapus gambar lama
                $this->fileService->delete($getVideo->file);

                // upload gambar baru
                $data['file'] = $this->fileService->upload($data['file'], 'videos');
            } else {
                // jika tidak upload
                $data['file'] = $getVideo->file;
            }

            $this->videoService->update($data, $uuid);

            return redirect()->route('panel.video.index')->with('success', 'video has been updated');
        } catch (\Exception $err) {
            if (isset($data['file'])) {
                $this->fileService->delete($data['file']);
            }

            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $getVideo = $this->videoService->selectFirstBy('uuid', $uuid);
        $this->fileService->delete($getVideo->file);

        $getVideo->delete();

        return response()->json([
            'message' => 'Video has been deleted'
        ]);
    }
}
