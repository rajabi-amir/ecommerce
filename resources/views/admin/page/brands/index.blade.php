@extends('admin.layout.MasterAdmin')

@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست برند ها</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">برند</a></li>
                        <li class="breadcrumb-item active">لیست برند ها</li>
                    </ul>
                    </br>
                    <a onclick="loadbtn(event)" href="{{route('admin.brands.create')}}"
                        class="btn btn-raised btn-info waves-effect">
                        اضافه کردن برند </a>
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
                        <div class="body">
                            @if(count($brands)===0)
                            <p>هیچ رکوردی وجود ندارد</p>
                            @else
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>نام</th>
                                            <th>وضعیت</th>
                                            <th class="text-center">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $key => $brand)
                                        <tr>
                                            <td scope="row">{{$key+1}}</td>
                                            @if(Storage::exists('brand/'.$brand->image))
                                            <td>
                                                <img src="{{asset('storage/brand/'.$brand->image)}}"
                                                    alt="{{$brand->name}}" width="120" class="img-fluid rounded"
                                                    style="min-height: 3rem;">
                                            </td>
                                            @endif
                                            <td>{{$brand->name}}</td>
                                            <td>
                                                <div class="row clearfix">
                                                    <div class="col-6">
                                                        @if ($brand->is_active)
                                                        <span class="badge badge-success">منتشر شده</span>
                                                        @else
                                                        <span class="badge badge-danger">عدم انتشار</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center js-sweetalert">
                                                <a href="{{route('admin.brands.edit',$brand->id)}}"
                                                    class="btn btn-raised btn-info waves-effect"
                                                    onclick="loadbtn(event)">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <button class="btn btn-raised btn-danger waves-effect"
                                                    data-type="confirm" data-form-id="del-brand-{{$brand->id}}">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                                <form action="{{route('admin.brands.destroy',$brand->id)}}"
                                                    id="del-brand-{{$brand->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        {{$brands->links('vendor.pagination.bootstrap-4')}}
                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
@endsection