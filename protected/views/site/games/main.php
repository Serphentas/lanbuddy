<div class='game-view'>
    <h1>Listed games:</h1>
    <?php
        $games = Game::model()->findAll(array('order'=>'name asc'));
        foreach($games as $item){
        ?>
            <a href='/index.php?r=site/gameDetail&id=<?php echo $item->idGame ?>'><img src='img/<?php echo $item->logo ?>'></a><br>
        <?php
        }
    ?>
</div>
<script>
    $('.wrap').css({overflowY:'scroll'});
    $('.wrap').niceScroll();
</script>