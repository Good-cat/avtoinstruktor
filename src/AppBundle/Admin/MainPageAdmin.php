<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 09.08.15
 * Time: 13:37
 */

namespace AppBundle\Admin;

use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
class MainPageAdmin extends Admin{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
//        $collection->remove('delete');
    }

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        // get the current Image instance
        $image = $this->getSubject();

        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions = array('required' => false);
        if ($image && ($webPath = $image->getWebPath())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" width="150" class="img-thumbnail" />';
        }

        $formMapper
            ->tab('Главная')
                ->with('Главная')
                    ->add('title', null, array('label' => 'Заглавие страницы', 'attr'=>array('class' => 'tinymce')))
                    ->add('text', null, array('label' => 'Текст', 'attr'=>array('class' => 'tinymce')))
                    ->add('file', 'file', array('label' => 'Изображение', 'attr'=>array('class' => 'tinymce'), 'required' => false) + $fileFieldOptions)
                ->end()
            ->end();
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title', 'html', array('label' => 'Заглавие страницы'))
            ->add('text', 'html', array('label' => 'Текст'))
            ->add('_action', 'action', array(
                'actions' => array(
                    'edit' => array()
                ),
                'label' => 'Действия'
            ))
        ;
    }

    public function prePersist($mainpage) {
        $this->manageFileUpload($mainpage);
    }

    public function preUpdate($mainpage) {
        $this->manageFileUpload($mainpage);
    }

    private function manageFileUpload($mainpage) {
        if ($mainpage->getFile()) {
            $mainpage->refreshUpdated();
        }
    }
}