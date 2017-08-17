<?php
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }else{
        echo '<div class="center"> Error: Could not get item ID. En parler à Julien svp </div>';
    }

    $item = Item::model()->findByPk($id);
?>
<div class='center'>
    <h1 style='text-align:center'><?php echo $item->Name; ?></h1>
    <img src='img/<?php echo $item->image; ?>'>
    <p>
        Description:<br>
        <?php echo $item->Description; ?>
    </p>
    <a class='cancel' href='#' onClick='buyCancel(); return false;'>Cancel</a>
    <a class='buy' href='#' onClick='buyItem(<?php echo $id ?>); return false;'>Buy</a>
    <div class='price'>Price: <?php echo $item->price; ?> VP</div>
</div>