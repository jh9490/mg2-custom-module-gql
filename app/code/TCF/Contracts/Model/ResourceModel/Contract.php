<?php
namespace TCF\Contracts\Model\ResourceModel;

/**
 * Class Contract
 */
class Contract extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init('tcf_contracts_contract', 'contract_id');
    }
}
