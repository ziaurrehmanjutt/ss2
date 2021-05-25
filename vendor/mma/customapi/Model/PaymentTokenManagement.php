<?php
/**
 * Created by PhpStorm.
 * User: Dmytro Portenko
 * Date: 9/2/18
 * Time: 4:31 PM
 */

namespace MMA\CustomApi\Model;



class PaymentTokenManagement  implements \MMA\CustomApi\Api\PaymentTokenManagementInterface
{
    /**
     * @var \Magento\Vault\Api\PaymentTokenManagementInterface
     */
    private $tokenManagement;

    /**
     * @var BraintreeAdapterFactory
     */
    private $adapterFactory;

    /**
     * @var PaymentNonceResponseValidator
     */
    private $responseValidator;

    /**
     * @var ArrayResultFactory
     */
    private $resultFactory;

    /**
     * @param PaymentTokenRepositoryInterface $repository
     * @param PaymentTokenResourceModel $paymentTokenResourceModel
     * @param PaymentTokenFactory $paymentTokenFactory
     * @param FilterBuilder $filterBuilder
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param PaymentTokenSearchResultsInterfaceFactory $searchResultsFactory
     * @param EncryptorInterface $encryptor
     * @param DateTimeFactory $dateTimeFactory
     * @param PaymentTokenManagementInterface $tokenManagement
     * @param BraintreeAdapterFactory $adapterFactory
     * @param PaymentNonceResponseValidator $responseValidator
     * @param ArrayResultFactory $resultFactory
     */
    public function __construct(

    ) {

    }

    /**
     * Lists payment tokens that match specified search criteria.
     *
     * @param int $customerId Customer ID.
     * @return \Magento\Vault\Api\Data\PaymentTokenInterface[] Payment tokens search result interface.
     */
    public function getListByCustomerId($customerId)
    {
        $filters[] = $this->filterBuilder
            ->setField(PaymentTokenInterface::CUSTOMER_ID)
            ->setValue($customerId)
            ->create();
        $entities = $this->paymentTokenRepository->getList(
            $this->searchCriteriaBuilder
                ->addFilters($filters)
                ->create()
        )->getItems();

        return $entities;
    }

    /**
     * @inheritdoc
     * @throws \Exception
     */
    public function getPaymentNonce($publicHash, $customerId)
    {
        $paymentToken = $this->tokenManagement->getByPublicHash($publicHash, $customerId);
        if (!$paymentToken) {
            throw new Exception('No available payment tokens');
        }

        $data = $this->adapterFactory->create()
            ->createNonce($paymentToken->getGatewayToken());
        $result = $this->responseValidator->validate(['response' => ['object' => $data]]);

        if (!$result->isValid()) {
            throw new Exception(__(implode("\n", $result->getFailsDescription())));
        }

        return $data->paymentMethodNonce->nonce;
    }
}
