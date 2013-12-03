<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2013, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */
?>
<!doctype html>
<html>
<head>
	<?php echo $this->html->charset();?>
	<title>Lithium Contacts</title>
	<?php echo $this->html->style(array('bootstrap.min', 'lithified')); ?>
	<?php echo $this->styles(); ?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
</head>
<body class="lithified">
	<div class="container-narrow">

		<div class="masthead">
			<ul class="nav nav-pills pull-right">
            <?php if (app\models\User::current()): ?>
				<li>
                    <?=$this->html->link('Logout', array('Users::logout')); ?>
				</li>
            <?php endif; ?>
			</ul>
            <h3>Lithium Contacts</h3>
		</div>

		<hr>

		<div class="content">
			<?php echo $this->content(); ?>
		</div>

		<hr>

		<div class="footer">
			<p>&copy; Brian Zeligson 2013</p>
		</div>

	</div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<?php echo $this->scripts(); ?>
</body>
</html>
