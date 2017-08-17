<div class='row'>
    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        echo 'Error, no game id set. En parler à Julien svp';
        die();
    }
        $game = Game::model()->find(array('condition'=>'idGame = :idGame', 'params'=>array(':idGame'=>$id)));
    ?>

    <div style='text-align:center;max-width:900px; margin:0 auto;' class='description'>
        <h1><?php echo $game->name ?></h1>
        <h1>Description:</h1>
        <?php echo $game->description; ?>
        <h1><?php echo $game->baseRules ?></h1>
    </div>
    <script>
        $(document).ready(function(){
            $('.wrap').niceScroll();
        });
    </script>
</div>
