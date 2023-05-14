@extends('Admin.master')
@section('content')

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title"> {{ $department->name }} Bo'limi </h1></div>
                </div>

                <hr>
                <div class="card-body">


                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="" scope="col"> T/R </th>
                            <th class="" scope="col"> Xodimlar ( Xonalari ) </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($department->users as  $key=>$u)
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td>
                                    <a href="{{ route('admin.users.show',$u->id) }}">
                                        {{ $u->name }}
                                    </a>
                                    ( {{ $u->rooms->count()  }} )
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>

@endsection



