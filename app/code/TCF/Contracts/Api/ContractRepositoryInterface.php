<?php
namespace TCF\Contracts\Api;

use TCF\Contracts\Api\Data\ContractInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface ContractRepositoryInterface
 *
 * @api
 */
interface ContractRepositoryInterface
{
    /**
     * Create or update a Contract.
     *
     * @param ContractInterface $page
     * @return ContractInterface
     */
    public function save(ContractInterface $page);

    /**
     * Get a Contract by Id
     *
     * @param int $id
     * @return ContractInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Contract with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve Contracts which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Delete a Contract
     *
     * @param ContractInterface $page
     * @return ContractInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If Contract with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(ContractInterface $page);

    /**
     * Delete a Contract by Id
     *
     * @param int $id
     * @return ContractInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If customer with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
