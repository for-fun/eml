<?php

namespace Maps\GroupsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupsCommentsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('authorName', 'text', [
                'label' => 'Имя: *',
            ])
            ->add('authorContact', 'text', [
                'label' => 'Контакты: *',
            ])
            ->add('authorText', 'textarea', [
                'label' => 'О себе:',
                'required' => false,
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
            ])
            ->add('groupsId', null, [
                'label' => 'Название: *',
                'attr' => [
                    'placeholder' => 'Название, отображающее суть группы'
                ],
            ])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Maps\GroupsBundle\Entity\GroupsComments'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'maps_groupsbundle_groupscomments';
    }
}
