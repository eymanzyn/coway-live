<?php

namespace Tests\Feature;

use Tests\TestCase;

class LiveDisplayTest extends TestCase
{
    public function test_live_display_renders_agent_and_products_from_config(): void
    {
        $response = $this->get(route('live.display'));

        $response->assertOk()
            ->assertViewIs('live.display')
            ->assertSee('Coway Care')
            ->assertSee('Neo Plus')
            ->assertSee('Tangki 5.8 L')
            ->assertSee('Atrium');
    }

    public function test_product_images_are_resolved_to_full_urls(): void
    {
        config()->set('live.categories.1.products.0.img', '');

        $response = $this->get(route('live.display'));

        $categories = $response->viewData('categories');

        $this->assertSame(asset('images/neo-plus.png'), $categories[0]['products'][0]['img']);
        $this->assertSame('', $categories[1]['products'][0]['img']);
    }

    public function test_colour_variant_images_are_resolved_to_full_urls(): void
    {
        config()->set('live.categories.0.products.0.warna', [
            ['nama' => 'Putih', 'hex' => '#FFFFFF', 'img' => 'images/neo-plus.png'],
            ['nama' => 'Hitam', 'hex' => '#000000', 'img' => ''],
        ]);

        $response = $this->get(route('live.display'));

        $warna = $response->viewData('categories')[0]['products'][0]['warna'];

        $this->assertSame(asset('images/neo-plus.png'), $warna[0]['img']);
        $this->assertSame('', $warna[1]['img']);
        $response->assertSee('Hitam');
    }

    public function test_every_configured_image_file_exists(): void
    {
        $products = collect(config('live.categories'))
            ->flatMap(fn (array $category): array => $category['products']);

        $paths = $products->pluck('img')
            ->merge($products->flatMap(fn (array $product): array => array_column($product['warna'] ?? [], 'img')))
            ->filter();

        foreach ($paths as $path) {
            $this->assertFileExists(public_path($path));
        }
    }
}
