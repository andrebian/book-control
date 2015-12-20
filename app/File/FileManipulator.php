<?php

/**
 * Class FileManipulator
 */
class FileManipulator
{

    private $path;

    /**
     * @param null $path
     */
    public function __construct($path = null)
    {
        $this->path = dirname(__DIR__) . '/webroot/files';
        if (!empty($path)) {
            $this->path = $path;
        }
    }

    /**
     * @param string $key
     * @todo: Validate image
     */
    public function doTheUpload(array $file)
    {
        $destinationFile = $this->path . '/' . $file['name'];
        move_uploaded_file($file['tmp_name'], $destinationFile);
    }

    /**
     * @param $fileName
     * @param null $path
     */
    public function removeFile($fileName)
    {
        $fileToRemove = $this->path . '/' . $fileName;
        unlink($fileToRemove);
    }
}
