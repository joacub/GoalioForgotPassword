<?php

namespace GoalioForgotPassword\Form;

use Zend\InputFilter\InputFilter;
use GoalioForgotPassword\Options\ForgotOptionsInterface;

class ResetFilter extends InputFilter
{
    public function __construct(ForgotOptionsInterface $options)
    {
        $this->add(array(
            'name'       => 'newCredential',
            'required'   => true,
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'min' => 6,
                    ),
                ),
            ),
            'filters'   => array(
                array('name' => 'StringTrim'),
            ),
        ));

        $this->add(array(
            'name'       => 'newCredentialVerify',
            'required'   => true,
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'min' => 6,
                    ),
                ),
                array(
                    'name' => 'identical',
                    'options' => array(
                        'token' => 'newCredential'
                    )
                ),
            ),
            'filters'   => array(
                array('name' => 'StringTrim'),
            ),
        ));
    }
}
