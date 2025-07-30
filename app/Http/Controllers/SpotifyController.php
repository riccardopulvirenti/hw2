<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    public static function showPlaylist()
    {
        $client_id = env('SPOTIFY_CLIENT_ID');
        $client_secret = env('SPOTIFY_CLIENT_SECRET');

        $tokenResponse = Http::withOptions([
            'verify' => false,
        ])->asForm()->withHeaders([
            'Authorization' => 'Basic ' . base64_encode($client_id . ':' . $client_secret),
        ])->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
        ]);

        $access_token = $tokenResponse->json()['access_token'];

        $playlistResponse = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $access_token,
        ])->get('https://api.spotify.com/v1/playlists/4mVkHzurksl20rNwwJcdOG/tracks');

        $tracks = $playlistResponse->json()['items'];

        return $tracks;
    }
}
