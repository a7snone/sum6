@extends('layouts.master')

<!-- this page for display specefic map with specefec students locations -->

@section('content')

<div style="display: flex; justify-content: center;">

    <div style="display:inline; width:100%; border: 0px solid #3333; text-align:center">
        <p style="width:100%;background-color:#368fa644">تحضير الطلاب</p>
        @foreach($classNoOne as $value)
            <div class="busActiveMapStudent">

                <div>
                    <p class="">{{$value->st_name}}</p>
                </div>

                <div class="studentStatusBtnContainer">
                    <form style="margin-left:10px;"  action="{{ url('attendeeClass/'.$value->id) }}/{{$value->st_name}}/One/{{$value->st_class}}" method="POST">
                        <!-- <input id="st_name" name="st_name" type="hidden" value="{{$value->st_name}}"></input>
                        <input id="attendNo" name="attendNo" type="hidden" value="One"></input>
                        <input id="classNo" name="classNo" type="hidden" value="{{$value->st_class}}"></input> -->
                    @csrf
                    @method('PUT')
                    @csrf
                        <input style="" class="studentStatusBtn_ btn btn-sm_ btn-success " type="submit" value=" حاضر الفترة 1">
                        <?php
                        $first_date = \App\Models\register_info::where('st_id',$value->id)->where('action','AT1')->orderBy('created_at','DESC')->first()->created_at;
                        $second_date1 = date("Y-m-d h:i:s");

                        $second_date = new DateTime($second_date1);

                        $diff=date_diff($first_date,$second_date);

                        ?>
                        <p>{{$diff->format('منذ %a يوم %H ساعة')}} </p>
                    </form>
                    
                    <form style="margin-left:10px;"  action="{{ url('attendeeClass/'.$value->id) }}/{{$value->st_name}}/Tow/{{$value->st_class}}" method="POST">
                        <!-- <input id="st_name" name="st_name" type="hidden" value="{{$value->st_name}}"></input>
                        <input id="attendNo" name="attendNo" type="hidden" value="Tow"></input>
                        <input id="classNo" name="classNo" type="hidden" value="{{$value->st_class}}"></input> -->
                    @csrf
                    @method('PUT')
                    @csrf
                        <input style="" class="studentStatusBtn_ btn btn-sm_ btn-success " type="submit" value="حاضر الفترة 2">
                        <?php
                        $first_date = \App\Models\register_info::where('st_id',$value->id)->where('action','AT2')->orderBy('created_at','DESC')->first()->created_at;
                        $second_date1 = date("Y-m-d h:i:s");

                        $second_date = new DateTime($second_date1);

                        $diff=date_diff($first_date,$second_date);

                        ?>
                        <p>{{$diff->format('منذ %a يوم %H ساعة')}} </p>
                        <!-- <p>{{ \App\Models\register_info::where('st_id',$value->id)->where('action','AT2')->orderBy('created_at','DESC')->first()->created_at }} </p> -->
                    </form>
                    
                    <form style="margin-left:10px;"  action="{{ url('attendeeClass/'.$value->id) }}/{{$value->st_name}}/Three/{{$value->st_class}}" method="POST">
                        <!-- <input id="st_name" name="st_name" type="hidden" value="{{$value->st_name}}"></input>
                        <input id="attendNo" name="attendNo" type="hidden" value="Three"></input>
                        <input id="classNo" name="classNo" type="hidden" value="{{$value->st_class}}"></input> -->
                    @csrf
                    @method('PUT')
                    @csrf
                        <input style="" class="studentStatusBtn_ btn btn-sm_ btn-success " type="submit" value="حاضر الفترة 3">
                        <?php
                        $first_date = \App\Models\register_info::where('st_id',$value->id)->where('action','AT3')->orderBy('created_at','DESC')->first()->created_at;
                        $second_date1 = date("Y-m-d h:i:s", strtotime('-1 hours'));

                        $second_date = new DateTime($second_date1);

                        $diff=date_diff($first_date,$second_date);
                        ?>
                        <p>{{$diff->format('منذ %a يوم %H ساعة')}} </p>                        
                    </form>
                </div>
                </br>
            </div>
        @endforeach
    </div>
</div>


@endsection
