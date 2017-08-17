<h1>Schedule <img src='img/pula.png'></h1>
<a class='refresh' href='#' onclick='return false'>Refresh <img src='img/refresh57.png'></a>

<?php
    $array = Event::model()->findAll(array('order'=>'date desc'));
    foreach($array as $item){
        $date = DateTime::createFromFormat('Y-m-d H:i:s', ''.$item->date);
        $day = $date->format('d');
        $date = $date->format('H:i');
    ?>
        <div class='event'>
            <h1><?php echo $item->idType0->name;?>
                <?php
                    if($item->idType == 1){
                        echo ' <img class"ranked" src="img/award52.png">';
                    }else{
                        echo ' <img class"training" src="img/silhouette48.png">';
                    }
                ?>
                <img class='game' src='img/<?php echo $item->idGame0->logo ?>'>
            </h1>
            <h2>Day <?php echo $day ?> at <?php echo $date; ?></h2>
            <p>
                Description:<br>
                <?php echo $item->description; ?>
            </p>
            <?php
            $user = User::model()->find(array('condition'=>'userName = :userName', 'params'=>array(':userName'=>Yii::app()->user->name)));
            $participation = Participation::model()->findAll(array('condition'=>'idEvent = :id', 'params'=>array(':id'=>$item->idEvent)));
            $count = 0;
            foreach($participation as $participationItem){
                if($participationItem->idUser == $user->idUser){
                    $count = 1;
                }
            }
            if($count == 1 ){
                ?>
                <a style='background-color:#00b423' class='participate' href='#' onclick='return false'>OK!</a>
                <?php
            }else{
                ?>
                <a class='participate' href='#' onclick='subscribe(<?php echo $item->idEvent ?>); return false'>Participate</a>
                <?php
            }
            ?>
            <a class='brackets' href='<?php echo $item->challonge ?>' target='_blank'>Brackets</a>
            <a class='details' href='/index.php?r=site/event&id=<?php echo $item->idEvent ?>'>Details</a>
        </div>
    <?php
    }
?>