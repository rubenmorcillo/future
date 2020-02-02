<?php
/**
 * Created by PhpStorm.
 * User: Rubén
 * Date: 26/01/2020
 * Time: 11:18
 */

namespace AppBundle\Form\Type;


use AppBundle\Entity\CharacterClass;
use AppBundle\Entity\PrincipalCharacter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrincipalCharacterType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('alias', null, [
                'label' => "Alias"
            ])
            ->add('class',null,[
                'label' => "Tipo"
            ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PrincipalCharacter::class
        ]);
    }

}