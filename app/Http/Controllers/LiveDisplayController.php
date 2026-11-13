<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class LiveDisplayController extends Controller
{
    /**
     * Show the live selling display using the data in config/live.php.
     */
    public function __invoke(): View
    {
        $categories = collect(config('live.categories', []))
            ->map(function (array $category): array {
                $category['products'] = collect($category['products'])
                    ->map(function (array $product): array {
                        $product['img'] = filled($product['img'] ?? null) ? asset($product['img']) : '';

                        return $product;
                    })
                    ->all();

                return $category;
            })
            ->all();

        return view('live.display', [
            'settings' => config('live.settings'),
            'categories' => $categories,
        ]);
    }
}
