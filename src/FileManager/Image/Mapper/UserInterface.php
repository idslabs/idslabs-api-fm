<?php

namespace FileManager\Image\Mapper;

use FileManager\Image\Entity\UserInterface as UserEntityInterface;

/**
 * Interface Image Mapper
 *
 * @author Sérgio Ernane Munhós Hermes <hermes.sergio@gmail.com>
 */
interface UserInterface
{
    public function create(UserEntityInterface $entity);
    
    public function fetchOne($id);
    
    public function fetchAll(array $params);
    
    public function update(UserEntityInterface $entity);
    
    public function delete(UserEntityInterface $entity);
}
