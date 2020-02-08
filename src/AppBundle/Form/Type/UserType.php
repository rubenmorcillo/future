<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 26/01/2020
 * Time: 11:18
 */

namespace AppBundle\Form\Type;


use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['admin']) {
            $builder
                ->add('reputation',null, [
                    'label' => "Reputation"
                ])
                ->add('credits')
                ->add('cash');
        }

        $builder
            ->add('login', null, [
                'attr' => ['class' => 'login__input pass',
                    'placeholder' => 'Login'],
                'label' => " "
            ])
            ->add('password', RepeatedType::class, [

                'type' => PasswordType::class,
                'mapped' => false,

                'first_options' => [
                    'attr' => ['class' => 'login__input pass',
                        'placeholder' => 'Password'],
                    'label' => " ",
                    'constraints' => [new NotBlank()]
                ],
                'second_options' => [
                    'label' => " ",
                    'attr' => ['class' => 'login__input pass',
                        'placeholder' => 'Repeat password'],
                ]
            ])

            ->add('nickname', null, [
                'label' => " ",
                'attr' => ['class' => 'login__input pass',
                    'placeholder' => 'Nickname'],
            ]);


//        if ($options['es_admin']) {
//            $builder
//                ->add('ordenanza')
//                ->add('secretario');
//        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'admin' => false
        ]);
    }

}