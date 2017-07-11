<?php
/**
 * Image Module
 *
 * @link
 * @copyright Copyright (c) 2017
 */

namespace FileManager\Image;

/**
 * Contain some events for image API
 *
 * @author Sérgio Ernane Munhós Hermes <hermes.sergio@gmail.com>
 */
class Event
{
    /**
     * post upload
     */
    const POST_UPLOAD  = 'filemanager.image.post.upload';
    
    
    /**
     * post success
     */
    const POST_SUCCESS = 'filemanager.image.post.success';
    
    /**
     * post failed
     */
    const POST_FAILED  = 'filemanager.image.post.failed';
    
    /**
     * put success
     */
    const PUT_SUCCESS  = 'filemanager.image.put.success';
    
    /**
     * put failed
     */
    const PUT_FAILED   = 'filemanager.image.put.failed';
    
    /**
     * patch success
     */
    const PATCH_SUCCESS = 'filemanager.image.patch.success';
    
    /**
     * patch failed
     */
    const PATCH_FAILED  = 'filemanager.image.patch.failed';
    
    /**
     * del success
     */
    const DEL_SUCCESS  = 'filemanager.image.del.success';
    
    /**
     * del failed
     */
    const DEL_FAILED   = 'filemanager.image.del.failed';
}
