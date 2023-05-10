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

{{--                    <div class="col-md-3">--}}
{{--                        <a class="btn btn-primary" href="{{route('admin.categories.create')}}">--}}
{{--                            <span class="btn-label">--}}
{{--                                <i class="fa fa-plus"></i>--}}
{{--                            </span>--}}
{{--                            Hodim qo'shish--}}
{{--                        </a>--}}
{{--                    </div>--}}


                    <button data-bs-toggle="modal" data-bs-target="#addModal"
                            type="button" class="btn btn-success  btn-sm">
                                <span class="btn-label">
                                    <i class="bx bx-add-to-queue"></i>
                                </span>
                    </button>



                </div>

                <hr>

                <div class="card-body">

                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="" scope="col">T/R</th>
                            <th class="" scope="col"> Nomi</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $ind=>$category)
                            <tr>

                                <td class="col-1">{{ $ind+1 }}</td>

                                <td>{{ $category->name  }}</td>


                                <td class="col-2">

                                    <a class="btn btn-warning btn-sm"
                                       href="{{ route('admin.categories.edit',$category->id) }}">
                                            <span class="btn-label">
                                                <i class="bx bx-pen"></i>
                                            </span>
                                    </a>


                                    <button data-bs-toggle="modal" data-bs-target="#deleteModal{{$category->id}}"
                                            type="button" class="btn btn-danger  btn-sm">
                                                <span class="btn-label">
                                                    <i class="bx bx-trash"></i>
                                                </span>
                                    </button>


                                    {{-- Delete  Modals--}}
                                    <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-3" id="exampleModalLabel">Haqiqatdan ham
                                                        ushbu Kategoriyani
                                                        o'chirib tashlamoqchimisiz ?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>

                                                <form action="{{route('admin.categories.destroy',$category->id)}}" method="post">
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

                        <div class="modal fade" id="addModal" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-3" id="exampleModalLabel">Haqiqatdan ham
                                            ushbu Kategoriyani
                                            o'chirib tashlamoqchimisiz ?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>

                                    <form action="{{route('admin.categories.store')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group ">
                                            <label for=""> Hodim nomi </label>
                                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <br>

                                        <button type="submit" id="alert" class="btn btn-primary " >Saqlash</button>
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


