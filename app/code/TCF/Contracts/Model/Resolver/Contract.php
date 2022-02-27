<?php
namespace TCF\Contracts\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class Contract implements ResolverInterface
{
    private $contractDataProvider;

    public function __construct(
        \TCF\Contracts\Model\Resolver\DataProvider\Contract $contractDataProvider
    ) {
        $this->contractDataProvider = $contractDataProvider;
    }

    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $contractData = $this->contractDataProvider->getContractData();
        return $contractData;
    }
}
