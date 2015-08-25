<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 23.08.15
 * Time: 19:25
 */

namespace FeedbackBundle\Admin;

use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class FeedbackPostAdmin extends Admin{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Запись блога')
                ->with('Запись блога')
                    ->add('author', null, array('label' => 'Автор', 'attr'=>array('class' => '')))
                    ->add('text', null, array('label' => 'Содержание', 'attr'=>array('class' => 'tinymce')))
                    ->add('visible', null, array('label' => 'Отображать', 'attr'=>array('class' => '')))
                ->end()
                ->with('Комментарии')
                    ->add('feedback_comments', 'sonata_type_collection', array('label' => 'Комментарии', 'required' => false, 'by_reference' => false), array('edit' => 'inline', 'inline' => 'table'))
                ->end()
            ->end()
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('author', 'html', array('label' => 'Автор'))
            ->add('text', null, array('label' => 'Содержание'))
            ->add('visible', null , array('label' => 'Отображать', 'editable' => true))
            ->add('_action', 'action', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array()
                ),
                'label' => 'Действия'
            ))
        ;
    }

    public function prePersist($feedback_post)
    {
        $feedback_post->setUpdateAt(new \DateTime());
    }

    public function preUpdate($feedback_post)
    {
        $feedback_post->setUpdateAt(new \DateTime());
    }
}