<?php

namespace Tests\Feature;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookCrudTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books', $this->FakeData());

        $book = Book::first();
        
        $this->assertCount(1, Book::all());
        $response->assertRedirect($book->path());
    }

    /** @test */
    public function validate_a_title_is_required()
    {
        $response = $this->post('/books', array_merge($this->FakeData(), ['title' => '']));

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_book_can_be_updated()
    {
        // $this->withoutExceptionHandling();

        $this->post('/books', $this->FakeData());

        $book = Book::first();

        $response = $this->patch($book->path(), [
            'title' => 'PHP Units Test',
            'author_id' => 1,
        ]);

        $this->assertEquals('PHP Units Test', Book::first()->title);
        $this->assertEquals(1, Book::first()->author_id);
        $response->assertRedirect($book->fresh()->path());
    }

    private function FakeData()
    {
        return [
            'title' => 'Cool phpunit test',
            'author_id' => 1,
        ];
    }
}
