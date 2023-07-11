<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BoardTest extends TestCase
{
    /**
     * 掲示板トップページの表示内容のテスト
     *
     * @return void
     */
    public function testIndex() 
    {        
        // TestData Crete
        // $first = factory(App\Board::class)->create();
        // $second = factory(App\Board::class)->create();
        // $first->save();
        // $second->save();

        // Test
        
        // ホームディレクトリに、以下の文言が含まれていることを確認する
        $this->get('/')->assertSee('掲示板のテスト')
        ->assertSee('西之園 あすか')->assertSee('o66RsZ5f6xdFRGO')
        ->assertSee('佐々木 京助')->assertSee('yWbOHDJaUJdbU9b');

    }
}