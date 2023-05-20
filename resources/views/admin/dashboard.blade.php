@extends('Admin.master')
@section('content')

    <div class="row">

        <div class="col-lg-8 mb-4 order-0">

            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary"> Assalomu Alaykum {{ Auth()->user()->name }}</h5>
                            <p class="mb-4">
                                Hozircha hammasi yaxshi
                            </p>

                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img
                                src="{{asset('/assets/img/illustrations/man-with-laptop-light.png')}}"
                                height="140"
                                alt="View Badge User"
                                data-app-dark-img="{{asset('illustrations/man-with-laptop-dark.png')}}"
                                data-app-light-img="{{asset('illustrations/man-with-laptop-light.png')}}"
                            />
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">

                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.departments')}}">

                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img
                                        src="{{asset('assets/img/icons/unicons/chart-success.png')}}"
                                        alt="chart success" class="rounded"/>
                                </div>

                            </div>
                            <span class="fw-semibold d-block mb-1"> Bo'limlar  soni </span>
                            <h3 class="card-title mb-2"> {{ $departments->count() }}   </h3>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">

                            <a href="{{route('admin.users')}}">

                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img
                                            src="{{ asset('/assets/img/icons/unicons/wallet-info.png') }}"
                                            alt="Credit Card"
                                            class="rounded"/>
                                    </div>
                                </div>
                                <span> Hodimlar soni </span>
                                <h3 class="card-title text-nowrap mb-1"> {{ $users->count() }} </h3>
                            </a>

                        </div>
                    </div>
                </div>

            </div>

        </div>


        <!-- Total Revenue -->
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3"> Bizdagi bo'limlar ( Mahsulotlar ) </h5>

                        @foreach($departments as $d)

                            <div class="container">

                                <a href="{{route('admin.departments.show',$d->id)}}">
                                    <i class="bx bx-building-house"></i> {{ $d->name }}
                                </a> (

                                    <?php

                                    $count = 0;
                                    foreach ($d->users as $u) {
                                        foreach ($u->rooms as $r) {
                                            $count += $r->products->count();
                                        }
                                    }
                                    echo $count;

                                    ?>

                                )

                            </div>
                            <br>

                        @endforeach


                    </div>
                </div>
            </div>
        </div>


        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">

            <div class="row">

                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.rooms')}}">

                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{asset('/assets/img/icons/unicons/paypal.png')}}" alt="Credit Card"
                                         class="rounded"/>
                                </div>

                            </div>
                            <span class="d-block mb-1"> Xonalar soni </span>
                            <h3 class="card-title text-nowrap mb-2">{{ $rooms->count() }} </h3>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.products')}}">

                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('/assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card"
                                         class="rounded"/>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1"> Mahsulotlar soni</span>
                            <h3 class="card-title mb-2">{{ $products->count() }}</h3>
                            </a>
                        </div>
                    </div>
                </div>

            </div>


            {{--            <div class="row">--}}
            {{--                <div class="col-12 mb-4">--}}
            {{--                    <div class="card">--}}
            {{--                        <div class="card-body">--}}
            {{--                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">--}}
            {{--                                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">--}}
            {{--                                    <div class="card-title">--}}
            {{--                                        <h5 class="text-nowrap mb-2"> Umumiy kitoblar soni  </h5>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="mt-sm-auto">--}}
            {{--                                        <h3 class="mb-0"> {{ $all_books_count }} ta</h3>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div id="profileReportChart"></div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}


        </div>

    </div>

@endsection

