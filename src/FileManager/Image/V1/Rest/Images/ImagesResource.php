<?php
namespace FileManager\Image\V1\Rest\Images;

use ZF\ApiProblem\ApiProblem;
use FileManager\Image\V1\Rest\AbstractResourceListener;

class ImagesResource extends AbstractResourceListener
{
    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        $imageService = $this->getServiceLocator()->get('FileManager\\Image\\Service\\Image');
        return $imageService->getCollection($params->toArray());
    }
}
