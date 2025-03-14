<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Traits\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{
    use File;

    public function IndexPage(Request $request)
    {
        $search = $request->query("search");

        $userLogin = Auth::user()->id;
        $users = User::whereNot("id", $userLogin)->where(function ($query) use ($search) {
            $query->where("first_name", "like", "%" . $search . "%")->orWhere("last_name", "like", "%" . $search . "%");
        })->paginate(5);

        $users->appends(['search' => $search]);

        return view('dashboard.user.index', compact('users'));
    }

    public function CreatePage()
    {
        return view('dashboard.user.create');
    }

    public function EditPage(User $user)
    {
        return view('dashboard.user.edit', compact('user'));
    }

    public function UserCreate(Request $request)
    {
        $validated = $request->validate([
            "profile" => "image|max:2048",
            "first_name" => "required|alpha:ascii",
            "last_name" => "required|alpha:ascii",
            "email" => "required|email|unique:" . User::class,
            "password" => ["required", Password::min(8)],
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
                "password" => Hash::make($validated['password']),
                "role_id" => $userRole->id
            ];

            if ($request->hasFile("profile")) {
                $profile = $request->file("profile");
                $profileURL = $this->Upload($profile, "images/profile");

                if (!$profileURL) {
                    return redirect()->back()->WithError("Profile gagal di upload");
                }

                $requestData['profile_img'] = $profileURL;
            }

            User::create($requestData);

            return to_route('dashboard.users.index')->with("message", "User berhasil ditambahkan");
        } catch (\Exception $err) {
            return redirect()->back()->withError("User gagal ditambahkan");
        }
    }

    public function DeleteUser(User $user)
    {
        $profileImg = "images/thumbnail/" . $user->profile_img;
        try {
            DB::beginTransaction();

            $user->delete();

            if ($profileImg != "profile.png") {
                $isDeleted = $this->DeleteFile($profileImg);

                if (!$isDeleted) {
                    throw new Exception("Failed delete image");
                }
            }

            DB::commit();

            return response()->json([
                "message" => "User removed"
            ], 200);
        } catch (\Exception $err) {
            DB::rollBack();
            return response()->json([
                "message" => "Failed remove User"
            ], 500);
        }
    }

    public function UpdateUser(Request $request, User $user)
    {
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

            return to_route('dashboard.users.index')->with("message", "User berhasil diperbaharui");
        } catch (\Exception $err) {
            dd($err);
            return redirect()->back()->withError("User gagal diperbaharui");
        }
    }
}
