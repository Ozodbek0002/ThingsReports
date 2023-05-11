@extends('Admin.master')
@section('content')

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">Yagi Hodim </h1></div>
                </div>

                <hr>

                <div class="card-body">


                    <form action="{{route('admin.users.store')}}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @csrf


                        {{--                        Name--}}
                        <div class="form-group ">
                            <label for=""> Hodim nomi </label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <br>

                        {{--                        Image--}}
                        <div class="form-group ">
                            <label class="text text-primary" for="file"> Rasm yuklang </label>
                            <input type="file" value="{{old('image')}}" id="image" class="form-control" name="image">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <br>

                        {{--Phone --}}
                        <div class="form-group ">
                            <label for="author">Telefon raqami</label>
                            <input type="number" value="{{old('phone')}}" class="form-control" name="phone">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <br>

                        {{--                        Role--}}
                        <div class="form-group ">
                            <label for=""> Lavozimi </label>
                            <select name="role_id" value="{{old('role_id')}}" class="form-control">
                                @foreach($roles as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <br>

                        {{--                        Departments--}}
                        <div class="form-group ">
                            <label for=""> Lavozimi </label>
                            <select name="department_id" value="{{old('department_id')}}" class="form-control">
                                @foreach($departments as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <br>

                        {{--                        Email--}}
                        <div class="form-group ">
                            <label for="author">Emaili</label>
                            <input type="email" value="{{old('email')}}" class="form-control" name="email">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <br>

                        {{--                        Password--}}
                        <div class="form-group ">
                            <label for="author">Paroli</label>
                            <input type="password" value="{{old('password')}}" class="form-control" name="password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <br>

                        <button type="submit" id="alert" class="btn btn-primary ">Saqlash</button>
                        <input type="reset" class="btn btn-danger" value="Tozalash">


                    </form>


                </div>
            </div>
        </div>

    </div>

@endsection

@if(session('success'))

    <script>
        swal({
            icon: 'success',
            text: 'Muvaffaqqiyatli bajarildi',
            confirmButtonText: 'Continue',
        })
    </script>

@endif



