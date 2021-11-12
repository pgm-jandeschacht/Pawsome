<?php 
    $previous = "javascript:history.go(-1)";
    if(isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    }
?>

<div class="add max-width">
    <div class="add__title">
        <h1>Add post</h1>

        <a href="<?= $previous ?>"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24" xml:space="preserve"><style>.st0{fill:none}</style><path class="st0" d="m21.1 0 2.8 2.8-9.1 9.1L24 21l-2.9 2.9-9.1-9.1L2.9 24 0 21.1 9.1 12 0 2.9V24h24V0z"/><path class="st0" d="M11.9 9.1 21 0H0v2.8L2.8 0z"/><path d="M0 21.1 2.9 24l9.1-9.2 9.1 9.1L24 21l-9.2-9.1 9.1-9.1L21.1 0H21l-9.1 9.1L2.8 0 0 2.8v.1L9.1 12z"/></svg></a>
    </div>

    <form method="POST" enctype="multipart/form-data" class="add__form">
        <div class="add__form__left">
            <label class="add__form__left__img" for="image_upload">
                <div class="add__form__left__img__container">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 448" style="enable-background:new 0 0 448 448" xml:space="preserve"><path d="M416 176H272V32c0-17.7-14.3-32-32-32h-32c-17.7 0-32 14.3-32 32v144H32c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h144v144c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V272h144c17.7 0 32-14.3 32-32v-32c0-17.7-14.3-32-32-32z"/></svg>
                    </div>
                </div>
                <input required type="file" name="image_upload" id="image_upload">
            </label>
        </div>

        <div class="add__form__right">
            <label for="description">
                <div class="add__form__right__user">
                    <span class="add__form__right__user__img">
                        <img src="/images/profilePictures/<?= $user->img; ?>" alt="Picture of <?= $user->firstname; ?> <?= $user->lastname; ?>">
                    </span>
                    
                    <p class="add__form__right__user__name bold"><?= $user->firstname; ?> <?= $user->lastname; ?></p>
                </div>

                <textarea required id="description" name="description" rows="8" placeholder="Add description here..."></textarea>

            <label for="breeds_select">
                Select breed
                <select required name="breed_id" id="breeds_select">
                    <?php 
                        foreach($breeds as $breed) {
                            ?>
                            <option value="<?= $breed->breed_id; ?>"><?= $breed->name; ?></option>
                            <?php
                        }
                    ?>
                </select>
            </label>
            
            </label>

            <div class="add__form__right__button">
                <button type="submit" name="create">Add</button>
            </div>
        </div>
    </form>
</div>