
@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">

        <h3 class="m-5"> الصناديق الجاهزة للشحن</h3>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">الصندوق</th>
                    <th scope="col">الوزن</th>
                    <th scope="col">الارتفاع</th>
                    <th scope="col">الطول</th>
                    <th scope="col">العرض</th>
                </tr>
                </thead>
                @foreach ($items as $item)
                <tbody>
                <tr>
                    <th class='ct-size' >{{$item->size}}</th>
                    <td class='ct-weight'>{{$item->weight}}</td>
                    <td class='ct-height'>{{$item->height}}</td>
                    <td class='ct-length'>{{$item->length}}</td>
                    <td class='ct-width'>{{$item->width}}</td>
                    <th scope="row" class="showItem">
                        <button name="" id="" type="button" class="btn btn-success submitToCart"><i class="fas
                        fa-cart-plus"></i> </button>
                    </th>
                </tr>

                </tbody>
                @endforeach
            </table>

        </div>
        <hr>
        @if(   $getItems->count() < 1)
            <h4 class="m-5">لايوجد قطع فردية للمخزن </h4>
        @else
        <h3 class="m-5"> القطع الجاهزة للشحن</h3>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">الشركة</th>
                    <th scope="col">رقم التعقب</th>
                    <th scope="col">الوزن</th>
                    <th scope="col">الارتفاع</th>
                    <th scope="col">الطول</th>
                    <th scope="col">العرض</th>
                </tr>
                </thead>
                @foreach ($getItems as $getItem)
                    <tbody>
                    <tr>
                        <th scope="row">{{$getItem->company}}</th>
                        <td>{{$getItem->tracking}}</td>
                        <td>{{$getItem->weight}}</td>
                        <td>{{$getItem->height}}</td>
                        <td>{{$getItem->length}}</td>
                        <td>{{$getItem->width}}</td>
                    </tr>

                    </tbody>
                @endforeach
            </table>
            @endif
        </div>
    </div>
</div>
<script type="text/javascript">
        $(".submitMeasure").click('change',function (e) {
            var size = currentRow.find(".pd-company").html();
            var weight = currentRow.find(".pd-tracking").html();
            var weight = currentRow.find(".pd-weight").html();
            var length = currentRow.find(".pd-length").html();
            var width = currentRow.find(".pd-width").html();
            var height = currentRow.find(".pd-height").html();
            var size = currentRow.find(":selected").html();

            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '/addtobox',

                data:{company:company, tracking:tracking,weight:weight, length:length,width:width, height:height, size:size, "_token": "{{ csrf_token() }}",},

                success:function( ) {
                    alert( 'تم الاضافة بنجاح');
                    // window.location.reload(true);
                },
                error: function(xhr,err){
                    alert("تحذير "+xhr.responseText);
                    // window.location.reload(true);
                }


            });
        });
    </script>
@endsection
