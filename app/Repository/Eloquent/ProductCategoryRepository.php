<?php


namespace App\Repository\Eloquent;

use App\Repository\Interfaces\ProductCategoryRepositoryInterface;

/**
 * Class AppointmentRequestRepository
 * @package App\Repository\Eloquent
 * @author Fabian Fernandes <fabian@connect2ddentistry.com>
 */
class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface
{

    /**
     * @return mixed|string
     * @author Fabian Fernandes <fabian@connect2ddentistry.com>
     */
    public function model()
    {
        return \App\Model\ProductCategory::class;
    }

}
