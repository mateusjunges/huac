<?php

namespace Tests;

use Carbon\Carbon;
use HUAC\Models\Event;
use HUAC\Models\Patient;
use HUAC\Models\Surgery;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseMigrations;
    use RefreshDatabase;

    /*** @var Surgery */
    public $surgery;

    /*** @var Surgery */
    public $surgery2;

    /*** @var Surgery */
    public $surgery3;

    /*** @var Patient */
    public $patient;

    /*** @var Patient */
    public $patient2;

    /*** @var Patient */
    public $patient3;

    /*** @var Event */
    public $event;

    /*** @var Event */
    public $event2;

    /*** @var Event */
    public $event3;


    /**
     * Set up the tests.
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
        $this->prepareDatabase();
    }

    /**
     * Create some records in the database.
     */
    public function prepareDatabase()
    {
        $this->patient = Patient::create([
            'name' => 'Test Patient',
            'mother_name' => 'Test mother name',
            'birthday_at' => Carbon::now(),
            'gender' => 'M',
            'medical_record' => '123456789',
        ]);

        $this->surgery = Surgery::create([
           'estimated_duration_time' => 3,
           'anesthetic_evaluation' => 'Test',
           'materials' => 'Application tests',
           'observation' => 'Tests',
           'procedure_id' => 1,
           'surgery_classification_id' => 1,
           'patient_id' => $this->patient->id,
        ]);

        $this->patient2 = Patient::create([
            'name' => 'Test Patient Two',
            'mother_name' => 'Test mother name two',
            'birthday_at' => Carbon::now()->subMonth(),
            'gender' => 'F',
            'medical_record' => '0789',
        ]);

        $this->surgery2 = Surgery::create([
            'estimated_duration_time' => 4,
            'anesthetic_evaluation' => 'Test two',
            'materials' => 'Application tests two',
            'observation' => 'Tests two',
            'procedure_id' => 2,
            'surgery_classification_id' => 2,
            'patient_id' => $this->patient2->id,
        ]);

        $this->patient3 = Patient::create([
            'name' => 'Test Patient Three',
            'mother_name' => 'Test mother name three',
            'birthday_at' => Carbon::now()->subMonths(2),
            'gender' => 'O',
            'medical_record' => '987654',
        ]);

        $this->surgery3 = Surgery::create([
            'estimated_duration_time' => 5,
            'anesthetic_evaluation' => 'Test three',
            'materials' => 'Application tests three',
            'observation' => 'Tests three',
            'procedure_id' => 3,
            'surgery_classification_id' => 3,
            'patient_id' => $this->patient3->id,
        ]);
    }
}
