@extends('Admin.master')
@section('content')

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">Yagi mahsulot </h1></div>
                </div>

                <hr>

                <div class="card-body">



                    <form action="{{route('admin.products.store')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf


{{--                        Name--}}
                        <div class="form-group ">
                            <label for=""> Mahsulot nomi </label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <br>
{{--                        Departments--}}
                        <div class="form-group ">
                            <label > Bo'limni tanlang  </label>
                            <select name="department_id" id="selectedDepartment"  class="form-control">
                                <option value=""> Tanlang</option>

                                @foreach($departments as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach

                            </select>

                        </div>


                        <br>
                        {{--                        Users--}}
                        <div class="form-group ">
                            <label for=""> Masul inson  </label>
                            <select name="user_id" id="department_users" class="form-control">
                                <option value=""> Tanlang</option>
                            </select>

                        </div>


                          <br>
                        {{--                        Rooms--}}
                        <div class="form-group ">
                            <label for=""> Kerakli xona  </label>
                            <select name="room_id" id="user_rooms" class="form-control" required>
                                <option value=""> Tanlang</option>
                            </select>
                        </div>





                        <br>
                        {{--                        Kategory--}}
                         <div class="form-group ">
                            <label for=""> Kategoriyasi </label>
                            <select name="category_id"  value="{{old('category_id')}}" class="form-control">
                                @foreach($categories as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <br>
{{--                        Unit--}}
                         <div class="form-group ">
                            <label for=""> Birligi </label>
                            <select name="unit_id"  value="{{old('unit_id')}}" class="form-control">
                                @foreach($units as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            @error('unit_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <br>
                        {{--                        Amount--}}
                        <div class="form-group ">
                            <label for="author">Miqdori</label>
                            <input type="number" value="{{old('amount')}}" class="form-control" name="count">
                            @error('amount')
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
{{--                        Code--}}
                        <div class="form-group ">
                            <label for="author">Interval no`mer</label>
                            <input type="number" value="{{old('code')}}"  class="form-control" name="code">
                            @error('code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <br>
                        <br>

                        <button type="submit" id="alert" class="btn btn-primary " onclick="end()">Saqlash</button>
                        <input type="reset" class="btn btn-danger" value="Tozalash">


                    </form>


                </div>
            </div>
        </div>

    </div>


@endsection

@section('script')

    <script>

        $('#selectedDepartment').change(function () {
            var selectedDepartmentId = $(this).val();


            $.ajax({
                url: "{{route('admin.department-user','')}}" + "/" + selectedDepartmentId,
                type: 'GET',
                dataType: 'json',
                success: function (users) {
                    $('#department_users').empty();
                    // Add an option for each product returned from the server
                    $.each(users, function (index, user) {
                        $('#department_users').append('<option value="' + user.id + '">' + user.name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    $('#department_users').empty();
                }
            });
        });


         $('#department_users').change(function () {
            var selectedUserId = $(this).val();


            $.ajax({
                url: "{{route('admin.user-rooms','')}}" + "/" + selectedUserId,
                type: 'GET',
                dataType: 'json',
                success: function (rooms) {
                    $('#user_rooms').empty();
                    // Add an option for each product returned from the server
                    $.each(rooms, function (index, room) {
                        $('#user_rooms').append('<option value="' + room.id + '">' + room.name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    $('#user_rooms').empty();
                }
            });
        });




    </script>

@endsection



