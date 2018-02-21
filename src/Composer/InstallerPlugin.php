<?php
/**
 * User: Paul Coudeville <paul@metabolism.fr>
 */

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
}
