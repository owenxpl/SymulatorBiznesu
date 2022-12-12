<!-- File: templates/Articles/view.php -->
<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>

<?php
if (@$_SESSION['Auth']) {
    echo $this->Html->link("Dodaj komentarz",   array('controller' => 'Comments', 'action' => "add/" . $article->id));
}
?>

<?php
foreach ($article->comments as $comment)
    print("<h3>" . $comment->comment . "</h3>" . $this->Form->postLink(
        'Delete',
        array('controller' => 'Comments', 'action' => "delete/" . $comment->id),
        ['confirm' => 'Are you sure?']
    ))
?>