@extends('Admin.master')
@section('content')

    <div class="col-md-12">
        <div class="card">

            <div class="card-header">

                <div class="row ">

                    <div class="col-md-3"><h1 class="card-title"> Operatsiyalar </h1></div>

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
                        <a class="btn btn-primary" href="{{route('admin.transactions.create')}}">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Yangi operatsiya
                        </a>
                    </div>


                    <div class=" container align-content-center">
                        <div class="col-md-6 ">

                            <form action="{{ route('admin.SearchHistory') }}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="date" name="from_date" class="form-control" placeholder="Qachondan">
                                    <input type="date" name="to_date" class="form-control" placeholder="Qachongacha">

                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>

                                    </button>

                                </div>
                            </form>


                        </div>
                    </div>

                    <div class=" container align-content-center">
                        <div class="col-md-6 ">

                            <form action="{{ route('admin.ReportHistory') }}" method="post">
                                @csrf
                                <div class="input-group">

                                    <input type="date" name="from_date" id="from_date" class="form-control"
                                           placeholder="Qachondan">
                                    <input type="date" name="to_date" id="to_date" class="form-control"
                                           placeholder="Qachongacha">

                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-file-text"></i>
                                        Hisobot
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
                            <th class="" scope="col"> Nomi</th>
                            <th class="" scope="col"> Kimdan</th>
                            <th class="" scope="col"> Xonadan</th>
                            <th class="" scope="col"> Mahsulo t</th>
                            <th class="" scope="col"> Kimga</th>
                            <th class="" scope="col"> Xonaga</th>
                            <th class="" scope="col"> Vaqti</th>
                            <th class="" scope="col"> Amallar</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($histories as $ind=>$history)
                            <tr>
                                <td class="col-1">{{($histories->currentpage()-1)*($histories->perpage())+$ind+1}}</td>


                                <td>{{ $history->name  }}</td>

                                <td>{{ $history->fromRoom->user->name }}</td>

                                <td>{{ $history->fromRoom->name }}</td>


                                <td>{{ $history->product->name }}</td>


                                <td>{{ $history->toRoom->user->name }}</td>

                                <td>{{ $history->toRoom->name }}</td>


                                <td>{{ $history->created_at }}</td>

                                <td class="col-2">

                                    <a class="btn btn-warning btn-sm"
                                       href="{{ route('admin.transactions.edit',$history->id) }}">
                                            <span class="btn-label">
                                                <i class="bx bx-pen"></i>
                                            </span>
                                    </a>


                                    <button data-bs-toggle="modal" data-bs-target="#deleteModal{{$history->id}}"
                                            type="button" class="btn btn-danger  btn-sm">
                                                <span class="btn-label">
                                                    <i class="bx bx-trash"></i>
                                                </span>
                                    </button>


                                    {{-- Delete  Modals--}}
                                    <div class="modal fade" id="deleteModal{{$history->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-3" id="exampleModalLabel">Haqiqatdan ham
                                                        ushbu Operatsiyani
                                                        o'chirib tashlamoqchimisiz ?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>

                                                <form action="{{route('admin.transactions.destroy',$history->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal"> Yopish
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

                            @if ($histories->links())
                                <div class="mt-4 p-4 box has-text-centered">
                                    {{ $histories->links() }}
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



    </script>

@endsection

