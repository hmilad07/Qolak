# قُلک — سامانه مدیریت صندوق‌های قرعه‌کشی و قرض‌الحسنه

وب‌اپلیکیشن PHP 8.3/MySQL 8 با معماری MVC، رابط کاملاً فارسی RTL، Ajax، PDO، نصب ساده روی Cpanel، قرعه‌کشی قابل بررسی با `random_int()`، گزارش‌ها، اعلان‌ها، Audit Log، حسابداری دوبل و Ledger غیرقابل حذف.

## نصب
1. تنظیمات `config/database.php` را تکمیل کنید.
2. فایل `database/schema.sql` را در MySQL 8 اجرا کنید.
3. ریشه وب‌سرور را روی پوشه `public` قرار دهید یا از `composer serve` استفاده کنید.
4. ورود اولیه: `admin` / `password`.

## ساختار
- `app/Core`: Router، Controller، PDO، CSRF و Auth
- `app/Controllers`: کنترلرهای Auth، داشبورد، CRUD، قرعه‌کشی و Ledger
- `app/Services`: منطق Audit، Ledger دوبل و قرعه‌کشی امن
- `database/schema.sql`: اسکریپت کامل ساخت دیتابیس
