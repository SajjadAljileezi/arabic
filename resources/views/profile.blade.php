
@extends('layouts.app')


@section('content')

    @if(count($profiles) >0)

        @foreach($profiles as $profile)


    <div class="container">

        <div class="row">
            <div class="col-12 mb-5">
                <img src="{{ asset('img/logos/profile.png') }}" class="d-block  " alt="...">
            </div>

        </div>

        <div class="row">
            <div class="d-flex">
                <div class="mr-auto p-2">
            <div class="col-12 ">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">الايميل</label>
                    <input type="text" value="{{ old('email') ?? $profile->email ?? 'default' }}"
                           placeholder="{{$profile->email}}" class="form-control" id="taskTitle"  name="email" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">الاسم</label>
                    <input type="text" value="{{ old('name') ?? $profile->name ?? 'default' }}"
                           placeholder="{{$profile->name}}" class="form-control" id="taskTitle"  name="name" >
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">العنوان</label>
                <input type="text" value="{{ old('address') ?? $profile->address ?? 'default' }}"
                       placeholder="{{$profile->address}}" class="form-control" id="taskTitle"  name="address" >
            </div>
            <div class="form-group">
                <label for="inputAddress">رقم التلفون</label>
                <input type="text" value="{{ old('phone') ?? $profile->phone ?? 'default' }}"
                       placeholder="{{$profile->phone}}" class="form-control" id="taskTitle"  name="phone" >
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">البلد</label>
                    <input type="text" value="{{ old('country') ?? $profile->country ?? 'default' }}"
                           placeholder="{{$profile->country}}" class="form-control" id="taskTitle"  name="country" >
                </div>
                <div class="form-group col-md-4">
                   <label for="inputCity">المدينة</label>
                    <input type="text" value="{{ old('city') ?? $profile->city ?? 'default' }}"
                           placeholder="{{$profile->city}}" class="form-control" id="taskTitle"  name="city" >
                </div>

            </div>


        </form>
        </div> </div> </div>
            <div class="ml-auto p-2">

                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">نوع الكارد</label>
                            <input type="text" value="{{ old('card_type') ?? $profile->card_type ?? 'default' }}"
                                   placeholder="{{$profile->card_type}}" class="form-control" id="taskTitle"
                                   name="card_type" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">الاسم على الكارد</label>
                            <input type="text" value="{{ old('name_card') ?? $profile->name_card ?? 'default' }}"
                                   placeholder="{{$profile->name_card}}" class="form-control" id="taskTitle"
                                   name="name_card" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">رقم الكارد</label>
                        <input type="text" value="{{ old('card_number') ?? $profile->card_number ?? 'default' }}"
                               placeholder="{{$profile->card_number}}" class="form-control" id="taskTitle"
                               name="card_number" >
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">عنوان للكارد</label>
                        <input type="text" value="{{ old('card_address') ?? $profile->card_address ?? 'default' }}"
                               placeholder="{{$profile->card_address}}" class="form-control" id="taskTitle"
                               name="card_address" >
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">المفتاح</label>
                        <input type="text" value="{{ old('card_zip') ?? $profile->card_zip ?? 'default' }}"
                               placeholder="{{$profile->card_zip}}" class="form-control" id="taskTitle"
                               name="card_zip" >
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">البلد  للكارد</label>
                            <input type="text" value="{{ old('card_country') ?? $profile->card_country ?? 'default' }}"
                                   placeholder="{{$profile->card_country}}" class="form-control" id="taskTitle"
                                   name="card_country" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">المدينة للكارد</label>
                            <input type="text" value="{{ old('card_city') ?? $profile->card_city ?? 'default' }}"
                                   placeholder="{{$profile->card_city}}" class="form-control" id="taskTitle"
                                   name="card_city" >
                        </div>

                    </div>


                </form>
                <h4>طريقة الدفع</h4>
                <div class="col-12 mb-5">
                    <div class="row">
                    <img src="{{ asset('img/logos/visa.png') }}" class="d-block mr-2 " alt="...">
                    <img src="{{ asset('img/logos/pay.png') }}" class="d-block  " alt="...">
                    </div>
                </div>
        </div>   </div>
        <button id="submitProfile" type="submit" class="btn btn-primary  ">احفظ التغييرات</button>
    </div>

@endforeach
    @else
        <div class="container">

            <div class="row">
                <div class="col-12 mb-5">
                    <img src="{{ asset('img/logos/profile.png') }}" class="d-block  " alt="...">
                </div>

            </div>

            <div class="row">
                <div class="d-flex">
                    <div class="mr-auto p-2">
                        <div class="col-12 ">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">الايميل</label>
                                        <input type="text" class="form-control" id="taskTitle"  name="email" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">الاسم</label>
                                        <input type="text"  class="form-control" id="taskTitle"  name="name" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">العنوان</label>
                                    <input type="text" class="form-control" id="taskTitle"   name="address" >
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">رقم التلفون</label>
                                    <input   class="form-control" id="taskTitle" name="phone" >
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">البلد</label>
                                        <input type="text"  class="form-control" id="taskTitle"  name="country" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputCity">المدينة</label>
                                        <input type="text"  class="form-control" id="taskTitle" name="city" >
                                    </div>

                                </div>


                            </form>
                        </div> </div> </div>
                <div class="ml-auto p-2">

                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">نوع الكارد</label>
                                <input type="text" class="form-control" id="taskTitle"
                                       name="card_type" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">الاسم على الكارد</label>
                                <input type="text" class="form-control" id="taskTitle"
                                       name="name_card" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">رقم الكارد</label>
                            <input type="text"
                                   class="form-control" id="taskTitle"   name="card_number" >
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">عنوان للكارد</label>
                            <input type="text"
                                   class="form-control" id="taskTitle"   name="card_address" >
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">المفتاح</label>
                            <input type="text"
                                   class="form-control" id="taskTitle"   name="card_zip" >
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">البلد  للكارد</label>
                                <input type="text"
                                       class="form-control" id="taskTitle"   name="card_country" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputCity">المدينة للكارد</label>
                                <input type="text"
                                       class="form-control" id="taskTitle"  name="card_city" >
                            </div>

                        </div>


                    </form>
                    <h4>طريقة الدفع</h4>
                    <div class="col-12 mb-5">
                        <div class="row">
                            <img src="{{ asset('img/logos/visa.png') }}" class="d-block mr-2 " alt="...">
                            <img src="{{ asset('img/logos/pay.png') }}" class="d-block  " alt="...">
                        </div>
                    </div>
                </div>   </div>
            <button id="submitProfile" type="submit" class="btn btn-primary  ">احفظ التغييرات</button>
        </div>
        @endif

    <script type="text/javascript">

    $("#submitProfile").click(function(e){
    e.preventDefault();
    var name = $("input[name=name]").val();
    var email = $("input[name=email]").val();
    var phone = $("input[name=phone]").val();
    var address = $("input[name=address]").val();
    var city = $("input[name=city]").val();
    var country = $("input[name=country]").val();
    var card_number = $("input[name=card_number]").val();
    var name_card = $("input[name=name_card]").val();
    var card_city = $("input[name=card_city]").val();
    var card_country = $("input[name=card_country]").val();
    var card_zip = $("input[name=card_zip]").val();
    var card_address = $("input[name=card_address]").val();
    var card_type = $("input[name=card_type]").val();

    $.ajax({
    type:'POST',
    dataType: "json",
    url:'/profileedit',

    data:{ card_type:card_type,card_address:card_address,card_zip:card_zip,card_country:card_country,
        card_city:card_city,
        name_card:name_card,card_number:card_number,
        name:name,
        email:email,phone:phone, address:address, city:city,country:country, "_token": "{{
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
