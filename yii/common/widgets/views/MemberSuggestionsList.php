<?

use yii\bootstrap\ActiveForm;
use frontend\assets\AppAsset;
use common\components\MemberHelper;
use yii\helpers\Url;
?>

<? if (sizeof($models)) { ?>
<div class="empty-space marg-lg-b30"></div>

<div class="tabs-block style-2 large suggestion-list">
    <div class="tab-nav">
        <div class="tab-menu active">Пропозиції <span class="count-large">(<? $i=0; foreach ($models as $model) if ($model->disregast_suggestion==0 && $model->deleted==0) $i++; echo $i;?>)</span></div>

<? $i=0; foreach ($models as $model) if ($model->disregast_suggestion>0 && $model->deleted==0) $i++; ?>
<? if ($i>0) { ?>
        <div class="tab-menu">Корзина <span class="count-large">(<?=$i?>)</span></div>
<? } ?>
    </div>

    <? $i=0; foreach ($models as $model) if ($model->deleted>0) $i++; ?>

    <? if ($i>0) { ?>
    <div class="empty-space marg-lg-b10"></div>
    <div class="list-dotted-item">
        <div class="list-dotted-left" style="width: 100%;text-align: center;"><span style="padding-bottom: 0px;font-size: 18px;">(<?=$i?>) Кількість пропозицій які були видалені або заморожені виконавцями.</span></div>
    </div>
    <div class="empty-space marg-lg-b10"></div>
    <? } ?>

    <div class="tab-entry" style="display: block;">
<? foreach ($models as $model) if ($model->disregast_suggestion==0 && $model->deleted==0){ ?>

        <div class="tt-proposition-wrapper show-proposition-wrapper">
            <div class="tt-proposition clearfix">
                <div class="tt-proposition-master">
                    <a class="tt-proposition-img custom-hover round" href="<?=Url::toRoute(['/professionals/default/profile', 'id' => $model->member->id])?>">
                        <img class="img-responsive" src="<?=!empty($model->member->avatar_image) ? $model->member->avatar_image : '/img/person/person.png';?>" alt="">
                    </a>
                    <a class="tt-proposition-title h5" href="<?=Url::toRoute(['/professionals/default/profile', 'id' => $model->member->id])?>"><?=(!empty($model->member->company)) ? $model->member->company : $model->member->first_name.' '.$model->member->last_name.' '.$model->member->surname ?></a>
                    <!--<div class="tt-proposition-reviews simple-text size-2">
                        <p>2 відгука</p>
                    </div>
                    <div class="tt-proposition-city simple-text size-2">
                        <p><b>м.Київ</b></p>
                    </div>-->
                    <div class="tt-proposition-team simple-text size-2">
                        <p><?=($model->member->forma!=3) ? MemberHelper::FORMA[$model->member->forma] : ''?><?=($model->member->forma==2) ? ' / '.MemberHelper::BRYGADA[$model->member->brygada] : ''?><?=($model->member->forma==3) ? ' Юридична особа ' : ''?></p>
                    </div>
                    <div class="tt-proposition-average simple-text size-2">
                        <p>На сайті <b><time class="timeago" datetime="<?=$model->member->created_at?>"></time></b></p>
                    </div>
                    <? if ($model->member->online==1) {?>
                        <div class="tt-heading-status">зараз на сайті</div>
                    <? } ?>

                    <!--<div class="tt-task-status finish">Був на сайті 45 назад</div>-->
                </div>
                <div class="tt-proposition-content">
                    <div class="tabs-block style-1">
                        <div class="tab-nav">
                            <div class="tab-menu active"><span>Пропозиція</span></div>
                            <div class="tab-menu"><span>Про майстра</span></div>
                            <div class="tab-menu"><span>Відгуки</span></div>
                        </div>

                        <div class="tab-entry" style="display: block;">
                            <div class="tab-entry-box">
                                <div class="tt-proposition-desc simple-text size-3">
                                    <p><?=nl2br($model->descriptions)?></p>
                                </div>
                                <div class="tt-proposition-option-wrapper">
                                    <div class="tt-proposition-options">
                                        <div class="tt-proposition-label">Ціна за всю роботу:</div>
                                        <div class="tt-proposition-value"><?=($model->price_from==$model->price_to) ? $model->price_from : 'від '.$model->price_from.' до '.$model->price_to ?> грн</div>
                                    </div>
                                    <div class="tt-proposition-options">
                                        <div class="tt-proposition-label">Термін виконання:</div>
                                        <div class="tt-proposition-value"><?=($model->start_from==$model->start_to) ? $model->start_from : 'від '.$model->start_from.' до '.$model->start_to ?>
                                            <?=($model->start_from==$model->start_to) ? MemberHelper::NumberSufix($model->start_from, array('день', 'днів', 'днів')) : MemberHelper::NumberSufix($model->start_to, array('день', 'днів', 'днів')) ?>
                                        </div>
                                    </div>
                                    <div class="tt-proposition-options">
                                        <div class="tt-proposition-label">Дата і умови виїзду:</div>
                                        <div class="tt-proposition-value"><?=MemberHelper::ListDates($model->dates)?>. <?=(!empty($model->payment_object)) ? 'Виїзд на об\'єкт платний - '.$model->payment_object.' грн.' : 'Виїзд на об\'єкт безкоштовний.'?> <?=($model->come_personally==1) ? 'На зустріч приїду особисто.' : ''?></div>
                                    </div>
                                    <div class="tt-proposition-options">
                                        <div class="tt-proposition-label">Дод. умови:</div>
                                        <div class="tt-proposition-value"><?=($model->prepayment==1) ? 'Потрібна передоплата за роботу.' : 'Починаю роботу без предоплати.'?>
                                            <?=($model->prepayment_material==1) ? 'Потрібна передоплата за матеріали.' : ''?>
                                        </div>
                                    </div>
                                </div>
                                <div class="phone-number-block">
                                    <div class="simple-text">
                                        <h4 class="phoneNumber"><?=$model->member->phone?></h4>
                                    </div>
<? if (empty($model->approved->id) && (empty($model->deadline) ||  date('Y-m-d H:i:s')<=date('Y-m-d H:i:s', strtotime($model->deadline)))) { ?>
                                        <a href="javascript:" class="button type-1 size-3 phone-number-show" data-id="<?=$model->id?>">Показати номер</a>
<? }  ?>
<? if (!empty($model->approved->id)) { ?>
                                        <?=MemberHelper::GetResponseButton($model->id);?>
<? } ?>
                                    <a class="tt-icon-entry tt-icon-hover openChatButton" href="<?=Url::toRoute(['/members/msg'])?>">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAcCAYAAAAEN20fAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTExIDc5LjE1ODMyNSwgMjAxNS8wOS8xMC0wMToxMDoyMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjQzMzRGQjBFN0VCMDExRTc5NzNEODUwMkE5MDZEMzgyIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjQzMzRGQjBGN0VCMDExRTc5NzNEODUwMkE5MDZEMzgyIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NDMzNEZCMEM3RUIwMTFFNzk3M0Q4NTAyQTkwNkQzODIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NDMzNEZCMEQ3RUIwMTFFNzk3M0Q4NTAyQTkwNkQzODIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz77JeyHAAAFw0lEQVR42sxXe2xTVRg/597b2/W2a7duK6x7dZNuFDYYQVDwEfEVE2JUQjQhLib8QQhifE1MfBElCAZRVIaixhiI8tAQNPhE+I8QwSAMGI7h6NhWtnbduq69be+j19+pg4ywzRHWxJt8Peeex+/7+n2/7zvnUsMwyP/hEdZvbmLto5AnICYIB8m2dUyHDlEguyHfU7Pbdx86T0KWQno5yhNKaVatQBSMtMHsICWQA5DP6bS59xxBpwfyA7MMkoCIWfZICiINO2AJpFTAzyxIPeX4MEzd2Xn+lKrEInFeMGfFAl1LEdGWR8qqZ6tw/QIjrd+V4QiEz7QGmYN2tVnK3aPEIwFVkbNDDp4n0OFBdzl0Vg9zhWekiUJ+NQy9E+2r5d7aR4o8M3lKuUk3gmECW4IOlhiN0HkW7S9sjne6PS+BPt9Qyu8WeEHUNbVBzLG4Lfa8g/GBEKKVnhQjeF4g7urZxOZwNiEcy3iO/wCc3UNI2gUTF2T+tsCLihyPHve3ntwqx2NHJavtISnXuaGowlcsmHJuvkYAA1hlwPwE2LdBxz7o+hI6z0C3diWfCeV5m55KkUQkeDrU3f52dCB8gqNcQ2GpZ5mzzDuF44Wb4IRAgFEOrOXAfAzYB6FjHXR1QqcA3ZYrZP03fhyHPlWx4GxAUzdVzLg1lpLll50ut0MUxTe6z/9JjPSNhQmYxO1FOPIKG4H1FN7XB9pbvk7FBsKMMXjnRla46x5kTcvFM8c/NnT1O0EUH8+x5m4HYK4gTjxMbC322LF3FzDuBdZWYO4FdtdYpXbUyqclBlsDF/96byB0+YhJEBc6iopXFZR5KwSTeQKcMBOsnYY9L2CvDxg/Aut9YF4a62zjxinDmhwJnouGepoMSpuVhLyxsLh8xZSqmSbKceOGA2tsWLsKe9Zi7wFgfASsPmOcFJxosWDMVpRk8hXJ7thc5ptLkOnXpyjG2BzWbMHa5zEkD++d0Ck4RvGhgpTnmmEvmrqCpNM+k5izVjCL+9DeLVnzmlwe3y2CKI3ghEQw5sPcTqyZibU70G7E3oeBsRpYhXScKimMYQQnWBzT3ZXTn8vJdcxLxKKH5P6BLbqmFJgs1jVWm3NpYUmFiqWHg/6WJItkUbnXgbH7U3Ji0VB/cJuaiG+Ch0TJnu/LLypebMmRtI5W5TPwxD8aT0Y1RLTm+ZC+K5GuizVF+Tglx97qaT/D0rfbZLa946mb34V0fMbqyH+2cvYd0eFtdoy1gQaNwfbWn9VUTAVf1JLqOcvgmQ8pb1pdWTtvsKPlD5a+XWMaAiUao6glz1U7tdzbyBG6SJCkDcEu/66+jnNXa4imxIP+5mNfldTMarYXuGpwJDgwnOYFUyQaDrZ0tzaf1NT44DAmCbSdIoUVvnddpZ6wlky96K6a4eq51LYB9SqM+fQ1hhi6HuPNZgIj6opKqtbY8wtqE7K8o6/Lv7e/sy2U1rVrsgn3hECw8+9AbKDvsKarrLikBd4Exw2yuWv+KdsLjEsgxxf2ginFwH5A13UhRMhm6IxAd+KqIZqumCWrfb69pr4Brr0dZ8G3iVjk9RA8oeujk16O9DJhPFH/M+XUJAFWpyCaVgL/U5w3Szw19WFN136DblbRM6dvIzq4qxrz8G8fNOdY1veHLm/qudAMz+mTeD1Mk6FwLxEstkPwClWU1GsYy4XuMkx7mSFvsg6uAcxFTQF/676BwIWhGz1XJmgOSUT71GQy1W215yeQnHdibCErIyw0NONeSk5g3baUPKSyO7xpRI2Y7KsidPjRXQedNdBVf4UjbRA/Liu/o3WWeuviw58V2XwUhMUGI44O3+QrBVYxKUcbDE3frmpKB0KUpln+njAyj87hQKyiAv8Tvi2eFi77W/eDlLgdWgWH02UQanB4z+oHFrhBKVwS7u08nUzEd3Mcv5+OvM5V1M3PHFxpXctqXNitDccF6Th9LJPa7PlHgAEA6Ty+i7ZwrhAAAAAASUVORK5CYII=" alt="">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAcCAYAAAAEN20fAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTExIDc5LjE1ODMyNSwgMjAxNS8wOS8xMC0wMToxMDoyMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjQ4OTFFNDc4N0VCMDExRTdBQzhBQjMxMEJGRUE1NzE1IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjQ4OTFFNDc5N0VCMDExRTdBQzhBQjMxMEJGRUE1NzE1Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NDg5MUU0NzY3RUIwMTFFN0FDOEFCMzEwQkZFQTU3MTUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NDg5MUU0Nzc3RUIwMTFFN0FDOEFCMzEwQkZFQTU3MTUiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7qQaxrAAAFYUlEQVR42sxXC1CUVRg9+2Dljbb4YETAaMAVZdTGTDAdSJOxyTSfQfawhELMElJHSmYkhVEsMh4KaiYBQkZEWDkozlgg2UQEA4hlIayoIArKa9llt3N/IHOE0oltujOHf7n//c45e+937/1WZjKZ8H9oSpwMEc9FxArCgpAT5nYnNHoIPXGE+EKJ0ymP88NCYgHRSGuAAjKzWZFJFkwwSP+NldQAncy0C0X8cIU4JpwRnYTKzDOiI6yJ54hlhJv4/t7EFC7KdRiRFpEBfXo5Oh6hV6Np6NZITIScf85eAoKoGBfIOZHDh4vj25sjvVOjpOJUIsx7DLKOVqIh73fzTIWrFb/5GLhRazXh0ZcrCpE0rcRx+qvjM/L55Xg6fRUUVoqhNyE4yW1NDbExIqhZKWn3Za9IzGLOy25Y4TO04C3fCYipWw9o7IbOhOASnOSOp8ZaasVQM5Ha5/qN0Cp0rQ34YcvHSNBexhk4IcDRFTGfrIDTfOd/b0JwkGscOfeSewY1cqh1iJoV1NbfNqKCXR0XKPZ7VKScwg7UoJRZs2qaHwI3zsdoT5veRLvvw4IxIpYcLuRaTc7F5C6gRjS16qmpoLZVf7JKzVIJJQP10SWobO7CrsTVaMNVbPKfDociB2x12wO0Ge7PiDVzoojnpdqD+XAVL1Bt+9pcZCSVoVkhg4yair+ecHe1/eWoenEfkrt1PFdssUzthL3nXoPd/SyTGMsYe8ZmksOfXAnkzCa3drCj9q7WbYQpoxo12/Pw3q0yHnjW8Bk7BaFvB8B1zph/NiHGcOxDjNnAWA05viLX++SsIzfu2YhoeiMM286g+qOfkMQJrOBxFzvrMQQnroSFo8XgJsQ7jrHl2FDGRDE2nxwfkusaOY1/d/ncSzNwk3ejGVu8XBBXHw7MHH33INEn3nFMPMe+yZgOKfYeb8EBm4Ucyq0zMfGlqQjmBtNwnaOIHNhjjqUzEg88A/fF42+PF5/Zp+G7NI7x4tjDRCxjnyJHGLkcySkfvAwYoKkY8KwGEyIX4g3VOExnep08X4v45nao3Udi0yg3LNHMhj7ChELtp+gSZUPEfDiwby6a4NdYhaQLTdiltoHKw41n2RQ8GamG4eJNpGZWo3agPBnQyCve0HD7hnBSF3ATJzc3Ivrh/dL2vbTcA7FZr6Ke23GdjzvWn92Mm31h9uz7hVkQsS4f32Sfh95WCX3t6whUD8ce1TCEHQpBq81BaftqBzXSZYCBt63pnUcxaVsAwplkflAjtrAQmaEsXTp6esd9/isalyQhPTUI5Q9MhCfnw4HdRlii5XoVqtako+zL36T7S4rx3QckrUScvz+zpgXhiYswSm2JmHdL0EzNnjuNdOOWC+k2z8DkYD9sJL0XS6TDpaeQvfM4mmra79xNuRfQMPkEGnzOofBGFy3QyAhL6Iq10jupfBBNPEUsOeqGy3Bw2mQe8J6YF6yD0mDCbmreoHanVCawMLrCi+cDWvqWlKu4HH7E0WtabJmdClTfGrpL7/Qabm9npFArgEjlbJ6g1lLurg3CyGWOK5WqJlGojERU0XdInXcAxs6eoS8DCl6Gte8srGNSR3FBc9g9QpSpcinJgCfo0IXPHYezkReUNvQmRBOc5O6gRhb/jaOml7gN+nNEJlXTMvxIJJdfgV7HgIXjzVcqUqOWHdGEp1Sm9uXIz3xeFBuCyP+Pi+cgYmlv8ezAtZIzSbuZRO00pODKKc38c8JA9h6q2uBBfuWvqRimzDqG3LZuqDQjofSZJMnL6Ne8P7B6fzeZiktQUd2EI7Yq5P5Zd81l/VAQ1jdhOjMvzDBx2gHzEoATfWfsHwIMANIz7PiUhus0AAAAAElFTkSuQmCC" alt="">
                                        </a>

                                    <div class="simple-select tt-proposition-to-trash">
                                        <?php $form = ActiveForm::begin(['action' =>['/orders/default/detail', 'id' => $model->order_id], 'options' => ['name'=>'disregast_form']]); ?>
                                        <select name="disregast">
<? foreach (MemberHelper::DISREGAST_SUGGESTION as $key=>$val) {?>
                                          <option value="<?=$key?>" <?=($key==1) ? 'selected' : ''?> ><?=$val?></option>
<? } ?>
                                        </select>
                                        <input type="hidden" name="id" value="<?=$model->id?>">
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                </div>
                                <div class="empty-space marg-lg-b30"></div>
                                <div class="simple-text size-3">
                                    <p><?=(!empty($model->deadline)) ? ((date('Y-m-d H:i:s')<=date('Y-m-d H:i:s', strtotime($model->deadline))) ? 'Пропозиція діє ще <time class="timeago" datetime="'.$model->deadline.'"></time>' : '<span style="color:red;">Час дії пропозиції минув <time class="timeago" datetime="'.$model->deadline.'"></time> тому</span>') : ''?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-entry">
                            <div class="tab-entry-box">
                                <div class="simple-text size-3">
                                    <h5>Про себе</h5>
                                    <p><?=(!empty($model->member->about)) ? nl2br($model->member->about) : 'Інформація відсутня.' ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-entry">
                            <div class="tab-entry-box"> UNDER CONSTRUCTION   </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<? } ?>
    </div>



    <div class="tab-entry">
        <? foreach ($models as $model) if ($model->disregast_suggestion>0 && $model->deleted==0){ ?>
        <div class="tt-proposition-wrapper show-proposition-wrapper">
            <div class="tt-proposition persone-online clearfix">
                <div class="tt-proposition-master">
                    <a class="tt-proposition-img custom-hover round" href="<?=Url::toRoute(['/professionals/default/profile', 'id' => $model->member->id])?>">
                        <img class="img-responsive" src="<?=!empty($model->member->avatar_image) ? $model->member->avatar_image : '/img/person/person.png';?>" alt="">
                    </a>
                    <a class="tt-proposition-title h5" href="<?=Url::toRoute(['/professionals/default/profile', 'id' => $model->member->id])?>"><?=(!empty($model->member->company)) ? $model->member->company : $model->member->first_name.' '.$model->member->last_name.' '.$model->member->surname ?></a>
                    <!--<div class="tt-proposition-reviews simple-text size-2">
                        <p>2 відгука</p>
                    </div>
                    <div class="tt-proposition-city simple-text size-2">
                        <p><b>м.Київ</b></p>
                    </div>-->
                    <div class="tt-proposition-team simple-text size-2">
                        <p><?=($model->member->forma!=3) ? MemberHelper::FORMA[$model->member->forma] : ''?><?=($model->member->forma==2) ? ' / '.MemberHelper::BRYGADA[$model->member->brygada] : ''?><?=($model->member->forma==3) ? ' Юридична особа ' : ''?></p>
                    </div>
                    <div class="tt-proposition-average simple-text size-2">
                        <p>На сайті <b><time class="timeago" datetime="<?=$model->member->created_at?>"></time></b></p>
                    </div>
<? if ($model->member->online==1) {?>
                    <div class="tt-heading-status">зараз на сайті</div>
<? } ?>
                    <!--<div class="tt-task-status finish">Був на сайті 45 назад</div>-->
                </div>
                <div class="tt-proposition-content">
                    <div class="tabs-block style-1">
                        <div class="tab-nav">
                            <div class="tab-menu active"><span>Пропозиція</span></div>
                            <div class="tab-menu"><span>Про майстра</span></div>
                            <div class="tab-menu"><span>Відгуки</span></div>
                        </div>

                        <div class="tab-entry" style="display: block;">
                            <div class="tab-entry-box">
                                <div class="tt-proposition-desc simple-text size-3">
                                    <p><?=nl2br($model->descriptions)?></p>
                                </div>
                                <div class="tt-proposition-option-wrapper">
                                    <div class="tt-proposition-options">
                                        <div class="tt-proposition-label">Ціна за всю роботу:</div>
                                        <div class="tt-proposition-value"><?=($model->price_from==$model->price_to) ? $model->price_from : 'від '.$model->price_from.' до '.$model->price_to ?> грн</div>
                                    </div>
                                    <div class="tt-proposition-options">
                                        <div class="tt-proposition-label">Термін виконання:</div>
                                        <div class="tt-proposition-value"><?=($model->start_from==$model->start_to) ? $model->start_from : 'від '.$model->start_from.' до '.$model->start_to ?>
                                            <?=($model->start_from==$model->start_to) ? MemberHelper::NumberSufix($model->start_from, array('день', 'днів', 'днів')) : MemberHelper::NumberSufix($model->start_to, array('день', 'днів', 'днів')) ?>
                                        </div>
                                    </div>
                                    <div class="tt-proposition-options">
                                        <div class="tt-proposition-label">Дата і умови виїзду:</div>
                                        <div class="tt-proposition-value"><?=MemberHelper::ListDates($model->dates)?>. <?=(!empty($model->payment_object)) ? 'Виїзд на об\'єкт платний - '.$model->payment_object.' грн.' : 'Виїзд на об\'єкт безкоштовний.'?> <?=($model->come_personally==1) ? 'На зустріч приїду особисто.' : ''?></div>
                                    </div>
                                    <div class="tt-proposition-options">
                                        <div class="tt-proposition-label">Дод. умови:</div>
                                        <div class="tt-proposition-value"><?=($model->prepayment==1) ? 'Потрібна передоплата за роботу.' : 'Починаю роботу без предоплати.'?>
                                            <?=($model->prepayment_material==1) ? 'Потрібна передоплата за матеріали.' : ''?>
                                        </div>
                                    </div>
                                </div>

                                <div class="phone-number-block">
                                    <div class="simple-text">
                                        <h4 class="phoneNumber"><?=$model->member->phone?></h4>
                                    </div>

<? if (empty($model->approved->id) && (empty($model->deadline) ||  date('Y-m-d H:i:s')<=date('Y-m-d H:i:s', strtotime($model->deadline)))) { ?>
                                    <a href="javascript:" class="button type-1 size-3 phone-number-show" data-id="<?=$model->id?>">Показати номер</a>
<? }  ?>
<? if (!empty($model->approved->id)) { ?>
                                    <?=MemberHelper::GetResponseButton($model->id);?>
<? } ?>
                                    <a class="tt-icon-entry tt-icon-hover openChatButton" href="<?=Url::toRoute(['/members/msg'])?>">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAcCAYAAAAEN20fAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTExIDc5LjE1ODMyNSwgMjAxNS8wOS8xMC0wMToxMDoyMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjQzMzRGQjBFN0VCMDExRTc5NzNEODUwMkE5MDZEMzgyIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjQzMzRGQjBGN0VCMDExRTc5NzNEODUwMkE5MDZEMzgyIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NDMzNEZCMEM3RUIwMTFFNzk3M0Q4NTAyQTkwNkQzODIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NDMzNEZCMEQ3RUIwMTFFNzk3M0Q4NTAyQTkwNkQzODIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz77JeyHAAAFw0lEQVR42sxXe2xTVRg/597b2/W2a7duK6x7dZNuFDYYQVDwEfEVE2JUQjQhLib8QQhifE1MfBElCAZRVIaixhiI8tAQNPhE+I8QwSAMGI7h6NhWtnbduq69be+j19+pg4ywzRHWxJt8Peeex+/7+n2/7zvnUsMwyP/hEdZvbmLto5AnICYIB8m2dUyHDlEguyHfU7Pbdx86T0KWQno5yhNKaVatQBSMtMHsICWQA5DP6bS59xxBpwfyA7MMkoCIWfZICiINO2AJpFTAzyxIPeX4MEzd2Xn+lKrEInFeMGfFAl1LEdGWR8qqZ6tw/QIjrd+V4QiEz7QGmYN2tVnK3aPEIwFVkbNDDp4n0OFBdzl0Vg9zhWekiUJ+NQy9E+2r5d7aR4o8M3lKuUk3gmECW4IOlhiN0HkW7S9sjne6PS+BPt9Qyu8WeEHUNbVBzLG4Lfa8g/GBEKKVnhQjeF4g7urZxOZwNiEcy3iO/wCc3UNI2gUTF2T+tsCLihyPHve3ntwqx2NHJavtISnXuaGowlcsmHJuvkYAA1hlwPwE2LdBxz7o+hI6z0C3diWfCeV5m55KkUQkeDrU3f52dCB8gqNcQ2GpZ5mzzDuF44Wb4IRAgFEOrOXAfAzYB6FjHXR1QqcA3ZYrZP03fhyHPlWx4GxAUzdVzLg1lpLll50ut0MUxTe6z/9JjPSNhQmYxO1FOPIKG4H1FN7XB9pbvk7FBsKMMXjnRla46x5kTcvFM8c/NnT1O0EUH8+x5m4HYK4gTjxMbC322LF3FzDuBdZWYO4FdtdYpXbUyqclBlsDF/96byB0+YhJEBc6iopXFZR5KwSTeQKcMBOsnYY9L2CvDxg/Aut9YF4a62zjxinDmhwJnouGepoMSpuVhLyxsLh8xZSqmSbKceOGA2tsWLsKe9Zi7wFgfASsPmOcFJxosWDMVpRk8hXJ7thc5ptLkOnXpyjG2BzWbMHa5zEkD++d0Ck4RvGhgpTnmmEvmrqCpNM+k5izVjCL+9DeLVnzmlwe3y2CKI3ghEQw5sPcTqyZibU70G7E3oeBsRpYhXScKimMYQQnWBzT3ZXTn8vJdcxLxKKH5P6BLbqmFJgs1jVWm3NpYUmFiqWHg/6WJItkUbnXgbH7U3Ji0VB/cJuaiG+Ch0TJnu/LLypebMmRtI5W5TPwxD8aT0Y1RLTm+ZC+K5GuizVF+Tglx97qaT/D0rfbZLa946mb34V0fMbqyH+2cvYd0eFtdoy1gQaNwfbWn9VUTAVf1JLqOcvgmQ8pb1pdWTtvsKPlD5a+XWMaAiUao6glz1U7tdzbyBG6SJCkDcEu/66+jnNXa4imxIP+5mNfldTMarYXuGpwJDgwnOYFUyQaDrZ0tzaf1NT44DAmCbSdIoUVvnddpZ6wlky96K6a4eq51LYB9SqM+fQ1hhi6HuPNZgIj6opKqtbY8wtqE7K8o6/Lv7e/sy2U1rVrsgn3hECw8+9AbKDvsKarrLikBd4Exw2yuWv+KdsLjEsgxxf2ginFwH5A13UhRMhm6IxAd+KqIZqumCWrfb69pr4Brr0dZ8G3iVjk9RA8oeujk16O9DJhPFH/M+XUJAFWpyCaVgL/U5w3Szw19WFN136DblbRM6dvIzq4qxrz8G8fNOdY1veHLm/qudAMz+mTeD1Mk6FwLxEstkPwClWU1GsYy4XuMkx7mSFvsg6uAcxFTQF/676BwIWhGz1XJmgOSUT71GQy1W215yeQnHdibCErIyw0NONeSk5g3baUPKSyO7xpRI2Y7KsidPjRXQedNdBVf4UjbRA/Liu/o3WWeuviw58V2XwUhMUGI44O3+QrBVYxKUcbDE3frmpKB0KUpln+njAyj87hQKyiAv8Tvi2eFi77W/eDlLgdWgWH02UQanB4z+oHFrhBKVwS7u08nUzEd3Mcv5+OvM5V1M3PHFxpXctqXNitDccF6Th9LJPa7PlHgAEA6Ty+i7ZwrhAAAAAASUVORK5CYII=" alt="">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAcCAYAAAAEN20fAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTExIDc5LjE1ODMyNSwgMjAxNS8wOS8xMC0wMToxMDoyMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjQ4OTFFNDc4N0VCMDExRTdBQzhBQjMxMEJGRUE1NzE1IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjQ4OTFFNDc5N0VCMDExRTdBQzhBQjMxMEJGRUE1NzE1Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NDg5MUU0NzY3RUIwMTFFN0FDOEFCMzEwQkZFQTU3MTUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NDg5MUU0Nzc3RUIwMTFFN0FDOEFCMzEwQkZFQTU3MTUiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7qQaxrAAAFYUlEQVR42sxXC1CUVRg9+2Dljbb4YETAaMAVZdTGTDAdSJOxyTSfQfawhELMElJHSmYkhVEsMh4KaiYBQkZEWDkozlgg2UQEA4hlIayoIArKa9llt3N/IHOE0oltujOHf7n//c45e+937/1WZjKZ8H9oSpwMEc9FxArCgpAT5nYnNHoIPXGE+EKJ0ymP88NCYgHRSGuAAjKzWZFJFkwwSP+NldQAncy0C0X8cIU4JpwRnYTKzDOiI6yJ54hlhJv4/t7EFC7KdRiRFpEBfXo5Oh6hV6Np6NZITIScf85eAoKoGBfIOZHDh4vj25sjvVOjpOJUIsx7DLKOVqIh73fzTIWrFb/5GLhRazXh0ZcrCpE0rcRx+qvjM/L55Xg6fRUUVoqhNyE4yW1NDbExIqhZKWn3Za9IzGLOy25Y4TO04C3fCYipWw9o7IbOhOASnOSOp8ZaasVQM5Ha5/qN0Cp0rQ34YcvHSNBexhk4IcDRFTGfrIDTfOd/b0JwkGscOfeSewY1cqh1iJoV1NbfNqKCXR0XKPZ7VKScwg7UoJRZs2qaHwI3zsdoT5veRLvvw4IxIpYcLuRaTc7F5C6gRjS16qmpoLZVf7JKzVIJJQP10SWobO7CrsTVaMNVbPKfDociB2x12wO0Ge7PiDVzoojnpdqD+XAVL1Bt+9pcZCSVoVkhg4yair+ecHe1/eWoenEfkrt1PFdssUzthL3nXoPd/SyTGMsYe8ZmksOfXAnkzCa3drCj9q7WbYQpoxo12/Pw3q0yHnjW8Bk7BaFvB8B1zph/NiHGcOxDjNnAWA05viLX++SsIzfu2YhoeiMM286g+qOfkMQJrOBxFzvrMQQnroSFo8XgJsQ7jrHl2FDGRDE2nxwfkusaOY1/d/ncSzNwk3ejGVu8XBBXHw7MHH33INEn3nFMPMe+yZgOKfYeb8EBm4Ucyq0zMfGlqQjmBtNwnaOIHNhjjqUzEg88A/fF42+PF5/Zp+G7NI7x4tjDRCxjnyJHGLkcySkfvAwYoKkY8KwGEyIX4g3VOExnep08X4v45nao3Udi0yg3LNHMhj7ChELtp+gSZUPEfDiwby6a4NdYhaQLTdiltoHKw41n2RQ8GamG4eJNpGZWo3agPBnQyCve0HD7hnBSF3ATJzc3Ivrh/dL2vbTcA7FZr6Ke23GdjzvWn92Mm31h9uz7hVkQsS4f32Sfh95WCX3t6whUD8ce1TCEHQpBq81BaftqBzXSZYCBt63pnUcxaVsAwplkflAjtrAQmaEsXTp6esd9/isalyQhPTUI5Q9MhCfnw4HdRlii5XoVqtako+zL36T7S4rx3QckrUScvz+zpgXhiYswSm2JmHdL0EzNnjuNdOOWC+k2z8DkYD9sJL0XS6TDpaeQvfM4mmra79xNuRfQMPkEGnzOofBGFy3QyAhL6Iq10jupfBBNPEUsOeqGy3Bw2mQe8J6YF6yD0mDCbmreoHanVCawMLrCi+cDWvqWlKu4HH7E0WtabJmdClTfGrpL7/Qabm9npFArgEjlbJ6g1lLurg3CyGWOK5WqJlGojERU0XdInXcAxs6eoS8DCl6Gte8srGNSR3FBc9g9QpSpcinJgCfo0IXPHYezkReUNvQmRBOc5O6gRhb/jaOml7gN+nNEJlXTMvxIJJdfgV7HgIXjzVcqUqOWHdGEp1Sm9uXIz3xeFBuCyP+Pi+cgYmlv8ezAtZIzSbuZRO00pODKKc38c8JA9h6q2uBBfuWvqRimzDqG3LZuqDQjofSZJMnL6Ne8P7B6fzeZiktQUd2EI7Yq5P5Zd81l/VAQ1jdhOjMvzDBx2gHzEoATfWfsHwIMANIz7PiUhus0AAAAAElFTkSuQmCC" alt="">
                                    </a>
                                    <div class="tt-proposition-restore simple-text size-2">
                                         <?php $form = ActiveForm::begin(['action' =>['/orders/default/detail', 'id' => $model->order_id], 'options' => ['name'=>'disregast_form']]); ?>
                                            <input type="hidden" name="disregast" value="0">
                                            <input type="hidden" name="id" value="<?=$model->id?>">
                                            <p>В корзині (<?=MemberHelper::DISREGAST_SUGGESTION[$model->disregast_suggestion]?>) <a href="javascript:" class="restore_suggestion">Відновити</a></p>
                                         <?php ActiveForm::end(); ?>
                                    </div>
                                </div>

                                <div class="empty-space marg-lg-b30"></div>
                                <div class="simple-text size-3">
                                    <p><?=(!empty($model->deadline)) ? ((date('Y-m-d H:i:s')<=date('Y-m-d H:i:s', strtotime($model->deadline))) ? 'Пропозиція діє ще <time class="timeago" datetime="'.$model->deadline.'"></time>' : '<span style="color:red;">Час дії пропозиції минув <time class="timeago" datetime="'.$model->deadline.'"></time> тому</span>') : ''?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-entry">
                            <div class="tab-entry-box">
                                <div class="simple-text size-3">
                                    <h5>Про себе</h5>
                                    <p><?=(!empty($model->member->about)) ? nl2br($model->member->about) : 'Інформація відсутня.' ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-entry">
                            <div class="tab-entry-box">

                                Udnder Construction


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<? } ?>
    </div>
</div>

<div class="empty-space marg-sm-b40 marg-lg-b90"></div>
<? } ?>

<?
$bundle = AppAsset::register(Yii::$app->view);
$bundle->js[] = '/js/jquery-ui.min.js';
$bundle->js[] = '/js/swiper.jquery.min.js';
$bundle->js[] = '/js/jquery.sumoselect.min.js';
$bundle->js[] = '/js/order.js';
?>
