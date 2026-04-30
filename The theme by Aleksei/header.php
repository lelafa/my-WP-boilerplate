<?php global $temp_dir; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	
	<title>
		<?php 
		if ( is_front_page() ) {
			echo get_bloginfo( 'name' );
		} else {
			echo get_bloginfo( 'name' );
			echo ' | ';
			wp_title( '', true, 'right' );
		} 
		?>
	</title>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="header">
	<div class="container">
		<div class="header__wrapper">
			<nav class="header__nav">
				<ul class="header__menu">
						<?php foreach ( $nav as $nav_item ): ?>
							<li class="header__menuItem">
							<?php if ( $nav_item -> children ): ?>
								<a href="<?= $nav_item -> url ?>" class="header__menuItem--withDropdown">
									<span>
										<?= $nav_item -> title ?>
									</span>
								</a>
								<div class="header__menuItem--dropdown">
									<?php foreach ( $nav_item -> children as $child ): ?>
										<a data-id="<?= $child -> title ?>" href="<?= $child -> url ?>" class="header__menuItem--dropdownItem">
										<?php $icon = get_field( 'icon', $child -> ID ); ?>
										<?php $bulletpoints = get_field( 'bulletpoints', $child -> ID ); ?>
											<span class="header__menuItem--dropdownItem--inner">
											<img src="<?= $icon[ 'url' ] ?>" alt="<?= $icon[ 'alt' ] ?>">
											<span class="header__menuItem--dropdownItem--title"><?= $child -> title ?></span>
											</span>
										</a>
											<?php endforeach; ?>
										<div class="header__menuItem--visual">
											<div class="header__menuItem--visual--background"></div>
											<?php foreach ( $nav_item -> children as $key => $child ): ?>
												<?php $image = get_field( 'right_image', $child -> ID ) ?>
												<?php $title = get_field( 'right_title', $child -> ID ) ?>
												<?php $text = get_field( 'right_text', $child -> ID ) ?>
												<div data-id="<?= $child -> title ?>"
														class="header__menuItem--visual--item<?php if ( $key === 0 ): ?> header__menuItem--visual--item--active<?php endif; ?>">
													<img src="<?= $image[ 'url' ] ?>" alt="<?= $image[ 'alt' ] ?>"
															class="header__menuItem--visual--image">
													<div class="header__menuItem--visual--inner flex flex-col">
														<div class="header__menuItem--visual--title"><?= $title ?></div>
														<div class="header__menuItem--visual--text"><?= $text ?></div>
													</div>
												</div>
											<?php endforeach; ?>
										</div>
								</div>
								<?php else: ?>
									<a href="<?= $nav_item -> url ?>"><?= $nav_item -> title ?></a>
							<?php endif; ?>
							</li>
						<?php endforeach; ?>
						<?php foreach ( $HPWnav as $nav_item ): ?>
							<li class="header__menuItem">
							<?php if ( $nav_item -> children ): ?>
								<a href="<?= $nav_item -> url ?>" class="header__menuItem--withDropdown">
									<span>
										<?= $nav_item -> title ?>
									</span>
								</a>
								<?php else: ?>
									<a href="<?= $nav_item -> url ?>"><?= $nav_item -> title ?></a>
							<?php endif; ?>
							</li>
						<?php endforeach; ?>
				</ul>
			</nav>

		</div>
	</div>

	<div class="mobile">
	</div>
</header>