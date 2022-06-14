@extends('admin.layout.MasterAdmin')
@section('title','تراکنش ها')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست تراکنش ها</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">تراکنش</a></li>
                        <li class="breadcrumb-item active">لیست تراکنش ها</li>
                    </ul>
                    </br>
                    <a onclick="loadbtn(event)" href="{{route('admin.transactions.create')}}"
                        class="btn btn-raised btn-info waves-effect">
                        اضافه کردن ترکنش </a>
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
                            <h2><strong>کل تراکنش ها </strong>( {{$transactions->total()}} )</h2>
                        </div>


                        <div class="body">
                            @if(count($transactions)===0)
                            <p>هیچ رکوردی وجود ندارد</p>
                            @else
                            <div class="table-responsive">
                                <table class="table table-hover c_table theme-color">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>کاربر</th>
                                            <th>شماره سفارش</th>
                                            <th>مبلغ پرداختی </th>
                                            <th> پرداخت وضعیت</th>
                                            <th>شناسه تراکنش</th>
                                            <th>تاریخ</th>
                                            <th>درگاه پرداخت</th>
                                            <th class="text-center">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $key => $transaction)
                                        <tr>
                                            <td scope="row">{{$key+1}}</td>
                                            <td>{{$transaction->user->name}}</td>
                                            <td>{{$transaction->order_id}}</td>
                                            <td>{{number_format($transaction->amount)}} تومان</td>
                                            <td>
                                                @if ($transaction->status =="ناموفق")
                                                <span class="badge badge-danger p-2">پرداخت
                                                    {{$transaction->status}}</span>
                                                @elseif ($transaction->status =="موفق")
                                                <span class="badge badge-success p-2">پرداخت
                                                    {{$transaction->status}}</span>
                                                @endif
                                            </td>
                                            <td>{{$transaction->ref_id}}</td>

                                            <td>{{Hekmatinasser\Verta\Verta::instance($transaction->created_at)->format('Y/n/j')}}
                                            </td>
                                            <td>{{$transaction->gateway_name}}</td>

                                            <td class="text-center js-sweetalert">
                                                <a onclick="loadbtn(event)"
                                                    href="{{route('admin.transactions.edit',$transaction->id)}}"
                                                    class="btn btn-raised btn-warning waves-effect">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <!-- <a onclick="loadbtn(event)"
                                                    href="{{route('admin.transactions.show',$transaction->id)}}"
                                                    class="btn btn-raised btn-info waves-effect">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a> -->
                                                <!-- <button class="btn btn-raised btn-danger waves-effect"
                                                    data-type="confirm" data-form-id="del-transaction-{{$transaction->id}}"><i
                                                        class="zmdi zmdi-delete"></i></button>
                                                <form action="{{route('admin.transactions.destroy',$transaction->id)}}"
                                                    id="del-transaction-{{$transaction->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form> -->
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $transactions->links() }}

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