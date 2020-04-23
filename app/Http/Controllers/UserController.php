<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use File;

use App\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function setting()
    {
        $userId = Auth::id();

        $user = User::where('id', $userId)
            ->first();

        return view('dashboard.account')
            ->with('user', $user);
    }

    public function update(Request $request)
    {
        $userId = Auth::id();

        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $userId,
            'avatar' => 'image|max:2048'
        ];

        $ruleMessages = [
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak sesuai',
            'email.unique' => 'Email sudah ada',
            'avatar.image' => 'Format avatar tidak sesuai',
            'avatar.max' => 'Avatar maksimum 2MB'
        ];

        $this->validate($request, $rules, $ruleMessages);

        $name = $request->name;
        $email = $request->email;
        $avatar = $request->avatar;

        $user = User::find($userId);

        DB::beginTransaction();
        try {
            if (!empty($avatar)) {
                $fileName = $avatar->getClientOriginalName();
                $fileExtension = $avatar->getClientOriginalExtension();

                $fileName = Str::replaceLast('.' . $fileExtension, '', $fileName);
                $fileName = 'users_' . Str::substr(Str::slug($fileName, '-'), 0, 180) . '.' . $fileExtension;
                $file_path = 'back/uploads/users/';

                $upload = $avatar->move($file_path, $fileName);

                if ($upload) {
                    $oldAvatar = $user->avatar;
                    File::delete('back/uploads/users/' . $oldAvatar);

                    $user->avatar = $fileName;
                }
            }

            $user->name = $name;
            $user->email = $email;

            $user->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
        }

        return redirect()
            ->back()
            ->with('success', 'Profil Berhasil Diubah');
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'password' => 'required|min:8',
            'new_password' => 'required|min:8|confirmed|different:password'
        ];

        $ruleMessages = [
            'password.requred' => 'Sandi lama harus diisi',
            'password.min' => 'Sandi lama minimal 8 karakter',
            'new_password.required' => 'Sandi baru harus diisi',
            'new_password.min' => 'Sandi baru minimal 8 karakter',
            'new_password.confirmed' => 'Sandi baru tidak cocok',
            'new_password.different' => 'Sandi baru harus berbeda'
        ];

        $this->validate($request, $rules, $ruleMessages);

        $oldPassword = $request->password;
        $newPassword = $request->new_password;
        $userId = Auth::id();

        $user = User::find($userId);

        if (Hash::check($oldPassword, $user->password)) {

            DB::beginTransaction();
            try {
                $user->password = Bcrypt($newPassword);

                $user->save();

                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                Log::error($e);
            }

            return redirect()
                ->back()
                ->with('success', 'Sandi telah diganti');
        } else {

            return redirect()
                ->back()
                ->with('error', 'Sandi tidak cocok');
        }
    }
}
