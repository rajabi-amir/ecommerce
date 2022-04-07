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

                    <div class="header p-0">
                        <h2><strong>تصاویر</strong></h2>
                    </div>
                    <hr>

                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>تصویر اصلی *</strong></h2>
                                    </div>
                                    <div class="body">
                                        <p>عکس را فقط با فرمت jpg و png آپلود نمایید. </p>
                                        <div class="form-group">
                                            <input type="file" class="dropify" value="{{old('img')}}" name="img"
                                                data-allowed-file-extensions="jpg png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header">
                        <h2><strong>سایر تصاویر</strong></h2>
                    </div>
                    <div class="container my-4">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="file-loading">
                                    <input wire:model.defer="photo" id="input-21" data-overwrite-initial="true"
                                        name="otherimg[]" multiple type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="form-group col-md-12">
                            <button wire:click="send">send</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>