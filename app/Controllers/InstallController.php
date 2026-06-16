<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Csrf;
use PDO;
use Throwable;

class InstallController extends Controller
{
    public function index(): void
    {
        $this->view('install/index', ['title' => 'نصب قُلک']);
    }

    public function save(): void
    {
        $this->requireCsrf();

        $data = $this->input();
        $config = [
            'driver' => 'mysql',
            'host' => trim($data['host'] ?? 'localhost'),
            'port' => trim($data['port'] ?? '3306'),
            'database' => trim($data['database'] ?? ''),
            'username' => trim($data['username'] ?? ''),
            'password' => (string) ($data['password'] ?? ''),
            'charset' => 'utf8mb4',
        ];

        if ($config['database'] === '' || $config['username'] === '') {
            $this->json(['ok' => false, 'message' => 'نام دیتابیس و نام کاربری دیتابیس الزامی است.'], 422);
        }

        try {
            $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s', $config['host'], $config['port'], $config['database'], $config['charset']);
            new PDO($dsn, $config['username'], $config['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (Throwable $exception) {
            $this->json(['ok' => false, 'message' => 'تست اتصال ناموفق بود: ' . $exception->getMessage()], 422);
        }

        $target = __DIR__ . '/../../config/database.local.php';
        $contents = "<?php\n\nreturn " . var_export($config, true) . ";\n";

        if (file_put_contents($target, $contents, LOCK_EX) === false) {
            $this->json(['ok' => false, 'message' => 'امکان نوشتن فایل config/database.local.php وجود ندارد. سطح دسترسی پوشه config را بررسی کنید.'], 500);
        }

        $this->json(['ok' => true, 'message' => 'تنظیمات دیتابیس ذخیره شد. حالا فایل database/schema.sql را در phpMyAdmin ایمپورت کنید و سپس وارد داشبورد شوید.']);
    }
}
