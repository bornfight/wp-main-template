<?php

namespace {=namespaceSlug=}\api;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ApiHelper
{
    //ROUTE EXAMPLE
    //const LOAD_ARTICLE = 'load-article';

    const BASE_PATH = 'api/v1';

    const BASE_API_URL = '%s/wp-json/%s%s/';

    /**
     * @param string $route_key
     *
     * @return string
     */
    public static function to_route(string $route_key): string
    {
        return sprintf(self::BASE_API_URL, get_site_url(), self::BASE_PATH, $route_key);
    }
}
