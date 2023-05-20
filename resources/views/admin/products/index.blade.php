@extends('Admin.master')
@section('content')

    <div class="col-md-12">
        <div class="card">

            <div class="card-header">

                <div class="row ">

                    <div class="col-md-3"><h1 class="card-title"> Mahsulotlar </h1></div>

                    <div class="col-md-6">

                        <form action="{{route('admin.SearchProducts')}}" method="post">
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
                        <a class="btn btn-primary" href="{{route('admin.products.create')}}">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Mahsulot qo'shish
                        </a>
                    </div>

                    <div class=" container align-content-center">
                        <div class="col-md-6 ">

                            <form action="{{ route('admin.SearchProduct') }}" method="post">
                                @csrf
                                <div class="input-group">

                                    <input type="date" value="{{ $from_date ?? 0 }}" id="from_date" name="from_date"
                                           class="form-control" required>
                                    <input type="date" value="{{ $to_date ?? 0 }}" id="to_date" name="to_date"
                                           class="form-control" required>

                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>

                                    <button type="button" onclick="sendOptions()" class="btn btn-success "><i
                                            class="bx bx-file"></i>Hisobot
                                    </button>

                                </div>
                            </form>


                        </div>
                    </div>

                </div>

                <hr>

                <div class="card-body">

                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="" scope="col">T/R</th>
                            <th class="" scope="col"> Rasmi</th>
                            <th class="" scope="col"> Nomi</th>
                            <th class="" scope="col"> Masul hodim</th>
                            <th class="" scope="col"> Xona</th>
                            <th class="" scope="col"> Interval raqami</th>
                            <th class="" scope="col"> Qo'shilgan vaqt</th>
                            <th class="" scope="col">Amallar</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $ind=>$product)
                            <tr>
                                <td class="col-1">{{($products->currentpage()-1)*($products->perpage())+$ind+1}}</td>


                                <td>
                                    <img src="{{asset('products/'.$product->image)}}" alt="" width="100px"
                                         height="100px">
                                </td>

                                <td>{{ $product->name  }}</td>

                                <td>
                                    <a href="{{ route('admin.users.show',$user->id ?? $product->room->user->id) }}">
                                        {{ $user->name ?? $product->room->user->name }}
                                    </a>
                                </td>

                                @if($user==null)
                                    <td>
                                        <a href="{{ route('admin.rooms.show',$product->room->id) }}">
                                            {{ $product->room->name }}
                                        </a>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{ route('admin.rooms.show',$product->room_id) }}">
                                            {{ $product->room_id }}
                                        </a>
                                    </td>
                                @endif


                                <td>{{ $product->code }}</td>

                                <td>{{ $product->created_at }}</td>

                                <td class="col-2">

                                    <button data-bs-toggle="modal" data-bs-target="#showModal{{$product->id}}"
                                            type="button" class="btn btn-success  btn-sm">
                                            <span class="btn-label">
                                                <i class="bx bxs-show"></i>
                                            </span>
                                    </button>


                                    <a class="btn btn-warning btn-sm"
                                       href="{{ route('admin.products.edit',$product->id) }}">
                                            <span class="btn-label">
                                                <i class="bx bx-pen"></i>
                                            </span>
                                    </a>


                                    <button data-bs-toggle="modal" data-bs-target="#deleteModal{{$product->id}}"
                                            type="button" class="btn btn-danger  btn-sm">
                                            <span class="btn-label">
                                                <i class="bx bx-trash"></i>
                                            </span>
                                    </button>


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

                                                <form action="{{route('admin.products.destroy',$product->id)}}"
                                                      method="post">
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


                                    {{-- Show  Modals--}}
                                    <div class="modal fade" id="showModal{{$product->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <table class="table table-bordered text-center">
                                                    <thead>
                                                    <tr>
                                                        @if($user==null)
                                                            <th class="" scope="col"> Bo'lim</th>
                                                        @endif
                                                        <th class="" scope="col"> Kategoriya</th>
                                                        <th class="" scope="col"> Birligi</th>
                                                        <th class="" scope="col"> Miqdori</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>


                                                        @if($user==null)
                                                            <td>
                                                                <a href="{{ route('admin.departments.show',$product->room->user->department->id) }}">
                                                                    {{ $product->room->user->department->name }}
                                                                </a>
                                                            </td>

                                                            <td>
                                                                <a href="{{ route('admin.categories.show',$product->category_id) }}">
                                                                    {{ $product->category->name }}
                                                                </a>
                                                            </td>

                                                            <td>{{ $product->unit->name }}</td>

                                                        @else
                                                            <td>
                                                                <a href="{{ route('admin.categories.show',$product->category_id) }}">
                                                                    {{ $product->category_id }}
                                                                </a>
                                                            </td>

                                                            <td>{{ $product->unit_id }}</td>

                                                        @endif

                                                        <td> {{ $product->amount }} </td>


                                                    </tr>


                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>

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


@section('script')

    <script>

        function sendOptions() {

            let from_date = document.getElementById('from_date').value;
            let to_date = document.getElementById('to_date').value;

            console.log(from_date);
            console.log(to_date);

            let url = 'ReportProduct/' + from_date + '&' + to_date;
            window.open(url);
        }


    </script>

@endsection

