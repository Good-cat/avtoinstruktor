<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 24.08.15
 * Time: 22:26
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

class FeedbackCommentAdmin extends Admin{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Комментарии')
                ->with('Комментарий')
                    ->add('text', null, array('label' => 'Содержание', 'attr'=>array('class' => '', 'rows' => 2, 'style' => 'width: 100%;')))
                    ->add('visible', null, array('label' => 'Отображать', 'attr'=>array('class' => '')))
                    ->add('update_at', 'sonata_type_date_picker', array('label' => 'Дата обновления'))
                ->end()
            ->end()
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('text', null, array('label' => 'Содержание', 'attr'=>array()))
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

    public function prePersist($feedback_comment)
    {
        $feedback_comment->setUpdateAt(new \DateTime());
    }

    public function preUpdate($feedback_comment)
    {
        $feedback_comment->setUpdateAt(new \DateTime());
    }
}