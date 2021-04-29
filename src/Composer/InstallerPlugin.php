<?php

namespace Metabolism\WordpressCoreInstaller\Composer;

use Composer\Composer,
	Composer\IO\IOInterface,
	Composer\Plugin\PluginInterface;

use Metabolism\WordpressCoreInstaller\Composer\Installer\PackageInstaller;

/**
 * Class Plugin
 * Allows the root package to have extra-functionnalities natively.
 *
 * @package ComposerPlugin\Plugin
 */
class InstallerPlugin implements PluginInterface
{
    /** @var Composer $composer */
    protected $composer;

    /** @var IOInterface $io */
    protected $io;

    /**
     * Plugin activation function
     *
     * @param Composer    $composer
     * @param IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;


        $installer = new PackageInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }

    /**
     * Remove any hooks from Composer
     *
     * This will be called when a plugin is deactivated before being
     * uninstalled, but also before it gets upgraded to a new version
     * so the old one can be deactivated and the new one activated.
     *
     * @param Composer $composer
     * @param IOInterface $io
     */
    public function deactivate(Composer $composer, IOInterface $io)
    {
        // TODO: Implement deactivate() method.
    }

    /**
     * Prepare the plugin to be uninstalled
     *
     * This will be called after deactivate.
     *
     * @param Composer $composer
     * @param IOInterface $io
     */
    public function uninstall(Composer $composer, IOInterface $io)
    {
        // TODO: Implement uninstall() method.
    }
}
