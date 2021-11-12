<div class="user max-width">
    <div class="user__info">
        <div class="user__info__log-off">
            <a href="/logout">
                Log off
            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 496" style="enable-background:new 0 0 496 496" xml:space="preserve"><path d="M248 0C111 0 0 111 0 248s111 248 248 248 248-111 248-248S385 0 248 0z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 496" style="enable-background:new 0 0 496 496" xml:space="preserve"><path d="M248 0C111 0 0 111 0 248s111 248 248 248 248-111 248-248S385 0 248 0z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 496" style="enable-background:new 0 0 496 496" xml:space="preserve"><path d="M248 0C111 0 0 111 0 248s111 248 248 248 248-111 248-248S385 0 248 0z"/></svg> -->
            </a>
        </div>

        <div class="user__info__img">
            <img src="/images/profilePictures/<?= $user->img ?>" alt="Picture of <?= $user->firstname; ?> <?= $user->lastname; ?>">
        </div>

        <div class="user__info__name">
            <h1><?= $user->firstname; ?> <?= $user->lastname; ?></h1>
            <a href="/user/edit">Edit profile</a>
        </div>
    </div>

    <div class="user__posts">
        <ul class="user__posts__list">
            <?php
                foreach($posts as $post) {
                    ?>

                    <li class="user__posts__list__item">
                        <a href="/post/detail/<?= $post->post_id ?>" class="user__posts__list__item__link">
                            <img src="/images/posts/<?= $post->media ?>" alt="">
                        </a>
                    </li>

                    <?php
                }
            ?>
        </ul>
    </div>
</div>
