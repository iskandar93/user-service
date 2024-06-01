<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    protected $key;

    public function __construct()
    {
        $this->playlistUrl = config('services.passport_playlist.url');
        $this->playlistKey = config('services.passport_playlist.key');
    }

    public function show(string $id)
    {
        $data = User::with('addresses')->findOrFail($id);

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function getPlaylist()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->playlistKey,
        ])->get("{$this->playlistUrl}/api/playlist");

        return $response->json();
    }

    public function recommendUser(string $id)
    {
        $user = User::findOrFail($id);

        $genres = $user->genres()->pluck('name');

        $history = $user->history()->pluck('track_artist');

        $playlist = collect($this->getPlaylist()['data']);

        $genre_list = $playlist->whereIn('genre', $genres);

        $history_list = $playlist->whereIn('artist', $history);

        $recommend = $genre_list->merge($history_list);

        return response()->json([
            'status' => 200,
            'data' => $recommend
        ]);
    }
}
