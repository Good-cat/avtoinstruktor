<?php

namespace AppBundle\Admin;

use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
class ServiceAdmin extends Admin{

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Название'))
            ->add('visible', null, array('label' => 'Отображать', 'required' => false))
            ->add('annotation', null, array('label' => 'Краткое описание', 'attr'=>array('class' => 'tinymce')))
            ->add('description', 'textarea', array('label' => 'Развернутое описание', 'attr'=>array('class' => 'tinymce')))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Название'))
            ->add('visible', null, array('label' => 'Отображать'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, array('label' => 'Название'))
            ->add('visible', null, array('label' => 'Отображать', 'editable' => true))
            ->add('update_at', null, array('label' => 'Дата обновления'))
            ->add('_action', 'action', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array()
                ),
                'label' => 'Действия'
            ))
        ;
    }

    public function prePersist($service)
    {
        $service->setUpdateAt(new \DateTime());
        $service->setSlug();
    }

    public function preUpdate($service)
    {
        $service->setUpdateAt(new \DateTime());
        $service->setSlug();
    }
}