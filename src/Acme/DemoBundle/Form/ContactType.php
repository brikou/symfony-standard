<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email');
        $builder->add('message', 'textarea');
    }

    public function getName()
    {
        return 'contact';
    }
}
