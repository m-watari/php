<?php
require './instaApi.php';
$instagram = new Instagram();
if( $instaPosts = $instagram->getPost() ): ?>
    <ul class="insta-container">
        <?php foreach ( $instaPosts as $post ): ?>
            <li>
                <a href="<?php echo $post['link']; ?>"><img class="insta-photo" src="<?php echo $post['img']; ?>" alt="instagramの画像"></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>