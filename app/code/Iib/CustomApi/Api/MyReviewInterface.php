<?php
namespace Iib\CustomApi\Api;
interface MyReviewInterface
{

    /**
     * GET  review by its ID
     *
     * @api
     * @param string $storeId
     * @return array
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getAllReviews($storeId);

}