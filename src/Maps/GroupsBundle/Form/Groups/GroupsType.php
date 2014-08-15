<?php

namespace Maps\GroupsBundle\Form\Groups;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', [
                'label' => 'Название: *',
                'attr' => [
                    'placeholder' => 'Название, отображающее суть группы'
                ],
            ])
            ->add('text', 'textarea', [
                'label' => 'Описание:',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Краткое описание целей группы'
                ],

            ])
            ->add('author_name', 'text', [
                'label' => 'Имя: *',
                'attr' => [
                    'placeholder' => 'Введите ваше имя'
                ],
            ])
            ->add('author_contact', 'text', [
                'label' => 'Контактные данные: *',
                'attr' => [
                    'placeholder' => 'Введите (email, скайп и др)'
                ],
            ])
            ->add('author_info', 'textarea', [
                'label' => 'О себе:',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Дополнительные данные о себе по желанию'
                ],
            ])
            ->add('ip', null, [
                'label' => false,
                'required' => false,
                'attr' => ['style' => 'display:none;'],
            ])
            ->add('created', null, [
                'label' => false,
                'required' => false,
                'attr' => ['style' => 'display:none;'],
            ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Maps\GroupsBundle\Entity\Groups\Groups'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'maps_groupsbundle_groups_groups';
    }
}
