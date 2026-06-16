<div class="card">
    <h2>راهنمای نصب</h2>
    <ol>
        <li>در Cpanel از بخش MySQL Databases دیتابیس و کاربر دیتابیس را ایجاد کنید.</li>
        <li>کاربر دیتابیس را به دیتابیس متصل کنید و دسترسی‌های لازم را بدهید.</li>
        <li>اطلاعات اتصال را در فرم زیر ذخیره کنید؛ این کار فایل <code>config/database.local.php</code> را می‌سازد.</li>
        <li>در phpMyAdmin دیتابیس ساخته‌شده را انتخاب کنید و فایل <code>database/schema.sql</code> را import کنید.</li>
        <li>این فایل SQL دستور <code>CREATE DATABASE</code> و <code>USE</code> ندارد تا روی هاست اشتراکی خطای <code>#1044 Access denied</code> ایجاد نشود.</li>
        <li>کاربر پیش‌فرض: <code>admin</code> / رمز: <code>password</code></li>
    </ol>
</div>

<div class="card">
    <h2>تنظیم اتصال دیتابیس</h2>
    <p>خطای 500 شما به دلیل تلاش برنامه برای اتصال با کاربر پیش‌فرض <code>root</code> بود. در هاست Cpanel باید نام دیتابیس و کاربر واقعی Cpanel را وارد کنید.</p>
    <form class="ajax wizard" method="post" action="<?= e(url('install')) ?>">
        <?= csrf_field() ?>
        <label>Host دیتابیس<input name="host" value="localhost" required></label>
        <label>Port<input name="port" value="3306" required></label>
        <label>نام دیتابیس<input name="database" placeholder="مثلاً akhacoco_qolak" required></label>
        <label>نام کاربری دیتابیس<input name="username" placeholder="مثلاً akhacoco_user" required></label>
        <label>رمز عبور دیتابیس<input type="password" name="password"></label>
        <button>تست اتصال و ذخیره تنظیمات</button>
        <div class="msg"></div>
    </form>
</div>
