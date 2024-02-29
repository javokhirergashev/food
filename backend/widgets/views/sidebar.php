<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['/']) ?>"
                       class="<?= Yii::$app->request->url == "/" ? "active" : "" ?>">
                   <span class="menu-side">
                       <img src="/backend-files/img/icons/menu-icon-01.svg" alt="">
                   </span>
                        <span> Bosh sahifa</span>
                    </a>
                </li>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['ingredients/']) ?>"
                       class="<?= Yii::$app->controller->id == "ingredients" ? "active" : "" ?>">
                                   <span class="menu-side">
                                       <img src="/backend-files/img/icons/menu-icon-06.svg" alt="">
                                   </span>
                        <span> Masalliqlar</span>
                    </a>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['food/']) ?>"
                       class="<?= Yii::$app->controller->id == "food" ? "active" : "" ?>">
                                   <span class="menu-side">
                                       <img src="/backend-files/img/icons/menu-icon-16.svg" alt="">
                                   </span>
                        <span> Taomlar</span>
                    </a>
                </li>

            </ul>
            <div class="logout-btn">
                <a data-method="post" href="<?= \yii\helpers\Url::to(['site/logout']) ?>"><span class="menu-side"><img
                                src="/backend-files/img/icons/logout.svg" alt=""></span> <span>Chiqish</span></a>
            </div>
        </div>
    </div>
</div>