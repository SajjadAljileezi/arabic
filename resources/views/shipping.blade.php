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
                                <th scope="row">{{ $box->type }}</th>
                                <td>{{ $box->weight }}</td>
                                <td>{{ $box->height }}</td>
                                <td>{{ $box->length }}</td>
                                <td>{{ $box->width }}</td>
                                <td>
                                    <button name="{{ $box->type }}" id="" type="button"
                                            class="btn btn-success submitBox ">اضف
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
            </div>
            @endif

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
                            <th scope="col">اختر الصندوق</th>


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

                                <th scope="row" class="showItem">
                                    <select class="custom-select ">
                                        @forelse (\App\Models\BosexCarts::where('userid',Auth::user()->id)->get() as
                                        $bosex)
                                            <option selected>{{ $bosex->type }} ({{ $loop->index +1}})</option>
                                        @empty
                                            <option value="1"> اختر صندوق من فوق</option>
                                        @endforelse
                                    </select></th>
                                <th scope="row" class="showItem">
                                    <button name="" id="" type="button" class="btn btn-primary">اضف</button>
                                </th>
                            </tbody>

                        @endforeach
                    </table>

                    {{--                <div class="col-1">--}}
                    {{--                    <button id="submitEditItem" data-toggle="modal" type="button" data-target="{{ $getItem->id }}" class="btn btn-danger float-right editItem  ">عدل</button>--}}
                    {{--                </div>--}}
            </div>
        </div>
        @endif

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


            })


        </script>
@endsection
