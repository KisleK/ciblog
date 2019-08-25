<h2><?= $title; ?></h2>

<ul class="list-group">
  <?php foreach($categories as $category) : ?>
    <li class="list-group-item"><a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?> Posts</a>
    </li>
  <?php endforeach; ?>
</ul>