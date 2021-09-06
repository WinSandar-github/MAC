x   <?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AuditFirmTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('audit_firm_types')->delete();

        DB::table('audit_firm_types')->insert([
            array(
                'name' => 'Audit'
            ),
            array(
                'name' => 'Non-Audit'
            ),

        ]);
    }
}
