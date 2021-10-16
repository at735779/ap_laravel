<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConstantWord;

class ConstantWordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConstantWord::insert([
            ['constant_word' => '出産'],
            ['constant_word' => '子育て'],
            ['constant_word' => '保育園'],
            ['constant_word' => '健康診査'],
            ['constant_word' => '予防接種'],
            ['constant_word' => '学校'],
            ['constant_word' => '扶養'],
            ['constant_word' => '税'],
            ['constant_word' => '住宅'],
            ['constant_word' => '介護'],
            ['constant_word' => '高齢'],
            ['constant_word' => '入札'],
            ['constant_word' => '採用'],
            ['constant_word' => 'コロナ'],
            ['constant_word' => '投票'],
        ]);
    }
}
