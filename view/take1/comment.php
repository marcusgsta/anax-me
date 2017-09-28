<div class="comment">
<?php
    //if (isset($app->session->))
    $path = $app->request->getRoute();
    $current_comments = 'comments' . $path;
    $comments = $app->session->get($current_comments);

?>

<table class="table-bordered">

<?php

$i = 0;
if (isset($comments)) :
    if (!empty($comments)) :
        foreach ($comments as $comment) : ?>

    <tr><td>
    <img src="<?=$comment['gravatar'];?>">
    </td></tr>

        <tr><td>
        <?=$comment['text'];?>
        </td></tr>

        <tr><td>
        E-mail: <?=$comment['email'];?>
        </td>
        <?php $id = $comment['id']; ?>
    </tr>
    <tr>
    <td><a href="?delete&key=<?=$current_comments . '&id=' . $id;?>">Ta bort</a></td>
    <!-- <td><a href="?edit&key= //$current_comments . '&id=' . $id;?>">Redigera</a></td> -->
    <td><a href="comment/update/<?=$id;?>">Redigera</a></td>
    </tr>

<?php $i++; ?>

<?php
        endforeach;
    endif;
endif; ?>
        <?php //$this->app->session->destroy(); ?>
        <?php
        //echo '<pre>' . var_export($_SESSION, true) . '</pre>';?>

</table>

    <p><a href="access">Logga in</a> för att kommentera</p>
    <form class="comment" action="comment/post" method="post">
        <p>Kommentera:</p>
        <div>
        <textarea name="text" rows="8" cols="80"></textarea>
    </div>
    <div>
        <label for="email">E-mail:</label>
        <input type="text" name="email" value="">
    </div>
    <div>
        <label for="gravatar">Gravatar:</label>
        <input type="text" name="gravatar" value="">
    </div>
        <input type="hidden" name="" value="">
        <button type="submit" name="button">Skicka</button>
    </form>
</div>
