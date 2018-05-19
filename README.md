# Wordpress core installer
 
add ["type:wordpress-core"] support for installer-paths in combination with johnpbloch/wordpress-core to install wordpress in the desired folder

## Installation

    composer require metabolism/wordpress-core-installer
    composer require johnpbloch/wordpress-core

in the composer.json

    "extra": {
        "installer-paths": {
            "web/edition/": ["type:wordpress-core"]
        }
    }