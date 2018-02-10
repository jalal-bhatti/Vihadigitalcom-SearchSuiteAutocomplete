<?php
/**
 * Copyright © 2016 Vihadigitalcom. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Vihadigitalcom\SearchSuiteAutocomplete\Model;

/**
 * @api
 */
interface SearchInterface
{
    /**
     * Retrieve selected in config data
     *
     * @return array
     */
    public function getResponseData();

    /**
     * Check if data used in search result
     *
     * @return bool
     */
    public function canAddToResult();
}
