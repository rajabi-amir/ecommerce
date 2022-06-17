@extends('home.layout.MasterHome')
@section('title', "خانه - پست ها")
@section('content')

<!-- Start of Main -->
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">پست ها</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-6">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">صفحه اصلی </a></li>
                <li><a href="{{route('home.posts.index')}}">وبلاگ </a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">

            <div class="row grid cols-lg-3 cols-md-2 mb-2" data-grid-options="{
                        'layoutMode': 'fitRows'
                    }">
                @foreach($posts as $post)
                <div class="grid-item fashion">
                    <article class="post post-mask overlay-zoom br-sm">
                        <figure class="post-media">
                            <a href="post-single.html">
                                <img src="{{url('storage/'.$post->image->url)}}" width="600" height="420" alt="blog">
                            </a>
                        </figure>
                        <div class="post-details">
                            <div class="post-details-visible">
                                <div class="post-cats">
                                </div>
                                <h4 class="post-title text-white"><a
                                        href="{{route('home.posts.show' , ['post' => $post->id] )}}">{{$post->title}}</a>
                                </h4>
                            </div>
                            <div class="post-meta">
                                توسط <a href="{{route('home.posts.show' , ['post' => $post->id] )}}"
                                    class="post-author">{{$post->user->name}}</a>
                                - <a href="{{route('home.posts.show' , ['post' => $post->id] )}}"
                                    class="post-date">{{Hekmatinasser\Verta\Verta::instance($post->created_at)->format('Y/n/j')}}</a>
                                <!-- <a href="{{route('home.posts.show' , ['post' => $post->id] )}}" class="post-comment">0
                                    نظرات </a> -->
                            </div>
                        </div>
                    </article>
                </div>

                @endforeach


            </div>
            <div class="row">
                <ul dir="rtl" class="justify-content-center mb-10 pb-2 pt-2 mt-8">
                    {{$posts->links()}}
                </ul>
            </div>

            <!-- <ul class="pagination justify-content-center mb-10 pb-2 pt-2 mt-8">
                <li class="prev disabled">
                    <a href="#" aria-label="قبلی " tabindex="-1" aria-disabled="true">
                        <i class="w-icon-long-arrow-right"></i>قبلی
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="next">
                    <a href="#" aria-label="بعدی ">
                        بعدی <i class="w-icon-long-arrow-left"></i>
                    </a>
                </li>
                </ul> -->
        </div>
        <!-- End of Page Content -->
</main>
<!-- End of Main -->

@endsection