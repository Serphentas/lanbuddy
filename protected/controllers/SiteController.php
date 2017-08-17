<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
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
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
    public function actionGames(){
        $this->render('games/main');
    }
    public function actionShop(){
        $this->render('shop/main');
    }
    public function actionBuy(){
        $this->renderPartial('shop/_buy');
    }
    public function actionRenderShop(){
        $this->renderPartial('shop/main');
    }
    public function actionBuyItem(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $item = Item::model()->findByPk($id);
            $user = User::model()->find(array('condition'=>'userName = :userName', 'params'=>array(':userName'=>Yii::app()->user->name)));
            
            $quantity = $item->quantity;
            if($quantity <= 0){
                echo 'Cet item est épuisé';
                die();
            }
            if(!$user->victoryPoints >= $item->price){
                echo 'Farm tes points fdp';
                die();
            }
            $user->victoryPoints = $user->victoryPoints - $item->price;
            $user->save();
            
            $quantity = $quantity -1;
            $item->quantity = $quantity;
            $item->save();
            
            $order = new Order;
            $order->date = date('Y-m-d H:i:s');
            $order->tblUser = $user->idUser;
            $order->tblItem = $item->idItem;
            $order->delivered = 0;
            $order->save();
            
            $this->renderPartial('shop/main');
        }else{
            echo 'Error: actionBuy ID not recieved. En parler à Julien svp';
            die();
        }
    }
    
    public function actionRenderOrder(){
        $this->render('shop/_order');
    }
    
    public function actionDelivery(){
        $this->render('shop/_delivery');
    }
    public function actionDeliver(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $order = Order::model()->find(array('condition'=>'idOrder = :id', 'params'=>array(':id'=>$id)));
            $order->delivered = 1;
            $order->save();
            
            $this->renderPartial('shop/_delivery');
        }else{
            echo 'Error: Deliver function in controller did not recieve an ID';
            die();
        }
    }
    public function actionEvent(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $this->render('event/detail', array('id'=>$id));
        }else{
            echo 'Error: no event ID recieved. En parler à Julien svp';
        }
    }
    public function actionSubscribe(){
        if($_POST['id']){
            $id = $_POST['id'];
        }else{
            echo 'Error: No event ID recieved. En parler à Julien';
            die();
        }
        $user = User::model()->find(array('condition'=>'userName = :userName', 'params'=>array(':userName'=>Yii::app()->user->name)));
        $participation = Participation::model()->findAll(array('condition'=>'idEvent = :id', 'params'=>array(':id'=>$id)));
        foreach($participation as $item){
            if($item->idUser == $user->idUser){
                echo 'Tu est déjà inscrit à cet event.';
                die();
            }
        }
        $sub = new Participation;
        $sub->idUser = $user->idUser;
        $sub->idEvent = $id;
        $sub->save();
        
        $this->renderPartial('home/_schedule');
    }
    public function actionGameDetail(){
        $this->render('games/detail');
    }
           
}