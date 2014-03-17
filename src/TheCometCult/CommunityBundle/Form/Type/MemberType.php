<?php

namespace TheCometCult\CommunityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fbId', 'hidden')
            ->add('name', 'hidden')
            ->add('age', 'hidden')
            ->add('bio', 'textarea')
            ->add('homeland', 'text')
            ->add('occupancy', 'text')
            ->add('websiteUrl', 'url', array('required' => false))
            ->add('submit', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TheCometCult\CommunityBundle\Document\Member',
        ));
    }

    public function getName()
    {
        return 'member';
    }
}