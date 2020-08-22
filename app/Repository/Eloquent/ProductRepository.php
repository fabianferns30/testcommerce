<?php


namespace App\Repository\Eloquent;

use App\Repository\Interfaces\ProductRepositoryInterface;

/**
 * Class AppointmentRequestRepository
 * @package App\Repository\Eloquent
 * @author Fabian Fernandes <fabian@connect2ddentistry.com>
 */
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    /**
     * @return mixed|string
     * @author Fabian Fernandes <fabian@connect2ddentistry.com>
     */
    public function model()
    {
        return \App\Model\Product::class;
    }

}
