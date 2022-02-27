<?php
namespace TCF\Contracts\Ui\Component\Listing\DataProviders\Tcf\Contracts;


/**
 * Class Contracts
 */
class Contracts extends \Magento\Ui\DataProvider\AbstractDataProvider
{    
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \TCF\Contracts\Model\ResourceModel\Contract\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }
}
