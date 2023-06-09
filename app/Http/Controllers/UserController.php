<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users,
        ]);
    }


    public function create()
    {
        Gate::authorize('user', auth()->user());

        $roles = Role::all()->except(1);
        $departments = Department::all();
        return view('admin.users.create', [
            'roles' => $roles,
            'departments' => $departments,
        ]);
    }


    public function store(Request $request, User $user)
    {
        Gate::authorize('user', auth()->user());
        $data = new User();

        $user = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'role_id' => 'required',
            'department_id' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'min:8',],
            'phone' => 'required|digits:9',
        ], [
            'name.required' => 'Iltimos hodim ism familiyasini yozing .',
            'image.required' => 'Iltimos rasm yuklang.',
            'role_id.required' => 'Iltimos hodim lavozimini tanlang.',
            'department_id.required' => 'Iltimos hodim bo`limini tanlang.',
            'email.required' => 'Iltimos emailni toliq yozing.',
            'email.unique:users' => 'Bu email allaqachon ro`yhatdan o`tgan ',
            'password.required' => 'Iltimos parolni  yozing.',
            'phone.required' => 'Iltimos hodim telefon raqamini yozing.',
        ]);

        $data->name = $user['name'];
        $data->role_id = $user['role_id'];
        $data->department_id = $user['department_id'];
        $data->email = $user['email'];
        $data->password = Hash::make($user['password']);
        $data->phone = $user['phone'];

        $imagename = $request->file('image')->getClientOriginalName();
        $request->image->move('users', $imagename);
        $data->image = $imagename;


        $data->save();

        return redirect()->route('admin.users')->with('msg', 'Hodim muvaffaqiyatli qo`shildi.');

    }


    public function show(string $id)
    {
        $user = User::find($id);
        return view('admin.users.show', [
            'user' => $user,
        ]);
    }




    public function edit(User $user)
    {
        Gate::authorize('user', auth()->user());

        $roles = Role::all();
        $departments = Department::all()->except(1);
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles,
            'departments' => $departments,
        ]);
    }


    public function update(Request $request, User $user)
    {
        $new = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
            'department_id' => 'required',
            'phone' => 'required|digits:9',
        ], [
            'name.required' => 'Iltimos hodim ism familiyasini yozing .',
            'email.required' => 'Iltimos emailni toliq yozing.',
            'email.unique:users' => 'Bu email allaqachon ro`yhatdan o`tgan ',
            'phone.required' => 'Iltimos hodim telefon raqamini yozing.',
            'role_id.required' => 'Iltimos hodim lavozimini tanlang.',
            'department_id.required' => 'Iltimos hodim bo`limini tanlang.',

        ]);

        $user->name = $new['name'];
        $user->role_id = $new['role_id'];
        $user->department_id = $new['department_id'];
        $user->email = $new['email'];
        if( $request->password != null ){
            $user->password = Hash::make($request->password);
        }
        $user->phone = $new['phone'];

        if ($request->image != null) {

            $image_path = public_path("users/{$user->image}");

            if (User::exists($image_path)) {
                File::delete($image_path);
            }

            $imagename = $request->file('image')->getClientOriginalName();
            $request->image->move('users', $imagename);
            $user->image = $imagename;

        };


        $user->save();
        return redirect()->route('admin.users')->with('msg', 'Hodim muvaffaqiyatli tahrirlandi.');


    }


    public function destroy(User $user)
    {
        Gate::authorize('user', auth()->user());

        $image_path = public_path("users/{$user->image}");

        if (User::exists($image_path)) {
            File::delete($image_path);
        }
        $user->delete();
        return redirect()->back()->with('msg', 'hodim muavvaqiyatli o`chirildi');
    }

}
