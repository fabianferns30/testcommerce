<?php


namespace App\Repository\Eloquent;

use App\Repository\Interfaces\CategoryRepositoryInterface;

/**
 * Class AppointmentRequestRepository
 * @package App\Repository\Eloquent
 * @author Fabian Fernandes <fabian@connect2ddentistry.com>
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    /**
     * @return mixed|string
     * @author Fabian Fernandes <fabian@connect2ddentistry.com>
     */
    public function model()
    {
        return \App\Model\Categories::class;
    }

}
