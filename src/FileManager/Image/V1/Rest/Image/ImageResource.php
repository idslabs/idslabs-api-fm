<?php
/**
 * Image Module
 *
 * @link
 * @copyright Copyright (c) 2017
 */

namespace FileManager\Image\V1\Rest\Image;

use ZF\ApiProblem\ApiProblem;
use FileManager\Image\V1\Rest\AbstractResourceListener;
use FileManager\Image\Event as ImageEvent;

/**
 * Rest Image Resource

 * @author  Sérgio Ernane Munhós Hermes <hermes.sergio@gmail.com>
 *
 * @SuppressWarnings(PHPMD)
 */
class ImageResource extends AbstractResourceListener
{
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $imageService = $this->getServiceLocator()->get('FileManager\\Image\\Service\\Image');
        $imageService->setInputFilter($this->getInputFilter());
        $entity = $imageService->getEntity();
        $this->getEventManager()->trigger(ImageEvent::POST_UPLOAD, null, $entity);
        
        try {
            $image = $this->getMapper()->create($entity);
            $this->getEventManager()->trigger(ImageEvent::POST_SUCCESS, null, $entity);
            return $image;
        } catch (\Exception $e) {
            $this->getEventManager()->trigger(ImageEvent::POST_FAILED, null, $entity);
            return new ApiProblem(500, 'Uploading image error');
        }
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        $imageService = $this->getServiceLocator()->get('FileManager\\Image\\Service\\Image');
        $imageService->setIdentifier($id);
        $imageService->setInputFilter($this->getInputFilter());
        $entity = $imageService->getEntity();
        $arrayEntity = $imageService->getArrayEntity();
        try {
            $this->getMapper()->delete($entity);
            $this->getEventManager()->trigger(ImageEvent::DEL_SUCCESS, null, $arrayEntity);
            return true;
        } catch (\Exception $e) {
            $this->getEventManager()->trigger(ImageEvent::DEL_FAILED, null, $arrayEntity);
            return new ApiProblem(422, 'Deleting image error');
        }
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $imageService = $this->getServiceLocator()->get('FileManager\\Image\\Service\\Image');
        $imageService->setIdentifier($id);
        return $imageService->getEntity();
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        $imageService = $this->getServiceLocator()->get('FileManager\\Image\\Service\\Image');
        $imageService->setIdentifier($id);
        $imageService->setInputFilter($this->getInputFilter());
        $entity = $imageService->getEntity();
        
        try {
            $image = $this->getMapper()->update($entity);
            $this->getEventManager()->trigger(ImageEvent::PATCH_SUCCESS, null, $entity);
            return $image;
        } catch (\Exception $e) {
            $this->getEventManager()->trigger(ImageEvent::PATCH_FAILED, null, $entity);
            return new ApiProblem(500, 'Updating image error');
        }
    }

    /**
     * Get images configuration
     */
    protected function getImagesConfig()
    {
        return $this->getServiceLocator()->get('Config')['images'];
    }
    
    /**
     * Get Mapper
     *
     * @return FileManager\\Image\Mapper\ImageMapperInterface
     */
    protected function getMapper()
    {
        return $this->getServiceLocator()->get('FileManager\\Image\\Mapper\\Image');
    }
}
