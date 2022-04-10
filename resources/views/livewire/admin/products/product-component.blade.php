@section('script')
<script>
$('#categorySelect').selectpicker({
    'title': 'انتخاب دسته بندی'
});
$('#brandSelect').selectpicker({
    'title': 'انتخاب برند'
});
$('#tagSelect').selectpicker({
    'title': 'انتخاب تگ'
});
</script>
@endsection
<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                @csrf
                <div class="body">
                    <div class="header p-0">
                        <h2><strong>اطلاعات اصلی محصول</strong></h2>
                    </div>
                    <hr>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <label>نام محصول *</label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="brand_id">برند</label>
                            <select id="brandSelect" name="brand_id" class="form-control" data-live-search="true">
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">
                                    {{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="form-group col-md-3">
                            <label for="is_active">وضعیت</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1" selected>فعال</option>
                                <option value="0">غیرفعال</option>
                            </select>
                        </div>

                        <div class="form-group col-md-9">
                            <label for="tag_ids">تگ ها</label>
                            <select id="tagSelect" name="tag_ids[]" class="form-control" multiple
                                data-live-search="true">
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row clearfix">
                        <div class="form-group col-md-12">
                            <label for="description">توضیحات</label>
                            <textarea class="form-control" id="description"
                                name="description">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="header p-0 mt-3">
                        <h2><strong>تصاویر</strong></h2>
                    </div>
                    <hr>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="header">
                                    <label for="image">تصویر اصلی *</label>
                                </div>
                                <div class="body">
                                    <p>عکس را فقط با فرمت jpg و png آپلود نمایید. </p>
                                    <div class="form-group">
                                        <input id="image" type="file" class="dropify" value="{{old('img')}}" name="img"
                                            data-allowed-file-extensions="jpg png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="header">
                                    <label class="mb-1">سایر تصاویر</label>
                                </div>
                                <div class="body">
                                    <div class="form-group">
                                        <form action="/upl" id="myDropzone" class="dropzone" method="POST"
                                            id="my-awesome-dropzone">
                                            @csrf

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header p-0">
                        <h2><strong>دسته بندی ها </strong></h2>
                    </div>
                    <hr>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <label>نام محصول *</label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="category_id">دسته بندی</label>
                            <select id="categorySelect" name="category_id" class="form-control selectpicker"
                                data-live-search="true">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }} -
                                    {{ $category->parent->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <style>
    .dropzone {
        border-radius: 5px;
        border-style: solid !important;
        border-width: 2px !important;
        border-color: #D2D5D6 !important;
        background-color: white !important;
    }
    </style>

    @endpush

    @push('scripts')
    <script>
    $('#categorySelect').on('changed.bs.select', function() {
        let categoryId = $(this).val();
        console.log(categoryId);
    })
    </script>
    <script>
    Dropzone.options.myDropzone = {
        parallelUploads: 5,
        maxFiles: 5,
        maxFilesize: 1,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        previewsContainer: ".dropzone",
        clickable: ".dropzone",
        success: function(file, response) {
            $(file.previewTemplate).append(
                '<span class="server_file">' + response + "</span>"
            );
        },

        removedfile: function(file) {
            var server_file = $(file.previewTemplate)
                .children(".server_file")
                .text();
            alert(server_file);
            $.ajax({
                type: "POST",
                url: "{{route('del')}}",
                data: {
                    _token: "{{ csrf_token() }}",
                    name: server_file,
                    request: 2,
                },
                sucess: function(data) {
                    console.log("success: " + data);
                },
            });

            var _ref;
            return (_ref = file.previewElement) != null ?
                _ref.parentNode.removeChild(file.previewElement) :
                void 0;
        },

        headers: {
            "X-CSRF-Token": "{{ csrf_token() }}",
        },
        dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
        dictDefaultMessage: "<span style='color:gray'>تصاویر را بکشید و در اینجا رها کنید</span>",
        dictFallbackMessage: "Your browser does not support drag'n'drop file uploads.",
        dictFallbackText: "Please use the fallback form below to upload your files like in the olden days.",
        dictFileTooBig: "File is too big (@{{filesize}}MiB). Max filesize: @{{maxFilesize}}MiB.",
        dictInvalidFileType: "You can't upload files of this type.",
        dictResponseError: "Server responded with @{{statusCode}} code.",
        dictCancelUpload: "توقف آپلود",
        dictUploadCanceled: "Upload canceled.",
        dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",
        dictRemoveFile: "حذف",
        dictRemoveFileConfirmation: null,
        dictMaxFilesExceeded: "You can not upload any more files.",

        init: function() {
            dzClosure = this; // Makes sure that 'this' is understood inside the functions below.
            // for Dropzone to process the queue (instead of default form behavior):
            document
                .getElementById("submit-all")
                .addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    dzClosure.processQueue();
                });
            //send all the form data along with the files:
            this.on("sendingmultiple", function(data, xhr, formData) {
                formData.append("firstname", jQuery("#firstname").val());
                formData.append("lastname", jQuery("#lastname").val());
            });
            this.on("successmultiple", function(files, response) {
                // Gets triggered when the files have successfully been sent.
                // Redirect user or notify of success.
            });
            this.on("errormultiple", function(files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
                alert("error");
            });
        },
    };
    </script>
    @endpush