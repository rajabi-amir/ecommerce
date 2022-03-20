@extends('admin.layout.MasterAdmin')
@section('title','لیست ویژگی ها')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست ویژگی ها</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">ویژگی</a></li>
                        <li class="breadcrumb-item active">لیست ویژگی ها</li>
                    </ul>
                    </br>
                    <a onclick="loadbtn(event)" href="{{route('admin.attributes.create')}}"
                        class="btn btn-raised btn-info waves-effect">
                    افزودن<i class="zmdi zmdi-plus mr-1 align-middle"></i></a>
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
                            @if(count($attributes)===0)
                            <p>هیچ رکوردی وجود ندارد</p>
                            @else
                            <div class="table-responsive">
                                <table class="table table-hover c_table theme-color">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th class="text-center">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attributes as $key => $attribute)
                                        <tr>
                                            <td scope="row">{{$attributes->firstItem() + $key}}</td>
                                            <td>{{$attribute->name}}</td>
                                            <td class="text-center js-sweetalert">
                                                <a href="{{route('admin.attributes.edit',$attribute->id)}}"
                                                    class="btn btn-raised btn-info waves-effect"
                                                    onclick="loadbtn(event)">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <button class="btn btn-raised btn-danger waves-effect"
                                                    data-type="confirm"
                                                    data-form-id="del-attribute-{{$attribute->id}}">حذف</button>
                                                <form action="{{route('admin.attributes.destroy',$attribute->id)}}"
                                                    id="del-attribute-{{$attribute->id}}" method="POST">
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
                    {{ $attributes->links() }}
                </div>
            </div>
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
@endsection
