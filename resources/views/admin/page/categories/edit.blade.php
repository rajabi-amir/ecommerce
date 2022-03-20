@extends('admin.layout.MasterAdmin')

@section('Content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>ویرایش دسته بندی</h2>
                    </br>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href={{route('admin.home')}}><i class="zmdi zmdi-home"></i>
                                خانه</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">دسته بندی ها</a></li>
                        <li class="breadcrumb-item active">ویرایش {{$category->name}}</li>
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
                            <form id="form_advanced_validation" class="needs-validation" action={{route('admin.categories.update',$category->id)}} method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <label for="name">عنوان دسته بندی</label>
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? $category->name}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="slug">نام انگلیسی</label>
                                        <div class="form-group">
                                            <input type="text" name="slug" id="slug" class="form-control" value="{{old('slug') ?? $category->slug}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="parent_id">والد</label>
                                        <div class="form-group">
                                            <select id="parent_id" name="parent_id" class="form-control show-tick" required>
                                                <option value="0">بدون والد</option>
                                                @foreach ($parentCategories as $parentCategory)
                                                <option {{ old('parent_id') === $parentCategory->id || $category->parent_id === $parentCategory->id ? "selected":null}} value="{{$parentCategory->id}}">{{$parentCategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="switch">وضعیت</label>
                                        <div class="switchToggle">
                                            <input type="checkbox" name="is_active" id="switch" {{old('is_active') || !$category->is_active ? null:'checked'}}>
                                            <label for="switch">Toggle</label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="attributesId">ویژگی</label>
                                        <div class="form-group">
                                            <select id="attributesId" name="attribute_ids[]" class="form-control show-tick" title="انتخاب ویژگی" multiple data-live-search="true" data-selected-text-format="count > 3" required>
                                                @foreach ($attributes as $attribute)
                                                <option value="{{$attribute->id}}" @php if(old('attribute_ids')){
                                                    if(in_array($attribute->id, old('attribute_ids'))) echo "selected";
                                                    }
                                                    elseif($category->attributes){
                                                    if(in_array($attribute->id, $category->attributes()->pluck('id')->toArray())) echo "selected";
                                                    }
                                                    @endphp
                                                    >{{$attribute->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="attributeIsFilter">انتخاب ویژگی های قابل فیلتر</label>
                                        <div class="form-group">
                                            <select id="attributeIsFilter" name="attribute_is_filter_ids[]" class="form-control show-tick" title="انتخاب فیلتر" multiple data-selected-text-format="count > 3" required>
                                               @foreach ($category->attributes()->wherePivot('is_filter', 1)->get() as $attribute)
                                                    <option value="{{$attribute->id}}" selected>{{$attribute->name}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="attributeVariation">انتخاب ویژگی متغیر</label>
                                        <div class="form-group">
                                            <select id="attributeVariation" name="variation_id" class="form-control show-tick" required>
                                            <option value="{{$category->attributes()->wherePivot('is_variation', 1)->first()->id}}">
                                                {{$category->attributes()->wherePivot('is_variation', 1)->first()->name}}
                                            </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="icon">آیکون</label>
                                        <div class="form-group">
                                            <input type="text" name="icon" id="icon" class="form-control" value="{{old('icon') ?? $category->icon}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="decription">توضیحات</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="4" name="description" class="form-control no-resize" placeholder="لطفا آنچه را که میخواهید تایپ کنید...">{{old('description') ?? $category->description}}</textarea>
                                            </div>
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
@push('scripts')
<script>
    $('#attributesId').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
        let selectedAttributes = $(this).val();
        let attributes = @json($attributes);
        let options = ''

        let filterAttributes = attributes.filter((item) => {
            return selectedAttributes.includes(`${item.id}`);
        })

        filterAttributes.forEach(element => {
            options += `<option value="${element.id}">${element.name}</option>`
        });

        $('#attributeIsFilter').html(options);
        $("#attributeIsFilter").selectpicker("refresh");

        $('#attributeVariation').html(options);
        $("#attributeVariation").selectpicker("refresh");

    });
</script>
@endpush
