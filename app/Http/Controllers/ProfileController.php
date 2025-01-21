<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Role;
use App\Traits\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    use File;
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = request()->user();

        $validated = $request->validate([
            "profile" => "image|max:2048",
            "first_name" => "required|alpha:ascii",
            "last_name" => "required|alpha:ascii",
            "email" => ["required", "email", Rule::unique('users')->ignore($user->id)],
            "phone_number" => "required|numeric",
            "address" => "required"
        ]);

        try {
            $userRole = Role::where("name", "user")->first();

            $requestData = [
                "first_name" => $validated['first_name'],
                "last_name" => $validated['last_name'],
                "email" => $validated['email'],
                "address" => $validated['address'],
                "phone_number" => $validated['phone_number'],
                "role_id" => $userRole->id
            ];

            if ($request->hasFile("profile")) {
                $oldProfile = "images/profile/" . $user->profile_img;
                $profile = $request->file("profile");
                $profileURL = $this->Upload($profile, "images/profile");

                if (!$profileURL) {
                    return redirect()->back()->WithError("Profile gagal di upload");
                }

                if ($user->profile_img != "profile.png") {
                    $this->DeleteFile($oldProfile);
                }

                $requestData['profile_img'] = $profileURL;
            }

            $user->update($requestData);

            return to_route('profile.edit')->with("message", "Profile tersimpan");
        } catch (\Exception $err) {
            dd($err);
            return redirect()->back()->withError("User gagal diperbaharui");
        }
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
