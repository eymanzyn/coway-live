<?php

namespace Tests\Feature;

use Illuminate\Filesystem\Filesystem;
use Tests\TestCase;

class ExportLiveDisplayTest extends TestCase
{
    private string $outputFolder = 'storage/framework/testing/live-export';

    protected function tearDown(): void
    {
        (new Filesystem)->deleteDirectory(base_path($this->outputFolder));

        parent::tearDown();
    }

    public function test_it_exports_static_html_with_relative_image_paths(): void
    {
        $this->artisan('live:export', ['--path' => $this->outputFolder])->assertSuccessful();

        $outputPath = base_path($this->outputFolder);
        $html = file_get_contents($outputPath.'/index.html');

        $this->assertStringContainsString('Aina Coway Care', $html);
        $this->assertStringContainsString('"img":"images\/neo-plus.png"', $html);
        $this->assertStringNotContainsString(json_encode(asset('images/neo-plus.png')), $html);
        $this->assertFileExists($outputPath.'/images/neo-plus.png');
        $this->assertFileExists($outputPath.'/.nojekyll');
    }
}
