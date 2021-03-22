<?php
namespace Bss\RefundRequest\Api;
interface RefundInterface
{


    /**
     * @api
     * @param string $order_id
     * @return array
     */
    public function getOrderCollectionByCustomerIdApi($order_id);

    /**
     * @api
     * @param string $order_id
     * @return array
     */
    public function addOrderRefund($order_id);

        
    /**
     * @api
     *  @param string $refund_status = 'accept' | 'reject'
     * @return array
    */
    public function changeOrderStatus($refund_status);

    /**
     * @api
     * @return array
    */
    public function getAllRequests();


}