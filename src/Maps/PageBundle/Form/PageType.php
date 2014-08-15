<?php

namespace Maps\PageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', [
                'label' => 'Заголовок'
            ])
            ->add('slug', 'text', [
                'label' => 'ЧПУ'
            ])
            ->add('text', 'textarea', [
                'label' => 'Текст',
                'required' => false,
                'attr' => array('class' => 'editor')
            ])
            ->add('date', null, [
                'label' => false,
                'required' => false,
                'attr' => array('style' => 'display:none;')
            ])
            ->add('seoTitle', 'text', [
                'label' => 'SEO заголовок',
                'required' => false,
            ])
            ->add('seoKeywords', 'text', [
                'label' => 'SEO ключевые слова',
                'required' => false,
            ])
            ->add('seoDescription', 'text', [
                'label' => 'SEO описание',
                'required' => false,
            ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Maps\PageBundle\Entity\Page'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'maps_pagebundle_page';
    }
}
