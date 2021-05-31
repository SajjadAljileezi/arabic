
@extends('layouts.app')


@section('content')
<div class="container">
    <h4 class="m-4"> الصناديق الجاهزة للشحن الخارجي </h4>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">حجم الصندوق او التعقب</th>
            <th scope="col">الوزن</th>
            <th scope="col">الطول</th>
            <th scope="col">العرض</th>
            <th scope="col">الارتفاع</th>
        </tr>
        </thead>
        @foreach ($carts as $cart)
        <tbody>
        <tr>
            <th class="dt-size">{{$cart->size   }}</th>
            <td>{{$cart->weight}}</td>
            <td>{{$cart->height}}</td>
            <td>{{$cart->width}}</td>
            <td>{{$cart->height}}</td>
            <th scope="row" class="showItem">
                <button name="" id="" type="button" class="btn btn-danger deleteItemFromCart  "> احذف من السلة </button>
            </th>
        </tr>
        </tbody>
        @endforeach
    </table>
    <h4 class="m-4"> القطع الجاهزة للشحن الخارجي </h4>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">حجم الصندوق او التعقب</th>
            <th scope="col">الوزن</th>
            <th scope="col">الطول</th>
            <th scope="col">العرض</th>
            <th scope="col">الارتفاع</th>
        </tr>
        </thead>
        @foreach ($items as $item)
        <tbody>
        <tr>
            <th class="dt-size">{{ $item->tracking  }}</th>
            <td>{{$item->weight}}</td>
            <td>{{$item->height}}</td>
            <td>{{$item->width}}</td>
            <td>{{$item->height}}</td>
            <th scope="row" class="showItem">
                <button name="" id="" type="button" class="btn btn-danger deleteItemFromCart  "> احذف من السلة </button>
            </th>
        </tr>
        </tbody>
        @endforeach
    </table>
    <hr>
    <h4 class="m-5"> العنوان  </h4>
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">الاسم او الشركة</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="الاسم او الشركة">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">الايميل</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="الايميل">
            </div>
        </div>

        <div class="form-group">
            <label for="inputAddress">رقم التلفون </label>
            <input type="text" class="form-control" id="inputAddress" placeholder="(555) 5555-555">
        </div>
        <div class="form-group">
            <label for="inputAddress">العنوان</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">الدولة</label>
                <input type="text" class="form-control" id="inputCity" placeholder="country">
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">المدينة</label>
                <input type="text" class="form-control" id="inputCity" placeholder="city">
            </div>
            </div>
    </form>
</div>
<script type="text/javascript">
    $(".deleteItemFromCart").click('change',function (e) {
        var currentRow = $(this).closest("tr");
        var size = currentRow.find(".dt-size").html();

        $.ajax({
            type: 'POST',
            dataType: "json",
            url: '/deletecart',

            data:{ size:size, "_token": "{{ csrf_token() }}",},

            success:function( ) {
                alert( 'تم الاضافةالى السلة بنجاح');
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
