<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_redirects_to_admin_page_after_successful_login()
    {
        $data = [
            "_token" => "VSDF23rwfdfsfwfs",
            "email" => "viin242dev@gmail.com",
            "password" => "123"
        ];

        $response = $this->post('/dang-nhap', $data);

        $response->assertStatus(302); // Kiểm tra xem phản hồi có mã trạng thái là 302 (chuyển hướng) hay không
        $response->assertRedirect('/trang-quan-tri'); // Kiểm tra xem phản hồi có chuyển hướng đến '/trang-quan-tri' hay không
    }
}

