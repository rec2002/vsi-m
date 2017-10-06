<?php

/* @var $this yii\web\View */

$this->title = 'Всі Майстри';
?>


<div class="tt-header-margin"></div>
<div class="tt-bg-grey">

    <div class="tt-banner type-1 gradient tt-target-scroll">
        <div class="container">
            <div class="row flex-row">
                <div class="col-md-7">
                    <form>
                        <h1 class="tt-banner-title h2">Замовте послуги майстрів по ремонту</h1>
                        <div class="simple-text size-4 darker">
                            <p>Добавте замолення, щоб отримати пропозиції від зацікавлених майстрів</p>
                        </div>
                        <input class="simple-input light" type="text" placeholder="Напишіть, що потрібно зробити? (Наприклад, ремонт квартири)">
                        <textarea class="simple-input height-4 light" placeholder="Опишіть завдання як омога детальніше, все що може бути корисно для майстрів (розміри, об’єм робіт, типи робіт, матеріали ... )"></textarea>
                        <div class="row row10">
                            <div class="col-sm-6 col-lg-7">
                                <div class="simple-input-icon">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAUCAMAAACzvE1FAAAAV1BMVEUAAAAtNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkItNkLkTjgbAAAAHHRSTlMA3Z2EEHekmIsV1s9Q5KwF9sq5tWhDQTcdCmZiOw521AAAAI1JREFUGBkFwYVhw0AABDA9mJ04TL3956wEPnNJyvwBGJJtmrZkAGqmDktNhSF/AL8M9Iw4huHAOd0c9JKUzpHmtGLMsmTEWmTC9cLlihqZ8Mq25YUapxX2UnZYT1q+AHzT9IwAjOm0vAHeaVACkAKW3IBbFmDPDHN2gJYHjzQAap7PVAA4J2cA4H4H/AMiuQhmojIjvwAAAABJRU5ErkJggg==" alt="">
                                    <input class="simple-input light" type="text" placeholder="Львів">
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-5">
                                <a href="new_task_1.html" class="button type-1 size-3 full color-3 uppercase button-plus"><span></span>Додати замовлення</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <div class="tt-banner-img">
                        <img class="img-responsive" src="img/imgblock/master.png" alt="">
                        <div class="tt-banner-qoute-wrapper">
                            <div class="tt-banner-qoute active">
                                <h5 class="tt-banner-qoute-title h5">Шукаєте нових клєнтів?</h5>
                                <div class="simple-text size-2">
                                    <p>Nunc egestas est ante. Proin temp us varius mauris. Fusce a mauris lorem. Curabitur eu sem.</p>
                                </div>
                            </div>
                            <div class="tt-banner-qoute">
                                <h5 class="tt-banner-qoute-title h5">Яке ваше завдання?</h5>
                                <div class="simple-text size-2">
                                    <p>Nunc egestas est ante. Proin temp us varius mauris. Fusce a mauris lorem. Curabitur eu sem.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="container">
        <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
        <h3 class="h3 text-center">Схема роботи сайту</h3>
        <div class="empty-space marg-sm-b30 marg-lg-b45"></div>


        <div class="row">
            <div class="col-sm-4">
                <div class="tt-service type-3">
                    <div class="tt-service-entry">
                        <div class="tt-service-count">1</div>
                        <div class="tt-service-icon">
                            <img src="data:image/png;base64,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" alt="">
                        </div>
                        <a class="tt-service-title h5" href="new_task_1.html">Добавте замовлення</a>
                        <div class="simple-text size-3">
                            <p>Дайте відповідь на кілька питань, щоб ми могли підібрати вам майстрів.</p>
                        </div>
                        <div class="tt-service-arrow"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAABGCAMAAAAU0y/9AAAASFBMVEUAAABscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHYMgmkPAAAAGHRSTlMAnoIGCxOkax6RlY57XlVQRT00LiglZEu98idvAAAAqElEQVQ4y5WUSRKEIBAEFXUAlU1g/P9P/UAeqj1mVERJ0vQSF/reP+J1Jzodht0guq8YTgXxbyP63BiOgehxYtg3ohsXVs86DqLhYh3doCNng//O/i/WwYW+GnQ01nGyDp6w++FCDJdk0DEc+5/sX6duYpv8ZyXhiWU7IcrWm5dv01ecEnmiui4gZ911x5clv8JqENDkrRGDvI2wKhVdwMBNywLkDR4Jfl59BMbKnkUFAAAAAElFTkSuQmCC" alt=""></div>
                    </div>
                </div>
                <div class="empty-space marg-sm-b60"></div>
            </div>
            <div class="col-sm-4">
                <div class="tt-service type-3">
                    <div class="tt-service-entry">
                        <div class="tt-service-count">2</div>
                        <div class="tt-service-icon">
                            <img src="data:image/png;base64,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" alt="">
                        </div>
                        <a class="tt-service-title h5" href="professionals-list.html">Отримуйте пропозиції з цінами</a>
                        <div class="simple-text size-3">
                            <p>Обговорюйте особливості, які терміни, ціноутворення і обсяг робіт.</p>
                        </div>
                        <div class="tt-service-arrow"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAABGCAMAAAAU0y/9AAAASFBMVEUAAABscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHZscHYMgmkPAAAAGHRSTlMAnoIGCxOkax6RlY57XlVQRT00LiglZEu98idvAAAAqElEQVQ4y5WUSRKEIBAEFXUAlU1g/P9P/UAeqj1mVERJ0vQSF/reP+J1Jzodht0guq8YTgXxbyP63BiOgehxYtg3ohsXVs86DqLhYh3doCNng//O/i/WwYW+GnQ01nGyDp6w++FCDJdk0DEc+5/sX6duYpv8ZyXhiWU7IcrWm5dv01ecEnmiui4gZ911x5clv8JqENDkrRGDvI2wKhVdwMBNywLkDR4Jfl59BMbKnkUFAAAAAElFTkSuQmCC" alt=""></div>
                    </div>
                </div>
                <div class="empty-space marg-sm-b60"></div>
            </div>
            <div class="col-sm-4">
                <div class="tt-service type-3">
                    <div class="tt-service-entry">
                        <div class="tt-service-count">3</div>
                        <div class="tt-service-icon">
                            <img src="data:image/png;base64,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" alt="">
                        </div>
                        <a class="tt-service-title h5" href="professionals-detail.html">Оберіть майстра</a>
                        <div class="simple-text size-3">
                            <p>Допоможіть іншим замовникам зробити правельний вибір</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="empty-space marg-sm-b30 marg-lg-b50"></div>
    </div>

    <div class="tt-devider"></div>
    <div class="container">
        <div class="empty-space marg-sm-b30 marg-lg-b35"></div>
        <div class="simple-text size-4 darker text-center">
            <p>Безкоштовно для замовника. Без комісії для виконавця. <a href="why-we.html">Економія на роботах 20-60%.</a></p>
        </div>
        <div class="empty-space marg-sm-b30 marg-lg-b35"></div>
    </div>
    <div class="tt-devider"></div>
</div>

<div class="container">
    <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
    <h3 class="h3 text-center">Популярні послуги</h3>
    <div class="empty-space marg-lg-b15"></div>
    <div class="simple-text size-4 text-center">
        <p>Додайте заявку і отримаєте пропозиції з цінами від майстрів</p>
    </div>
    <div class="empty-space marg-sm-b30 marg-lg-b45"></div>
    <div class="row row10">
        <div class="col-sm-3 column-lg-5">
            <a class="tt-service type-4" href="professionals-list.html">
                    <span class="tt-service-entry">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAllBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igDME4q0AAAAMXRSTlMAPG+IaQcENTkpCRG7fC8s7RTweIR0ZF4kQKof6bacVxvfsE76zhcP9tfIpI5RlUaRbppEUgAAA3FJREFUWMPVltmWojAURa+oAQkgKJOKOM9a1vn/n+tAS0UCiFY/9X5wEQ7ZkHATob/sdyOJu2aP04a9WtkGvUEPJQaUcTgj53xoFywQsX7BFDEJZoA74XziArM3BLpsfOcddOArHwr7gkhbCGH1xnZOEKyyIWwArUg1YNMiuKOEmfW5yfgmbU3EPi5DJyNBxKkLlCbfAL7bDMVT7kC0BmI1xpq9FOiY6oYpDk4YzDHias5HOJmvBYKzODgD2NVcau5w9F4Kdpo2ywRND8vUgamCsJiuKzVwBYwXAu1vRaH3suIXrwVBS8lsgKBRIJK0tWh1IG1KNjR/Y9nMgDmrF6QWXE6tcLe+IAYAziJoxzxju6cKN2DK6C3YFBiQQgfo0tt0gY66oSCkDwiVghgDd/qIOzCWrRRw6EMcWRDMqn/97QVhsceOd6FfcYH22ILsuPMLYhu7XDDBr9Ef8xGcYNndj7AtnLRYvtamRdi2AUmBIX7ZD1RFzY2SoIcOHVz84B5IRc076CkCR5kdFR1PODWCAbpyrQyrguFzPqgV2EXTrhfIvEHgzi1rvbasuVsvkHmDQFIvkDQIpp4Xi8zzpoXA24zHG68QiHwJ7EVeL8gXOJBvD7ngkCInPeSCPDfNLG8Q+OKIc/Hj54IlgLFhjAEsM4HIH/g1ggkt5RYzznow4LtPgv43wEjNJ4pApwiW/sBCmN1mXsTz7Obhcx6RrgiWJkrsCTCLWGS0RwlzqQgcigLthyBiHk4yP8Fj5ZycyhwodGDLho2Omqtz0KkKeq/zNoEBTTY0GP+lIPhIEFPH3l0W/EkQ0fQYVQV8cdn5BsWKwP5CTiQFNwLWFUGEnEtXEQCWzuMxED7NAeOVIYRAb8Y7K0AVfBUfOvtXk7gv/oetsmCBRHSObgdxqf9K4ONG5ibSiW2xkLk5RUhXCGYmtnGzIAaYB8FcqKZm0T0F4HHg3oNFANxJvWAyAhJK4E9WMAcA0lzBt9hquohFy+G0jM5AUCcIgPlCXOAQ9cX1dx84chEmCJhaQ3CqAkd+28mRJ9myvJDKBkcalgVDOkInlRMmlGJPFbZgs7JgxrCiChN8kQuqksLkCGU7BDcRUAUurAn2rF+G9acYOPDZzwkfzgBX1ldgQyG44p+4krfaooKbbI/JSLZHyXGbuKhwXHl/APyKsk/w6QwcAAAAAElFTkSuQmCC" alt="">
                        <span class="tt-service-title">Ремонт під ключ</span>
                    </span>
            </a>
            <div class="empty-space marg-lg-b10"></div>
        </div>
        <div class="col-sm-3 column-lg-5">
            <a class="tt-service type-4" href="professionals-list.html">
                    <span class="tt-service-entry">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAABACAMAAABxwuT6AAAAk1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD8SirwAAAAMHRSTlMAAwceoIYsDt44CxUlw7iZb0FKpH96TudnPC8R8diTjWxXRhvPvql2YzQZ+MWv4F6y0+83AAAB3klEQVRIx+3Xa2+bMBiG4dc2JI05hQQIh4SQ5tw07fP/f90whUyDacWONGnSru83BhsMUM0pb9Bxizl1JLR9sC5OUUrGx2PTI/Iu3mJPel6RUMvGPbYHtpEYRMnWVmIPC2pF+L2g3zI8vFLrjPlkKM8Z9RXXSaPEjBrT0DO4ZpuR8g5gohnvAMQqd5IDhPbIB+C9GTzGZS9arqQ+Jvr2NmbMx3I424Np2gJDIdEKollnr7Rapwv1udbS+lVwUOu8QNocWpjcYW/NeVdq5jpsaNByH1ciB55aaWhbMxX7VBM+9ASSurjG9JCiTtuYmjBjC1TGLVvBNW25j6PBiNIR1/AMrPjYghciD3fnwFujFXzbclcVx6+isznZl0VB3wl7xcx9k5zGmQDLz6ZgpG2FjExxrMlYgY15PMXLvxjLvx879lJtsD5gBVYt4hqxjZ6rRpzhtBcPLjAdWw63NtxIAwPoJwGLdHioZowaMgyw04rnAD7p8e53tWKe3BF3j2W5IE055tT4ACddsy5+gXwmnv6PR8XVM3H6THyIItc4rvnG8XKSc+M4eeaa71koDeMMQPPRsTGKvTQV6nnWiAcbF8C0YwY4X38TPulLgEwWqTqGgaj7HzDi2utNVdCf/ACM6Gr8KjhNeAAAAABJRU5ErkJggg==" alt="">
                        <span class="tt-service-title">Оздоблювальні роботи</span>
                    </span>
            </a>
            <div class="empty-space marg-lg-b10"></div>
        </div>
        <div class="col-sm-3 column-lg-5">
            <a class="tt-service type-4" href="professionals-list.html">
                    <span class="tt-service-entry">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAqFBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igArtXYKAAAAN3RSTlMABAj69WgfEvDpwSgaDNdXqT3k27R5yA4t4IxPOSIUroN1NbqQXltF1M9wbEihm4ljmH9BF5UxOP89rwAABGVJREFUWMOll9eamzAQhUeADaa7rsG9l3Xddt7/zYIQsjCwJvlyLhKBmV9TBUuZ4sG6saT/UBeJ7GnxtvnTOH/PF43TWx1gDGNkAw1S8rYrKO23U6oWG6b/DbCjETCUd5c9APo5GDvu1Nm9HwD0zErAUWzbhMXoEy2Wet43AMzcfDDbCOizCgcMIA3wgj5RiIDfg5D1McxbjCz4WlXwmPHFG8ASP0K+vq3Xl3OPe9Fp5jeL0XkrR3Dq4idZLGHxvXVS0sZ7cJeU+rCmJUBziA7T2gDvAwNjymtpIcyH0SgRjolFCO7tll9CpFHJ26OTD3xTJHyiT14E45qm3AUwL2Q5xIxeEJiuJ1vKXS+wgWaB4KOdv97C8vLXH7iSlAN4Afb0rAnu9EwYFDaQTg+BBdEKmwIB1vP1/bk0WoTo02SeEyJ1xtOLQXT152sN/nOie8h0S693MJ7b5cllMTheIcq5D8CSZhdE+Vo20S8ArphQUaYN2BmXrWDnCLZenIAG2lTWzoC+ywgHnIketGN5gGxz81MiaN/AmYll5+F2CLRKE2QjUUglORFapojIyE6nGNaqTNDm+1G3isBsGKKGriAcobtsJghFSEJgZcIZ+lDkXkcjO+R+J8yorD7wKQkhcCIShK8Kgo8tlRUAgSSkYQgCbtOSwy4OVKFlRjANNdrf4NLtYeHJFVVpoiPgpVTNsIDVXiORHDTp4ph+JbCDascAupvEYbqBbqT3VJqLUr+14Mtnx+qF4xuszl4eImh5aj3Kll+wa+yl5jCmKp53kurg+lf2N8DJllMDAiAb9JrZ317Y7/CYV6+F0EcjT4hr7YdAoE5Mm2kFwqzx2t7VsVDD1WVERYJsh2q9WeoYjwEzmxtF0DYL54W9FqGnji6gT3lCvdgBB6Zy2fhnQk+9S4e8Fk6OMKd63WGZKpdb8bpbCMIBM1Zn3weaKpfp1orAevC91/YB8KNyeSF6JtAa1uSVfRs4yVwOeC0U4SjL8iqVTu7XmaiF+iVIoHzVwsCkan3p6kthndSi6FsMVxzbGBUs1dSoDyejsM07gJZgnnT08vT81MgvSl6Lgi7pgIvv2AGMNiu/knymTuUlKamssm9MeYFiJBpsnhihOsGa1UFqFjrosNQ/GHv+T+4dH0OXbx7TwPsvp0S6yQdw1PhzMTDOpciRG3UQU7Wu/CO0DaOpQnUeSfPZYxjDXwc1wpoZufzu4EuShRXLhnHw+8A0ARvrrOrTJJw9muJ2nw2wEMXqVturbnDTVw1P4pBOWKdJ0zViHxPxNf963AaARmki05I00SPWBWQLbXktXsoERGPvGIW4mQkgQPdthY+s4Z36A8sksvAp/sTZJIAVdsQWk3Tkkvt1CvgzLUxkRgKKYD6GcUO1chHxXtinZW3xjMR4l8OYxFGvOz9abdHsY9zTtLTFMF7qrcW2d+bC0FKv0/EG5m7bl51UK7cLY96R/ZQRANWAtWILcOWeN+PIDugfpDnbb3l6/gExeZqVOwouLAAAAABJRU5ErkJggg==" alt="">
                        <span class="tt-service-title">Майстер на годину</span>
                    </span>
            </a>
            <div class="empty-space marg-lg-b10"></div>
        </div>
        <div class="col-sm-3 column-lg-5">
            <a class="tt-service type-4" href="professionals-list.html">
                    <span class="tt-service-entry">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAjVBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igAUjVVGAAAALnRSTlMAAwj38Avn3ZAaObsR0GtjKyUXonxeV1Az18vIv7WrmYVBMCB0S8Oyp0dviYNJTs4YewAAAhpJREFUWMPtlutSwjAQhTeRlmBpKRVaBLwhKiqc9388002dpQi9OTo6w/eDmTaTNPk2ewY6c+YXUKORom/w6AP+I3UmAsIQiKgb3jMwUWoCPHvUgYcL9GKyxD1cPLS3dwfcamL0LXDX1uUCyOQpAxbUjgAYydMICKg547cZqXtg6RU2l8C9otnbmBqxBmAUray7S7JcWpsrUgbAmuoZzoEN0B+QfskXyie+aBr0+fV8SDW8Av6YkmtWkAJ9OzFlCdcJjX3gtbp4V8CVImIFgWcX4olewBJk/AT8hSdyzFiBiiLFEmbkeOIdnmAAhHJGfQM4icCNFkchMKDjJOzuE28BrMiyAhbSDLnNhI6QRh4PTvdbgfOg1AxT/ogXpV+Lx0c2+XalFVweSDPkxzIs5aCgO8APeIyF8cRsPw8yXqgQa4DAB3aiyxUndbsLgCXbLOXBMOTXgTtn6grq1Mr1KBRMkU88zAO7EI+yBLlylrWcRxn3DRMfy4PYuP0ZJd5scxj+LWAF6nQeKJaw33aGtsB7PkUuWlUeyFW1qHdg6w6VSCtsdFUe6I00Q1LcGqdVWqE6D6QZUrm37vpw1Ye1ecAFjYorVXI35+LV5wEXdC42GS5PL26aB3GPR8tkE908D/Qk+4N5YGmeB6domgcVNMmDaurzoI6aPGhCRR78m/8HlmN50JLDPGhPOQ86IXnQmSIPuuPy4MyZn+cDpOdr87YmEeYAAAAASUVORK5CYII=" alt="">
                        <span class="tt-service-title">Укладання плитки</span>
                    </span>
            </a>
            <div class="empty-space marg-lg-b10"></div>
        </div>
        <div class="col-sm-3 column-lg-5">
            <a class="tt-service type-4" href="professionals-list.html">
                    <span class="tt-service-entry">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAclBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igCiUwhmAAAAJXRSTlMABMUUW0n4DwmMBugb74VEHtjhsqsqJmnBpIkhr3NsNMqVgFM4wRl1BQAAAXhJREFUWMPt1duOgjAUheFVcDgUERFlEDzrev9XHEeSaTzQdrYXxsTvChPXD/QGPFBXWZvgRtJmVQ0vY56VCldUybMxfKRcxwFv7lYziDdM4aNhiBG/cOWLI4Rs4CMYDgSfwCfgF1BK7dipDUfqyogb1XF3vrKu04hOUTrcWNLLEgM0owROSUQ99AbMFZxUzsF/VcwDp5wVhuil1xFoy+ORoQOpYA3A4S0DevxcIM6oRQGzT4VPYPaygNnLAmYvC5i9NGD28kBG9lZKFFAl2YukZ6B+pYzGskDv2+wFAbMXBMxeFjB7ccDs/QMomZgf+sE+YQmbCRcwtjFuLTiBTcEDrA4sXN+tKSymzq9fwVJZDrlkAYeKsw4DuhkruOg52W5jdXfzeNuScw23IuKAqIAXfVo3vNOsTxr/UnPVX6xYQ2LKeX8x5/RVgWxykQkDMf/EEAkL5otFziKEUMIZMGOC1wX6V5AHNC80xI4pmR7xDBJ488B+D7sfAQhFQzM8j1gAAAAASUVORK5CYII=" alt="">
                        <span class="tt-service-title">Виклик електрика</span>
                    </span>
            </a>
            <div class="empty-space marg-lg-b10"></div>
        </div>
        <div class="col-sm-3 column-lg-5">
            <a class="tt-service type-4" href="professionals-list.html">
                    <span class="tt-service-entry">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAolBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igBDnM2sAAAANXRSTlMABGMPB4Ux1EpQC23i+0ATaBj4IupENpyTgS4b8MS/pG8rHtvOu3leWCcl9eaxrquLczrRthUvv4EAAAJoSURBVFjD7dbZkqIwGIbhP4CICLIvgvu+tkv3d/+3NjKljQhpEGbO+j2wikrlqQoCCT23Uy7j+ee4v/amlsro3awlMunzj5bgRbFYjZLOgNZV5NnuulkFw0HG0r7O5m3oR2oBXWAZ0XD8ziRcuhnKXYbdju8YEr10wafKsyVxJivm+TjPUIPR+knZwhapPCbGkSf0T20dSYfvOcyFTG/FVEseYvi4jNGm92M6HstWIFCNXDzWECJib6eacFOqXtEDQJ3so0MpwKgF/3HZhkHVSwE5BcQawBpWM4AkagjQfwKYEW99T8nmOawSwOTuCMVpTg4wXgA2DZB0GAV9U8hmzqGLL4CJ2TPA1ntAP64dRoWZCH96DnaCDSw8RtwkuD8Bt0Kr7MbzgU9gmUyvDfjjiKgWkPYL/FuAGbtrJ18OuGBL+cTOFzjZL4DqUS4jwK3FOHmZWhgI9wIsbr/OC5CPhYDeiu5DYrp7yWhRGhewNOgTKV0M5uq9TiWgp+MjmZ4CT/ULACW7wfuASZlO2nftLWdfSJvpuFJpfIANIFAToIuAmgCqDrERMMGKGgEHGI0AAxo1AhRMiBObcoEVvscu6PGAD3g8QNywx2WILRVnAVqF3XnEvYcBAL/B+cDAoIs2B1D2YilwxobZmBYD8kItA1TYjCYY1l6CADNRYNQF2oj//pNKIRD3WRmwR/KJamFTCPQRlQGrZKqkw6l7UpVsHE86TvWPuvEIwJjlZUDpjdDq3XMxI06Ob1Cu6QGv2QpV7woMJ91MY7zzSfoqeHkt7KlqKgaqlGuJXVXAQnG9qgAboihNpEr9AYRkks6ETb32AAAAAElFTkSuQmCC" alt="">
                        <span class="tt-service-title">Виклик сантехніка</span>
                    </span>
            </a>
            <div class="empty-space marg-lg-b10"></div>
        </div>
        <div class="col-sm-3 column-lg-5">
            <a class="tt-service type-4" href="professionals-list.html">
                    <span class="tt-service-entry">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABACAMAAAByderSAAAAllBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igDME4q0AAAAMXRSTlMAHqO1BRQDCMiQEpQtCvbnvbGb72pLNgwjGM/CgyklD6iKXOHamEAzfXFlV9SXRtF0ysbBZwAAArJJREFUWMPtldmSmlAQQBu8gKAgu+C+OzqZSc7//1wiS0yASdCHVB7mFFXQXZdD03Rd5JNP/hHWeTunYL49W/IwxoIbk+Fwwo2FIQ+hXoAgcZQpYionCW4OJf1ZRhAbv5UUg7fsLUghnDaT0xDSnoIx7LryOxj3ErjwKp28gtvHoLOQD1ig/3UGnGWM92HTlUe8dKw/fII3Crb1mqwo2s1q/5aCt+UHDZwBgb178TiUVazxtNVK81iXFRzwXnZ2AMy6WhrD8OQWj5pzKXNHCo5ldGFuFTWdhhC3BANIpMIBs3wqhCGUFZngSEUCg4YgZLK+R2BUqpnIrLrRAPnJekLYeIWBkjvJ0Sxbx16pPVZZwzGRO2pAbNbBahvRPQNrChzp4AU8e1VdFsza6xTsi6M9IM6MgkU5qu+uNfbBas+3bipl6u1ZtsAfW+4JriKgFcmAozQx61OTI5vinMNK0GstPbay5lqdWIjrifih68mKQEouLIRZFdiM+xrG2FIyYycer88bXvHWkkGYplOR0SOGkcg0TUOKNz9HADfDsmq9cp1pq//m1HFVlV3eDADeuYg1vO3pZsjEGl+r/wOTuZ3kUpAn9rzODq9jS7Kb4bT10KpdmGHZh41Pyf4r1Q2XLLtMKPm6p8TflH0YUu3oRm0AwndtbRW/mamRfosoiL6lxlTdstZaew+B2mA0DKNMNcd/BzunkVTZqNsw+hG3AWljMOo2pNLCBLOdTbsNOtEgGPxO4IPfSg4i9C7DlQe4dhkk13qTS8Mwl6eY3w1fnjN8qQ0K3GcE7n0DtTmcc+1B8vMBu5Ypn6fwfxnhEwT2Bvw3/a+8+bCxA3iXX5mgRONL3w5qooikYTBlRNLPkDASk8hsGhRYvTd71TKAfyCUnoQcfPjdsAHI+xpygI188sn/yXfRgnLVwycB7QAAAABJRU5ErkJggg==" alt="">
                        <span class="tt-service-title">Збірка і ремонт мебелі</span>
                    </span>
            </a>
            <div class="empty-space marg-lg-b10"></div>
        </div>
        <div class="col-sm-3 column-lg-5">
            <a class="tt-service type-4" href="professionals-list.html">
                    <span class="tt-service-entry">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAABACAMAAABxwuT6AAAAV1BMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igDL/BPzAAAAHHRSTlMAhiwFCQfmIFs0FwPy7ZiLfkTFvPkMC9nOeGNJZu7agQAAAM1JREFUSMft0tmqwyAUheFljDtqM3c403r/5zw2lEKHNKkXpYX93y3wQwRxqhwbrqwZS1wW+EThChdsnXN2sXSoZXGDe6ysv4MNMHRmoW4AzF1suSI7gx0ZiocF0s3fjIVIq1ixYsWKX4Q3qUwchWTt87Dnse8MHERqekRuM/AvU38oszAOhx9+dVuOeW+ueKzLw4hVavN5P0yxYsWK3xlX7IE1GOhZnbcrU3ZgayO5T2s+tyejbTnYaQGG2Rl4TtXScCfChUR2bKTmlP8H+alIuK/8DYwAAAAASUVORK5CYII=" alt="">
                        <span class="tt-service-title">Встановлення і ремонт дверей</span>
                    </span>
            </a>
            <div class="empty-space marg-lg-b10"></div>
        </div>
        <div class="col-sm-3 column-lg-5">
            <a class="tt-service type-4" href="professionals-list.html">
                    <span class="tt-service-entry">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAABACAMAAABxwuT6AAAAeFBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igA8PWi0AAAAJ3RSTlMAV0cEhiseoDlvFJNrAkEl+ZYYDQi5gnx4MNeeNs+vdGNgTObexYpcH58DAAABZ0lEQVRIx+3X2YqDMBiG4U+NtnXfWkdr9+W7/zsck7YDpTJNMhTmwBf0QHwQDCT8GAqjnIblRQhVRasqhWOK2jOsbhgrfGUK4+a8QuaTUSOMaiKyhSqmRQvgoYVvlGCMR0f2MKrnEY8cukCWzrVKM8Cl84RDahe+4IznOF68LY7PzF5wwAJaFQxG8Bqq5On22noUzxRYspYP5kCYb8fwbBzfbJ7AIQOU5MIAK9t50voIyS8YYWXTH2uGu40HOPndmuF7yc2a4+MuAdCygTl2SA9DNcyx+s+lM3gLLC0iBla4LAHUPqwwUMmvWuKS9GyxWl9bLK01Puxhj4EJT/g3HOnhaBRv0tR9W5puRrFuo7hztOoYfOCI1Wn9z9Z5whP+FHbZo9LfSSr0dCHz2taPKLIDL75WFx4ywchvWw9LWrdE1py43a2EWA2XTiv57m7LU5MBECxhXEkB2d5mHBTc/30QRVhYjsDfOP97ri74thkAAAAASUVORK5CYII=" alt="">
                        <span class="tt-service-title">Встановлення і ремонт вікон</span>
                    </span>
            </a>
            <div class="empty-space marg-lg-b10"></div>
        </div>
        <div class="col-sm-3 column-lg-5">
            <a class="tt-service type-4" href="professionals-list.html">
                    <span class="tt-service-entry">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAolBMVEUAAAD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igD/igBDnM2sAAAANXRSTlMA8vRozCeJD/qYBGTvOguV90MV1oR+qjKnop5qXxq9t45vWlIlId49Bsewh+rmTS54NyjCc/iszvQAAALOSURBVFjDzZdpm5owEICHeEWI3CKHggpyiFpdnf//12pCt1vcts8O/dL3A+DxvEwmYSZAEWtM+xrMzi4m/KDe5H7geRcQtvZ1hJ0dQKIXFtMERzsBFs7M2dcwTTfg0QwAzETTzqNvHj5qYJkOBGJMdDADPOU6uKfyaSu1N6Aw5hOIMNs8L494eR5z5pMEO76uROPKNJ641Gx4SRpDPUYUhbxaidSU+TiLGVA4Iu5BMmLqXEeClgSDs24qLazUjPrCIQneyq0JkhBXSpCwNZDIN6Bo8E0J9iyBQRw7AdzYY5hgz7qxX3hYFBM6B4OFcjoPHqImGJ0zIjbPdDh4bsaDaO5nfA5iwXwYim9XT4G2GyzYsYWMYDlYsPxPBNp1sOAqBf+cRAdTYzQMI5XrYMVxOHwFULfca/22badE2tbDtgYA1x46DVuuKsM3nlWLqnIOZMGcf+sEqGjIgpivOsEpDIMgmNIj6AQrewvDiN8FFigGR8BFek+HSCx+k6cC0fPKCOikXVl28TQzN0BHP6Grzluc6kDHjXBad6YMx5E1/2D7+15XJJZC/dWKPMz0d5fvYQ9ufR7SYX7GHp7v/vLrZWR8PNQPD5sF9LmN8b4bGT8ZXf629A8Rhi8Jy3DuEhJkHrW890XCA1qi9xj3Pgd4ARIOHl9aeUUTLD4JFtQIgpchODRB/jINEeZATGL0ssNd0wTrTwKDKpj3awdVYKAqkZOwCSeqguOIJkhwKTNRImIpN7Q+JsS2iVcAR4j1bS3kTvaKxBb8kHdcoq9uvuyEJJZyRz7FtcrnVB6I/c/HXMa9VflbyoXlE/umXLqb1I6d2E7VbnI7pORPxshwXMiHi89pFTsWqvG61b5yVQPVYpKgDs/9klecaBXJzEq33wTKzCQ1jbtn9o3e3SVFEGCimx/vvPoOLZ32NHJb9F66eU5snLfUtrV3bDtd/SmA78Z+XX4FDrXOAAAAAElFTkSuQmCC" alt="">
                        <span class="tt-service-title">Штукатурні роботи</span>
                    </span>
            </a>
            <div class="empty-space marg-lg-b10"></div>
        </div>
    </div>
    <div class="empty-space marg-lg-b30"></div>
    <div class="text-center">
        <a href="professionals-list.html" class="button type-1 size-3 color-1 uppercase">переглянути всі послуги</a>
    </div>
    <div class="empty-space marg-sm-b40 marg-lg-b90"></div>
    <div class="tt-devider"></div>
</div>
<div class="tt-bg-grey">
    <div class="container">
        <div class="empty-space marg-sm-b40 marg-lg-b80"></div>
        <h3 class="h3 text-center">Знайдіть майстра у своєму регіоні</h3>
        <div class="empty-space marg-lg-b30"></div>
        <div class="empty-space marg-sm-b40 marg-lg-b50"></div>
        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-2">
                <ul class="simple-list city">
                    <li><a href="city.html">Київська</a></li>
                    <li><a href="city.html">Львівська</a></li>
                    <li><a href="city.html">Полтавська</a></li>
                    <li><a href="city.html">Рівненська</a></li>
                </ul>
                <div class="empty-space marg-sm-b15"></div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
                <ul class="simple-list city">
                    <li><a href="city.html">Харківська</a></li>
                    <li><a href="city.html">Миколаївська</a></li>
                    <li><a href="city.html">Черкаська</a></li>
                    <li><a href="city.html">Кропивницька</a></li>
                </ul>
                <div class="empty-space marg-sm-b15"></div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
                <ul class="simple-list city">
                    <li><a href="city.html">Одеська</a></li>
                    <li><a href="city.html">Луганська</a></li>
                    <li><a href="city.html">Хмельницька</a></li>
                    <li><a href="city.html">Івано-Франківська</a></li>
                </ul>
                <div class="empty-space marg-sm-b15"></div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
                <ul class="simple-list city">
                    <li><a href="city.html">Дніпровська</a></li>
                    <li><a href="city.html">Вінницька</a></li>
                    <li><a href="city.html">Сумська</a></li>
                    <li><a href="city.html">Тернопільська</a></li>
                </ul>
                <div class="empty-space marg-sm-b15"></div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
                <ul class="simple-list city">
                    <li><a href="city.html">Донецька</a></li>
                    <li><a href="city.html">Херсонська</a></li>
                    <li><a href="city.html">Житомирська</a></li>
                    <li><a href="city.html">Волинська</a></li>
                </ul>
                <div class="empty-space marg-sm-b15"></div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-2">
                <ul class="simple-list city">
                    <li><a href="city.html">Запорізька</a></li>
                    <li><a href="city.html">Чернігівська</a></li>
                    <li><a href="city.html">Чернівецька</a></li>
                    <li><a href="city.html">Закарпатська</a></li>
                </ul>
                <div class="empty-space marg-sm-b15"></div>
            </div>
        </div>
        <div class="empty-space marg-sm-b40 marg-lg-b85"></div>
    </div>
</div>