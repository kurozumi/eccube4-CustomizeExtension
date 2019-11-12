# EccubeCustomizeExtension

FormAppendのform_themeのtwigテンプレートをCustomize領域で管理したかったので作りました。

Customize領域に設置したテンプレートを呼び出せるようTwigにパスを通しただけなので、EC-CUBEのテンプレートを上書きできるものではありません。

以下のように@CustomizeをつけるとCustomize/Resource/template/default内のテンプレートファイルを呼び出すことができます。
```
<?php

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation as Eccube;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Eccube\EntityExtension("Eccube\Entity\Customer")
 */
trait CustomerTrait
{
    /**
     * @ORM\Column(name="company_name_vn", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="入力してください")
     * @Eccube\FormAppend(
     *     auto_render=true,
     *     form_theme="@Customize/Form/company_name_vn.twig",
     *     type="\Symfony\Component\Form\Extension\Core\Type\TextType",
     *     options={
     *          "required": true,
     *          "label": "会社名(VN)"
     *     })
     */
    public $company_name_vn;
}
```


@CustomizeAdminをつけるとCustomize/Resource/template/admin内のテンプレートファイルを呼び出すことができます。
```
<?php

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation as Eccube;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Eccube\EntityExtension("Eccube\Entity\BaseInfo")
 */
trait BaseInfoTrait
{
    /**
     * @ORM\Column(name="company_name_vn", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="入力してください")
     * @Eccube\FormAppend(
     *     auto_render=true,
     *     form_theme="@CustomizeAdmin/Form/company_name_vn.twig",
     *     type="\Symfony\Component\Form\Extension\Core\Type\TextType",
     *     options={
     *          "required": true,
     *          "label": "会社名(VN)"
     *     })
     */
    public $company_name_vn;
}
```
