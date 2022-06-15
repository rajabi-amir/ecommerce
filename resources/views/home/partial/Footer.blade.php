<footer class="footer appear-animate" data-animation-options="{
            'name': 'fadeIn'
        }">
    <div class="container">
        <div class="footer-newsletter">
            <div class="row justify-content-center align-items-center">
                @isset($setting->logo)
                <div class="col-xl-3 col-lg-2">
                    <a href="{{route('home')}}" class="logo-footer">
                        <img src="{{asset('storage/logo/'.$setting->logo)}}" alt="logo-footer" width="145"
                            height="45" />
                    </a>
                </div>
                @endisset
                <div class="col-xl-4 col-lg-5">
                    <div class="icon-box icon-box-side text-dark">
                        <div class="icon-box-icon d-inline-flex">
                            <i class="w-icon-envelop3"></i>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-uppercase font-weight-bold">مشترک شدن در خبرنامه ما</h4>
                            <p>آخرین اطلاعات مربوط به رویدادها ، فروش و پیشنهادات را دریافت کنید.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-9 mt-4 mt-lg-0 ">
                    <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                        <input type="email" class="form-control mr-2 bg-white text-default" name="email" id="email"
                            placeholder="آدرس ایمیل شما" />
                        <button class="btn btn-primary btn-rounded" type="submit">مشترک شدن<i
                                class="w-icon-long-arrow-left"></i></button>
                    </form>
                </div>
            </div>
        </div>


        <div class="footer-top">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <div class="widget widget-about">
                        <div class="widget-body">
                            @isset($setting->work_days)
                            <p class="widget-about-title">ساعات کاری: <strong> {{$setting->work_days}}</strong></p>
                            @endisset
                            @if(json_decode($setting->phones,true) !== null && json_decode($setting->phones,true) !==
                            [])
                            <p class="widget-about-title">سوال داشتید؟ 24/7 با ما تماس بگیرید</p>
                            @foreach (json_decode($setting->phones,true) as $phone)
                            <a href="tel:{{$phone}}" class="widget-about-call">{{$phone}}</a>
                            @endforeach
                            @endif
                            @isset($setting->description)
                            <p class="widget-about-desc">
                                {{$setting->description}}
                            </p>
                            @endisset
                            <label class="label-social d-block text-dark">سوشیال مدیا </label>
                            <div class="social-icons social-icons-colored">
                                @isset($setting->instagram)
                                <a href="{{$setting->instagram}}"
                                    class="social-icon social-instagram w-icon-instagram"></a>
                                @endisset
                                @isset($setting->telegram)
                                <a href="{{$setting->telegram}}" class="social-icon social-twitter"><i
                                        class="fa-brands fa-telegram"></i></a>
                                @endisset
                                @isset($setting->telegram)
                                <a href="{{$setting->telegram}}" class="social-icon social-whatsapp"><i
                                        class="fa-brands fa-whatsapp"></i></a>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
                @if (json_decode($setting->links,true) !==[] && json_decode($setting->links,true) !== null)
                @foreach (json_decode($setting->links,true) as $pLink )
                <div class="col-lg-2 col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title">{{$pLink['name']}} </h3>
                        @isset ($pLink['children'])
                        <ul class="widget-body">
                            @foreach ($pLink['children'] as $link)
                            <li><a href="{{$link['url']}}">{{$link['title']}} </a></li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-left">
                <p class="copyright">کپی رایت © 1400 فروشگاه وولـمارت. تمام حقوق سایت برای محفوظ است..</p>
            </div>
            <div class="footer-right">
                <span class="payment-label mr-lg-8">پرداخت امن و مطمئن با </span>
                <figure class="payment">
                    <img src="/assets/images/payment.png" alt="payment" width="159" height="25" />
                </figure>
            </div>
        </div>
    </div>
</footer>