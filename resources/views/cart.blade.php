
@extends('layouts.app')


@section('content')
<div class="container">
    <h4 class="m-4"> الصناديق الجاهزة للشحن الخارجي </h4>

    <table id="myTable" class="table table-hover">
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
            <th class="sh-size">{{$cart->size   }}</th>
            <th class="dt-weight">{{$cart->weight}}</th>
            <th class="dt-height">{{$cart->height}}</th>
            <th class="dt-width">{{$cart->width}}</th>
            <th class="dt-length">{{$cart->length}}</th>
            <td scope="row" class="showItem">
                <button name="" id="" type="button" class="btn btn-danger deleteItemsFromCart  "> احذف من السلة
                </button>
            </td>
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
            <th class="dt-tracking">{{ $item->tracking  }}</th>
            <td>{{$item->weight}}</td>
            <td>{{$item->length}}</td>
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
   @if(count($profiles) >0)

@foreach($profiles as $profile)

    <form >
        <div class="form-row ">
            <div class="form-group col-md-6">
                <label for="inputEmail4 ">الاسم او الشركة</label>
                <input type="text" value="{{ old('name') ?? $profile->name ?? 'default' }}"
                       placeholder="{{$profile->name}}" class="form-control" id="taskTitle"
                       name="name" >
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4 float-right">الايميل</label>
                <input type="text" value="{{ old('email') ?? $profile->email ?? 'default' }}"
                       placeholder="{{$profile->email}}" class="form-control" id="taskTitle"
                       name="email" >
            </div>
        </div>

        <div class="form-group">
            <label for="inputAddress">رقم التلفون </label>
            <input type="text" value="{{ old('phone') ?? $profile->phone ?? 'default' }}"
                   placeholder="{{$profile->phone}}" class="form-control" id="taskTitle"
                   name="phone" >
        </div>
        <div class="form-group">
            <label for="inputAddress">العنوان</label>
            <input type="text" value="{{ old('address') ?? $profile->address ?? 'default' }}"
                   placeholder="{{$profile->address}}" class="form-control" id="taskTitle"
                   name="address" >
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">الدولة</label>
                <input type="text" value="{{ old('country') ?? $profile->country ?? 'default' }}"
                       placeholder="{{$profile->country}}" class="form-control" id="taskTitle"
                       name="country" >
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">المدينة</label>
                <input type="text" value="{{ old('city') ?? $profile->city ?? 'default' }}"
                       placeholder="{{$profile->city}}" class="form-control" id="taskTitle"
                       name="city" >
            </div> </div></div>




    </form>
        @endforeach



    <div class="col-1">
        <button id="submitShipping" type="button" class="btn btn-success   ">احسب   </button>
    </div>
    @else
        <form >
            <div class="form-row ">
                <div class="form-group col-md-6">
                    <label for="inputEmail4 ">الاسم او الشركة</label>
                    <input type="text" value=" "
                           placeholder="الاسم" class="form-control" id="taskTitle"
                           name="name" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4 float-right">الايميل</label>
                    <input type="text" value=" "
                           placeholder="الايميل" class="form-control" id="taskTitle"
                           name="email" >
                </div>
            </div>

            <div class="form-group">
                <label for="inputAddress">رقم التلفون </label>
                <input type="text" value=" "
                       placeholder="رقم التلفون" class="form-control" id="taskTitle"
                       name="phone" >
            </div>
            <div class="form-group">
                <label for="inputAddress">العنوان</label>
                <input type="text" value=" "
                       placeholder="العنوان" class="form-control" id="taskTitle"
                       name="address" >
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">الدولة</label>
                    <input type="text" value=" "
                           placeholder="الدولة" class="form-control" id="taskTitle"
                           name="country" >
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">المدينة</label>
                        <input type="text" value=" "
                               placeholder="المدينة" class="form-control" id="taskTitle"
                               name="city" >
                    </div> </div></div>




        </form>
        <div class="col-1">
            <button id="submitShipping" type="button" class="btn btn-success   ">احسب   </button>
        </div>
    @endif
</div>

<script type="text/javascript">
    $(".deleteItemsFromCart").click('change',function (e) {
        var currentRow = $(this).closest("tr");
        var size = currentRow.find(".sh-size").html();

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
    $(".deleteItemFromCart").click('change',function (e) {
        var currentRow = $(this).closest("tr");
        var tracking = currentRow.find(".dt-tracking").html();

        $.ajax({
            type: 'POST',
            dataType: "json",
            url: '/deleteitemcart',

            data:{ tracking:tracking, "_token": "{{ csrf_token() }}",},

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
    $("#submitShipping").click(function(e){
        e.preventDefault();
        var name = $("input[name=name]").val();
        var email = $("input[name=email]").val();
        var phone = $("input[name=phone]").val();
        var address = $("input[name=address]").val();
        var city = $("input[name=city]").val();
        var country = $("input[name=country]").val();

        $.ajax({
            type:'POST',
            dataType: "json",
            url:'/doshipping',

            data:{ name:name, email:email,phone:phone, address:address, city:city,country:country, "_token": "{{
            csrf_token() }}",},

            success: function(){
                // window.location.reload(true);
            },

            error: function(xhr,err){
                console.log("تحذير "+xhr.responseText);
                // window.location.reload(true);
            }


        });



    })
     </script>
@endsection
