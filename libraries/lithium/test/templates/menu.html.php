<?php
	$depth = 0;
	$prev = array();
	$current = null;
?>
<?php foreach ($menu as $test): ?>
	<?php
		$path = explode("\\", $test);
		$case = array_pop($path);
		$caseDepth = count($path);
	?>

	<?php if (!isset($current)): ?>
		<ul class="menu">
	<?php endif ?>

	<?php while ($depth >= $caseDepth): ?>
		</li></ul>
		<?php
			$depth--;
			$current = array_pop($prev);
		?>
	<?php endwhile ?>

	<?php while(isset($current) && $current != $path[$depth-1]): ?>
		</li></ul>
		<?php
			$current = array_pop($prev);
			$depth--;
		?>
	<?php endwhile ?>

	<?php while ($depth < $caseDepth-1): ?>
		<li>
			<a class="menu-folder" href="<?php echo $base ?>/test/<?php echo join(array_slice($path, 0, $depth+1), "\\") ?>">
				<?php echo $path[$depth] ?>
			</a>
			<ul>
		<?php
			array_push($prev, $current);
			$current = $path[$depth];
			$depth++;
		?>
	<?php endwhile ?>

	<li><a href="<?php echo $base ?>/test/<?php echo join($path, "\\") ?>"><?php echo $case ?></a></li>

<?php endforeach ?>

<?php while($depth > 0): ?>
	</li></ul>
	<?php $depth--; ?>
<?php endwhile ?>