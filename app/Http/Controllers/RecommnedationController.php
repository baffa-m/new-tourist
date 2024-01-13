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

            // Query recommended destinations based on user preferences
            $recommendedDestinations = $this->getRecommendedDestinations($preferences);
        } else {
            // For unauthenticated users or users without preferences
            // Set recommended destinations to null
            $recommendedDestinations = null;
        }
        if ($recommendedDestinations->isEmpty()) {
            $recommendedDestinations = null;
        }

        $trending_destinations = Destination::take(4)->get();
        $new_destinations = Destination::orderBy('created_at')->take(4)->get();

        // Return the recommended destinations
        return view('dashboard', compact('recommendedDestinations', 'trending_destinations', 'new_destinations'));
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
        ->inRandomOrder()
        ->limit(5)
        ->get();
    }
}
