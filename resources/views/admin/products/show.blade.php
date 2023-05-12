@extends('Admin.master')
@section('content')

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title"> {{ $product->name }} </h1></div>
                </div>

                <hr>
                <div class="card-body">


                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="" scope="col"> T/R </th>
                            <th class="" scope="col"> Mahsulot Nomi </th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                        {{ $product->name }}
                                </td>

                            </tr>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>

@endsection



