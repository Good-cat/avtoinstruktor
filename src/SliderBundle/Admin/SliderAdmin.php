<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 09.08.15
 * Time: 16:59
 */

namespace SliderBundle\Admin;

use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
class SliderAdmin extends Admin{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Компонент слайдера')
                ->with('Компонент слайдера')
                    ->add('item', null, array('label' => 'Содержимое компонента', 'attr'=>array('class' => '')))
                ->end()
            ->end();
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('item', 'html', array('label' => 'Содержимое компонента'))
            ->add('_action', 'action', array(
                'actions' => array(
                    'edit' => array()
                ),
                'label' => 'Действия'
            ))
        ;
    }
}