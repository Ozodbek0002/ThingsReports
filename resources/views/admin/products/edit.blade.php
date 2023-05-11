@extends('Admin.master')
@section('content')

    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10"><h1 class="card-title">Kitob tahrirlash </h1></div>
                </div>
                <hr>
                <div class="card-body">

                    <form action="{{route('admin.products.update',$product->id)}}" method="POST" accept-charset="UTF-8"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        {{--                        Name--}}
                        <div class="form-group">
                            <label for="title">Mahsulot nomi </label>
                            <input type="text" id="name" name="name" value="{{$product->name}}" class="form-control"
                                   required>
                        </div>


                        <br>
                        {{--                        Amount--}}
                        <div class="form-group">
                            <label for="author"> Miqdori </label>
                            <input type="number" name="count" value="{{$product->amount}}" class="form-control "
                                   id="author">
                        </div>


                        <br>
                        {{--                        Kategory--}}
                        <div class="form-group">
                            <label for=""> Kategoriyasi </label>
                            <select name="category_id" id="like_to" class="form-control">
                                <option value="{{$product->category_id}}" style="color: blue">
                                    {{ $product->category->name }}
                                </option>
                                @foreach($categories as $c)
                                    @if($product->category->name != $c->name)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>


                        <br>
                        {{--                        Unit--}}
                        <div class="form-group">
                            <label for=""> Birligi </label>
                            <select name="unit_id" id="like_to" class="form-control">
                                <option value="{{$product->unit_id}}" style="color: blue">
                                    {{ $product->unit->name }}
                                </option>
                                @foreach($units as $c)
                                    @if($product->unit->name != $c->name)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>


                        <br>
                        {{--                        Image--}}
                        <div class="form-group">
                            <label class="text text-primary" for="image"> Rasm yuklang </label>
                            <input type="file" id="image" class="form-control" name="image">
                        </div>


                        <br>
                        {{--                        Code--}}
                        <div class="form-group">
                            <label for="author"> Interval no`mer </label>
                            <input type="number" name="code" value="{{$product->code}}" class="form-control "
                                   id="author">
                        </div>


                        <br>
                        <br>

                        <button type="submit" id="alert" class="btn btn-primary "> Saqlash</button>
                        <input type="reset" class="btn btn-danger" value="Tozalash">


                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection




