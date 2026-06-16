# قُلک — سامانه مدیریت صندوق‌های قرعه‌کشی و قرض‌الحسنه

وب‌اپلیکیشن PHP 8.3/MySQL 8 با معماری MVC، رابط کاملاً فارسی RTL، Ajax، PDO، نصب ساده روی Cpanel، قرعه‌کشی قابل بررسی با `random_int()`، گزارش‌ها، اعلان‌ها، Audit Log، حسابداری دوبل و Ledger غیرقابل حذف.

## نصب
1. تنظیمات `config/database.php` را تکمیل کنید.
2. در Cpanel/phpMyAdmin ابتدا دیتابیس را بسازید و همان دیتابیس را انتخاب کنید؛ سپس فایل `database/schema.sql` را import کنید. این فایل عمداً دستور `CREATE DATABASE` و `USE` ندارد تا با محدودیت هاست اشتراکی خطای `#1044 Access denied` ندهد.
3. ریشه وب‌سرور را روی پوشه `public` قرار دهید یا از `composer serve` استفاده کنید.
4. ورود اولیه: `admin` / `password`.

## ساختار
- `app/Core`: Router، Controller، PDO، CSRF و Auth
- `app/Controllers`: کنترلرهای Auth، داشبورد، CRUD، قرعه‌کشی و Ledger
- `app/Services`: منطق Audit، Ledger دوبل و قرعه‌کشی امن
- `database/schema.sql`: اسکریپت کامل ساخت دیتابیس


## رفع خطای Import در Cpanel
اگر هنگام import خطای `#1044 - Access denied` دیدید، یعنی کاربر دیتابیس شما اجازه ساخت دیتابیس جدید ندارد. از بخش MySQL Databases در Cpanel دیتابیس را بسازید، کاربر را به آن وصل کنید، در phpMyAdmin همان دیتابیس را از ستون کناری انتخاب کنید و بعد `database/schema.sql` را import کنید.
