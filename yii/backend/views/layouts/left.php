<aside class="main-sidebar">
<?

echo $this->context->route;
?>
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'НАВІГАЦІЙНЕ МЕНЮ', 'options' => ['class' => 'header']],
                    ['label' => 'Головна ', 'icon' => 'home', 'url' => ['/']],
                    [
                        'label' => 'Довідники',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Види робіт', 'url' => ['/dictypes/index'], 'active' => $this->context->route == 'dictypes/index',],
                            ['label' => 'Ціни на роботи', 'url' => ['/dictjobs/index'], 'active' => $this->context->route == 'dictjobs/index',],
                            ['label' => 'Категорії', 'url' => ['/dictcategory/index'], 'active' => $this->context->route == 'dictcategory/index',],
                            ['label' => 'Вилка бюджету', 'url' => ['/dictpricerange/index'], 'active' => $this->context->route == 'dictpricerange/index',],
                        ]
                    ],
                    ['label' => 'Виконавці/Замовники', 'icon' => 'users', 'url' => ['/members'], 'active' => $this->context->route == 'members',],
                    ['label' => 'Замовлення', 'icon' => 'wrench', 'url' => ['/orders'], 'active' => $this->context->route == 'orders',],
                    ['label' => 'Публікації', 'icon' => 'newspaper-o', 'url' => ['/publish/index'], 'active' => $this->context->route == 'publish/index',],
                    ['label' => 'Шаблони листів/SMS', 'icon' => 'at', 'url' => ['/mailtemplate/index'], 'active' => $this->context->route == 'mailtemplate/index',],
                    [
                        'label' => 'Питання та відповіді',
                        'icon' => 'question',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Групи', 'url' => ['/faqgroups/index'], 'active' => $this->context->route == 'faqgroups/index',],
                            ['label' => 'Питання та відповіді', 'url' => ['/faqitems/index'], 'active' => $this->context->route == 'faqitems/index',],

                        ]
                    ],

                    ['label' => 'Адміністратори', 'icon' => 'user', 'url' => ['/administrators'], 'active' => $this->context->route == 'administrators',],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],

/*                    [
                        'label' => 'Same tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
*/
                ],
            ]
        ) ?>

    </section>

</aside>
