<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    @if(count($comments)===0)
                    <p>هیچ رکوردی وجود ندارد</p>
                    @else
                    <p>برای تایید نظر روی وضعیت آن کلیک کنید</p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نوشته توسط</th>
                                    <th>تاریخ</th>
                                    <th>نام محصول</th>
                                    <th>وضعیت</th>
                                    <th>
                                        <center>
                                            عملیات
                                        </center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                <tr wire:key="name_{{ $comment->id }}">
                                    <td scope=" row">{{$comment->id}}</td>
                                    <td>{{$comment->user->name == null ? "بدون نام" : $comment->user->name }}
                                    </td>
                                    <td>{{Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('Y/n/j')}}
                                    </td>


                                    <td>
                                        <a
                                            href="{{route('admin.products.show',['product' => $comment->commentable_id])}}">
                                            {{$comment->commentable->name}}
                                        </a>

                                    </td>
                                    <td>
                                        @if ($comment->approved==0)
                                        @php
                                        $color="danger";
                                        $title="عدم انتشار";
                                        @endphp
                                        @else
                                        @php
                                        $color="success";
                                        $title="انتشار";
                                        @endphp
                                        @endif
                                        <div class="row clearfix">
                                            <div class="col-12">
                                                <a wire:click="ChengeActive_comment({{$comment->id}})"
                                                    wire:loading.attr="disabled"
                                                    class="btn btn-raised btn-{{$color}} waves-effect"><span
                                                        style="color:white;">{{$title}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center js-sweetalert">
                                        <center>
                                            <a href="{{route('admin.comments.edit',$comment->id)}}"
                                                wire:loading.attr="disabled"
                                                class="btn btn-raised btn-info waves-effect">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>

                                            <button class="btn btn-raised btn-danger waves-effect"
                                                wire:loading.attr="disabled" wire:click="delcomment({{$comment->id}})">
                                                <i class="zmdi zmdi-delete"></i>
                                                <span class="spinner-border spinner-border-sm text-light" wire:loading
                                                    wire:target="delcomment({{$comment->id}})"></span>
                                            </button>
                                        </center>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $comments->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>