<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManagePostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_a_post() : void
    {
        // user buka halaman daftar post
        $this->visit('/post');

        // user klik tombol buat post baru
        $this->click('create-new-post');

        // user lihat url yang dituju sesuai
        $this->seePageIs('/post/create');

        // tampil form create post
        $this->seeElement('form', [
            'id' => 'create-post',
            'action' => route('post.store')
        ]);

        // user submit form berisi title, content, dan status
        $this->submitForm('Save', [
            'title' => 'Belajar Laravel 8',
            'content' => 'ini content belajar laravel 8',
            'status' => 1 // publish
        ]);

        // lihat halaman web ter-redirect ke url sesuai dengan target
        $this->seePageIs('/post');

        // terdapat record baru sesuai dengan post yang disubmit user
        $this->seeInDatabase('posts', [
            'title' => 'Belajar Laravel 8',
            'content' => 'ini content belajar laravel 8',
            'status' => 1
        ]);
    }

    /** @test */
    public function user_can_browse_posts_index_page() : void
    {
        $this->assertTrue(true);

    }

    /** @test */
    public function user_can_edit_existing_post() : void
    {
        $this->assertTrue(true);
    }

    /** @test  */
    public function user_can_delete_existing_post() : void
    {
        $this->assertTrue(true);
    }
}
