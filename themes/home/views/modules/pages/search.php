<article class="page">
	<?php echo $page->layout->body; ?>
<?php include '../../../../../../../search/search.php'; ?>
	<?php if($page->comments_enabled): ?>
		<?php echo display_comments($page->id); ?>
	<?php endif; ?>
</article>