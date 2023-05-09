@extends('Admin.master')
@section('content')

    <div class="col-md-12">
        <div class="card">

            <div class="card-header">

                <div class="row ">

                    <div class="col-md-3"><h1 class="card-title"> Mahsulotlar </h1></div>

                    <div class="col-md-6">

{{--                        <form action="{{route('admin.search')}}" method="post">--}}
{{--                            @csrf--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" name="search" class="form-control" placeholder="Qidirish...">--}}
{{--                                <button class="btn btn-primary" type="submit">--}}
{{--                                    <i class="fa fa-search"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </form>--}}

                    </div>

                    <div class="col-md-3">
                        <a class="btn btn-primary" href="{{route('admin.products.create')}}">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Mahsulot qo'shish
                        </a>
                    </div>

                </div>

                <hr>

                <div class="card-body">

                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="" scope="col">T/R</th>
                            <th class="" scope="col"> Nomi</th>
                            <th class="" scope="col"> Rasmi</th>
                            <th class="" scope="col"> Kategoriya</th>
                            <th class="" scope="col"> Soni</th>
                            <th class="" scope="col"> Sotildi</th>
                            <th class="" scope="col"> Ijarada</th>
                            <th class="" scope="col">Amallar</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $ind=>$product)
                            <tr>
                                <td class="col-1">{{($products->currentpage()-1)*($products->perpage())+$ind+1}}</td>
                                <td>{{ $product->name  }}</td>
                                <td>
                                    <img src="{{asset('books/'.$product->image)}}" alt="" width="100px" height="100px">
                                </td>
                                <td>{{ $product->category->name }}</td>

                                <td     @if($product->count==0) style="color: red" @endif >{{ $product->count }}</td>
                                <td>{{ $product->user()->name }}</td>
                                <td>{{ $product->unit()->name }}</td>
                                <td class="col-2">

                                    <button data-bs-toggle="modal" data-bs-target="#showModal{{$product->id}}"
                                            type="button" class="btn btn-success  btn-sm">
                                            <span class="btn-label">
                                                <i class="fa fa-eye"></i>
                                            </span>
                                    </button>
                                    <button data-bs-toggle="modal" data-bs-target="#deleteModal{{$product->id}}"
                                            type="button" class="btn btn-danger  btn-sm">
                                            <span class="btn-label">
                                                <i class="bx bx-trash"></i>
                                            </span>
                                    </button>

                                    <a class="btn btn-warning btn-sm"
                                       href="{{ route('admin.products.edit',$product->id) }}">
                                            <span class="btn-label">
                                                <i class="bx bx-pen"></i>
                                            </span>
                                    </a>


                                    {{-- Show  Modals--}}
{{--                                    <div class="modal fade" id="showModal{{$product->id}}" tabindex="-1"--}}
{{--                                         aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                        <div class="modal-dialog">--}}
{{--                                            <div class="modal-content">--}}
{{--                                                <table class="table table-bordered text-center">--}}
{{--                                                    <thead>--}}
{{--                                                    <tr>--}}
{{--                                                        <th class="" scope="col">Muallifi</th>--}}
{{--                                                        <th class="" scope="col"> Muqova</th>--}}
{{--                                                        <th class="" scope="col"> Narxi</th>--}}
{{--                                                        <th class="" scope="col"> Kunlik</th>--}}
{{--                                                        <th class="" scope="col"> Beti</th>--}}

{{--                                                    </tr>--}}
{{--                                                    </thead>--}}
{{--                                                    <tbody>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>{{ $product->author }}</td>--}}
{{--                                                        <td>{{ $product->cover->name }}</td>--}}
{{--                                                        <td>{{ $product->price }}</td>--}}
{{--                                                        <td>{{ $product->price_daily }}</td>--}}
{{--                                                        <td>{{ $product->page }}</td>--}}
{{--                                                    </tr>--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}

{{--                                                --}}{{--                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}



                                    {{-- Delete  Modals--}}
                                    <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-3" id="exampleModalLabel">Haqiqatdan ham
                                                        ushbu mahsulotni
                                                        o'chirib tashlamoqchimisiz ?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>

                                                <form action="{{route('admin.products.destroy',$product->id)}}" method="post">
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

                    <div class="container">
                        <div class="row justify-content-center">

                            @if ($products->links())
                                <div class="mt-4 p-4 box has-text-centered">
                                    {{ $products->links() }}
                                </div>
                            @endif

                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

@endsection

