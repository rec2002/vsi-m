<?php
namespace common\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\BaseInflector;
use yii\helpers\StringHelper;

class Seo extends \yii\base\Widget {

    public $title;
    public $canonical;
    public $desctiption;
    private $title_add = ' :: Виконроб -  сервіс з пошуку майстрів';

    public function init(){
        parent::init();

        $data = $this->SeoData();
        $route = Yii::$app->urlManager->parseRequest(Yii::$app->request)[0];

//        print_r (Yii::$app->urlManager->parseRequest(Yii::$app->request));

        if (empty($route)) $route =  'site/index';

        if (sizeof(@$data[$route])) {

            if (!empty($data[$route]['title']) && empty($this->title)) {
                $this->title = $data[$route]['title'];
                $this->title();
            }

            if (!empty($data[$route]['description']) && empty($this->desctiption)) {
                $this->desctiption = $data[$route]['description'];
                $this->desctiption();
            }


            if (empty($this->canonical) && empty($this->canonical) && $route !=  'site/index') {
                $this->canonical = Url::toRoute([$route]);
                $this->canonical();
            }
        }

    }


    public function title(){
        Yii::$app->view->title = ($this->title != null) ? $this->title.$this->title_add : $this->model->title.$this->title_add;
    }

    public function desctiption(){
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $this->desctiption
        ]);
    }

    public function canonical(){
        Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => $this->canonical]);
    }

    private function SeoData(){
        return array(
            'site/index'=>array('title'=>'Виконроб -  сервіс з пошуку майстрів щодо ремонту квартир.', 'description'=>'На сайті «Виконроб» кожен замовник має змогу швидко знайти та замовити в режимі онлайн послуги кваліфікованих майстрів для виконання різних видів робіт. Ви завжди можете знайти професіонала, не покидаючи власну домівку.'),
            'site/publish'=>array('title'=>'Список публікацій', 'description'=>''),
            'site/howitwork'=>array('title'=>'Що таке “Виконроб”', 'description'=>'На сайті «Виконроб» кожен замовник має змогу швидко знайти та замовити в режимі онлайн послуги кваліфікованих майстрів для виконання різних видів робіт. Ви завжди можете знайти професіонала, не покидаючи власну домівку.'),
            'site/howitworkmaster'=>array('title'=>'Як отримувати замовлення на “Виконроб”', 'description'=>'«Виконроб» - сайт з пошуку ремонтно-будівельних замовлень в Україні. Щодня на сайті з\'являються замовлення, які можете виконати саме Ви. Немає значення чи Ви приватний майстер, виконроб чи будівельна компанія. Ви пропонуєте свої послуги до замовлень, які цікаві саме Вам.'),
            'site/about'=>array('title'=>'Про нас', 'description'=>''),
            'site/category'=>array('title'=>'Всі категорії майстрів', 'description'=>''),
            'site/contact'=>array('title'=>'Контакти', 'description'=>''),
            'site/faq'=>array('title'=>'Питання та відповіді', 'description'=>''),
            'site/error'=>array('title'=>'Сторінка не знайдена', 'description'=>'Помилка 404. Сторінка не знайдена'),
            'site/privacy'=>array('title'=>'Правила користування', 'description'=>'«Виконроб» - це сучасний засіб для оперативного та комфортного пошуку нових замовлень й кваліфікованих майстрів для їх виконання. '),
            'site/whywe'=>array('title'=>'Чому варто обрати для роботи саме “Виконроб”', 'description'=>'Тепер Ви обираєте виконавця на основі відгуків про його професіоналізм та реальних пропозицій цін і термінів саме по Вашому проекту. Жодних підрядчиків чи посередників.'),
            'members/login'=>array('title'=>'Вхід на сайт', 'description'=>''),
            'members/login/reset'=>array('title'=>'Відновлення паролю', 'description'=>'Введіть Вашу електронну адресу електронної пошти. Вам буде надіслане посилання для відновлення паролю.'),
            'login/resetpassword'=>array('title'=>'Введіть новий пароль', 'description'=>''),

            'members/customregistration/create'=>array('title'=>'Додати нове замовлення', 'description'=>''),
            'orders/default/index'=>array('title'=>'Список замовлень', 'description'=>''),
            'orders/default/myorders'=>array('title'=>'Список моїх замовлень', 'description'=>''),
            'orders/default/suggested'=>array('title'=>'Мої замовлення як виконавця', 'description'=>''),
            'orders/default/addorder'=>array('title'=>'Створити нове замолення', 'description'=>''),
            'members/member'=>array('title'=>'Редагувати дані :: Кабінет користувача ', 'description'=>''),
            'members/member/types'=>array('title'=>'Послуги та ціни :: Кабінет користувача ', 'description'=>''),
            'members/portfolio/list'=>array('title'=>'Виконані проекти :: Кабінет користувача ', 'description'=>''),
            'members/member/resetpwd'=>array('title'=>'Змінити пароль :: Кабінет користувача ', 'description'=>''),
            'members/member/noticesettings'=>array('title'=>'Сповіщення :: Кабінет користувача ', 'description'=>''),
            'members/member/billing'=>array('title'=>'Доступ до замовлень :: Кабінет користувача ', 'description'=>''),
            'members/member/billinghistory'=>array('title'=>'Рух коштів :: Кабінет користувача ', 'description'=>''),
            'members/member/billingpayment'=>array('title'=>'Списання коштів :: Кабінет користувача ', 'description'=>''),
            'members/msg'=>array('title'=>'Повідомлення :: Кабінет користувача ', 'description'=>''),
            'members/member/profile'=>array('title'=>'Профайл користувача ', 'description'=>''),
            'members/customer'=>array('title'=>'Редагувати дані :: Кабінет користувача ', 'description'=>''),
            'members/registration'=>array('title'=>'Реєстрація нового майстра ', 'description'=>''),
            'professionals/default/index'=>array('title'=>'Каталог майстрів ', 'description'=>''),


        );
    }
}
?>