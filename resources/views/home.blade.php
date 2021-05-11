@extends('layouts.app')

@section('content')

    <div>

        <div class="row">


{{--            Add Items--}}

            <div class="m-5">
            <div class="col-lg-12">
                <div class="content">
                    <h3 class="mb-3">   اضف شحناتك مع رقم التعقب ( الشحن الداخلي) </h3>
                    <form id="addItemForm">
                        <div class="form-row">
                            <div class="col-6">
                                <input type="text" name="tracking" class="form-control" placeholder="رقم التعقب">
                            </div>
                            <div class="col-4">
                                <input type="text" name="company" class="form-control" placeholder="شركة الشحن">
                            </div>
                            </div>
                        <div class="form-row m-3">
                            <div class="col-2">
                                <input type="text" name="weight" class="form-control" placeholder="  الوزن (باوند) ">
                            </div><div class="col-2">
                                <input type="text" name="height" class="form-control" placeholder="الطول (انج)">
                            </div><div class="col-2">
                                <input type="text" name="length" class="form-control" placeholder="العرض (انج)">
                            </div><div class="col-2">
                                <input type="text" name="width" class="form-control" placeholder="الارتفاع (انج)">
                            </div><div class="col-1">
                                <button id="submitItem" type="button" class="btn btn-primary float-right  ">اضف</button>
                            </div>
                        </div>
                    </form>
                </div>
                <hr class="m-5">
                <h3 class="mb-5">الشحنات الموجودة (داخل امريكا) </h3>
                @if(   $getItems->count() < 1)
                    <h4>لايوجد شحنات في المخزن </h4>
                @else
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">شركة الشحن</th>
                        <th scope="col">رقم التعقب</th>
                        <th scope="col">الوزن (باوند)</th>
                        <th scope="col">طول (انج)</th>
                        <th scope="col">عرض (انج)</th>
                        <th scope="col">ارتفاع (انج)</th>

                        <th scope="col">واصل للمخزن ؟</th>
                        <th scope="col">تعديل</th>
                        <th scope="col">احذف</th>
                    </tr>
                    </thead>



                    @foreach ($getItems as $getItem)

                    <tbody>

                    <tr>



                        <td class="showItem">{{ $getItem->company }}</td>

                        <td class="showItem">{{ $getItem->tracking }}</td>

                        <th scope="row" class="showItem">{{ $getItem->weight }}  </th>
                        <th scope="row" class="showItem">{{ $getItem->length }}   </th>
                        <th scope="row" class="showItem">{{ $getItem->width }}   </th>
                        <th scope="row" class="showItem">{{ $getItem->height }}   </th>
                        @if($getItem->arrived == 1)
                        <td class="arrived"> واصل للمخزن</td>
                        @else
                            <td class="notarrived">  غير واصل للمخزن</td>
                        @endif
                        <td> <i data-toggle="modal" data-target="#myModal{{$getItem->id}}" data-id="{{$getItem->id}}" class="fas editing fa-edit"></i></td>
                        <td><form method="POST" action="{{ route('deleteProduct', ['id' => $getItem->id]) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}  <button class="  btn-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button> </form> </td>

                    </tr>

                    </tbody>

                    @endforeach
                </table>

{{--                <div class="col-1">--}}
{{--                    <button id="submitEditItem" data-toggle="modal" type="button" data-target="{{ $getItem->id }}" class="btn btn-danger float-right editItem  ">عدل</button>--}}
{{--                </div>--}}
            </div>
            </div>

        </div>
    @endif
        <!-- Button trigger modal -->

        <!-- Modal -->
        @foreach ($getItems as $getItem)
        <div class="modal fade" id="myModal{{$getItem->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{url('updateitem', [$getItem->id])}}">
                            @method('PUT')
                            @csrf
                            <div class="form-group ">
                               <h4> {{ $getItem->id }}</h4>

                                <label for="title">رقم التعقب</label>
                                <input type="text" value="{{ old('tracking') ?? $getItem->tracking ?? 'default' }}" placeholder="{{$getItem->tracking}}" class="form-control" id="taskTitle"  name="tracking" >

                                <label for="title">شركة الشحن</label>
                                <input type="text" value="{{ old('company') ?? $getItem->company ?? 'default' }}" placeholder="{{$getItem->company}}" class="form-control" id="taskTitle"  name="company" >
                                <label for="title">الوزن</label>
                                <input type="text" value="{{ old('weight') ?? $getItem->weight ?? 'default' }}" placeholder="{{$getItem->weight}}" class="form-control" id="taskTitle"  name='weight' >

                                <label for="title">الارتفاع</label>
                                <input type="text" value="{{ old('height') ?? $getItem->height ?? 'default' }}" placeholder="{{$getItem->height}}" class="form-control" id="taskTitle"  name='height' >

                                <label for="title">الطول</label>
                                <input type="text" value="{{ old('length') ?? $getItem->length ?? 'default' }}" placeholder="{{$getItem->length}}" class="form-control" id="taskTitle"  name='length' >

                                <label for="title">العرض</label>
                                <input type="text" value="{{ old('width') ?? $getItem->width ?? 'default' }}" placeholder="{{$getItem->width}}" class="form-control" id="taskTitle"  name='width' >
                            </div>

                            <div class="modal-footer">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>



                </div>

            </div>

        </div>
            @endforeach

    </div>

    <script type="text/javascript">
        $(".fa-sign-in-alt").click(function(){
            $('.dashboard').fadeToggle();
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#submitItem").click(function(e){
            e.preventDefault();
            var company = $("input[name=company]").val();
            var tracking = $("input[name=tracking]").val();
            var weight = $("input[name=weight]").val();
            var length = $("input[name=length]").val();
            var width = $("input[name=width]").val();
            var height = $("input[name=height]").val();
            $.ajax({
                type:'POST',
                dataType: "json",
                url:'/item',

                data:{company:company, tracking:tracking,weight:weight, length:length,width:width,height:height, "_token": "{{ csrf_token() }}",},

                success: function(){
                    window.location.reload(true);
                },

                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(" املئ الفورم بالانكليزيه ولاتترك فراغ");
                    window.location.reload(true);
                }


            });



        })





    </script>

@endsection
