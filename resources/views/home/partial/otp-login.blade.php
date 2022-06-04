<div id="otp-login-form" class="login-popup mfp-hide">
    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
        <ul class="nav nav-tabs text-uppercase" role="tablist">
            <li class="nav-item">
                <a href="#otp-sign-in" class="nav-link active">ورود / ثبت نام</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="otp-sign-in">
                <form>
                    <div class="form-group">
                        <label>شماره موبایل</label>
                        <input type="number" class="form-control without-spin" name="phone" />
                        <span class="text-red phone-error"></span>
                    </div>
                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-checkbox" name="remember" id="remember" />
                        <label for="remember">مرا به خاطر بسپار</label>
                    </div>
                    <button type="submit" class="btn btn-primary">ورود </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="otp-verify-form" class="login-popup mfp-hide">
    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
        <ul class="nav nav-tabs text-uppercase" role="tablist">
            <li class="nav-item">
                <a href="#otp-sign-in" class="nav-link active">ورود / ثبت نام</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="otp-sign-in">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>کد تایید</label>
                                <input type="number" class="form-control without-spin" name="code" />
                                <span class="text-red code-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6 pt-md-5 pb-3">
                            <div id="resendOtpTimer">
                            </div>
                            <button type="button" class="btn btn-secondary btn-ellipse btn-outline d-none" id="resendOtp">ارسال مجدد</button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">تایید</button>
                </form>
            </div>
        </div>
    </div>
</div>