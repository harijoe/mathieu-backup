<?php

namespace Ardemis\MainBundle\Service;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class FileHandler
 */
class FileHandler
{
    /** @var Filesystem */
    private $fs;

    /** @var string */
    private $uniqid;

    /**
     * @param Filesystem   $fs
     */
    public function __construct(Filesystem $fs)
    {
        $this->fs     = $fs;
        $this->uniqid = uniqid();
    }

    /**
     * @param array  $files
     *
     * @return array
     * @throws \Exception
     */
    public function handleUploadedFiles(array $files)
    {
        foreach ($files as $file) {
            if (!$file instanceof UploadedFile) {
                throw new \Exception('One of the files supplied is not an UploadedFile');
            }
        }

        $fileExt        = ".pdf";
        $uploadDir      = $this->createReferenceDirectory();
        $filesUploaded  = [];

        /** @var UploadedFile $file */
        foreach ($files as $key => $file) {
            $filename = $key.$fileExt;
            $file->move($uploadDir, $filename);
            $filesUploaded[$key] = $this->uniqid."/".$filename;
        }

        return $filesUploaded;
    }

    /**
     * @return string
     */
    private function createReferenceDirectory()
    {
        $dir = getcwd()."/uploads/".$this->uniqid;
        $this->fs->mkdir($dir);

        return $dir;
    }
}
