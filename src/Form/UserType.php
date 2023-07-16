<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    ' placeholder' => 'Entrer vôtre nom'
                ],
                'row_attr' => [
                    'class' => 'input-group',
                ],
            ])
            
            ->add('role', ChoiceType::class, [
                'label' => 'Role',
                'choices' => [
                    "ADMIN" => "ROLE_ADMIN",
                    "MANEGER" => "ROLE_MANAGER",
                    "USER" => "ROLE_USER",
                ]
            ])
            ->add('avatar', FileType::class, [
                'label' => 'Avatar',
                'required' => false,
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse Email',
            ])
            // Utilisation de l'event avant de mettre les données dans le formulaire
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {

                // Récupération du form depuis l'event (pour pouvoir travailler avec)

                $builder = $event->getForm();
                // Récupération du user mappé sur le form depuis l'event
                /** @var User $user */
                $user = $event->getData();
                // On conditionne le champ "password"
                // Si user existant, il a id non null
                if ($user && $user->getId() !== null) {
                    $builder->add(
                        'password',
                        PasswordType::class,
                        [

                            "mapped" => false,
                            "label" => "le mot de passe",
                            "attr" => [
                                "placeholder" => "laisser vide pour ne pas modifier..."
                            ],

                            // Déplacer les contraintes de l'entité vers le formulaire d'jout

                            'constraints' => [
                                new Regex(""),
                            ]
                        ]
                    );
                }
            });


        $builder->add('password', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match.',
            'first_options' => ['label' => 'Mot de passe'],
            'second_options' => ['label' => 'Comfirmer le mot de passe'],
        ])
            ->add('user')
            ->add('save', SubmitType::class);
    }



    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }


}
