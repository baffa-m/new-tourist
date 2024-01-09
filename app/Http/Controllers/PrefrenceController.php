<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrefrenceController extends Controller
{
    public function edit()
    {
        // Retrieve the current user's preferences
        $userPreferences = auth()->user()->preferences;

        return view('preferences.edit', compact('userPreferences'));
    }

    public function update(Request $request)
    {

        // Validate and update the preferences
        $validatedData = $request->validate([
            'historic' => 'nullable|boolean',
            'shopping' => 'nullable|boolean',
            'nature_wildlife' => 'nullable|boolean',
            'parks' => 'nullable|boolean',
            'sports' => 'nullable|boolean',
        ]);


        $user = auth()->user();
        $preferences = $user->preferences;


        if (!$preferences) {
            // If preferences don't exist, create a new instance
            $preferences = new \App\Models\Preference();
            $preferences->user_id = $user->id;
        }

            $preferences->historic = $validatedData['historic'];
            $preferences->shopping = $validatedData['shopping'];
            $preferences->nature_wildlife = $validatedData['nature_wildlife'];
            $preferences->parks = $validatedData['parks'];
            $preferences->sports = $validatedData['sports'];

            $preferences->save();

        return redirect()->back()->with('success', 'Preferences updated successfully.');
    }

}
