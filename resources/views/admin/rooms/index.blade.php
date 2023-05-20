@extends('Admin.master')
@section('content')

    <div class="col-md-12">
        <div class="card">

            <div class="card-header">

                <div class="row ">

                    <div class="col-md-3"><h1 class="card-title"> Xonalar </h1></div>

                    <div class="col-md-6">

                        <form action="{{route('admin.SearchRooms')}}"  method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Qidirish...">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <a class="btn ">
                            <button data-bs-toggle="modal" data-bs-target="#addModal"
                                    type="button" class="btn btn-success  btn-sm">
                                <span class="btn-label">
                                    <i class="bx bx-add-to-queue"></i>
                                </span>
                            </button>
                            Xona qo'shish
                        </a>
                    </div>


                    <div>


                    </div>


                </div>

                <hr>

                <div class="card-body">

                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="" scope="col">T/R</th>
                            <th class="" scope="col"> Nomi </th>
                            <th class="" scope="col"> Masul  </th>
                            <th class="" scope="col"> Bo'lim  </th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($rooms as $ind=>$room)
                            <tr>

                                <td class="col-1">{{ $ind+1 }}</td>

                                <td>{{ $room->name  }}</td>

                                <td>{{ $room->user->name  }}</td>

                                <td>{{ $room->user->department->name  }}</td>


                                <td class="col-2">


                                    <button data-bs-toggle="modal" data-bs-target="#editModal{{$room->id}}"
                                            type="button" class="btn btn-warning  btn-sm">
                                                <span class="btn-label">
                                                    <i class="bx bx-pen"></i>
                                                </span>
                                    </button>


                                    <button data-bs-toggle="modal" data-bs-target="#deleteModal{{$room->id}}"
                                            type="button" class="btn btn-danger  btn-sm">
                                                <span class="btn-label">
                                                    <i class="bx bx-trash"></i>
                                                </span>
                                    </button>


                                    {{-- Delete  Modals--}}
                                    <div class="modal fade" id="deleteModal{{$room->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-3" id="exampleModalLabel">Haqiqatdan ham
                                                        ushbu Xonani
                                                        o'chirib tashlamoqchimisiz ?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>

                                                <form action="{{route('admin.rooms.destroy',$room->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Yopish
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">O'chirish</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>


                                    {{--                                    Edit Modals--}}
                                    <div class="modal fade" id="editModal{{$room->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-3" id="exampleModalLabel"> Kategoriyani
                                                        tahrirlang </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>

                                                <form action="{{route('admin.rooms.update',$room->id)}}" method="POST"
                                                      accept-charset="UTF-8" method="post"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group">
                                                        <label for="title"> Xona nomi </label>
                                                        <input type="text" id="title" name="name"
                                                               value="{{$room->name}}" class="form-control" required>
                                                    </div>


                                                    <br>

                                                    <button type="submit" id="alert" class="btn btn-primary ">Saqlash
                                                    </button>
                                                    <input type="reset" class="btn btn-danger" value="Tozalash">


                                                </form>

                                            </div>
                                        </div>
                                    </div>


                                </td>


                            </tr>
                        @endforeach

                        </tbody>

                        {{--                        Create Modal--}}
                        <div class="modal fade" id="addModal" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content container">

                                    <div class="modal-header">
                                        <h1 class="modal-title fs-3" id="exampleModalLabel"> Yangi Xona </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>

                                    <form action="{{route('admin.rooms.store')}}" method="POST" accept-charset="UTF-8"
                                          enctype="multipart/form-data">
                                        @csrf

{{--                                        Name--}}
                                        <div class="form-group ">
                                            <label for=""> Xona nomi </label>
                                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <br>
{{--                                        Departments--}}
                                        <div class="form-group ">
                                            <label> Bo'limni tanlang </label>
                                            <select name="department_id" id="selectedDepartment" class="form-control">
                                                <option value=""> Tanlang</option>

                                                @foreach($departments as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach

                                            </select>

                                        </div>


                                        <br>
                                        {{--                        Users--}}
                                        <div class="form-group ">
                                            <label for=""> Masul inson </label>
                                            <select name="user_id" id="department_users" class="form-control">
                                                <option value=""> Tanlang </option>
                                            </select>

                                        </div>



                                        <br>
                                        <br>

                                        <button type="submit" id="alert" class="btn btn-primary ">Saqlash</button>
                                        <input type="reset" class="btn btn-danger" value="Tozalash">


                                    </form>


                                </div>

                            </div>
                        </div>

                    </table>


                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>

        // Departments` Users
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


    </script>

@endsection


