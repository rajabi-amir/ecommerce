@extends('admin.layout.MasterAdmin')
@section('title','ویرایش کامنت')
@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">

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
                                action={{route('admin.comments.update',$comment->id)}} method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <label for="title">نام نویسنده</label>
                                        <div class="form-group">
                                            <input type="text" id="title" disabled
                                                class="form-control @error('name') is-invalid @enderror"
                                                value='{{$comment->user->name == null ? "بدون نام" : $comment->user->name }}'>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="date">تاریخ</label>
                                        <div class="form-group">
                                            <input type="text" id="date" disabled
                                                class="form-control @error('date') is-invalid @enderror"
                                                value="{{old('date') ?? Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('Y/n/j')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="product">محصول</label>
                                        <div class="form-group">
                                            <input type="text" id="product" disabled
                                                class="form-control @error('date') is-invalid @enderror"
                                                value="{{old('product') ?? $comment->product->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <label for="text">دیدگاه</label>
                                        <div class="form-group">
                                            <textarea name="text" id="text" minlength="5" required
                                                class="form-control">{{old('text') ?? $comment->text}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                        class="btn btn-raised btn-primary waves-effect">ویرایش</button>
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