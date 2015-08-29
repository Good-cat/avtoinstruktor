<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 08.08.15
 * Time: 19:52
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="mainpage", options={"collate"="utf8_general_ci", "charset"="utf8", "engine"="MyISAM"})
 */
class MainPage {
    const SERVER_PATH_TO_IMAGE_FOLDER = 'images/mainpage';
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $text;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $imageName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated;

    /*
     * это поле не под доктриной
     */
    protected $file;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return MainPage
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return MainPage
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     * @return MainPage
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string 
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function __toString()
    {
        return 'Главная страница';
    }

    public function getAbsolutePath()
    {
        return null === $this->imageName
            ? null
            : $this->getUploadRootDir().'/'.$this->imageName;
    }

    public function getWebPath()
    {
        return null === $this->imageName
            ? null
            : $this->getUploadDir().'/'.$this->imageName;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return self::SERVER_PATH_TO_IMAGE_FOLDER;
    }

    /**
     * Управление скачиванием файла на сервер и записью в базу пути к файлу
     * (главное, не забыть указать правильные права на папку, в которую записывается
     * файл)
     * http://symfony.com/doc/current/cookbook/doctrine/file_uploads.html
     */
    public function upload()
    {
        // поле файл не required, поэтому проверяем, не пустое ли оно
        if (null === $this->getFile()) {
            return;
        }

        /*
         * пока используем имя файла с жесткого диска (т.е. такое, какое загружает
         * пользователь, поскольку загружает его админ. вообще можно валидировать
         * и изменять его по своему усмотрению
         */

        // move takes the target directory and target filename as params
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getFile()->getClientOriginalName()
        );

        // сохраняем имя файла в наше поле
        $this->setImageName($this->getFile()->getClientOriginalName());

        // очищаем свойство file
        $this->setFile(null);
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function lifecycleFileUpload() {
        $this->upload();
    }

    public function refreshUpdated() {
        $this->setUpdated(new \DateTime("now"));
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return MainPage
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}
