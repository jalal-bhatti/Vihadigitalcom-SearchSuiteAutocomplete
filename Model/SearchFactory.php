<?php
/**
 * Copyright © 2016 Vihadigitalcom. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Vihadigitalcom\SearchSuiteAutocomplete\Model;

use Magento\Framework\ObjectManagerInterface as ObjectManager;

/**
 * SearchFactory class for Search model
 */
class SearchFactory
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $objectManager = null;

    /**
     * @var string
     */
    protected $map;

    /**
     * Factory constructor
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param array $map
     */
    public function __construct(
        ObjectManager $objectManager,
        array $map = []
    ) {
        $this->objectManager = $objectManager;
        $this->map = $map;
    }

    /**
     *
     * @param string $param
     * @param array $arguments
     * @return \Vihadigitalcom\SearchSuiteAutocomplete\Model\SearchInterface
     * @throws \UnexpectedValueException
     */
    public function create($param, array $arguments = [])
    {
        if (isset($this->map[$param])) {
            $instance = $this->objectManager->create($this->map[$param], $arguments);
        } else {
            $instance = $this->objectManager->create('\Vihadigitalcom\SearchSuiteAutocomplete\Model\Search\Suggested', $arguments);
        }

        if (!$instance instanceof \Vihadigitalcom\SearchSuiteAutocomplete\Model\SearchInterface) {
            throw new \UnexpectedValueException(
                'Class ' . get_class($instance) . ' should be an instance of \Vihadigitalcom\SearchSuiteAutocomplete\Model\SearchInterface'
            );
        }
        return $instance;
    }
}
