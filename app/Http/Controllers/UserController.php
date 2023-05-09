<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users'=>$users,
        ]);
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request, User $user)
    {
        $data = new User();

        $user = $request->validate([
            'name'=>'required',
            'image'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>['required',  'min:8', ],
            'position'=>'required',
            'phone'=>'required|digits:10',
        ],[
            'name.required'=>'Iltimos hodim ism familiyasini yozing .',
            'image.required'=>'Iltimos rasm yuklang.',
            'email.required'=>'Iltimos emailni toliq yozing.',
            'email.unique:users'=>'Bu email allaqachon ro`yhatdan o`tgan ',
            'password.required'=>'Iltimos parolni  yozing.',
            'password.min:6'=>'Parol 6 ta belgidan kam bo`masligi kerak.',
            'position.required'=>'Iltimos hodim lavozimini yozing.',
            'phone.required'=>'Iltimos hodim telefon raqamini yozing.',
            'phone.digits:9'=>'Telefon raqam faqat raqamlardan iborat bo`lishi kerak.',
        ]);

        $data->name = $user['name'];
        $data->email = $user['email'];
        $data->password = $user['password'];
        $data->position = $user['position'];
        $data->phone = $user['phone'];

        $imagename = $request->file('image')->getClientOriginalName();
        $request->image->move('users', $imagename);
        $data->image = $imagename;


        $data->save();

        return redirect()->route('admin.users')->with('msg', 'Hodim muvaffaqiyatli qo`shildi.');


    }


    public function show(string $id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',[ 'user'=>$user]);
    }


    public function update(Request $request, User $user)
    {
        $new = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>['required',  'min:8', ],
            'position'=>'required',
            'phone'=>'required|digits:9',
        ],[
            'name.required'=>'Iltimos hodim ism familiyasini yozing .',
            'email.required'=>'Iltimos emailni toliq yozing.',
            'email.unique:users'=>'Bu email allaqachon ro`yhatdan o`tgan ',
            'password.required'=>'Iltimos parolni  yozing.',
            'password.min:6'=>'Parol 6 ta belgidan kam bo`masligi kerak.',
            'position.required'=>'Iltimos hodim lavozimini yozing.',
            'phone.required'=>'Iltimos hodim telefon raqamini yozing.',
            'phone.digits:10'=>'Telefon raqam faqat raqamlardan iborat bo`lishi kerak.',
        ]);

        $user->name = $new['name'];
        $user->email = $new['email'];
        $user->password = $new['password'];
        $user->position = $new['position'];
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
        return redirect()->route('admin.users')->with('msg','Hodim muvaffaqiyatli tahrirlandi.');


    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('msg','hodim muavvaqiyatli o`chirildi');
    }
}
