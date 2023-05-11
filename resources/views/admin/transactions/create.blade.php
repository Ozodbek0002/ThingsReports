@extends('admin.master')
@section('content')

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">Yagi Aperatsiya </h1></div>
                </div>

                <hr>

                <div class="card-body">


                    <form action="{{route('admin.transactions.store')}}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @csrf


                        <div class="form-group ">
                            <label for=""> Aperatsiya nomi </label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <br>
                        <br>


                        <div class="form-group ">
                            <label for=""> Kimdan </label>
                            <select name="from_user_id" id="from_user" value="{{old('from_user_id')}}"
                                    class="form-control">
                                <option value="0"> Tanlang</option>
                                @foreach($users as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            @error('from_user_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <br>
                        <br>


                        <div class="form-group ">
                            <label for=""> Mahsulot </label>
                            <select name="product_id" id="user_products" value="{{old('product_id')}}"
                                    class="form-control">
                                <option value=""> Tanlang</option>
                            </select>
                            @error('product_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <br>
                        <br>


                        <div class="form-group ">
                            <label for=""> Kimga </label>
                            <select name="to_user_id" id="to_user" value="{{old('to_user_id')}}" required
                                    class="form-control">
                                <option value="">Tanlang</option>
                            </select>
                            @error('to_user_id')
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

@section('script')

    <script>

        $('#from_user').change(function () {
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
                url: "{{route('admin.user-products','')}}" + "/" + selectedUserId,
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


    </script>

@endsection




