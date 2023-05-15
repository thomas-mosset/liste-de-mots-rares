<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Word;
use Illuminate\Routing\Route;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WordTest extends TestCase
{
    /**
     * Test that '/' redirect to '/liste'
     *
     * @return void
     */
    public function test_redirection_to_homepage()
    {
        $redirectionUrl = '/liste';

        $response = $this->get('/');

        $response->assertRedirect($redirectionUrl);
    }

    /**
     * Test that a word is successfully added to the database
     *
     * @return void
     */
    public function test_a_word_is_successfully_added_to_the_database()
    {
        $testData = [
            'id' => 1,
            'word' => 'Maculature',
            'definition' => 'Tache, salissure.',
            'exemple' => 'Mon café a créé une maculature sur la nappe.',
            'pronunciation' => 'maculature',
            'type' => 'n. f.',
            'slug' => 'maculature',
        ];

        $response = $this->post('liste/create', $testData);
        $response->assertStatus(302);

        $lastInsertedWord = Word::latest()->first();
        $this->assertEquals($testData['word'], $lastInsertedWord->word);
    }
}