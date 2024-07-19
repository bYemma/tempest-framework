<?php

namespace Integration\View;

use Tempest\View\Renderers\BladeConfig;
use Tempest\View\Renderers\BladeViewRenderer;
use Tempest\View\ViewConfig;
use Tempest\View\ViewRenderer;
use Tests\Tempest\Integration\FrameworkIntegrationTestCase;
use function Tempest\view;

class BladeViewRendererTest extends FrameworkIntegrationTestCase
{
    public function test_blade(): void
    {
        $viewConfig = $this->container->get(ViewConfig::class);
        
        $viewConfig->rendererClass = BladeViewRenderer::class;
        
        $this->container->config(new BladeConfig(
            viewPaths: [__DIR__ . '/blade'],
            cachePath: __DIR__ . '/blade/cache',
        ));
        
        $renderer = $this->container->get(ViewRenderer::class);

        $html = $renderer->render(view('index'));

        $this->assertSame(<<<HTML
        <html>
        Hi
        </html>
        HTML
        , $html);
    }
}
