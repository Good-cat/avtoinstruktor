<?php
namespace FeedbackBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class FeedbackType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setAction('javascript:void();')
            ->setMethod('post')
            ->add('name', 'text', array(
                'label' => 'Имя',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Ваше имя'
                )
            ))
            ->add('message', 'textarea', array(
                'label' => 'Сообщение',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Оставьте Ваш отзыв здесь',
                    'style' => 'resize: vertical'
                )
            ))
            ->add('norobot', 'checkbox', array(
                'constraints' => array(new NotBlank()),
                'label' => 'Подтвердите, что Вы не робот'
            ))
            ->add('Отправить отзыв', 'submit', array(
                'attr'=>(array(
                        'class' => 'btn btn-primary'
                    ))
            ))
        ;
    }

    public function getName()
    {
        return 'feedback_form';
    }
} 