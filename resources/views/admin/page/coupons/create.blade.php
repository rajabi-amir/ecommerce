@extends('admin.layout.MasterAdmin')
@section('title','ایجاد کد تخفیف')

@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ایجاد کد تخفیف</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.coupons.index')}}">بنر ها</a></li>
                        <li class="breadcrumb-item active">ایجاد بنر</li>
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

            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <div class="container">
                            <div class="alert-icon">
                                <i class="zmdi zmdi-block"></i>
                            </div>
                            {{ $error }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                    <div class="card">
                        <div class="body">
                            <form id="form_advanced_validation" class="needs-validation"
                                action={{route('admin.coupons.store')}} method="POST">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <label for="name">نام</label>
                                        <div class="form-group">
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{old('name')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="code">کد</label>
                                        <div class="form-group">
                                            <input id="code" name="code" class="form-control" value="{{old('code')}}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-3 pos-01">
                                        <label for="type">نوع تخفیف</label>
                                        <div class="form-group">
                                            <select id="type" name="type" data-placeholder="نوع"
                                                class="form-control ms select2" required>
                                                <option></option>
                                                <option value="amount">مبلغی</option>
                                                <option value="percentage">درصدی</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="amount">مبلغ</label>
                                        <div class="form-group">
                                            <input type="text" name="amount" id="amount" class="form-control"
                                                value="{{old('amount')}}">
                                            <span id="amount_1"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="percentage">مبلغ درصدی</label>
                                        <div class="form-group">
                                            <input type="text" name="percentage" id="percentage" class="form-control"
                                                value="{{old('percentage')}}">
                                            <span id="percentage_1"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="max_percentage_amount">حداکثر مبلغ برای نوع درصدی</label>
                                        <div class="form-group">
                                            <input type="text" name="max_percentage_amount" id="max_percentage_amount"
                                                class="form-control" value="{{old('max_percentage_amount')}}">
                                            <span id="max_percentage_amount_1"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label> تاریخ پایان کد تخفیف </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="expireDate">
                                            <input type="hidden" id="expireDate-alt" name="expired_at">
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <label for="text">توضیحات</label>
                                        <div class="form-group">
                                            <textarea name="text" id="text"
                                                class="form-control @error('text') is-invalid @enderror"
                                                rows="5">{{old('text')}}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-raised btn-primary waves-effect">ذخیره</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
@endsection

@push('styles')
<!-- تاریخ -->
<link rel="stylesheet" type="text/css"
    href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css" />
<!-- تاریخ پایان-->
@endpush

@push('scripts')
<script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
<script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
<script>
$("#expireDate").pDatepicker({
    initialValueType: 'gregorian',
    format: 'LLLL',
    altField: "#expireDate-alt",
    altFormat: 'g',
    minDate: "new persianDate().unix()",
    timePicker: {
        enabled: true,
        second: {
            enabled: false
        },
    },
    altFieldFormatter: function(unixDate) {
        var self = this;
        var thisAltFormat = self.altFormat.toLowerCase();
        if (thisAltFormat === 'gregorian' || thisAltFormat === 'g') {
            persianDate.toLocale('en');
            var p = new persianDate(unixDate).toCalendar('gregorian').format(
                'YYYY-MM-DD HH:mm:ss');;
            return p;
        }
        if (thisAltFormat === 'unix' || thisAltFormat === 'u') {
            return unixDate;
        } else {
            var pd = new persianDate(unixDate);
            pd.formatPersian = this.persianDigit;
            return pd.format(self.altFormat);
        }
    },
});
</script>
<script>
$('#amount').on('keyup keypress focus change', function(e) {
    Number = $(this).val()
    Number += '';
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    x = Number.split('.');
    y = x[0];
    z = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(y))
        y = y.replace(rgx, '$1' + ',' + '$2');
    output = y + z;
    if (output != "") {
        document.getElementById("amount_1").innerHTML = output + 'تومان';
    } else {
        document.getElementById("amount_1").innerHTML = '';
    }
});
//
$('#percentage').on('keyup keypress focus change', function(e) {
    Number = $(this).val()
    Number += '';
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    x = Number.split('.');
    y = x[0];
    z = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(y))
        y = y.replace(rgx, '$1' + ',' + '$2');
    output = y + z;
    if (output != "") {
        document.getElementById("percentage_1").innerHTML = output + 'تومان';
    } else {
        document.getElementById("percentage_1").innerHTML = '';
    }
});
//
$('#max_percentage_amount').on('keyup keypress focus change', function(e) {
    Number = $(this).val()
    Number += '';
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    Number = Number.replace(',', '');
    x = Number.split('.');
    y = x[0];
    z = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(y))
        y = y.replace(rgx, '$1' + ',' + '$2');
    output = y + z;
    if (output != "") {
        document.getElementById("max_percentage_amount_1").innerHTML = output + 'تومان';
    } else {
        document.getElementById("max_percentage_amount_1").innerHTML = '';
    }
});
</script>

@endpush