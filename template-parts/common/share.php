<?php
$post_url   = urlencode(get_permalink());
$post_title = urlencode(get_the_title());
$post_thumb = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Pinterest için
?>

<div class="post-social">
    <ul class="d-flex gap-2 list-unstyled">
        <li class="facebook">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>"
                target="_blank" rel="noopener noreferrer" title="Facebook'ta paylaş">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
        <li class="twitter">
            <a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>"
                target="_blank" rel="noopener noreferrer" title="Twitter'da paylaş">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li class="pinterest">
            <a href="https://pinterest.com/pin/create/button/?url=<?php echo $post_url; ?>&media=<?php echo urlencode($post_thumb); ?>&description=<?php echo $post_title; ?>"
                target="_blank" rel="noopener noreferrer" title="Pinterest'te paylaş">
                <i class="fab fa-pinterest"></i>
            </a>
        </li>
        <li class="linkedin">
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_url; ?>&title=<?php echo $post_title; ?>"
                target="_blank" rel="noopener noreferrer" title="LinkedIn'de paylaş">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </li>
        <li class="share">
            <a href="#" onclick="navigator.clipboard.writeText('<?php echo get_permalink(); ?>'); alert('Link kopyalandı!'); return false;"
                title="Linki kopyala">
                <i class="fas fa-link"></i>
            </a>
        </li>
    </ul>
</div>