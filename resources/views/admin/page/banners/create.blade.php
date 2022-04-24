@extends('admin.layout.MasterAdmin')
@section('title','ایجاد بنر')

@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ایجاد بنر</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.banners.index')}}">بنر ها</a></li>
                        <li class="breadcrumb-item active">ایجاد بنر</li>
                    </ul>
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
                            <form id="form_advanced_validation" class="needs-validation" action={{route('admin.banners.store')}} method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <label for="title">عنوان بنر</label>
                                        <div class="form-group">
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="text">متن</label>
                                        <div class="form-group">
                                            <input id="text" name="text" class="form-control" value="{{old('text')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="type">نوع</label>
                                        <div class="form-group">
                                            <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{old('type')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="switch">وضعیت</label>
                                        <div class="switchToggle">
                                            <input type="checkbox" name="is_active" id="switch" {{old('is_active') ? 'checked' : null}}>
                                            <label for="switch">Toggle</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="priority"> اولویت</label>
                                        <div class="form-group">
                                            <input type="number" name="priority" id="priority" class="form-control @error('priority') is-invalid @enderror" value="{{old('priority')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="button_text">متن دکمه</label>
                                        <div class="form-group">
                                            <input type="text" name="button_text" id="button_text" class="form-control @error('button_text') is-invalid @enderror" value="{{old('button_text')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="button_link">لینک دکمه</label>
                                        <div class="form-group">
                                            <input type="text" name="button_link" id="button_link" class="form-control @error('button_link') is-invalid @enderror" value="{{old('button_link')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="button_icon">آیکون دکمه</label>
                                        <div class="form-group">
                                            <input type="text" name="button_icon" id="button_icon" class="form-control" value="{{old('button_icon')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <label for="image">تصویر</label>
                                        <div class="form-group">
                                            <input name="image" id="image" type="file" class="dropify form-controll" required data-allowed-file-extensions="jpg png jpeg svg" data-max-file-size="1024K">
                                            @error('image')
                                            <span class="text-danger m-0">{{$message}}</span>
                                            @enderror
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
