
@extends('layouts.app')


@section('content')
<div class="container">
    <h4 class="m-4"> الشحنات الجاهزة للشحن الخارجي </h4>

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
            <th scope="row">{{$cart->size}}</th>
            <td>{{$cart->weight}}</td>
            <td>{{$cart->height}}</td>
            <td>{{$cart->width}}</td>
            <td>{{$cart->height}}</td>
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
            <input type="text" class="form-control" id="inputAddress" placeholder="(555)5555-555">
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

@endsection
