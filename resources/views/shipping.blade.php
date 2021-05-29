@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="py-5">اختر عملية الشحن </h1>
        <div class="row">

            <div class="col-md-12">
                <h4>اشحن عن طريق التجميع في صناديق محددة</h4>
                <h5 class="py-3"> الصناديق الموجودة لدينا</h5>
                @if(   $boxes->count() < 1)
                    <h4>لايوجد شحنات واصله للمخزن </h4>
                @else
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
                        @foreach ($boxes as $box)
                            <tbody>
                            <tr>
                                <th scope="row">{{ $box->size }}</th>
                                <td>{{ $box->weight }}</td>
                                <td>{{ $box->height }}</td>
                                <td>{{ $box->length }}</td>
                                <td>{{ $box->width }}</td>
                                <td>
                                    <button name="{{ $box->size }}" id="" type="button"
                                            class="btn btn-success submitBox ">اضف
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
            </div>
            @endif
            @if(   $items->count() < 1)

            @else
            <div class="col-md-12 ">
              <h4 class="mt-5 "> احجام الصناديق</h4>
                <br>
                    <div class="row">

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
                                    <th scope="row">{{$item->size}}</th>
                                    <td class="watchWeights">{{$item->weight}}</td>
                                    <td class="watchWeight">{{$item->height}}</td>
                                    <td class="watchWeight">{{$item->length}}</td>
                                    <td class="watchWeight">{{$item->width}}</td>
                                </tr>

                                </tbody>
                            @endforeach
                        </table>
                    </div>



                @endif


            </div>
            <div class="col-md-12 mt-5">
                @if(   $getItems->count() < 1)
                    <h4>لايوجد شحنات او قطع    </h4>
                @else
                    <h5 class="mb-5">الشحنات الموجودة   </h5>
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
                            <th scope="col">اختر الصندوق</th>


                        </tr>
                        </thead>


                        @foreach ($getItems as $getItem)

                            <tbody>

                            <tr id="warning">


                                <th class='pd-company'>{{ $getItem->company }}</th>

                                <th class='pd-tracking' >{{ $getItem->tracking }}</th>

                                <th scope="row" class='pd-weight'>{{ $getItem->weight }}  </th>
                                <th scope="row" class='pd-length'>{{ $getItem->length }}   </th>
                                <th scope="row" class='pd-width'>{{ $getItem->width }}   </th>
                                <th scope="row" class='pd-height'>{{ $getItem->height }}   </th>

                                <th scope="row" >
                                    <select id="" class="custom-select size ">
                                        @forelse (\App\Models\BosexCarts::where('userid',Auth::user()->id)->get() as
                                        $bosex)
                                            <option class="pd-measure" selected>{{ $bosex->size }} ({{ $loop->index
                                            +1}})</option>
                                        @empty
                                            <option value="1"> اختر صندوق من فوق</option>
                                        @endforelse
                                    </select></th>
                                <th scope="row" class="showItem">
                                    <button name="" id="" type="button" class="btn btn-primary submitMeasure">اضف</button>
                                </th>
                            </tbody>

                        @endforeach
                    </table>
            </div>
        </div>
        @endif
        <hr>
        <h4 class="m-5"> الصناديق الجاهزة للشحن</h4>


        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">شركة الشحن</th>
                <th scope="col">رقم التعقب</th>
                <th scope="col">الوزن (باوند)</th>
                <th scope="col">طول (انج)</th>
                <th scope="col">عرض (انج)</th>
                <th scope="col">ارتفاع (انج)</th>
                <th scope="col"> الصندوق</th>
            </tr>
            </thead>
            @forelse (\App\Models\Measure::where('userid',Auth::user()->id)->get() as $readybox)
            <tbody>
            <tr>

                <th class='pd '>{{ $readybox->company }}</th>

                <th class='pd ' >{{ $readybox->tracking }}</th>

                <th scope="row" class='pd '>{{ $readybox->weight }}  </th>
                <th scope="row" class='pd '>{{ $readybox->length }}   </th>
                <th scope="row" class='pd '>{{ $readybox->width }}   </th>
                <th scope="row" class='pd '>{{ $readybox->height }}   </th>
                <th scope="row" class='pd '>{{ $readybox->size }}   </th>

                <th scope="row" >
                    <button name=" {{ $readybox->id }} " id="" type="button" class="btn btn-danger returnBox ">اعد</button>
                </th>
            </tr>

            </tbody>
            @empty
                <h3> اضف شحناتك الى صناديق الشحن </h3>
            @endforelse
        </table>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".submitBox").click(function (e) {
                e.preventDefault();
                var size = {'size': this.name};

                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: '/box',

                    data: {size, "_token": "{{ csrf_token() }}",},

                    success: function () {
                        window.location.reload(true);
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(" املئ الفورم بالانكليزيه ولاتترك فراغ");
                        window.location.reload(true);
                    }


                });


            }),

            $(".submitMeasure").click('change',function (e) {
                var currentRow = $(this).closest("tr");
                var company = currentRow.find(".pd-company").html();
                var tracking = currentRow.find(".pd-tracking").html();
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
                    window.location.reload(true);
                },
                error: function(xhr,err){
                    alert("تحذير "+xhr.responseText);
                    window.location.reload(true);
                }


            });
            });


            $(".returnBox").click(function (e) {
                e.preventDefault();
                var id = {'id': this.name};

                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: '/return',

                    data: {id, "_token": "{{ csrf_token() }}",},

                    success: function () {
                        alert( 'تم الاعادة بنجاح');
                        window.location.reload(true);
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(" حصل خطا ما");
                         window.location.reload(true);
                    }


                });


            })


            // $(document).ready(function(){
            //     var a = document.querySelector(".watchWeight").textContent;
            //     console.log(a)
            //     if(a > 10) {
            //         $('.changable').addClass('backgroundred');
            //     }
            //     else if(a < 10) {
            //         $('.changable').addClass('backgroundgreen');
            //     }
            //     else {
            //         $('.changable').addClass('backgroundorange');
            //     }
            //
            // });



            $(document).ready(function(){
                jQuery(".watchWeight").each(function(index, currentElement) {
                  var current=  $(currentElement).text()

                        if(current > 10) {
                            $(this).addClass('backgroundred');
                        }
                        else if(current < 10) {
                            $(this).addClass('backgroundgreen');
                        }
                        else {
                            $(this).addClass('backgroundorange');
                        }
                });
               });
            $(document).ready(function(){
                jQuery(".watchWeights").each(function(index, currentElement) {
                  var current=  $(currentElement).text()
                        if(current > 45) {
                            $(this).addClass('backgroundred');
                        }
                        else if(current < 45) {
                            $(this).addClass('backgroundgreen');
                        }
                        else {
                            $(this).addClass('backgroundorange');
                        }
                });
               });
        </script>
@endsection
