<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AsignaturaTest extends TestCase
{

    public function test_a_user_can_create_a_asignatura()
    {
        $attributes = ['name' => 'Chino',
                      'hours' => '6',
                'description' => 'Ching chang chong hoi hoi'];

        $this->post('/asignaturas', $attributes)->assertRedirect('/asignaturas');

        $this->assertDatabaseHas('asignaturas',$attributes);

        $this->get('/asignaturas')->assertSeeText($attributes['term']);
    }

}
