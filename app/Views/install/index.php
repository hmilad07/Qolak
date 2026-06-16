<div class="card">
    <h2>راهنمای نصب</h2>
    <ol>
        <li>در Cpanel از بخش MySQL Databases دیتابیس و کاربر دیتابیس را ایجاد کنید.</li>
        <li>کاربر دیتابیس را به دیتابیس متصل کنید و دسترسی‌های لازم را بدهید.</li>
        <li>اطلاعات اتصال را در <code>config/database.php</code> یا متغیرهای محیطی وارد کنید.</li>
        <li>در phpMyAdmin دیتابیس ساخته‌شده را انتخاب کنید و فایل <code>database/schema.sql</code> را import کنید.</li>
        <li>این فایل SQL دستور <code>CREATE DATABASE</code> و <code>USE</code> ندارد تا روی هاست اشتراکی خطای <code>#1044 Access denied</code> ایجاد نشود.</li>
        <li>کاربر پیش‌فرض: <code>admin</code> / رمز: <code>password</code></li>
    </ol>
</div>
