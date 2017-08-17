<div class='shop-view'>
    <div class='delivery' style='margin:0 auto; width:1000px;'>
    <div class='center' style='float:left;margin:0'>
<?php
    $orderPending = Order::model()->findAll(array('condition'=>'delivered = 0','order'=>'idOrder asc'));
    foreach($orderPending as $order){
        $item = Item::model()->find(array('condition'=>'idItem = :id', 'params'=>array(':id'=>$order->tblItem)));
        $user = User::model()->find(array('condition'=>'idUser = :id', 'params'=>array(':id'=>$order->tblUser)));
        $date = DateTime::createFromFormat('Y-m-d H:i:s', ''.$order->date);
        $date = $date->format('d/m \a\t H:i');
    ?>
        <div class='order deliver'>
            <h3><?php echo $item->Name; ?> &nbsp; <?php echo $date ?></h3>
            <p>
                For: <span><?php echo $user->userName; ?></span>
            </p>
            <a class='red' href='#' onClick='deliver(<?php echo $order->idOrder; ?>); return false;'>Deliver</a>
        </div>
    <?php
    }
?>
    </div>
    <div class='center' style='float:left;margin:0'>
<?php
    $orderDone = Order::model()->findAll(array('condition'=>'delivered = 1','order'=>'idOrder desc'));
    foreach($orderDone as $order){
        $item = Item::model()->find(array('condition'=>'idItem = :id', 'params'=>array(':id'=>$order->tblItem)));
        $user = User::model()->find(array('condition'=>'idUser = :id', 'params'=>array(':id'=>$order->tblUser)));
        $date = DateTime::createFromFormat('Y-m-d H:i:s', ''.$order->date);
        $date = $date->format('d/m \a\t H:i');
    ?>
        <div class='order deliver'>
            <h3><?php echo $item->Name; ?> &nbsp; <?php echo $date ?></h3>
            <p>
                For: <span><?php echo $user->userName; ?></span>
            </p>
            <a class='green' style='pointer-events:none' href='#' onClick='return false;'>Done</a>
        </div>
    <?php
    }
?>
    </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.wrap').niceScroll();
        });
    </script>
</div>