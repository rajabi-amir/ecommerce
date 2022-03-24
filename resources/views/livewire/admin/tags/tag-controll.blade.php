<div>
    <!-- Hover Rows -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">تگ ها</label>
                                    <input type="text" name="name" wire:model="tag_name" class="form-control" required>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <button wire:click="addTag()"
                                class="btn btn-raised {{$is_edit ? 'btn-warning' : 'btn-primary'}}  waves-effect">
                                {{$is_edit ? 'ویرایش' : 'اضافه کردن'}}
                                <span class="spinner-border spinner-border-sm text-light" wire:loading
                                    wire:target="addTag()"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Hover Rows -->
    <!-- لیست -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="body">
                    @if(count($tags)===0)
                    <p>هیچ رکوردی وجود ندارد</p>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th class="text-center js-sweetalert">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $key => $tags)
                                <tr>
                                    <td scope="row">{{$key+1}}</td>
                                    <td>{{$tags->name}}</td>
                                    <td class="text-center js-sweetalert">

                                        <button wire:click="edit_tag({{$tags->id}})" wire:key="{{$tags->id}}"
                                            class="btn btn-raised btn-info waves-effect scroll">
                                            <i class="zmdi zmdi-edit"></i>
                                            <span class="spinner-border spinner-border-sm text-light" wire:loading
                                                wire:target="edit_tag({{$tags->id}}) "></span>
                                        </button>

                                        <button class="btn btn-raised btn-danger waves-effect"
                                            wire:click="del_tag({{$tags->id}})">
                                            <i class="zmdi zmdi-delete"></i>

                                            <span class="spinner-border spinner-border-sm text-light" wire:loading
                                                wire:target="del_tag({{$tags->id}})"></span>
                                        </button>

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
    <!-- پایان لیست -->
</div>
@push('scripts')
<script>
$('.scroll').click(function() {
    $("html, body").animate({
        scrollTop: 0
    }, 600);
    return false;
});
</script>

@endpush