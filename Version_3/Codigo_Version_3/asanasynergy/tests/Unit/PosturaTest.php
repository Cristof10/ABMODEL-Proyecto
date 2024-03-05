<?php

namespace Tests\Unit;

use App\Models\Postura;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PosturaTest extends TestCase
{

    /** @test */
    public function it_can_create_a_postura()
    {
        $posturaData = [
            'terminoEnglish' => 'english_example',
            'terminoSanskrit' => 'sanskrit_example',
            'terminoSpanish' => 'spanish_example',
            'imagenURL' => 'example.jpg',
            'videoURL' => 'example.mp4',
        ];

        $postura = Postura::create($posturaData);

        $this->assertInstanceOf(Postura::class, $postura);
        $this->assertEquals('english_example', $postura->terminoEnglish);
        $this->assertEquals('sanskrit_example', $postura->terminoSanskrit);
        $this->assertEquals('spanish_example', $postura->terminoSpanish);
        $this->assertEquals('example.jpg', $postura->imagenURL);
        $this->assertEquals('example.mp4', $postura->videoURL);
    }

    /** @test */
   public function it_can_update_a_postura()
    {
        $posturaData = [
            'terminoEnglish' => 'english_example',
            'terminoSanskrit' => 'sanskrit_example',
            'terminoSpanish' => 'spanish_example',
            'imagenURL' => 'example.jpg',
            'videoURL' => 'example.mp4',
        ];

        $postura = Postura::create($posturaData);

        $updatedData = [
            'id' => $postura->id,
            'terminoEnglish' => 'updated_english_example',
            'terminoSanskrit' => 'updated_sanskrit_example',
            'terminoSpanish' => 'updated_spanish_example',
            'imagenURL' => 'updated_example.jpg',
            'videoURL' => 'updated_example.mp4',
        ];

        $postura->update($updatedData);

        $this->assertEquals('updated_english_example', $postura->fresh()->terminoEnglish);
        $this->assertEquals('updated_sanskrit_example', $postura->fresh()->terminoSanskrit);
        $this->assertEquals('updated_spanish_example', $postura->fresh()->terminoSpanish);
        $this->assertEquals('updated_example.jpg', $postura->fresh()->imagenURL);
        $this->assertEquals('updated_example.mp4', $postura->fresh()->videoURL);
    }
}
