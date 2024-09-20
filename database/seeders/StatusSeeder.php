<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Массив статусов с русскими названиями
        $statuses = [
            ['id' => 1, 'name' => 'В процессе выполнения'],
            ['id' => 2, 'name' => 'Ожидание принятия на кухню'],
            ['id' => 3, 'name' => 'Готовится на кухне'],
            ['id' => 4, 'name' => 'Ожидание курьера'],
            ['id' => 5, 'name' => 'Передано курьеру'],
            ['id' => 6, 'name' => 'Курьер в пути'],
            ['id' => 7, 'name' => 'Заказ выполнен'],
            ['id' => 8, 'name' => 'Заказ отклонён'],
            ['id' => 9, 'name' => 'Отклонено клиентом'],
        ];

        // Создаем статусы через циклическое добавление
        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}