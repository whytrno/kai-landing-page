<?php

namespace App\Http\Controllers;

use App\Models\UserVideo;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data = UserVideo::with(['user', 'video'])->get();

        return view('admin.laporan', compact('data'));
    }
}
