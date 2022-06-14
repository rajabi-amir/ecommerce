@extends('admin.layout.MasterAdmin')
@section('title','سفارشات')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست سفارشات</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">سفارش</a></li>
                        <li class="breadcrumb-item active">لیست سفارشات</li>
                    </ul>
                    </br>
                    <a onclick="loadbtn(event)" href="{{route('admin.orders.create')}}"
                        class="btn btn-raised btn-info waves-effect">
                        اضافه کردن سفارش </a>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>کل سفارشات </strong>( {{$orders->total()}} )</h2>
                        </div>



                        <div class="body">
                            @if(count($orders)===0)
                            <p>هیچ رکوردی وجود ندارد</p>
                            @else
                            <div class="table-responsive">
                                <table class="table table-hover c_table theme-color">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>کاربر</th>
                                            <th>مبلغ پرداختی</th>
                                            <th>پرداخت وضعیت</th>
                                            <th>مرحله سفارش</th>
                                            <th>تاریخ</th>
                                            <th class="text-center">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key => $order)
                                        <tr>
                                            <td scope="row">{{$key+1}}</td>
                                            <td>{{$order->user->name}}</td>
                                            <td>{{number_format($order->paying_amount)}} تومان</td>
                                            <td>
                                                @if ($order->payment_status =="ناموفق")
                                                <span class="badge badge-danger p-2">پرداخت
                                                    {{$order->payment_status}}</span>
                                                @elseif ($order->payment_status =="موفق")
                                                <span class="badge badge-success p-2">پرداخت
                                                    {{$order->payment_status}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($order->status =="در انتظار پرداخت")
                                                <span class="badge badge-warning p-2">
                                                    {{$order->status}}</span>
                                                @elseif ($order->status =="آماده برای ارسال")
                                                <span class="badge badge-info p-2">
                                                    {{$order->status}}</span>
                                                @elseif ($order->status =="محصول ارسال شد")
                                                <span class="badge badge-success p-2">
                                                    {{$order->status}}</span>
                                                @elseif ($order->status =="مرجوعی")
                                                <span class="badge badge-danger p-2">
                                                    {{$order->status}}</span>
                                                @endif
                                            </td>
                                            <td>{{Hekmatinasser\Verta\Verta::instance($order->created_at)->format('Y/n/j')}}
                                            </td>

                                            <td class="text-center js-sweetalert">
                                                <a onclick="loadbtn(event)"
                                                    href="{{route('admin.orders.edit',$order->id)}}"
                                                    class="btn btn-raised btn-warning waves-effect">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a onclick="loadbtn(event)"
                                                    href="{{route('admin.orders.show',$order->id)}}"
                                                    class="btn btn-raised btn-info waves-effect">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                                <!-- <button class="btn btn-raised btn-danger waves-effect"
                                                    data-type="confirm" data-form-id="del-order-{{$order->id}}"><i
                                                        class="zmdi zmdi-delete"></i></button>
                                                <form action="{{route('admin.orders.destroy',$order->id)}}"
                                                    id="del-order-{{$order->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form> -->
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $orders->links() }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
@endsection