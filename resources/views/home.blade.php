@extends('layouts.app')

@section('content')
    <div>

        <div class="row">

            <div class="dashboard ">

            <div class="col-md-4 ">
                <h1 id="dash" class="p-5">dash</h1>
            </div>
            </div>
            <i class="fas fa-sign-in-alt fa-3x"></i>
            <div class="content">
            <div class="col-md-7">
                content
            </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(".fa-sign-in-alt").click(function(){
            $('.dashboard').fadeToggle();


        });
        $('#dash').click(function (){
            $('.content').load('./dashboard');
        });
    </script>

@endsection
