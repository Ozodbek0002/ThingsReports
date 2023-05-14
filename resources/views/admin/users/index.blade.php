@extends('Admin.master')
@section('content')

    <div class="col-md-12">
        <div class="card">

            <div class="card-header">

                <div class="row ">

                    <div class="col-md-3"><h1 class="card-title"> Hodimlar </h1></div>

                    <div class="col-md-6">

                        <form action="/" method="post">
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
                        <a class="btn btn-primary" href="{{route('admin.users.create')}}">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Hodim qo'shish
                        </a>
                    </div>

                </div>

                <hr>

                <div class="card-body">

                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="" scope="col">T/R</th>
                            <th class="" scope="col"> Ism Familiyasi</th>
                            <th class="" scope="col"> Rasmi</th>
                            <th class="" scope="col"> Telefon raqami</th>
                            <th class="" scope="col"> Lavozimi </th>
                            <th class="" scope="col"> Bo'limi </th>
                            <th class="" scope="col"> Amallar </th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $ind=>$user)
                            <tr>
                                {{--                                <td class="col-1">{{($users->currentpage()-1)*($users->perpage())+$ind+1}}</td>--}}

                                <td class="col-1">{{ $ind+1 }}</td>

                                <td>{{ $user->name  }}</td>

                                <td>
                                    <img src="{{asset('users/'.$user->image)}}" alt="" width="100px" height="100px">
                                </td>

                                <td>{{ $user->phone }}</td>

                                <td>{{ $user->role->name }}</td>

                                <td>{{ $user->department->name }}</td>


                                <td class="col-2">

                                        <a class="btn btn-success btn-sm"
                                           href="{{ route('admin.users.show',$user->id) }}">
                                            <span class="btn-label">
                                                  <i class="bx bxs-show"></i>
                                            </span>
                                        </a>


                                    @if( auth()->user()->id ==1 )

                                        <a class="btn btn-warning btn-sm"
                                           href="{{ route('admin.users.edit',$user->id) }}">
                                            <span class="btn-label">
                                                <i class="bx bx-pen"></i>
                                            </span>
                                        </a>


                                        @if($user->id!=1)

                                            <button data-bs-toggle="modal" data-bs-target="#deleteModal{{$user->id}}"
                                                    type="button" class="btn btn-danger  btn-sm">
                                                <span class="btn-label">
                                                    <i class="bx bx-trash"></i>
                                                </span>
                                            </button>

                                        @endif

                                    @endif




                                    {{-- Delete  Modals--}}
                                    <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-3" id="exampleModalLabel">Haqiqatdan ham
                                                        ushbu Hodimni
                                                        o'chirib tashlamoqchimisiz ?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>

                                                <form action="{{route('admin.users.destroy',$user->id)}}" method="post">
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


                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>

                    {{--                    <div class="container">--}}
                    {{--                        <div class="row justify-content-center">--}}

                    {{--                            @if ($users->links())--}}
                    {{--                                <div class="mt-4 p-4 box has-text-centered">--}}
                    {{--                                    {{ $users->links() }}--}}
                    {{--                                </div>--}}
                    {{--                            @endif--}}

                    {{--                        </div>--}}
                    {{--                    </div>--}}


                </div>

            </div>
        </div>
    </div>

@endsection

