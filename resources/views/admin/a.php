@extends('admin.master')
@section('content')
<div class="card">
    <div class="">


        <form action="{{route('sifat-bolimi-statistika')}}" method="get"
              class="form-group d-flex justify-content-between align-items-center m-3">


            <h1 class="text text-center">O'qituvchilar ro'yhati</h1>

            <table class="text-center m-2">
                <tr>
                    <th>
                        <label for="select5">Mudir</label>
                    </th><th>
                        <label for="select0">Yil</label>
                    </th>
                    <th>
                        <label for="select1">Semestr</label>
                    </th>

                    <th>
                        <label for="select2">Tartib</label>
                    </th>
                    <th>
                        <label for="select4">Amal</label>
                    </th>
                </tr>
                <tr>
                    <th>

                        <select name="mudir_id" class="form-select" id="select5">
                            <option selected value="0">Barchasi</option>
                            @foreach($mudirs as $mudir)
                            <option @if($options->mudir_id==$mudir->id) selected @endif value="{{$mudir->id}}">
                                {{$mudir->name}}
                            </option>
                            @endforeach

                        </select>
                    </th>
                    <th>

                        <select name="year" class="form-select" id="select0">
                            @foreach($years as $year)
                            <option @if($options->year==$year) selected @endif value="{{$year}}">
                                {{$year}}
                            </option>
                            @endforeach

                        </select>
                    </th>
                    <th>

                        <select name="semester" class="form-select" id="select1">
                            <option selected value="0">Barchasi</option>
                            <option @if($options->semester=="5-semestr") selected @endif value="5-semestr">
                                5-semestr
                            </option>
                            <option @if($options->semester=="6-semestr") selected @endif value="6-semestr">
                                6-semestr
                            </option>
                            <option @if($options->semester=="7-semestr") selected @endif value="7-semestr">
                                7-semestr
                            </option>
                            <option @if($options->semester=="8-semestr") selected @endif value="8-semestr">
                                8-semestr
                            </option>
                            <option @if($options->semester=="9-semestr") selected @endif value="9-semestr">
                                9-semestr
                            </option>
                            <option @if($options->semester=="10-semestr") selected @endif value="10-semestr">
                                10-semestr
                            </option>
                        </select>
                    </th>
                    <th>

                        <select name="sort" class="form-select" id="select2">
                            <option @if($options->sort=='DESC') selected @endif value="DESC">
                                Kamayish
                            </option>
                            <option @if($options->sort=='ASC') selected @endif value="ASC">
                                O'sish
                            </option>
                        </select>
                    </th>

                    <th>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary "><i class="bx bx-filter-alt"></i>Filtr
                            </button>
                            <button type="button" onclick="sendOptions()" class="btn btn-info "><i class="bx bx-file"></i>Hisobot
                            </button>
                        </div>
                    </th>
                </tr>
            </table>

        </form>


    </div>

    <div class="card-body border-top border-2 border-primary overflow-auto">

        <table class="table ">
            <tr>
                <th>#</th>
                <th>O'qituvchi</th>
                <th>Mavzular soni</th>
                <th>Bajarilgan</th>
                <th>Yangi</th>
                <th>Jarayonda</th>
                <th>Tugallangan</th>
            </tr>
            @foreach($teachers as $teacher)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <button data-bs-toggle="modal" data-bs-target="#batafsilModal{{$loop->iteration}}"
                            type="button"
                            class="btn btn-outline-dark">
                        {{$teacher['teacher']['name']}}
                    </button>

                    <div class="modal fade" id="batafsilModal{{$loop->iteration}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-lg">

                            <div style="" class="modal-content">

                                <div class="modal-header border-top border-2" style="border-color: darkblue">
                                    <h1 class="text text-center" id="exampleModalLabel">Mavzular </h1>

                                    <button type="button" class="btn-close bg-danger float-end "
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @if(count($teacher['teacher']['themes'])!=0)
                                    <table
                                        class="table">
                                        <tr>
                                            <th>Mavzu</th>
                                            <th>Talaba</th>
                                            <th>Guruh</th>
                                            <th>Foiz</th>
                                        </tr>

                                        @forelse($teacher['teacher']['themes'] as $theme)
                                        <tr>
                                            <td>{{$theme->name}}</td>
                                            <td>{{$theme->student_name ?? "Hozircha tanlamagan"}}</td>
                                            <td>{{$theme->group_name ?? "-"}}</td>
                                            <td><span>{{$theme->percentage}}%</span></td>
                                        </tr>
                                        @empty

                                        @endforelse

                                    </table>
                                    @else
                                    <h2 class="text">Mavzular yo'q</h2>
                                    @endif


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Yopish
                                    </button>

                                </div>
                            </div>

                        </div>


                    </div>
                </td>

                <td>{{$teacher['count']}} ta</td>
                <td>@if($teacher['count']>0)
                    {{round($teacher['percentage']/$teacher['count'])}}
                    @else
                    0
                    @endif %
                </td>
                <td>{{$teacher['new']}} ta</td>
                <td>{{$teacher['progress']}} ta</td>
                <td>{{$teacher['end']}} ta</td>

            </tr>
            @endforeach
        </table>


    </div>

</div>


@endsection

@section('js')
<script>
    function sendOptions() {

        let mudir_id = document.getElementById('select5').value;
        let year = document.getElementById('select0').value;
        let semester = document.getElementById('select1').value;
        let sort = document.getElementById('select2').value;


        // TODO: urlni o'zgartirish kerak
        let url = 'statistika/print?mudir_id=' + mudir_id + '&year=' + year + '&semester=' + semester + '&sort=' + sort;
        window.open(url);
    }
</script>
@endsection

