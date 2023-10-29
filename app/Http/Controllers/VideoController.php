<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $data = Video::all();

        return view('admin.video-setting.index', compact('data'));
    }

    public function store(Request $request)
    {
        $file = $request->file('video');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'videos';
        $file->move($tujuan_upload, $nama_file);

        Video::create([
            'nama' => $nama_file,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'category' => $request->category,
        ]);

        return redirect()->route('video-setting.index');
    }

    public function update(Request $request, $id)
    {
        $data = Video::findOrFail($id);

        $file_path = public_path('videos/' . $data->nama);
        unlink($file_path);

        $file = $request->file('video');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'videos';
        $file->move($tujuan_upload, $nama_file);

        $data->update([
            'nama' => $nama_file,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'category' => $request->category,
        ]);

        return redirect()->route('video-setting.index');
    }

    public function destroy($id)
    {
        $data = Video::findOrFail($id);
        $file_path = public_path('videos/' . $data->nama);
        unlink($file_path);
        $data->delete();

        return redirect()->route('video-setting.index');
    }

    public function search(Request $request)
    {
        $data = Video::where('nama', 'like', '%' . $request->get('nama') . '%')->get();

        return view('admin.video-setting.index', compact('data'));
    }
}