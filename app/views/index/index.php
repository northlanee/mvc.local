<h3>Новости</h3>

<? foreach ($news as $post): ?>
<p>

    <b><?= $post['title'];?></b>
    <p><?= $post['text'];?></p>

</p>
<? endforeach; ?>