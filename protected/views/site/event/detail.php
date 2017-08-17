<div class='row'>
    <?php
        $array = Participation::model()->findAll(array('condition'=>'idEvent = :idEvent', 'params'=>array(':idEvent'=>$id)));
        $event = Event::model()->find(array('condition'=>'idEvent = :idEvent', 'params'=>array(':idEvent'=>$id)));
    ?>
    <div class='players medium-3 columns'>
        <h1><?php echo count($array); ?> Participants:</h1>
        <table>
    <?php
        $array = Participation::model()->findAll(array('condition'=>'idEvent = :idEvent', 'params'=>array(':idEvent'=>$id)));
        foreach($array as $item){
            $user = User::model()->find(array('condition'=>'idUser = :idUser', 'params'=>array(':idUser'=>$item->idUser)));
        ?>
        <tr>
            <td><?php echo $user->userName; ?></td>
        </tr>
        <?php
        }
    ?>
        </table>
    </div>
    <div class='description medium-9 columns'>
        <h1>Description:</h1>
        <?php echo $event->description; ?>
    </div>
    <script>
        $(document).ready(function(){
            $('.wrap').niceScroll();
        });
    </script>
</div>