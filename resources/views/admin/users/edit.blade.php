@extends('Admin.master')
@section('content')

    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">Hodim tahrirlash </h1></div>
                </div>
                <hr>
                <div class="card-body">

                    <form action="{{route('admin.users.update',$user->id)}}" method="POST" accept-charset="UTF-8"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title"> Hodim nomi </label>
                            <input type="text" id="title" name="name" value="{{$user->name}}" class="form-control"
                                   required>
                        </div>

                        <br>


                        {{--                        Role--}}
                        <div class="form-group ">
                            <label for=""> Lavozimi </label>
                            <select name="role_id"  class="form-control">
                                <option value="{{$user->role_id}}" style="color: blue">
                                    {{ $user->role->name }}
                                </option>
                                @foreach($roles as $c)
                                    @if($user->role->id != $c->id)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endif
                                @endforeach

                            </select>
                            @error('role_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <br>

                        {{--                        Departments--}}
                        <div class="form-group ">
                            <label for=""> Bo'limi </label>
                            <select name="department_id"  class="form-control">

                                <option value="{{$user->department_id}}" style="color: blue">
                                    {{ $user->department->name }}
                                </option>
                                @foreach($departments as $c)
                                    @if($user->department->id != $c->id)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('department_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <br>

                        {{--                        Image--}}

                        <div class="form-group">
                            <label class="text text-primary" for="image"> Rasm yuklang </label>
                            <input type="file" id="image" class="form-control" name="image">
                        </div>

                        <br>

                        {{--                        Phone--}}
                        <div class="form-group">
                            <label for="author"> Telefon raqami </label>
                            <input type="number" name="phone" value="{{$user->phone}}" class="form-control "
                                   id="author">
                        </div>

                        <br>
                        {{--                        Email--}}
                        <div class="form-group">
                            <label for="author"> Emaili </label>
                            <input type="email" name="email" value="{{$user->email}}" class="form-control " id="author">
                        </div>

                        <br>

                        {{--                        Password--}}
                        <div class="form-group">
                            <label for="author"> Paroli </label>
                            <input type="password" name="password" value="{{$user->password}}" class="form-control "
                                   id="author">
                        </div>

                        <br>
                        <br>

                        <button type="submit" id="alert" class="btn btn-primary ">Saqlash</button>
                        <input type="reset" class="btn btn-danger" value="Tozalash">


                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection




