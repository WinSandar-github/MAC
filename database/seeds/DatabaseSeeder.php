<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            OrganizationStructureSeeder::class,
            AuditFirmTypeSeeder::class,
            AuditStaffTypeSeeder::class,
            AuditTotalStaffTypeSeeder::class,
            NonAuditTotalStaffTypeSeeder::class,
            TypeOfServiceProvidedSeeder::class,
            LocalForeignSeeder::class,
            EducationLevelSeeder::class,
            CourseSeeder::class,
            BatchSeeder::class,
            CourseTypeSeeder::class,
            CurrentCheckServiceSeeder::class,
            CourseRequirementSeeder::class,
            AlphabetSeeder::class,
            ExamDepartmentSeeder::class,
            MembershipSeeder::class,
            SubjectSeeder::class,
            ExamTypeSeeder::class,
            //CertificateSeeder::class
        ]);
    }
}
