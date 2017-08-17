<div class='shop-view'>
<?php
    $name = Yii::app()->user->name;
    $user = User::model()->find(array('condition'=>'userName = :name','params'=>array(':name'=>$name)));
?>
    <h1>You have <?php echo $user->victoryPoints ?> VP Left</h1>
<?php 
    $array = Item::model()->findAll();
    foreach($array as $item){
?>
    <div class='xlarge-2 large-2 medium-4 columns shop-cell'>
        <div class='content'>
            <h3><?php echo $item->Name; ?></h3>
            <img src='img/<?php echo $item->image; ?>'>
            <h3 style='text-align:center; margin-bottom:15px'>Quantity left: <?php echo $item->quantity; ?></h3>
            <?php 
                if($item->quantity <= 0 || $user->victoryPoints < $item->price){
            ?>
                    <a class='button' style='background-color:grey;pointer-events:none' href='#'><img src='img/hand132.png'> <?php echo $item->price; ?> VP</a>
            <?php
                }else{
            ?>
                    <a class='button' href='#' onClick='buy(<?php echo $item->idItem; ?>); return false;'><img src='img/hand132.png'> <?php echo $item->price; ?> VP</a>
            <?php
                }
            ?>
        </div>
    </div>
<?php
    }
?>
    <script>
        $(document).ready(function(){
            $('.wrap').niceScroll();
        });
    </script>
</div>