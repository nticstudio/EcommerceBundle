<?php

namespace Ziiweb\EcommerceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Ziiweb\EcommerceBundle\Form\ProductVersionType;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'Nombre', 'data' => 'jadner'))
            //->add('description', null, array('label' => 'Descripción'))
            ->add('manufacturer', EntityType::class, array(
                'label' => 'Marca/Fabricante',
                'class' => 'ZiiwebEcommerceBundle:Manufacturer',
            ))
            ->add('categoryProduct', EntityType::class, array(
                'label' => 'Categoría',
                'class' => 'ZiiwebEcommerceBundle:CategoryProduct',
            ))
            ->add('productVersions', CollectionType::class, array(
                'entry_type' => ProductVersionType::class, 
                'label' => 'Versiones del producto',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ziiweb\EcommerceBundle\Entity\Product'
        ));
    }
}