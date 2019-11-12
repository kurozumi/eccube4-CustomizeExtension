# EccubeCustomizeExtension

FormAppendのform_themeのtwigテンプレートをCustomize領域で管理したかったので作りました。

Customize領域に設置したテンプレートを呼び出せるようTwigにパスを通しただけなので、EC-CUBEのテンプレートを上書きできるものではありません。

以下のように@CustomizeをつけるとCustomize/Resource/template/default内のテンプレートファイルを呼び出すことができます。
```
<?php

namespace Customize\Form\Extension;

use Eccube\Form\Type\Front\EntryType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class EntryTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nickname', TextType::class, [
            'label' => 'ニックネーム',
            'constraints' => [
                new NotBlank(),
                new Length(['max' => 255]),
            ],
            'eccube_form_options' => [
                'auto_render' => true,
                'form_theme' => '@Customize/Form/Entry/nickname.twig'
            ]
        ]);
    }

    /**
    * {@inheritdoc}
    */
    public function getExtendedType()
    {
        return EntryType::class;
    }
}
```


@CustomizeAdminをつけるとCustomize/Resource/template/admin内のテンプレートファイルを呼び出すことができます。
```
<?php

namespace Customize\Form\Extension;

use Eccube\Form\Type\Admin\CustomerType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CustomerTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nickname', TextType::class, [
            'label' => 'ニックネーム',
            'constraints' => [
                new NotBlank(),
                new Length(['max' => 255]),
            ],
            'eccube_form_options' => [
                'auto_render' => true,
                'form_theme' => '@CustomizeAdmin/Form/Customer/nickname.twig'
            ]
        ]);
    }

    /**
    * {@inheritdoc}
    */
    public function getExtendedType()
    {
        return CustomerType::class;
    }
}

```
