<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Holiday;
use App\Models\Office;
use App\Models\Shift;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display title
     */
    function __construct()
    {
        return view()->share('title', 'Dashboard');
    }

    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        return view('dash.index');
    }

    /**
     * Display the specified resource.
     */
    public function profile()
    {
        $route_label = 'Profil';
        $user = Auth::user();
        
        $data = (object) [
            'username' => $user->username,
            'email' => $user->email,
            'id' => $user->id,
            'is_admin' => $user->role == 'superadmin' ? true : false,
        ];
        $profilepic = $user->avatar ? \Storage::url($user->avatar) : 'assets/images/users/user-dummy-img.jpg';
        return view('dash.profile', compact('data', 'route_label'))
            ->with('profilepic', $profilepic);
    }

    /**
     * Update the specified resource in storage.
     */
    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;

        $request->validate([
            'username' => 'required|string|alpha_num|max:255|unique:users,username,' . $id,
            'email' => 'required|string|max:255|unique:users,email,' . $id,
        ]);
        try {
            \DB::transaction(function () use ($request, $id) {
                $user = User::findOrFail($id);

                $user->username = $request->username;
                $user->email = $request->email;
                $user->save();
            });

            return redirect()->route("profile.index")->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Data gagal diperbarui: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function password()
    {
        $route_label = 'Pengaturan';
        return view('dash.password', compact('route_label'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function passwordUpdate(Request $request)
    {
        // Validate the request
        $request->validate([
            'password' => 'required|string|min:8|confirmed:confirm_password',
            'confirm_password' => 'required|string|min:8',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if (Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password baru tidak boleh sama dengan password lama.']);
        }

        try {
            $user->password = Hash::make($request->password);
            $user->save();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat mengubah password.' . $e->getMessage()]);
        }

        return redirect()->route('password.index')->with('success', 'Password berhasil diubah.');
    }

    /**
     * Upload avatar
     */
    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        try {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');

            // Optionally, delete the old avatar if exists
            if ($user->avatar) {
                \Storage::disk('public')->delete($user->avatar);
            }

            $user->avatar = 'avatars/' . basename($avatarPath);
            $user->save();

            return response()->json(['success' => true, 'avatar_url' => \Storage::url($user->avatar)]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Terjadi kesalahan saat mengunggah foto: ' . $e->getMessage()]);
        }
    }
}
