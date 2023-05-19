@extends('Admin.master')
@section('content')

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title"> {{ $user->department->name }} > {{ $user->name }} >  <a href="{{ route('admin.ShowUserProducts', $user->id  )}}"> Barchasi </a> </h1> </div>

                </div>

                <hr>

                <div class="card-body">

                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="" scope="col"> T/R</th>
                            <th class="" scope="col"> Xonalar ( Mahsulotlar )</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->rooms as  $key=>$room)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <a href="{{ route('admin.rooms.show',$room->id) }}">
                                        {{ $room->name }}
                                    </a>
                                    ( {{ $room->products->count() }} )
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



