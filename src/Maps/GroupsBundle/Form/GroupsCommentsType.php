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
            ->add('authorName')
            ->add('authorContact')
            ->add('authorText')
            ->add('ip')
            ->add('allowed')
            ->add('created')
            ->add('groupsId')
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
