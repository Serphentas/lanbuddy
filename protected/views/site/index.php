
<div class='row main-view'>
    <div class='medium-4 columns ladder'>
        <h1>Ladder <img src='img/trophy42.png'></h1>
        <a class='refresh' href='#' onclick='return false'>Refresh <img src='img/refresh57.png'></a>
        <table>
            <tr>
                <th class='rank'>
                    Rank
                </th>
                <th class='name'>
                    Name
                </th>
                <th class='elo'>
                    Elo
                </th>
            </tr>
            <?php
                $array = User::model()->findAll(array('order'=>'elo desc',));
                $i = 1;
                foreach($array as $item){
                ?>
                <tr>
                    <td class='rank'>
                        <?php echo $i; $i++; ?>
                    </td>
                    <td class='name'>
                        <?php echo $item->userName; ?>
                    </td>
                    <td class='elo'>
                        <?php echo $item->elo; ?>
                    </td>
                </tr>
                <?php
                }
            ?>
        </table>
    </div>
    <div class='medium-8 columns schedule'>
        <?php $this->renderPartial('home/_schedule') ?>
    </div>
</div>
