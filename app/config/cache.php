<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Default Cache Driver
	|--------------------------------------------------------------------------
	|
	| This option controls the default cache "driver" that will be used when
	| using the Caching library. Of course, you may use other drivers any
	| time you wish. This is the default when another is not specified.
	|
	| Supported: "file", "database", "apc", "memcached", "redis", "array"
	|
	*/

	'driver' => 'memcached',

    /**
     * memcached specific settings.
     */
    'memcached' => array(
        array('host' => '127.0.0.1', 'port' => 11211, 'weight' => 100),
    ),
    
	/*
	|--------------------------------------------------------------------------
	| File Cache Location
	|--------------------------------------------------------------------------
	|
	| When using the "file" cache driver, we need a location where the cache
	| files may be stored. A sensible default has been specified, but you
	| are free to change it to any other place on disk that you desire.
	|
	*/

	'path' => storage_path().'/cache',

);
