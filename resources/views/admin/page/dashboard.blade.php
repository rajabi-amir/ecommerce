@extends('admin.layout.MasterAdmin')
@section('title','داشبورد')
@section('Content')
<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>داشبورد</h2>
                    </br>
                    <ul class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> </a></li> -->
                        <!-- <li class="{{route('admin.home')}}">داشبورد </li> -->
                    </ul>
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
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon traffic">
                        <div class="body">
                            <h6>سفارشات ارسالی</h6>
                            <h2>{{$successsend_order}}<small class="info">از {{$all_order}}</small></h2>
                            <small>{{(int)(($successsend_order/($all_order>0 ? $all_order : 1))*100)}}% تراکنش
                                موفق</small>
                            <div class="progress">
                                <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45"
                                    aria-valuemin="0" aria-valuemax="{{$all_order}}"
                                    style="width: {{($successsend_order/($all_order>0 ? $all_order : 1))*100}}%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon sales">
                        <div class="body">
                            <h6>آماده به ارسال</h6>
                            <h2>{{$successpay_order}} <small class="info">از {{$all_order}}</small></h2>
                            <small>{{(int)(($successpay_order/($all_order>0 ? $all_order : 1))*100)}}% سفارشات آماده
                                برای ارسال</small>
                            <div class="progress">
                                <div class="progress-bar l-blue" role="progressbar" aria-valuenow="38" aria-valuemin="0"
                                    aria-valuemax="{{$all_order}}"
                                    style="width: {{($successpay_order/($all_order>0 ? $all_order : 1))*100}}%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon email">
                        <div class="body">
                            <h6>سفارشات مرجوعی</h6>
                            <h2>{{$returned_order}} <small class="info">از {{$all_order}}</small></h2>
                            <small> {{(int)(($returned_order/($all_order>0 ? $all_order : 1))*100)}}% سفارشات
                                مرجوعی</small>
                            <div class="progress">
                                <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39"
                                    aria-valuemin="{{$all_order}}" aria-valuemax="100"
                                    style="width: {{($returned_order/($all_order>0 ? $all_order : 1))*100}}%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon domains">
                        <div class="body">
                            <h6> در انتظار پرداخت</h6>
                            <h2>{{$notpay_order}} <small class="info">از {{$all_order}}</small></h2>
                            <small>{{(int)(($notpay_order/($all_order>0 ? $all_order : 1))*100)}}% در انتظار
                                پرداخت</small>
                            <div class="progress">
                                <div class="progress-bar l-green" role="progressbar" aria-valuenow="89"
                                    aria-valuemin="0" aria-valuemax="{{$all_order}}"
                                    style="width: {{($notpay_order/($all_order>0 ? $all_order : 1))*100}}%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <cart>
                        <div class="header">
                            <h6><strong><i class="zmdi zmdi-chart"></i> گزارش</strong> هزینه ها</h6>
                            <ul class="header-dropdown">
                            </ul>
                        </div>
                    </cart>
                </div>
            </div>

            <div class="row clearfix">

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon ">
                        <div class="body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6>{{number_format( $amunt_success_orders)}} تومان</h6>
                                    <h6><i class="zmdi zmdi-print"></i> مجموع <strong>خالص پرداختی
                                            مشتری</strong></h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon">
                        <div class="body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6>{{number_format($amunt_coupon_orders)}} تومان</h6>
                                    <h6><i class="zmdi zmdi-turning-sign"></i> مجوع تخفیف ها</h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon">
                        <div class="body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6>{{number_format($amunt_delivery_orders)}} تومان</h6>
                                    <h6><i class="zmdi zmdi-alert-circle-o"></i> هزینه های ارسال</h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon">
                        <div class="body">
                            <div class="state_w1 mb-1 mt-1">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6>{{number_format($amunt_total_orders)}} تومان</h6>
                                        <h6><i class="zmdi zmdi-balance"></i> مجموع هزینه ها</h6>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong><i class="zmdi zmdi-chart"></i> گزارش</strong> بازدید</h2>
                                    </div>
                                    <div class="body">
                                        <div id="chart-area-spline-sracke" class="c3_chart d_sales"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12 col-lg-12">

                    <div class="card">
                        <div class="header">
                            <h2><strong><i class="zmdi zmdi-chart"></i> گزارش </strong> تراکنش های یکسال گذشته </h2>
                        </div>
                        <div class="body">
                            <div id="chart-area-spline-transaction" class="c3_chart d_sales"></div>
                        </div>
                    </div>

                </div>

            </div>
            </br>
            <div class="row clearfix">

                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>صفحات پر بازدید</strong></h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">ویرایش</a></li>
                                        <li><a href="javascript:void(0);">حذف</a></li>
                                        <li><a href="javascript:void(0);">گزارش</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body text-center">
                            <div id="chart-pie" class="c3_chart d_distribution"></div>
                            <!-- <button hidden class="btn btn-primary mt-4 mb-4">مشاهده بیشتر</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<!-- نمودار درصد ترافیک -->

<script>
initC3Chart();

function initC3Chart() {
    setTimeout(function() {
        month_visits = "{{json_encode($month_visits)}}";
        month_visits = JSON.parse(month_visits);
        $(document).ready(function() {
            var chart = c3.generate({
                bindto: "#chart-area-spline-sracke", // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        ["data1", month_visits[0], month_visits[1], month_visits[2],
                            month_visits[3], month_visits[4], month_visits[5], month_visits[
                                6], month_visits[7], month_visits[8], month_visits[9],
                            month_visits[10], month_visits[11]
                        ],
                    ],
                    type: "area-spline", // default type of chart
                    groups: [
                        ["data1", "data2", "data3"]
                    ],
                    colors: {
                        data1: Aero.colors["teal"],
                    },
                    names: {
                        // name of each serie
                        data1: "میزان بازدید",
                    },
                },
                axis: {

                    x: {
                        type: "category",
                        // name of each category
                        categories: [
                            "فروردین",
                            "اردیبهشت",
                            "خرداد",
                            "تیر",
                            "مرداد",
                            "شهریور",
                            "مهر",
                            "آبان",
                            "آذر",
                            "دی",
                            "بهمن",
                            "اسفند",
                        ],
                    },
                },
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0,
                },
            });
        });
    }, 500);


    setTimeout(function() {
        $success = @json($successTransactions);
        $unsuccess = @json($unsuccessTransactions);
        month_visits = "{{json_encode($month_visits)}}";
        month_visits = JSON.parse(month_visits);
        $(document).ready(function() {
            var chart = c3.generate({
                bindto: "#chart-area-spline-transaction", // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        [$success[0], $success[1], $success[2],
                            $success[3],
                            $success[4],
                            $success[5], $success[6], $success[7], $success[8], $success[9],
                            $success[10], $success[11], $success[12]
                        ],
                        [$unsuccess[0], $unsuccess[1], $unsuccess[2], $unsuccess[3],
                            $unsuccess[4], $unsuccess[5], $unsuccess[6], $unsuccess[7],
                            $unsuccess[8], $unsuccess[9], $unsuccess[10], $unsuccess[11],
                            $unsuccess[12]
                        ],


                    ],
                    type: "area-spline", // default type of chart
                    groups: [
                        ["data1", "data2"]
                    ],
                    colors: {
                        data1: Aero.colors["teal"],
                        data2: Aero.colors["red"],
                    },
                    names: {
                        // name of each serie
                        data1: "تراکنش موفق",
                        data2: "تراکنش ناموفق",
                    },
                },
                axis: {
                    x: {
                        type: "category",
                        // name of each category
                        categories: @json($labels),
                    },
                    y: {
                        show: false,
                        tick: {
                            format: function(d) {
                                return number_format(d) + ' ' + 'تومان';
                            },
                        }
                    }

                },

                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0,
                },
            });
        });
    }, 500);


}
</script>
<!-- پایان نمودار درصد ترافیک -->

<script>
$(document).ready(function() {
    more_1 = @json($more[0]);
    more_2 = @json($more[1]);
    more_3 = @json($more[2]);

    var chart = c3.generate({
        bindto: "#chart-pie", // id of chart wrapper
        data: {
            columns: [

                ["data1", more_1.pageViews],
                ["data2", more_2.pageViews],
                ["data3", more_3.pageViews],

                // each columns data


            ],
            type: "pie", // default type of chart
            colors: {
                data1: Aero.colors["lime"],
                data2: Aero.colors["teal"],
                data3: Aero.colors["gray"],
            },
            names: {
                // name of each serie
                data1: more_1.pageTitle,
                data2: more_2.pageTitle,
                data3: more_3.pageTitle,
            },
        },
        axis: {},
        legend: {
            show: true, //hide legend
        },
        padding: {
            bottom: 0,
            top: 0,
        },
    });
});
</script>


@endpush

@endsection