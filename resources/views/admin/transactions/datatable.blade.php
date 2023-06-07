{{--@extends('admin.master')--}}
{{--@section('content')--}}

{{--    <div class="col-md-12">--}}
{{--        <div class="card">--}}

{{--            <div class="card-header">--}}

{{--                <div class="row ">--}}

{{--                    <div class="col-md-3"><h1 class="card-title"> Operatsiyalar </h1></div>--}}

{{--                    <div class="col-md-6">--}}

{{--                        <form action="/" method="post">--}}
{{--                            @csrf--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" name="search" class="form-control" placeholder="Qidirish...">--}}
{{--                                <button class="btn btn-primary" type="submit">--}}
{{--                                    <i class="fa fa-search"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </form>--}}

{{--                    </div>--}}

{{--                    <div class="col-md-3">--}}
{{--                        <a class="btn btn-primary" href="{{route('admin.transactions.create')}}">--}}
{{--                            <span class="btn-label">--}}
{{--                                <i class="fa fa-plus"></i>--}}
{{--                            </span>--}}
{{--                            Yangi operatsiya--}}
{{--                        </a>--}}
{{--                    </div>--}}


{{--                    <div class=" container align-content-center">--}}
{{--                        <div class="col-md-6 ">--}}

{{--                            <form action="{{ route('admin.SearchHistory') }}" method="post">--}}
{{--                                @csrf--}}
{{--                                <div class="input-group">--}}

{{--                                    <input type="date" value="{{ $from_date ?? 0 }}" id="from_date" name="from_date"--}}
{{--                                           class="form-control" placeholder="Qachondan">--}}
{{--                                    <input type="date" value="{{ $to_date ?? 0 }}" id="to_date" name="to_date"--}}
{{--                                           class="form-control" placeholder="Qachongacha">--}}

{{--                                    <button class="btn btn-primary" type="submit">--}}
{{--                                        <i class="fa fa-search"></i>--}}
{{--                                    </button>--}}

{{--                                    <button type="button" onclick="sendOptions()" class="btn btn-success "><i--}}
{{--                                            class="bx bx-file"></i>Hisobot--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </form>--}}


{{--                        </div>--}}
{{--                    </div>--}}


{{--                </div>--}}

{{--                <hr>--}}

{{--                <div class="card-body">--}}

{{--                    <table class="table table-bordered text-center" id="transactions-table">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th class="" scope="col">T/R</th>--}}
{{--                            <th class="" scope="col"> Nomi</th>--}}


{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}



{{--                        </tbody>--}}

{{--                    </table>--}}




{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}


{{--@section('script')--}}

{{--    <script>--}}


{{--        $(document).ready(function (){--}}

{{--            $('#transactions-table').DataTable({--}}
{{--                progressing:true,--}}
{{--                serverSide:true,--}}

{{--                ajax: "{{ route('admin.HistoriesDatatable') }}",--}}
{{--                column:[--}}
{{--                    { data :'id' },--}}
{{--                    { data :'name' },--}}
{{--                ]--}}
{{--            })--}}


{{--        })--}}



{{--    </script>--}}

{{--@endsection--}}

