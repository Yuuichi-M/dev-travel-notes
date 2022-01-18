<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prefecture = [
            ['id' => 1, 'prefecture' => '未選択', 'sort_no' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 2, 'prefecture' => '北海道', 'sort_no' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 3, 'prefecture' => '青森県', 'sort_no' => 3, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 4, 'prefecture' => '岩手県', 'sort_no' => 4, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 5, 'prefecture' => '宮城県', 'sort_no' => 5, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 6, 'prefecture' => '秋田県', 'sort_no' => 6, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 7, 'prefecture' => '山形県', 'sort_no' => 7, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 8, 'prefecture' => '福島県', 'sort_no' => 8, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 9, 'prefecture' => '茨城県', 'sort_no' => 9, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 10, 'prefecture' => '栃木県', 'sort_no' => 10, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 11, 'prefecture' => '群馬県', 'sort_no' => 11, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 12, 'prefecture' => '埼玉県', 'sort_no' => 12, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 13, 'prefecture' => '千葉県', 'sort_no' => 13, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 14, 'prefecture' => '東京都', 'sort_no' => 14, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 15, 'prefecture' => '神奈川県', 'sort_no' => 15, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 16, 'prefecture' => '新潟県', 'sort_no' => 16, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 17, 'prefecture' => '富山県', 'sort_no' => 17, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 18, 'prefecture' => '石川県', 'sort_no' => 18, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 19, 'prefecture' => '福井県', 'sort_no' => 19, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 20, 'prefecture' => '山梨県', 'sort_no' => 20, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 21, 'prefecture' => '長野県', 'sort_no' => 21, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 22, 'prefecture' => '岐阜県', 'sort_no' => 22, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 23, 'prefecture' => '静岡県', 'sort_no' => 23, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 24, 'prefecture' => '愛知県', 'sort_no' => 24, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 25, 'prefecture' => '三重県', 'sort_no' => 25, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 26, 'prefecture' => '滋賀県', 'sort_no' => 26, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 27, 'prefecture' => '京都府', 'sort_no' => 27, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 28, 'prefecture' => '大阪府', 'sort_no' => 28, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 29, 'prefecture' => '兵庫県', 'sort_no' => 29, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 30, 'prefecture' => '奈良県', 'sort_no' => 30, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 31, 'prefecture' => '和歌山県', 'sort_no' => 31, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 32, 'prefecture' => '鳥取県', 'sort_no' => 32, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 33, 'prefecture' => '島根県', 'sort_no' => 33, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 34, 'prefecture' => '岡山県', 'sort_no' => 34, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 35, 'prefecture' => '広島県', 'sort_no' => 35, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 36, 'prefecture' => '山口県', 'sort_no' => 36, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 37, 'prefecture' => '徳島県', 'sort_no' => 37, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 38, 'prefecture' => '香川県', 'sort_no' => 38, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 39, 'prefecture' => '愛媛県', 'sort_no' => 39, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 40, 'prefecture' => '高知県', 'sort_no' => 40, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 41, 'prefecture' => '福岡県', 'sort_no' => 41, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 42, 'prefecture' => '佐賀県', 'sort_no' => 42, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 43, 'prefecture' => '長崎県', 'sort_no' => 43, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 44, 'prefecture' => '熊本県', 'sort_no' => 44, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 45, 'prefecture' => '大分県', 'sort_no' => 45, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 46, 'prefecture' => '宮崎県', 'sort_no' => 46, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 47, 'prefecture' => '鹿児島県', 'sort_no' => 47, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 48, 'prefecture' => '沖縄県', 'sort_no' => 48, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => 49, 'prefecture' => '海外', 'sort_no' => 49, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ];
        DB::table('categories')->insert($prefecture);
    }
}

// $data =  [
        //     [
        //         'id' => 1,
        //         'prefecture' => '北海道'
        //     ]
        // ];
        // DB::table('categories')->insert($data);
