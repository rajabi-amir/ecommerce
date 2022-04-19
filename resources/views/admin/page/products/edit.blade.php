@extends('admin.layout.MasterAdmin')
@section('title','ویرایش محصول')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش محصول</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">محصولات</a></li>
                        <li class="breadcrumb-item active">ویرایش محصول</li>
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
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form id="form_advanced_validation" class="needs-validation"
                            action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="POST"
                            enctype="multipart/form-data">

                            @method('put')
                            @csrf

                            <div class="body">
                                <div class="header p-0">
                                    <h2><strong>اطلاعات اصلی محصول</strong></h2>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <label>نام محصول *</label>
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{$product->name}}"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" />
                                            @error('name')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="brand_id">برند</label>
                                        <select id="brandSelect" name="brand_id" data-placeholder="انتخاب برند"
                                            class="form-control ms select2 @error('brand_id') is-invalid @enderror">
                                            <option></option>
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{$brand->id == $product->brand->id ? 'selected' : ''}}>
                                                {{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="form-group col-md-3">
                                        <label for="is_active">وضعیت</label>
                                        <select id="is_active" name="is_active"
                                            class="form-control ms select2 @error('is_active') is-invalid @enderror">
                                            <option value="1" {{$product->is_active == 1 ? 'selected' : ''}}>فعال
                                            </option>
                                            <option value="0" {{$product->is_active == 0 ? 'selected' : ''}}>غیرفعال
                                            </option>
                                        </select>
                                        @error('is_active')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-9">
                                        <label for="tag_ids">تگ ها</label>
                                        <select id="tagSelect" name="tag_ids[]" data-placeholder="انتخاب تگ"
                                            class="form-control ms select2 @error('tag_ids.*') is-invalid @enderror"
                                            multiple data-live-search="true">
                                            @php
                                            $productTagIds = $product->tags()->pluck('id')->toArray()
                                            @endphp
                                            @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                {{ in_array($tag->id, $productTagIds) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('tag_ids.*')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="form-group col-md-12">
                                        <label for="description">توضیحات</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                            id="description" rows="6"
                                            name="description">{{ $product->description }}</textarea>
                                        @error('description')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="header p-0 mt-3">
                                    <h2><strong>ویژگی ها </strong></h2>
                                </div>
                                <hr>
                                <!-- ویژگی های ثابت -->
                                <div class="row clearfix">
                                    @foreach ($product_attributes as $productAttribute)
                                    <div class="form-group col-md-4">
                                        <label>{{ $productAttribute->attribute->name }}</label>
                                        <input class="form-control" type="text"
                                            name="attribute_values[{{ $productAttribute->id }}]"
                                            value="{{ $productAttribute->value }}">
                                        @error('attribute_values.{{$productAttribute->id}}')
                                        <span class="text-danger m-0">{{$message}}</span>
                                        @enderror
                                    </div>
                                    @endforeach

                                </div>
                                <!-- ویژگی های ثابت -->

                                <!-- ویژگی های متغییر -->
                                @foreach ($product_variation as $variation)
                                <div class="col-md-12">
                                    <hr>
                                    <div class="d-flex">

                                        <p class="mb-0 mr-3">
                                            <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse"
                                                data-target="#collapse-{{ $variation->id }}">
                                                قیمت و موجودی برای متغیر ( {{ $variation->value }} )
                                            </button>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="collapse mt-2" id="collapse-{{ $variation->id }}">
                                        <div class="card card-body">
                                            <div class="row">
                                                <div class="form-group col-md-4 col-sm-4">
                                                    <label> قیمت </label>
                                                    <input type="text" class="form-control"
                                                        name="variation_values[{{ $variation->id }}][price]"
                                                        value="{{ $variation->price }}">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label> تعداد </label>
                                                    <input type="text" class="form-control"
                                                        name="variation_values[{{ $variation->id }}][quantity]"
                                                        value="{{ $variation->quantity }}">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label> sku </label>
                                                    <input type="text" class="form-control"
                                                        name="variation_values[{{ $variation->id }}][sku]"
                                                        value="{{ $variation->sku }}">
                                                </div>

                                                {{-- Sale Section --}}
                                                <div class="col-md-12">
                                                    <p> حراج : </p>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label> قیمت حراجی </label>
                                                    <input type="text"
                                                        name="variation_values[{{ $variation->id }}][sale_price]"
                                                        value="{{ $variation->sale_price }}" class="form-control">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label> تاریخ شروع حراجی </label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            id="variationInputDateOnSaleFrom-{{ $variation->id }}"
                                                            name="variation_values[{{ $variation->id }}][date_on_sale_from]"
                                                            value="{{ $variation->date_on_sale_from == null ? null : verta($variation->date_on_sale_from) }}">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label> تاریخ پایان حراجی </label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            id="variationInputDateOnSaleTo-{{ $variation->id }}"
                                                            name="variation_values[{{ $variation->id }}][date_on_sale_to]"
                                                            value="{{ $variation->date_on_sale_to == null ? null : verta($variation->date_on_sale_to) }}">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- هزینه ارسال -->
                                <div class="header p-0 mt-5">
                                    <h2><strong>هزینه ارسال</strong></h2>
                                </div>
                                <hr>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <label for="delivery_amount">هزینه ارسال*</label>
                                        <div class="form-group">
                                            <input class="form-control @error('delivery_amount') is-invalid @enderror"
                                                onfocus="itpro_1(this.value);" id="delivery_amount"
                                                name="delivery_amount" type="text"
                                                value="{{ $product->delivery_amount}}">
                                            @error('delivery_amount')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <span id="delivery_1"></span>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="delivery_amount_per_product"> هزینه ارسال به ازای محصول
                                            اضافی*</label>

                                        <div class="form-group">
                                            <input wire:model="essage"
                                                class="form-control @error('delivery_amount_per_product') is-invalid @enderror"
                                                id="delivery_amount_per_product" name="delivery_amount_per_product"
                                                type="text" value="{{ $product->delivery_amount_per_product }}">
                                            @error('delivery_amount_per_product')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <span id="delivery_2"></span>
                                    </div>
                                </div>
                        </form>

                    </div>
                    <div class="form-group">
                        <button type="submit" form="form_advanced_validation"
                            class="btn btn-raised btn-success waves-effect">ویرایش</button>
                    </div>
                </div>
            </div>
        </div>
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
        let variations = @json($product_variation);
        variations.forEach(variation => {

            $(document).ready(function() {

                $(`#variationInputDateOnSaleFrom-${variation.id}`).pDatepicker({
                    initialValue: false,
                    format: 'L'
                });
                $(`#variationInputDateOnSaleTo-${variation.id}`).pDatepicker({
                    initialValue: false,
                    format: 'L'
                });
            });
        });
        </script>


        <script>
        $('#delivery_amount').on('keyup keypress focus change', function(e) {
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
                document.getElementById("delivery_1").innerHTML = output + 'تومان';
            } else {
                document.getElementById("delivery_1").innerHTML = '';
            }
        });
        $('#delivery_amount_per_product').on('keyup keypress focus change', function(e) {
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
                document.getElementById("delivery_2").innerHTML = output + 'تومان';
            } else {
                document.getElementById("delivery_2").innerHTML = '';
            }
        });
        </script>
        @endpush
    </div>
    <!-- #END# Hover Rows -->
    </div>

</section>


@endsection