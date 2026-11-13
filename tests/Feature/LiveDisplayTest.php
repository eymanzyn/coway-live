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
            ->assertSee('Aina Coway Care')
            ->assertSee('Neo Plus')
            ->assertSee('Penapis Udara Tower Besar');
    }

    public function test_product_images_are_resolved_to_full_urls(): void
    {
        $response = $this->get(route('live.display'));

        $categories = $response->viewData('categories');

        $this->assertSame(asset('images/neo-plus.png'), $categories[0]['products'][0]['img']);
        $this->assertSame('', $categories[1]['products'][0]['img']);
    }

    public function test_every_configured_image_file_exists(): void
    {
        $paths = collect(config('live.categories'))
            ->flatMap(fn (array $category): array => $category['products'])
            ->pluck('img')
            ->filter();

        foreach ($paths as $path) {
            $this->assertFileExists(public_path($path));
        }
    }
}
