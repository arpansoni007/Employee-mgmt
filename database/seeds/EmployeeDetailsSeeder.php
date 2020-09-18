<?php

use Illuminate\Database\Seeder;
use App\Models\EmployeeDetailsModel;
use App\Models\EmployeeOfficialDetailsModel;
use Faker\Generator as Faker;

class EmployeeDetailsSeeder extends Seeder
{   
    public $employeeDetailsModel;
    public $employeeOfficialDetails;
    public $faker;
    public function __construct(EmployeeDetailsModel $employeeDetailsModel,EmployeeOfficialDetailsModel $employeeOfficialDetails,Faker $faker)
    {    
        /* ------------------- Loading model instance ------------------ */
         $this->employeeDetailsModel  = $employeeDetailsModel;
         $this->employeeOfficialDetails  = $employeeOfficialDetails;
         $this->faker = $faker;
    }

    
    /* ------------------- Employee official detail dummy data ------------------ */
    
    public function run()
    {    

        \DB::table('employee_details')->delete();
        \DB::table('emp_official_details')->delete();

         $count = 5;
        
         for($i=0;$i<=$count;$i++)
         {
            $this->employeeDetailsModel->create([
                'emp_name' => $this->faker->name,
                'emp_age' => $this->faker->numberBetween(10,50),
                'emp_mobile' => $this->faker->e164PhoneNumber,
                'emp_email_id' => $this->faker->email,
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' =>  \Carbon\Carbon::now()
             ]);
            
             $this->employeeOfficialDetails->create([
                'emp_salary' => $this->faker->numberBetween(10000,60000),
                'emp_department' => $this->faker->company,
                'emp_designation' => 'Editor',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' =>  \Carbon\Carbon::now()
             ]);
         }
         
    }
}
