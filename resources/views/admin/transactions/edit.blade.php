@extends('admin.master')
@section('content')

    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title"> Aperatsiyani tahrirlash </h1></div>
                </div>
                <hr>
                <div class="card-body">


                    <form action="{{route('admin.transactions.update',$history->id )}}" method="POST" accept-charset="UTF-8"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


{{--                        Name--}}
                        <div class="form-group ">
                            <label for=""> Aperatsiya nomi </label>
                            <input type="text" name="name" value="{{ $history->name }}" class="form-control">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <br> <br>


{{--                        From User --}}
                        <div class="form-group ">
                            <label for=""> Kimdan </label>
                            <select name="from_room_id" id="department_users"  class="form-control">
                                <option style="background-color: #696CFF; color: white" > {{ $history->fromRoom->user->name }} </option>
                                @foreach($users as $c)
                                    @if($c->id != $history->fromRoom->user->id)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>

                        <br>
                        {{--                        Rooms--}}
                        <div class="form-group ">
                            <label for=""> Xonadan </label>
                            <select name="from_room_id" id="user_rooms" class="form-control" required>
                                <option value="{{$history->from_room_id}}"> {{ $history->fromRoom->name }} </option>
                                <option value=""> Tanlang </option>
                            </select>
                        </div>



                        <br> <br>

{{--                        What--}}
                        <div class="form-group ">
                            <label for=""> Mahsulot </label>
                            <select name="product_id" id="user_products" value="" required  class="form-control">
                                <option value="{{ $history->product_id }}"> {{ $history->product->name }} </option>

                            </select>

                        </div>

                        <br> <br>

{{--                        To User--}}
                        <div class="form-group ">
                            <label for=""> Kimga </label>
                            <select name="to_room_id" id="to_user"  class="form-control">
                                <option value=""> {{ $history->toRoom->user->name }} </option>
                            </select>
                        </div>


                        <br>
                        {{--                        Rooms--}}
                        <div class="form-group ">
                            <label for=""> Xonaga </label>
                            <select name="to_room_id" id="to_user_rooms" class="form-control" required>
                                <option value="{{ $history->to_room_id }}"> {{ $history->toRoom->name }} </option>
                                <option value=""> Tanlang</option>
                            </select>
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

@section('script')

    <script>

        // Users` Rooms
        $('#department_users').change(function () {
            var selectedUserId = $(this).val();
            var users =@json($users);

            var otherUsers = users.filter(function (user) {
                return user.id != selectedUserId;
            });

            $('#to_user').empty();
            // Add an option for each product returned from the server
            $.each(otherUsers, function (index, user) {
                $('#to_user').append('<option value="' + user.id + '">' + user.name + '</option>');
            });


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


        // Room`s Products
        $('#user_rooms').change(function () {
            var selectedRoomId = $(this).val();

            $.ajax({
                url: "{{route('admin.room-products','')}}" + "/" + selectedRoomId,
                type: 'GET',
                dataType: 'json',
                success: function (products) {
                    $('#user_products').empty();
                    // Add an option for each product returned from the server
                    $.each(products, function (index, product) {
                        $('#user_products').append('<option value="' + product.id + '">' + product.name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    $('#user_products').empty();
                }
            });

        });


        // OtherUsers` Rooms
        $('#to_user').change(function () {
            var selectedUserId = $(this).val();


            $.ajax({
                url: "{{route('admin.user-rooms','')}}" + "/" + selectedUserId,
                type: 'GET',
                dataType: 'json',
                success: function (rooms) {
                    $('#to_user_rooms').empty();
                    // Add an option for each product returned from the server
                    $.each(rooms, function (index, room) {
                        $('#to_user_rooms').append('<option value="' + room.id + '">' + room.name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    $('#to_user_rooms').empty();
                }
            });
        });


    </script>


@endsection






