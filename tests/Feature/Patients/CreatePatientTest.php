<?php


namespace Patients;


use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\WilayaCommuneSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePatientTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function a_first_name_is_required()
    {
        $response = $this->login()->post(route('patients.store'), $this->myData()->except('first_name')->toArray());
        $response->assertStatus(302);
        $response->assertSessionHasErrors('first_name');
    }
    /** @test */
    public function a_last_name_is_required()
    {
        $response = $this->login()->post(route('patients.store'), $this->myData()->except('last_name')->toArray());
        $response->assertStatus(302);
        $response->assertSessionHasErrors('last_name');
    }

    /** @test */
    public function a_national_id_is_required()
    {
        $response = $this->login()->post(route('patients.store'), $this->myData()->except('national_id')->toArray());
        $response->assertStatus(302);
        $response->assertSessionHasErrors('national_id');
    }

    /** @test */
    public function a_national_id_must_be_18_chars()
    {
        $data = $this->myData()->toArray();
        $data['national_id'] = '087987';
        $response = $this->login()->post(route('patients.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('national_id');
    }

    /** @test */
    public function a_birthday_is_required()
    {
        $response = $this->login()->post(route('patients.store'), $this->myData()->except('birthday')->toArray());
        $response->assertStatus(302);
        $response->assertSessionHasErrors('birthday');
    }
    /** @test */
    public function a_state_of_residence_is_required()
    {
        $response = $this->login()->post(route('patients.store'), $this->myData()->except('state_of_residence')->toArray());
        $response->assertStatus(302);
        $response->assertSessionHasErrors('state_of_residence');
    }
    /** @test */
    public function a_city_of_residence_is_required()
    {
        $response = $this->login()->post(route('patients.store'), $this->myData()->except('city_of_residence')->toArray());
        $response->assertStatus(302);
        $response->assertSessionHasErrors('city_of_residence');
    }
    /** @test */
    public function a_address_is_required()
    {
        $response = $this->login()->post(route('patients.store'), $this->myData()->except('address')->toArray());
        $response->assertStatus(302);
        $response->assertSessionHasErrors('address');
    }
    /** @test */
    public function a_phone_is_required()
    {
        $response = $this->login()->post(route('patients.store'), $this->myData()->except('phone')->toArray());
        $response->assertStatus(302);
        $response->assertSessionHasErrors('phone');
    }
    /** @test */
    public function a_phone_has_correct_format()
    {
        $data = $this->myData()->toArray();
        $data['phone'] = '078798';
        $response = $this->login()->post(route('patients.store'), $data);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('phone');
    }
    /** @test */
    public function a_first_injection_date_is_required()
    {
        $response = $this->login()->post(route('patients.store'), $this->myData()->except('first_injection_date')->toArray());
        $response->assertStatus(302);
        $response->assertSessionHasErrors('first_injection_date');
    }

    /** @test */
    public function a_first_injection_date_must_be_today_or_higher()
    {
        $response = $this->login()->post(route('patients.store'), $this->myData()->except('first_injection_date')->toArray());
        $response->assertStatus(302);
        $response->assertSessionHasErrors('first_injection_date');
    }

    /** @test */
    public function a_next_appointment_is_required()
    {
        $response = $this->login()->post(route('patients.store'), $this->myData()->except('next_appointment')->toArray());
        $response->assertStatus(302);
        $response->assertSessionHasErrors('next_appointment');
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
    private function login() {
        $user = User::factory()->create();
        return $this->actingAs($user);
    }
}
