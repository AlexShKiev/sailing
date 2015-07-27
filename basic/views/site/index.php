<?php use yii\helpers\Html; ?>
<?php echo Html::a('Create New User', array('site/create'), array('class' => 'btn btn-primary pull-right')); ?>
<div class="clearfix"></div>
<hr/>
<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Login</td>
        <td>Email</td>
        <td>Password</td>
        <td>Date of birth</td>
        <td>Options</td>
    </tr>
    <?php foreach ($data as $post): ?>
        <tr>
            <td>
                <?php echo Html::a($post->id, array('site/read', 'id'=>$post->id)); ?>
            </td>
            <td><?php echo Html::a($post->login, array('site/read', 'id'=>$post->id)); ?></td>
            <td><?php echo $post->mail; ?></td>
            <td><?php echo $post->pass; ?></td>
            <td><?php echo $post->birthdate; ?></td>
            <td>
                <?php echo Html::a('update', array('site/update', 'id'=>$post->id)); ?>
                <?php echo Html::a('delete', array('site/delete', 'id'=>$post->id)); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>