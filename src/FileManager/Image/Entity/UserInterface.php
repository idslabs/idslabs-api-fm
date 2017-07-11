<?php

namespace FileManager\Image\Entity;

/**
 * Interface User Entity
 *
 * @author Sérgio Ernane Munhós Hermes <hermes.sergio@gmail.com>
 */
interface UserInterface
{
    public function getId();
    
    public function getUsername();
    
    public function setUsername($username);
    
    public function getPassword();
    
    public function setPassword($password);
}
