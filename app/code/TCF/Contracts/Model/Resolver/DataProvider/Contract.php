<?php


namespace TCF\Contracts\Model\Resolver\DataProvider;

class Contract
{
    protected $modelFactory;

    public function __construct(
        \TCF\Contracts\Model\ResourceModel\Contract\Collection $modelFactory
        )
    {
      $this->modelFactory  = $modelFactory;
    }

    public function getContractData( )
    {
        try {
           $ContractData = $this->modelFactory->getData();
        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        }
        return $ContractData;
    }
}
