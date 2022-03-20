@extends('admin.layout.MasterAdmin')
@section('title','لیست دسته بندی ها')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست دسته بندی ها</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">دسته بندی</a></li>
                        <li class="breadcrumb-item active">لیست دسته بندی ها</li>
                    </ul>
                    </br>
                    <a onclick="loadbtn(event)" href="{{route('admin.categories.create')}}" class="btn btn-raised btn-info waves-effect">
                        افزودن<i class="zmdi zmdi-plus mr-1 align-middle"></i></a>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            @if(count($categories)===0)
                            <p>هیچ رکوردی وجود ندارد</p>
                            @else
                            <div class="table-responsive">
                                <table class="table table-hover c_table theme-color">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th>نام انگلیسی</th>
                                            <th>والد</th>
                                            <th>وضعیت</th>
                                            <th class="text-center">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $key => $category)
                                        <tr>
                                            <td scope="row">{{$categories->firstItem() + $key}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>@if ($category->parent_id ==0)
                                                <span class="badge badge-info">اصلی</span>
                                                @else
                                                {{$category->parent->name}}
                                                @endif
                                            </td>
                                            <td>@if ($category->is_active)
                                                <span class="badge badge-success">فعال</span>
                                                @else
                                                <span class="badge badge-warning">غیرفعال</span>
                                                @endif
                                            </td>
                                            <td class="text-center js-sweetalert">
                                                <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-raised btn-info waves-effect" onclick="loadbtn(event)">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <button class="btn btn-raised btn-danger waves-effect" data-type="confirm" data-form-id="del-category-{{$category->id}}">حذف</button>
                                                <form action="{{route('admin.categories.destroy',$category->id)}}" id="del-category-{{$category->id}}" method="POST">
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
                    {{ $categories->links() }}
                </div>
            </div>
            <!-- #END# Hover Rows -->
        </div>
    </div>
</section>
@endsection
