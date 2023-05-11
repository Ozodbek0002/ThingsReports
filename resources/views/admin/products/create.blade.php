@extends('Admin.master')
@section('content')

    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">Yagi mahsulot </h1></div>
                </div>

                <hr>

                <div class="card-body">



                    <form action="{{route('admin.products.store')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group ">
                            <label for=""> Mahsulot nomi </label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="author">Soni</label>
                            <input type="text" value="{{old('count')}}" id="author" class="form-control" name="count">
                            @error('count')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

{{--                        User--}}
                        <div class="form-group ">
                            <label for=""> Masul inson  </label>
                            <select name="user_id"  value="{{old('user_id')}}" class="form-control">
                                @foreach($users as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                         <div class="form-group ">
                            <label for=""> Kategoriyasi </label>
                            <select name="category_id"  value="{{old('category_id')}}" class="form-control">
                                @foreach($categories as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                         <div class="form-group ">
                            <label for=""> Birligi </label>
                            <select name="unit_id"  value="{{old('unit_id')}}" class="form-control">
                                @foreach($units as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            @error('unit_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group ">
                            <label class="text text-primary" for="file"> Rasm yuklang </label>
                            <input type="file" value="{{old('image')}}" id="image" class="form-control" name="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="author">Interval no`mer</label>
                            <input type="number" value="{{old('code')}}"  class="form-control" name="code">
                            @error('code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="author">Soni</label>
                            <input type="number" value="{{old('count')}}" class="form-control" name="count">
                            @error('count')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <br>

                        <button type="submit" id="alert" class="btn btn-primary " onclick="end()">Saqlash</button>
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



