<?php


namespace Patients;


use App\Models\Patient;
use App\Models\User;
use Database\Seeders\WilayaCommuneSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UpdatePatientTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_update_a_patient_first_name()
    {
        $wilayasSeeder = new WilayaCommuneSeeder();
        $wilayasSeeder->run();
        $patient = Patient::factory()->create();
        $p = collect($patient)
            ->put('password','password')
            ->put('first_name','new_name')
            ->put('state_of_residence','16')
            ->put('city_of_residence','554')
            ->toArray();
        $response = $this->login()->patch(route('patients.update', $patient->id), $p);
        $this->assertDatabaseHas('patients', ['first_name' => $p['first_name']]);
    }
    /** @test */
    public function an_admin_can_update_a_patient_last_name()
    {
        $wilayasSeeder = new WilayaCommuneSeeder();
        $wilayasSeeder->run();
        $patient = Patient::factory()->create();
        $p = collect($patient)
            ->put('password','password')
            ->put('last_name','new_name')
            ->put('state_of_residence','16')
            ->put('city_of_residence','554')
            ->toArray();
        $response = $this->login()->patch(route('patients.update', $patient->id), $p);
        $this->assertDatabaseHas('patients', ['last_name' => $p['last_name']]);
    }
    /** @test */
    public function an_admin_can_update_a_patient_national_id()
    {
        $wilayasSeeder = new WilayaCommuneSeeder();
        $wilayasSeeder->run();
        $patient = Patient::factory()->create();
        $p = collect($patient)
            ->put('password','password')
            ->put('national_id','798456123456789789')
            ->put('state_of_residence','16')
            ->put('city_of_residence','554')
            ->toArray();
        $response = $this->login()->patch(route('patients.update', $patient->id), $p);
        $this->assertDatabaseHas('patients', ['national_id' => $p['national_id']]);
    }
    /** @test */
    public function a_patient_national_id_must_have_18_chars()
    {
        $wilayasSeeder = new WilayaCommuneSeeder();
        $wilayasSeeder->run();
        $patient = Patient::factory()->create();
        $p = collect($patient)
            ->put('password','password')
            ->put('national_id','79845612')
            ->put('state_of_residence','16')
            ->put('city_of_residence','554')
            ->toArray();
        $response = $this->login()->patch(route('patients.update', $patient->id), $p);
        $response->assertSessionHasErrors('national_id');
        $this->assertDatabaseHas('patients', ['national_id' => $patient->national_id]);
    }
    /** @test */
    public function an_admin_can_update_a_patient_birthday()
    {
        $wilayasSeeder = new WilayaCommuneSeeder();
        $wilayasSeeder->run();
        $patient = Patient::factory()->create();
        $p = collect($patient)
            ->put('password','password')
            ->put('birthday','20-10-2001')
            ->put('state_of_residence','16')
            ->put('city_of_residence','554')
            ->toArray();
        $response = $this->login()->patch(route('patients.update', $patient->id), $p);
        $this->assertDatabaseHas('patients', ['birthday' => $p['birthday']]);
    }
    /** @test */
    public function an_admin_can_update_a_patient_state()
    {
        $wilayasSeeder = new WilayaCommuneSeeder();
        $wilayasSeeder->run();
        $patient = Patient::factory()->create();
        $p = collect($patient)
            ->put('password','password')
            ->put('state_of_residence','18')
            ->put('city_of_residence','554')
            ->toArray();
        $response = $this->login()->patch(route('patients.update', $patient->id), $p);
        $this->assertDatabaseHas('patients', ['state_of_residence' => 'Jijel']);
    }
    /** @test */
    public function an_admin_can_update_a_patient_city()
    {
        $wilayasSeeder = new WilayaCommuneSeeder();
        $wilayasSeeder->run();
        $patient = Patient::factory()->create();
        $p = collect($patient)
            ->put('password','password')
            ->put('state_of_residence','16')
            ->put('city_of_residence','555')
            ->toArray();
        $response = $this->login()->patch(route('patients.update', $patient->id), $p);
        $this->assertDatabaseHas('patients', ['city_of_residence' => 'Sidi Mhamed']);
    }
    /** @test */
    public function an_admin_can_update_a_patient_address()
    {
        $wilayasSeeder = new WilayaCommuneSeeder();
        $wilayasSeeder->run();
        $patient = Patient::factory()->create();
        $p = collect($patient)
            ->put('password','password')
            ->put('address','new_addr')
            ->put('state_of_residence','16')
            ->put('city_of_residence','554')
            ->toArray();
        $response = $this->login()->patch(route('patients.update', $patient->id), $p);
        $this->assertDatabaseHas('patients', ['address' => $p['address']]);
    }
    /** @test */
    public function an_admin_can_update_a_patient_phone()
    {
        $wilayasSeeder = new WilayaCommuneSeeder();
        $wilayasSeeder->run();
        $patient = Patient::factory()->create();
        $p = collect($patient)
            ->put('password','password')
            ->put('phone','0554464466')
            ->put('state_of_residence','16')
            ->put('city_of_residence','554')
            ->toArray();
        $response = $this->login()->patch(route('patients.update', $patient->id), $p);
        $this->assertDatabaseHas('patients', ['phone' => $p['phone']]);
    }
    /** @test */
    public function an_admin_can_update_a_patient_first_injection_date()
    {
        $wilayasSeeder = new WilayaCommuneSeeder();
        $wilayasSeeder->run();
        $patient = Patient::factory()->create();
        $p = collect($patient)
            ->put('password','password')
            ->put('first_injection_date','10-12-2020')
            ->put('state_of_residence','16')
            ->put('city_of_residence','554')
            ->toArray();
        $response = $this->login()->patch(route('patients.update', $patient->id), $p);
        $this->assertDatabaseHas('patients', ['first_injection_date' => $p['first_injection_date']]);
    }
    /** @test */
    public function a_patient_first_injection_date_must_be_before_next_appointement()
    {
        $wilayasSeeder = new WilayaCommuneSeeder();
        $wilayasSeeder->run();
        $patient = Patient::factory()->create();
        $p = collect($patient)
            ->put('password','password')
            ->put('first_injection_date','10-12-2021')
            ->put('state_of_residence','16')
            ->put('city_of_residence','554')
            ->toArray();
        $response = $this->login()->patch(route('patients.update', $patient->id), $p);
        $response->assertSessionHasErrors('next_appointment');
        $this->assertDatabaseHas('patients', ['first_injection_date' => $patient->first_injection_date]);
    }

    private function myData()
    {
        return collect([
            'first_name' => 'example_fname',
            'last_name'  => 'example_lname',
            'national_id' => '708654123654789632',
            'birthday'=> '25-03-2000',
            'age' => '18',
            'state_of_residence' => 'Alger',
            'city_of_residence' => 'Alger',
            'address' => 'some kind of a address',
            'phone' => '0665444444',
            'first_injection_date' => '10-12-2021',
            'next_appointment' => '11-12-2021',
        ]);
    }
}
