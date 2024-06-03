<?php

namespace App\Http\Controllers\API\V2;

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
        $this->subscriptionUrl = config('services.passport_subscription.url');
        $this->subscriptionKey = config('services.passport_subscription.key');
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
        ])->get("{$this->playlistUrl}/api/v2/playlist");

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

    public function getSubscription()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '. $this->subscriptionKey,
        ])->get("{$this->subscriptionUrl}/api/v2/subscription");

        return $response->json();
    }

    public function subscriptionUser(string $id)
    {
        $user = User::findOrFail($id);

        $subscribe = collect($this->getSubscription()['data']);

        $user->subscribeInfo = $subscribe->whereIn('user_id', $id);

        return response()->json([
            'status' => 200,
            'data' => $user
        ]);
    }
}
