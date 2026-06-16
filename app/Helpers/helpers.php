<?php

use App\Core\Csrf;

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function csrf_field(): string
{
    return '<input type="hidden" name="_token" value="' . e(Csrf::token()) . '">';
}

function money($amount): string
{
    return number_format((float) $amount) . ' ریال';
}

function app_base_path(): string
{
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    $basePath = rtrim(str_replace('\\', '/', dirname($scriptName)), '/');

    if ($basePath === '/' || $basePath === '.') {
        return '';
    }

    return $basePath;
}

function url(string $path = ''): string
{
    return app_base_path() . '/' . ltrim($path, '/');
}

function persian_label(string $key): string
{
    $labels = [
        'id' => 'شناسه',
        'name' => 'نام',
        'title' => 'عنوان',
        'slug' => 'شناسه متنی',
        'role_id' => 'نقش',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'national_code' => 'کد ملی',
        'mobile' => 'موبایل',
        'username' => 'نام کاربری',
        'password' => 'رمز عبور',
        'address' => 'آدرس',
        'card_number' => 'شماره کارت',
        'account_number' => 'شماره حساب',
        'iban' => 'شماره شبا',
        'status' => 'وضعیت',
        'created_at' => 'تاریخ ایجاد',
        'updated_at' => 'تاریخ ویرایش',
        'code' => 'کد',
        'description' => 'توضیحات',
        'monthly_amount' => 'مبلغ ماهانه',
        'member_count' => 'تعداد اعضا',
        'duration_months' => 'مدت صندوق',
        'start_date' => 'تاریخ شروع',
        'end_date' => 'تاریخ پایان',
        'rules' => 'قوانین',
        'exclude_debtors_from_draw' => 'حذف بدهکاران از قرعه‌کشی',
        'fund_id' => 'صندوق',
        'user_id' => 'عضو',
        'amount' => 'مبلغ',
        'paid_at' => 'تاریخ پرداخت',
        'method' => 'روش پرداخت',
        'receipt_path' => 'رسید',
        'type' => 'نوع',
        'body' => 'متن',
        'read_at' => 'تاریخ مشاهده',
    ];

    return $labels[$key] ?? str_replace('_', ' ', $key);
}

function persian_table_name(string $table): string
{
    $tables = [
        'funds' => 'صندوق‌ها',
        'users' => 'اعضا و کاربران',
        'payments' => 'پرداخت‌ها',
        'installments' => 'اقساط',
        'transactions' => 'تراکنش‌ها',
        'notifications' => 'اعلان‌ها',
        'documents' => 'مدارک',
    ];

    return $tables[$table] ?? $table;
}
