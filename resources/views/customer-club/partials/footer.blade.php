<footer class="footer" style="background-color: #343a40; color: white; padding: 20px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>درباره ما</h5>
                <p>باشگاه مشتریان ما با هدف تقدیر از مشتریان وفادار ایجاد شده است.</p>
            </div>
            <div class="col-md-4">
                <h5>ارتباط با ما</h5>
                <p>ایمیل: {{ config('app.contact_email') }}</p>
                <p>تلفن: {{ config('app.contact_phone') }}</p>
            </div>
            <div class="col-md-4">
                <h5>لینک‌های مفید</h5>
                <ul>
                    <li><a href="{{ route('terms') }}" style="color: white;">قوانین و مقررات</a></li>
                    <li><a href="{{ route('faq') }}" style="color: white;">سوالات متداول</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
