<div class="home">
    <ul class="posts__list">

    <?php
        foreach($posts as $post) {
            $date = $post->created_on;
            $dateTime = explode(" ", $date);
            $newDate = date("d/m/Y", strtotime($dateTime[0]));
            ?>

            <li class="posts__list__item">
                <div class="author__container">
                    <div class="author__container__user">
                        <span class="author__container__user__img">
                            <img src="/images/profilePictures/<?= $post->profilePic; ?>" alt="Picture of <?= $post->firstname; ?> <?= $post->lastname; ?>">
                        </span>
                        
                        <p class="author__container__user__name bold"><?= $post->firstname; ?> <?= $post->lastname; ?></p>
                    </div>

                    <p class="author__container__date"><?= $newDate; ?></p>
                </div>

                <!-- aspect ratio of 1/1 or photo, 1/1 when there will be detail page of post  -->
                <div class="posts__list__item__container">
                    <div class="posts__list__item__container__img">
                        <img src="/images/posts/<?= $post->media; ?>" alt="Picture of">
                    </div>
                </div>
                
                <div class="posts__list__item__content">
                    <div class="likes-breed">
                        <p>Liked by <span class="bold">69</span> people</p>

                        <p class="breed bold"><?= $post->name; ?></p>
                    </div>

                    <div class="description">
                        <p><span class="bold"><?= $post->firstname; ?> <?= $post->lastname; ?></span><?= $post->description; ?></p>
                    </div>

                    <div class="comments">
                        <p>View all comments</p>    

                        <ul class="comments__list">
                            <li class="comments__list__item"><span class="bold">Jos Vanstene</span>Wow great pic, what a cutie</li>
                            <li class="comments__list__item"><span class="bold">Rudy Nievanstene</span>Love it!</li>
                        </ul>
                    </div>
                </div>
            </li>

            <?php
        }
    ?>
    </ul>

    <div class="user__information">
        <div class="user__information__container">
            <div class="user__information__container__user">
                <span class="user__img">
                    <img src="/images/defaults/aster_flour.jpg" alt="">
                </span>
                
                <p class="user__name bold">Aster Flour</p>
            </div>

            <div class="user__information__container__recent">
                <p class="pictures__title">Recently added pictures</p>

                <ul class="pictures__list">
                    <li class="pictures__list__item">
                        <div class="pictures__list__item__container">
                            <img src="/images/defaults/german_shepard.jpg" alt="">
                        </div>
                    </li>

                    <li class="pictures__list__item">
                        <div class="pictures__list__item__container">
                            <img src="/images/defaults/german_shepard.jpg" alt="">
                        </div>
                    </li>
                    
                    <li class="pictures__list__item">
                        <div class="pictures__list__item__container">
                            <img src="/images/defaults/german_shepard.jpg" alt="">
                        </div>
                    </li>

                    <li class="pictures__list__item">
                        <div class="pictures__list__item__container">
                            <img src="/images/defaults/german_shepard.jpg" alt="">
                        </div>
                    </li>

                    <li class="pictures__list__item">
                        <div class="pictures__list__item__container">
                            <img src="/images/defaults/german_shepard.jpg" alt="">
                        </div>
                    </li>
                    
                    <li class="pictures__list__item">
                        <div class="pictures__list__item__container">
                            <img src="/images/defaults/german_shepard.jpg" alt="">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
