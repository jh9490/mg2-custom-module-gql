<?php
namespace TCF\Contracts\Model;

/**
 * Class Contract
 */
class Contract extends \Magento\Framework\Model\AbstractModel implements
    \TCF\Contracts\Api\Data\ContractInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'tcf_contracts_contract';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(\TCF\Contracts\Model\ResourceModel\Contract::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
