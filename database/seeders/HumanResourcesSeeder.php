<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class HumanResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('departments')->insert([
            [
            'name' => 'Human Resources',
            'description' => $faker->sentence,
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'name' => 'IT',
            'description' => $faker->sentence,
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),   
            ],
            [
            'name' => 'Sales',
            'description' => $faker->sentence,
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('roles')->insert([
            [
                'title' => 'Manager',
                'description' => $faker->sentence,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Developer',
                'description' => $faker->sentence,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Sales Representative',
                'description' => $faker->sentence,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('employees')->insert([
            [
                'fullname' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'birth_date' => $faker->dateTimeBetween('-30 years', '-20 years')->format('Y-m-d'),
                'hire_date' => Carbon::now(),
                'departement_id' => 1,
                'role_id' => 1,
                'status' => 'active',
                'salary' => $faker->randomFloat(2, 30000, 100000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'fullname' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'birth_date' => $faker->dateTimeBetween('-30 years', '-20 years')->format('Y-m-d'),
                'hire_date' => Carbon::now(),
                'departement_id' => 1,
                'role_id' => 1,
                'status' => 'active',
                'salary' => $faker->randomFloat(2, 30000, 100000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ]
        ]);

        DB::table('tasks')->insert([
            [
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'assigned_to' => 1,
                'status' => 'pending',
                'due_date' => Carbon::parse('2025-08-01'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'assigned_to' => 1,
                'status' => 'in_progress',
                'due_date' => Carbon::parse('2025-08-01'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('payroll')->insert([
            [
                'employee_id' => 1,
                'salary' => $faker->randomFloat(2, 30000, 100000),
                'bonuses' => $faker->randomFloat(2, 30000, 100000),
                'deductions' => $faker->randomFloat(2, 5000, 100000),
                'net_salary' => $faker->randomFloat(2, 30000, 100000),
                'pay_date' => Carbon::parse('2025-07-28'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 2,
                'salary' => $faker->randomFloat(2, 30000, 100000),
                'bonuses' => $faker->randomFloat(2, 30000, 100000),
                'deductions' => $faker->randomFloat(2, 5000, 100000),
                'net_salary' => $faker->randomFloat(2, 30000, 100000),
                'pay_date' => Carbon::parse('2025-07-28'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('presences')->insert([
            [
                'employee_id' => 1,
                'check_in' => Carbon::parse('2025-07-28 09:00:00'),
                'check_out' => Carbon::parse('2025-07-28 17:00:00'),
                'date' => Carbon::parse('2025-07-28'),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 2,
                'check_in' => Carbon::parse('2025-07-28 09:00:00'),
                'check_out' => Carbon::parse('2025-07-28 17:00:00'),
                'date' => Carbon::parse('2025-07-28'),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('leave_requests')->insert([
            [
                'employee_id' => 1,
                'leave_type' => 'sick',
                'start_date' => Carbon::parse('2025-07-28'),
                'end_date' => Carbon::parse('2025-07-28'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 2,
                'leave_type' => 'vacation',
                'start_date' => Carbon::parse('2025-07-28'),
                'end_date' => Carbon::parse('2025-07-28'),
                'status' => 'approved',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
