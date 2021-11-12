<div class="home">
    <ul class="posts__list">

    <?php
        foreach($posts as $post) {
            // var_dump($comments);
            $date = $post->created_on;
            $dateTime = explode(" ", $date);
            $newDate = date("d/m/Y", strtotime($dateTime[0]));

            $post_id = $post->post_id;
            $user_id = $post->user_id;
            ?>
            
            <li class="posts__list__item">
                <div class="author__container">
                    <div class="author__container__user">
                        <span class="author__container__user__img">
                            <img src="/images/profilePictures/<?= $post->img; ?>" alt="Picture of <?= $post->firstname; ?> <?= $post->lastname; ?>">
                        </span>
                        
                        <p class="author__container__user__name bold"><?= $post->firstname; ?> <?= $post->lastname; ?></p>
                    </div>

                    <p class="author__container__date"><?= $newDate; ?></p>
                </div>

                <!-- aspect ratio of 1/1 or photo, 1/1 when there will be detail page of post  -->
                <div class="posts__list__item__container">
                    <div class="posts__list__item__container__img">
                        <img src="/images/posts/<?= $post->media; ?>" alt="Picture of dog">
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
                        <p>Comments</p>    

                        <ul class="comments__list">
                            <?php
                                foreach($comments as $comment) {
                                    if($comment->post_id === $post_id) {
                                        ?>
                                        <li class="comments__list__item"><span class="bold"><?= $comment->firstname; ?> <?= $comment->lastname; ?></span><?= $comment->comment; ?></li>
                                        <?php
                                    } else {

                                    }
                                }
                            ?>
                        </ul>

                        <form class="comments__form" method="POST">
                            <label for="">
                                <input type="text" name="comment" placeholder="Write a comment">
                            </label>
                            <label for="">
                                <input type="hidden" name="post_id" value="<?= $post->post_id ?>">
                            </label>
                            <button type=submit name="create">Send</button>
                        </form>
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
                    <img src="/images/profilePictures/<?= $user->img; ?>" alt="Picture of <?= $user->firstname; ?> <?= $user->lastname; ?>">
                </span>
                
                <p class="user__name bold"><?= $user->firstname; ?> <?= $user->lastname; ?></p>
            </div>

            <div class="user__information__container__recent">
                <p class="pictures__title">Recently added pictures</p>

                <ul class="pictures__list">
                    <?php 
                        foreach($postsUser as $postUser) {
                            ?>

                            <li class="pictures__list__item">
                                <div class="pictures__list__item__container">
                                    <img src="/images/posts/<?= $postUser->media ?>" alt="Picture of dog">
                                </div>
                            </li>

                            <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
