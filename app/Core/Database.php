<?php

namespace App\Core;

use PDO;
use PDOException;
use RuntimeException;

final class Database
{
    private static ?PDO $pdo = null;

    public static function pdo(): PDO
    {
        if (self::$pdo instanceof PDO) {
            return self::$pdo;
        }

        $config = require __DIR__ . '/../../config/database.php';

        if (empty($config['database']) || empty($config['username'])) {
            throw new RuntimeException('تنظیمات دیتابیس کامل نیست. لطفاً از صفحه نصب، نام دیتابیس، نام کاربری و رمز عبور Cpanel را ذخیره کنید.');
        }

        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            $config['host'],
            $config['port'],
            $config['database'],
            $config['charset']
        );

        try {
            self::$pdo = new PDO($dsn, $config['username'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $exception) {
            throw new RuntimeException(
                'اتصال به دیتابیس برقرار نشد. لطفاً مطمئن شوید نام دیتابیس، نام کاربری، رمز عبور و اتصال کاربر به دیتابیس در Cpanel درست است. پیام MySQL: ' . $exception->getMessage(),
                0,
                $exception
            );
        }

        return self::$pdo;
    }
}
