<?php

namespace Tests\Feature;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling();
        
        $response = $this->post('/books', $this->FakeData());

        $book = Book::first();
        
        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function validate_a_title_is_required()
    {
        $response = $this->post('/books', [
            // 'title' => 'PHP Units Test',
            'author' => 'Shabayek',
        ]);

        $response->assertSessionHasErrors('title');
    }

    private function FakeData()
    {
        return [
            'title' => 'Cool phpunit test',
            'author_id' => 'Shabayek',
        ];
    }
}
