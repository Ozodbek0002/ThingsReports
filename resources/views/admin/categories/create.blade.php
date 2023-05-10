@extends('Admin.master')
@section('content')

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">Yagi Kategoriya </h1></div>
                </div>

                <hr>

                <div class="card-body">


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

    </div>


@endsection

@if(session('success'))

    <script>
        swal({
            icon: 'success',
            text: 'Muvaffaqqiyatli bajarildi',
            confirmButtonText: 'Continue',
        })
    </script>

@endif



