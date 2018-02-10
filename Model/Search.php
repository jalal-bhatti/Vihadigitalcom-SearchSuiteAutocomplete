<?php
/**
 * Copyright © 2016 Vihadigitalcom. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Vihadigitalcom\SearchSuiteAutocomplete\Model;

use \Vihadigitalcom\SearchSuiteAutocomplete\Helper\Data as HelperData;
use \Vihadigitalcom\SearchSuiteAutocomplete\Model\SearchFactory;

/**
 * Search class returns needed search data
 */
class Search
{
    /**
     * @var \Vihadigitalcom\SearchSuiteAutocomplete\Helper\Data
     */
    protected $helperData;

    /**
     * @var \Vihadigitalcom\SearchSuiteAutocomplete\Model\SearchFactory
     */
    protected $searchFactory;

    /**
     * Search constructor.
     * @param \Vihadigitalcom\SearchSuiteAutocomplete\Model\SearchFactory $searchFactory
     */
    public function __construct(
        HelperData $helperData,
        SearchFactory $searchFactory
    ) {
        $this->helperData = $helperData;
        $this->searchFactory = $searchFactory;
    }

    /**
     * Retrieve suggested, product data
     *
     * @return array
     */
    public function getData()
    {
        $data = [];
        $autocompleteFields = $this->helperData->getAutocompleteFieldsAsArray();

        foreach ($autocompleteFields as $field) {
           $data[] = $this->searchFactory->create($field)->getResponseData();
        }

        return $data;
    }
}
