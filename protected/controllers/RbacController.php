<?php
class RbacController extends CController
{
	public function filters()
	{
		return array(
		'accessControl',
		);
	}
	public function accessRules()
	{
		return array(
		array(
		'allow',
		'actions' => array('deletePost'),
		'roles' => array('deletePost'),
		),
		array(
		'allow',
		'actions' => array('init', 'test'),
		),
		array('deny'),
		);
	}
	public function actionInit()
	{
		$auth=Yii::app()->authManager;
		
		$bizRule='return Yii::app()->user->id==$params["id"];';
		$task=$auth->createTask('autor','autor del contenido',$bizRule);
		
		$role=$auth->createRole('jefe');
		$role=$auth->createRole('metrologo');		
		$role->addChild('autor');
		$role=$auth->createRole('administrador');
		
		echo "Done.";
	}
	public function actionDeletePost()
	{
		echo "Post deleted.";
	}
	public function actionTest()
	{
		$post = new stdClass();
		$post->authID = 'authorB';
		echo "Current permissions:<br />";
		echo "<ul>";
		echo "<li>Create post: ".Yii::app()->user->checkAccess
		('createPost')."</li>";
		echo "<li>Read post: ".Yii::app()->user->checkAccess
		('readPost')."</li>";
		echo "<li>Update post: ".Yii::app()->user->checkAccess
		('updatePost', array('post' => $post))."</li>";
		echo "<li>Delete post: ".Yii::app()->user->checkAccess
		('deletePost')."</li>";
		echo "</ul>";
	}
}