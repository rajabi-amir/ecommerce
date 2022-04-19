<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    @if(count($products)===0)
                    <p>هیچ رکوردی وجود ندارد</p>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover c_table theme-color">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>نام برند</th>
                                    <th>نام دسته بندی</th>
                                    <th>وضعیت</th>
                                    <th class="text-center">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                <tr wire:key="{{ $product->name }}_{{ $product->id }}">
                                    <td scope="row">{{$key+1}}</td>
                                    <td><a
                                            href="{{route('admin.products.show',['product' => $product->id ])}}">{{$product->name}}</a>
                                    </td>
                                    <td><a
                                            href="{{route('admin.brands.edit',['brand' => $product->brand->id ])}}">{{$product->brand->name}}</a>
                                    </td>
                                    <td><a
                                            href="{{route('admin.categories.edit',['category' => $product->category->id ])}}">{{$product->category->name}}</a>
                                    </td>

                                    <td wire:key="{{ $product->name }}_{{ $product->id }}">
                                        <div class="row clearfix">
                                            <div class="col-6">
                                                @if ($product->is_active)
                                                <a wire:click="Inactive_product({{$product->id}})"
                                                    class="btn btn-raised btn-success waves-effect"><span
                                                        style="color: white;">منتشر
                                                        شده </span>
                                                    <span class="spinner-border spinner-border-sm text-light"
                                                        wire:loading
                                                        wire:target="Inactive_product({{$product->id}})"></span>

                                                </a>
                                                @else
                                                <a wire:click="active_product({{$product->id}})"
                                                    class="btn btn-raised btn-danger waves-effect"><span
                                                        style="color: white;">عدم
                                                        انتشار</span>
                                                    <span class="spinner-border spinner-border-sm text-light"
                                                        wire:loading
                                                        wire:target="active_product({{$product->id}})"></span>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center js-sweetalert">

                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-md btn-warning btn-outline-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <div class="dropdown-menu">

                                                <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}"
                                                    class="dropdown-item text-right"> ویرایش محصول </a>

                                                <a href="{{ route('admin.products.images.edit', ['product' => $product->id]) }}"
                                                    class="dropdown-item text-right"> ویرایش تصاویر </a>

                                                <a href="{{ route('admin.products.category.edit', ['product' => $product->id]) }}"
                                                    class="dropdown-item text-right"> ویرایش دسته بندی و ویژگی </a>

                                            </div>
                                        </div>
                                        <button class="btn btn-raised btn-danger waves-effect"
                                            wire:click="delproduct({{$product->id}})">
                                            <i class="zmdi zmdi-delete"></i>
                                            <span class="spinner-border spinner-border-sm text-light" wire:loading
                                                wire:target="delproduct"></span>
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
</div>
@push('scripts')
<script>
$(document).ready(function() {
    $("#loading").hide();
    $("#loading1").hide();
    $(document).ajaxStart(function() {
        $("#loading").show();
        $("#loading1").show();
    }).ajaxStop(function() {
        $("#loading").hide();
        $("#loading1").hide();
    });
});
</script>
@endpush