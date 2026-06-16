<div class="card">
    <h2><?= e(persian_table_name($table)) ?></h2>

    <form class="ajax wizard" method="post" action="<?= e(url('admin/' . $table)) ?>">
        <?= csrf_field() ?>
        <label>نام یا عنوان<input name="name" placeholder="نام را وارد کنید"></label>
        <label>وضعیت<input name="status" placeholder="فعال" value="active"></label>
        <button>ذخیره</button>
        <div class="msg"></div>
    </form>

    <div class="table" role="region" aria-label="جدول <?= e(persian_table_name($table)) ?>">
        <table>
            <thead>
                <tr>
                    <?php foreach (array_keys($rows[0] ?? ['id' => '']) as $column): ?>
                        <th><?= e(persian_label($column)) ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!$rows): ?>
                    <tr><td>رکوردی ثبت نشده است.</td></tr>
                <?php endif ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <?php foreach ($row as $value): ?>
                            <td><?= e($value) ?></td>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
