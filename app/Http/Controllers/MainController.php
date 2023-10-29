<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVideo;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function videoIndex($type)
    {
        $data = Video::where('category', $type)->get();

        return view('video.index', compact('data'));
    }

    public function videoDetail($id)
    {
        $data = Video::findOrFail($id);
        $latestVideo = Video::latest()->take(4)->get();

        $checkIfExist = UserVideo::where('user_id', auth()->user()->id)->where('video_id', $data->id)->first();
        if (!$checkIfExist) {
            UserVideo::create([
                'user_id' => auth()->user()->id,
                'video_id' => $data->id,
            ]);
        }

        $totalVideoWatched = UserVideo::where('video_id', $data->id)->count();

        $user = User::where('id', auth()->user()->id)->with('watchedVideos')->first();
        $watchedVideos = [];

        foreach ($user->watchedVideos as $video) {
            $watchedVideos[] = $video->id;
        }

        return view('video.detail', compact('data', 'latestVideo', 'watchedVideos', 'totalVideoWatched'));
    }

    public function store(Request $request)
    {
        if (!isset($request->password)) {
            $request->merge([
                'password' => bcrypt('12345678'),
            ]);
        }

        User::create($request->all());

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->input('username'))->first();

        if (!$user) {
            return back()->with('failed', 'Email atau password salah')->withInput();
        }

        $credentials = $request->only('username', 'password');

        if (auth()->attempt($credentials)) {
            return back()->with('success', 'Email atau password salah')->withInput();

            // return redirect()->route('profile');
        }

        session()->flash('failed', 'Login berhasil!');
        // return back()->with('error', 'Email atau password salah')->withInput();
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        $user->update($request->all());

        return back()->with('success', 'Profile berhasil diupdate');
    }
}