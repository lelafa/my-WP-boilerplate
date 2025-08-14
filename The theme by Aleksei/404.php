<?php get_header(); ?>
<body class="content-area">
    <main class="site-main">
        <section class="notFound">
            <header class="page-header">
                <h1 class="page-title">
                    <?php esc_html_e( 'Oh noes! That page can’t be found!', 'theme-textdomain' ); ?>
                </h1>
            </header>
            <div>
                <a href="/">
                    <?php esc_html_e( 'Return to the homepage', 'theme-textdomain' ); ?>
                </a>
            </div>
        </section>
    </main>
</body>
<?php get_footer(); ?>