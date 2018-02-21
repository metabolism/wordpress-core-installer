<?php
/**
 * User: Paul Coudeville <paul@metabolism.fr>
 */

namespace Metabolism\WordpressCoreInstaller\Composer\Installer;

use Composer\Installer\LibraryInstaller,
	Composer\Package\PackageInterface;

class PackageInstaller extends LibraryInstaller
{
    protected $types = [
        'wordpress-core'
    ];

    /**
     * Return correct install path
     * @param PackageInterface $package
     * @return string
     */
    public function getInstallPath(PackageInterface $package)
    {
    	$extra = $this->composer->getPackage()->getExtra();

    	if( isset($extra['installer-paths']) )
	    {
	    	foreach ( $extra['installer-paths'] as $path=>$types)
		    {
			    if( in_array('type:'.$package->getType(), $types) )
			    	return $path;
		    }
	    }

        return parent::getInstallPath($package);
    }

    /**
     * Evaluate if package will be processed
     *
     * @param string $packageType
     * @return bool
     */
    public function supports($packageType)
    {
        return in_array($packageType, $this->types);
    }

}
