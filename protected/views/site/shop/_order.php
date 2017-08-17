<div class='shop-view'>
    <div class='center'>
<?php
    $userName = Yii::app()->user->name;
    $user = User::model()->find(array('condition'=>'userName = :userName', 'params'=>array(':userName'=>$userName)));

    $orders = Order::model()->findAll(array('condition'=>'tblUser = :idUser','order'=>'idOrder desc', 'params'=>array(':idUser'=>$user->idUser)));
    foreach($orders as $order){
        $item = Item::model()->find(array('condition'=>'idItem = :idItem', 'params'=>array(':idItem'=>$order->tblItem)));
        $date = DateTime::createFromFormat('Y-m-d H:i:s', ''.$order->date);
        $date = $date->format('d/m \a\t H:i');
    ?>
        <div class='order'>
            <h3>[ <?php echo $item->Name ?> ] bought on :   <?php echo $date ?></h3>
            <?php
                if($order->delivered){
                    echo '<span class="green">Item delivered</span>';
                }else{
                    echo '<span class="red">Item not yet delivered</span>';
                }
            ?>
        </div>
    <?php
    }
?>
    </div>
    <script>
        $(document).ready(function(){
            $('.wrap').niceScroll();
        });
    </script>
</div>