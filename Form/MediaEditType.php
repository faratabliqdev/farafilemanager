<?php

namespace FaraData\FileManagerBundle\Form;

use FaraData\FileManagerBundle\Entity\Media;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tetranz\Select2EntityBundle\Form\Type\Select2EntityType;

class MediaEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('file', FileType::class, array(
//                'mapped' => false,
//            ))
            ->add('name',TextType::class , array(
                'required' => 'required',
                'attr' => [ 'class' => 'kazemi' ]
            ))
//            ->add('extension')
//            ->add('type')
//            ->add('created_at')
//            ->add('updated_at')
//            ->add('deleted_at')
//            ->add('created_by')
//            ->add('updated_by')
//            ->add('tag', Select2EntityType::class, [
//                'multiple' => true,
//                'remote_route' => 'tag_ajax_auto_complete',
//                'class' => '\FaraData\FileManagerBundle\Entity\Tag',
//                'primary_key' => 'id',
//                'text_property' => 'name',
//                'minimum_input_length' => 2,
//                'page_limit' => 10,
//                'allow_add' => [
//                    'enabled' => true,
//                    'new_tag_text' => ' (NEW)',
//                    'new_tag_prefix' => '__',
//                    'tag_separators' => '[",", ""]'
//                ],
//                'allow_clear' => true,
//                'delay' => 250,
//                'cache' => true,
//                'cache_timeout' => 60000, // if 'cache' is true
//                'language' => 'en',
//                'placeholder' => 'Select a TAG or create NEW one',
//                'attr' => ['class'=> 'form-horizontal col-sm-9']
//                // 'object_manager' => $objectManager, // inject a custom object / entity manager
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Media::class,
        ]);
    }
}
