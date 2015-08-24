<?php
namespace BlogBundle\Admin;

use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class PostAdmin extends Admin
{

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Запись блога')
                ->with('Запись блога')
                    ->add('title', null, array('label' => 'Заглавие', 'attr'=>array('class' => '')))
                    ->add('text', null, array('label' => 'Содержание', 'attr'=>array('class' => 'tinymce')))
                    ->add('visible', null, array('label' => 'Отображать', 'attr'=>array('class' => '')))
                ->end()
            ->end()
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title', 'html', array('label' => 'Название'))
            ->add('update_at', null, array('label' => 'Дата обновления'))
            ->add('visible', null , array('label' => 'Отображать', 'editable' => true))
            ->add('_action', 'action', array(
                'actions' => array(
                    'edit' => array()
                ),
                'label' => 'Действия'
            ))
        ;
    }

    public function prePersist($post)
    {
        $post->setUpdateAt(new \DateTime());
        $post->setSlug();
    }

    public function preUpdate($post)
    {
        $post->setUpdateAt(new \DateTime());
        $post->setSlug();
    }
}