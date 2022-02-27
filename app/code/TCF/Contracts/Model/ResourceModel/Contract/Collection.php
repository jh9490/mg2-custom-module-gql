<?php
namespace TCF\Contracts\Model\ResourceModel\Contract;

/**
 * Class Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(\TCF\Contracts\Model\Contract::class, \TCF\Contracts\Model\ResourceModel\Contract::class);
    }
}
