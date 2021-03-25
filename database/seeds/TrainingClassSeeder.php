<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TrainingClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('training_classes')->insert([
            array(
                'training_name'=>'ဝန်ထမ်းအဖွဲ့အစည်းအကြီးအမှူးစီမံခန့်ခွဲမှုသင်တန်း',
                'part'=>'first',
            ),
            array(
                'training_name'=>'အဆင့်မြင့်အရာထမ်းစီမံခန့်ခွဲမှုသင်တန်း',
                'part'=>'first',
            ),
            array(
                'training_name'=>'အလယ်အလတ်အဆင့်အရာထမ်းစီမံခန့်ခွဲမှုသင်တန်း၊ ပြည်သူ့ဝန်ထမ်းစီမံခန့်ခွဲမှုအဆင့်မြင့်ဒီပလိုမာသင်တန်း',
                'part'=>'first',
            ),
            array(
                'training_name'=>'အရာထမ်းလောင်းအခြေခံသင်တန်း၊ ပြည်သူ့ဝန်ထမ်းစီမံခန့်ခွဲမှုဘွဲ့လွန်ဒီပလိုမာသင်တန်း',
                'part'=>'first',
            ),
            array(
                'training_name'=>'အရာထမ်းအခြေခံသင်တန်း',
                'part'=>'second',
            ),
            array(
                'training_name'=>'အရာထမ်းငယ်အခြေခံသင်တန်း',
                'part'=>'second',
            ),
            array(
                'training_name'=>'စာရေးဝန်ထမ်းကြီးကြပ်မှုတန်းမြင့်သင်တန်း',
                'part'=>'second',
            ),
            array(
                'training_name'=>'စာရေးဝန်ထမ်းအခြေခံသင်တန်း',
                'part'=>'second',
            ),
        ]);
    }
}
