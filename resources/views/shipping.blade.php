@extends('layouts.app')

@section('content')

 <div class="container">
     <h1 class="py-5">اختر عملية الشحن </h1>
     <div class="row">
         <div class="col-md-12">
             <h4>اشحن عن طريق التجميع في صناديق محددة</h4>
             <h5 class="py-3"> الصناديق الموجودة لدينا</h5>
             <table class="table table-hover">
                 <thead>
                 <tr>
                     <th scope="col">النوع</th>
                     <th scope="col">الوزن</th>
                     <th scope="col">الطول</th>
                     <th scope="col">الارتفاع</th>
                     <th scope="col"> العرض</th>
                     <th scope="col"> اختر صندوق</th>
                 </tr>
                 </thead>
                 <tbody>
                 <tr>
                     <th scope="row">حجم متوسط</th>
                     <td>٥٠</td>
                     <td>١٨</td>
                     <td>١٨</td>
                     <td>١٦</td>
                     <td><i class="fab fa-get-pocket  "></i></td>
                 </tr>
                 <tr>
                     <th scope="row">حجم كبير</th>
                     <td>٥٥</td>
                     <td>١٨</td>
                     <td>١٨</td>
                     <td>٢٤</td>
                     <td><i class="fab fa-get-pocket"></i></td>
                 </tr>
                 <tr>
                     <th scope="row">حجم كبير جدا</th>
                     <td>٦٠</td>
                     <td>٢٤</td>
                     <td>١٨</td>
                     <td>٢٤</td>
                     <td><i class="fab fa-get-pocket"></i></td>
                 </tr>
                 </tbody>
             </table>
         </div>

         <div class="col-md-12">
             <h4 class="py-5"> اشحن عن طريق القطعة الواحدة</h4>
             @if(   $getItems->count() < 1)
                 <h4>لايوجد شحنات واصله للمخزن </h4>
             @else
             <h5 class="mb-5">الشحنات الموجودة (داخل امريكا) </h5>
             <hr>

                 <table class="table table-hover">
                     <thead>
                     <tr>
                         <th scope="col">شركة الشحن</th>
                         <th scope="col">رقم التعقب</th>
                         <th scope="col">الوزن (باوند)</th>
                         <th scope="col">طول (انج)</th>
                         <th scope="col">عرض (انج)</th>
                         <th scope="col">ارتفاع (انج)</th>


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


                         </tbody>

                     @endforeach
                 </table>

                 {{--                <div class="col-1">--}}
                 {{--                    <button id="submitEditItem" data-toggle="modal" type="button" data-target="{{ $getItem->id }}" class="btn btn-danger float-right editItem  ">عدل</button>--}}
                 {{--                </div>--}}
         </div>
         </div>
     @endif


@endsection
