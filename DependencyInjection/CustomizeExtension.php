<?php


namespace Plugin\EccubeCustomizeExtension\DependencyInjection;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class CustomizeExtension extends Extension implements PrependExtensionInterface
{

    /**
     * Loads a specific configuration.
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        // TODO: Implement load() method.
    }

    /**
     * Allow an extension to prepend the extension configurations.
     */
    public function prepend(ContainerBuilder $container)
    {
        // TODO: Implement prepend() method.
        $this->configureTwigPaths($container);
    }

    protected function configureTwigPaths(ContainerBuilder $container)
    {
        $paths = [];

        $dir = $container->getParameter('kernel.project_dir') . '/app/Customize/Resource/template/default';

        if(file_exists($dir)) {
            $paths[$dir] = "Customize";
        }

        $dir = $container->getParameter('kernel.project_dir') . '/app/Customize/Resource/template/admin';

        if(file_exists($dir)) {
            $paths[$dir] = "CustomizeAdmin";
        }

        if (!empty($paths)) {
            $container->prependExtensionConfig('twig', [
                'paths' => $paths,
            ]);
        }
    }
}