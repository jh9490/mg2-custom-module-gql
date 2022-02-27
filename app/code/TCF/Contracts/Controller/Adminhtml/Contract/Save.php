<?php
namespace TCF\Contracts\Controller\Adminhtml\Contract;

use Magento\Backend\App\Action;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
            

/**
 * Class Save
 */
class Save extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'TCF_Contracts::contracts';

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var \TCF\Contracts\Model\ContractRepository
     */
    protected $objectRepository;

    /**
     * @param Action\Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param \TCF\Contracts\Model\ContractRepository $objectRepository
     */
    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        \TCF\Contracts\Model\ContractRepository $objectRepository
    ) {
        $this->dataPersistor    = $dataPersistor;
        $this->objectRepository  = $objectRepository;

        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            if (isset($data['is_active']) && $data['is_active'] === 'true') {
                $data['is_active'] = TCF\Contracts\Model\Contract::STATUS_ENABLED;
            }
            if (empty($data['contract_id'])) {
                $data['contract_id'] = null;
            }

            /** @var \TCF\Contracts\Model\Contract $model */
            $model = $this->_objectManager->create('TCF\Contracts\Model\Contract');

            $id = $this->getRequest()->getParam('contract_id');
            if ($id) {
                $model = $this->objectRepository->getById($id);
            }

            $model->setData($data);

            try {
                $this->objectRepository->save($model);
                $this->messageManager->addSuccess(__('You saved the thing.'));
                $this->dataPersistor->clear('tcf_contracts_contract');
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['contract_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->dataPersistor->set('tcf_contracts_contract', $data);
            return $resultRedirect->setPath('*/*/edit', ['contract_id' => $this->getRequest()->getParam('contract_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
