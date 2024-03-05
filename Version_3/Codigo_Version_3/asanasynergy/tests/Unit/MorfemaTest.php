<?php

namespace Tests\Unit;

use App\Models\Morfema;
use App\Models\Morfema\updateMorfema;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MorfemaTest extends TestCase
{

    /** @test */
    public function it_can_create_a_morfema()
    {
        $morfemaData = [
            'morfemaSanskrit' => 'sanskrit_example',
            'morfemaSpanish' => 'spanish_example',
            'morfemaEnglish' => 'english_example',
        ];

        $morfema = Morfema::create($morfemaData);

        $this->assertInstanceOf(Morfema::class, $morfema);
        $this->assertEquals('sanskrit_example', $morfema->morfemaSanskrit);
        $this->assertEquals('spanish_example', $morfema->morfemaSpanish);
        $this->assertEquals('english_example', $morfema->morfemaEnglish);
    }

    /** @test */
    public function it_can_update_a_morfema()
    {
        $morfemaData = [
            'morfemaSanskrit' => 'sanskrit_example',
            'morfemaSpanish' => 'spanish_example',
            'morfemaEnglish' => 'english_example',
        ];

        $morfema = Morfema::create($morfemaData);

        $updatedData = [
            'id' => $morfema->id,
            'morfemaSanskrit' => 'updated_sanskrit_example',
            'morfemaSpanish' => 'updated_spanish_example',
            'morfemaEnglish' => 'updated_english_example',
        ];


        $morfema->update($updatedData);

        $this->assertEquals('updated_sanskrit_example', $morfema->fresh()->morfemaSanskrit);
        $this->assertEquals('updated_spanish_example', $morfema->fresh()->morfemaSpanish);
        $this->assertEquals('updated_english_example', $morfema->fresh()->morfemaEnglish);
    }

}
