<?php include_once("assets/site/config.php"); ?>
<?php include_once("assets/site/markdown.php"); ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
	
	<title><?php echo $title; ?></title>
	<meta charset="<?php echo $sharset; ?>utf-8" />
	<meta name="description" content="<?php echo $description; ?>" />
	<meta name="keywords" content="<?php echo $keywords; ?>" />
	<meta name="robots" content="index, follow" />

	<link rel="shortcut icon" href="<?php echo $img; ?>favicon.png" type="image/png" />
	<link rel="stylesheet" href="<?php echo $css; ?>style.css" />

</head>
<body>

<header>
	<a class="logo" href="<?php echo $url; ?>" title="<?php echo $title; ?>">
		<img src="<?php echo $img; ?>logo.svg" alt="<?php echo $title; ?>" />
	</a>
	<?php $directory = "content/"; $pages = glob($directory . "*.md"); ?>
	<nav class="menu">
		<ul>
			<?php foreach($pages as $page): ?>
				<?php $pageName = substr($page, 8); ?>
				<?php $pageName = substr($pageName, 0, -3); ?>
				<?php echo "<li><a href=\"?page=".$pageName."\">".$pageName."</a></li>"; ?>
			<?php endforeach ?>
			<li class="link">
				<?php echo $tweet; ?>
				<?php echo $github; ?>
			</li>
		</ul>
	</nav>
</header>

<section class="content">
	<article>
		<?php if(isset($_GET['page'])): ?>

			<?php foreach($pages as $pageContent): ?>
				<?php $pageName = substr($pageContent, 8); ?>
				<?php $pageName = substr($pageName, 0, -3); ?>
				
				<?php if($_GET['page']==$pageName): ?>
					<?php echo "<h1>".$pageName."</h1>"; ?>
					<?php echo Markdown(file_get_contents("content/".$pageName.".md")); ?>
				<?php endif ?>

			<?php endforeach ?>

		<?php else: ?>
			<figure><img src="<?php echo $img; ?>girl.jpg" /></figure>
			<h1>Bienvenue!</h1>
			<?php echo Markdown(file_get_contents("content/home/home.md")); ?>

		<?php endif ?>
	</article>
</section>

<footer><p><?php echo $copyright; ?></p></footer>

</body>
</html>