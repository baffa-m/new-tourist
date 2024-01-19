<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class RecommnedationController extends Controller
{
    public function recommendations(Request $request)
    {
        // Get the authenticated user
        $user = $request->user();

        // Check if the user is authenticated
        if ($user) {
            // Get user preferences if available
            $preferences = $user->preferences;

            $state = $user->state_id;

            // Query recommended destinations based on user preferences
            $recommendedDestinations = $this->getRecommendedDestinations($preferences);
        } else {
            // For unauthenticated users or users without preferences
            // Set recommended destinations to null
            $recommendedDestinations = null;
        }
        if ($recommendedDestinations != null) {
            if ($recommendedDestinations->isEmpty()) {
                $recommendedDestinations = null;
            }
        }

        if ($user) {
            $trending_destinations = Destination::where('state_id', $state)->take(6)->get();
            $new_destinations = Destination::orderBy('created_at', 'desc')->take(4)->get();
            $high_review_destination = Destination::withCount('reviews')
            ->where('state_id', $state)
            ->orderByDesc('reviews_count')
            ->first();


            // Return the recommended destinations
            return view('dashboard', compact('recommendedDestinations', 'trending_destinations', 'new_destinations', 'high_review_destination'));
        }

        $trending_destinations = Destination::all()->take(6);
        $new_destinations = Destination::orderBy('created_at', 'desc')->take(4)->get();

        return view('dashboard', compact('trending_destinations', 'new_destinations'));

    }

    /**
     * Get recommended destinations based on user preferences.
     *
     * @param  \App\Models\Preferences|null  $preferences
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    private function getRecommendedDestinations($preferences)
    {
        if (!$preferences) {
            return null;
        }

        return Destination::where(function ($query) use ($preferences) {
            $query->when($preferences->historic, function ($query) {
                    $query->orWhere('category', 'LIKE', 'historic');
                })
                ->when($preferences->shopping, function ($query) {
                    $query->orWhere('category', 'LIKE', 'shopping');
                })
                ->when($preferences->nature_wildlife, function ($query) {
                    $query->orWhere('category', 'LIKE', 'nature_wildlife');
                })
                ->when($preferences->parks, function ($query) {
                    $query->orWhere('category', 'LIKE', 'parks');
                })
                ->when($preferences->sports, function ($query) {
                    $query->orWhere('category', 'LIKE', 'sports');
                });

        })
        ->where('state_id', auth()->user()->state_id)
        ->inRandomOrder()
        ->limit(5)
        ->get();
    }
}
