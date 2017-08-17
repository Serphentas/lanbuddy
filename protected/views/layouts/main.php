<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Lanbuddy</title>
    
    <link rel="stylesheet" type="text/css" href="/css/foundation.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="/js/jquery.nicescroll.js"></script>
    <script src="/js/main.js"></script>
    
</head>
<body>
<div class='wrap'>
   nigga
    <div class='nav'>
        <a href='#' class='cog'><img src='img/gear39.png'></a>
        <div class='nav-content'>
            <div class='form'>
<?php
                $model=new LoginForm;
                
                // if it is ajax validation request
                if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
                {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
                }

                // collect user input data
                if(isset($_POST['LoginForm']))
                {
                    $model->attributes=$_POST['LoginForm'];
                    // validate user input and redirect to the previous page if valid
                    if($model->validate() && $model->login())
                        $this->redirect(Yii::app()->user->returnUrl);
                }
                // display the login form
                $this->renderPartial('../site/_login',array('model'=>$model));
                
?>
            </div>
            <div class='links'>
                <a href='index.php?r=site/games'>Games and rules</a><br>
                <a href='index.php?r=site/shop'>Victory shop</a><br>
                <a href='index.php?r=site/renderOrder'>Order history</a><br>
                <?php
                if(!Yii::app()->user->isGuest){
                ?>
                    <a href='index.php?r=site/logout'>Logout (<?php echo Yii::app()->user->name ?>)</a> <?php if(Yii::app()->user->isAdmin()){echo '<span>Admin</span>'; } ?><br>
                <?php } ?>
            </div>
            <?php
                if(Yii::app()->user->isAdmin()){
                ?>
                    <div class='links'>
                        <a href='index.php?r=user/admin'>Manage Users</a><br>
                        <a href='index.php?r=item/admin'>Manage Items</a><br>
                        <a href='index.php?r=game/admin'>Manage Games</a><br>
                        <a href='index.php?r=event/admin'>Manage Events</a><br>
                        <a href='index.php?r=site/delivery'>Delivery</a><br>
                    </div>
                <?php
                }
            ?>
        </div>
        <div class='title'>
            <a href='index.php'><span class='grey'>LAN </span>Buddy</a>
        </div>
    </div>
    <?php
    if(Yii::app()->user->isGuest){
    ?>
        <div class='welcome'>
            <span class='first'>Welcome to</span><br>
            <span class='second'><span class='grey'>LAN</span> Buddy</span><br>
            <span class='third'>Please login</span>
        </div>
        <script>
            slideMenu();
        </script>
    <?php
    }else{
        echo $content;
    }
    ?>
</div>
</body>
</html>