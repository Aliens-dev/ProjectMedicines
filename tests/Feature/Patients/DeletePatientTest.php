<?php


namespace Patients;


use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeletePatientTest extends \Tests\TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_delete_a_patient()
    {
        $patient = Patient::factory()->create();
        $response = $this->login()->delete(route('patients.destroy', $patient->id));
        $this->assertDatabaseCount('patients',0);
    }
}
