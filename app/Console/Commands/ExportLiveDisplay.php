<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

#[Signature('live:export {--path=docs : Folder output, relatif kepada root projek}')]
#[Description('Jana versi statik live display (index.html + images) untuk GitHub Pages')]
class ExportLiveDisplay extends Command
{
    /**
     * Render the live display with relative image paths and write it, together with the images, to the output folder.
     */
    public function handle(Filesystem $files): int
    {
        $outputPath = base_path($this->option('path'));

        $categories = collect(config('live.categories', []))
            ->map(function (array $category): array {
                $category['products'] = collect($category['products'])
                    ->map(function (array $product): array {
                        $product['img'] = filled($product['img'] ?? null) ? $product['img'] : '';

                        return $product;
                    })
                    ->all();

                return $category;
            })
            ->all();

        $html = view('live.display', [
            'settings' => config('live.settings'),
            'categories' => $categories,
        ])->render();

        $files->ensureDirectoryExists($outputPath);
        $files->put($outputPath.'/index.html', $html);
        $files->put($outputPath.'/.nojekyll', '');

        if ($files->isDirectory(public_path('images'))) {
            $files->copyDirectory(public_path('images'), $outputPath.'/images');
        }

        $this->components->info("Siap! Fail statik dijana dalam [{$outputPath}].");
        $this->components->bulletList([
            'git add . && git commit -m "Kemas kini live" && git push',
        ]);

        return self::SUCCESS;
    }
}
