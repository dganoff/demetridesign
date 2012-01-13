<section id="sidebar">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar") ) : ?>  
	<?php endif; ?>
    <div>
        
        <form class="search">
            <input type="text" class="searchbox" name="search" placeholder="Search...">
            <input type="button" class="searchbtn" name="search-submit">
        </form>

    </div>

    <div>

        <h1>Recent Posts<a href="#">See All</a></h1>

        <h2><a href="/">My Second Blog Post About Other Stuff</a></h2>

        <h2><a href="/">My First Blog Post About Web Design</a></h2>

    </div>

    <div class="blogroll">

        <h1>What I Read</h1>

        <a href="/">CSS-Tricks</a>
        <a href="/">Smashing Magazine</a>
        <a href="/">Web Design Ledger</a>

    </div>

</section><!-- #sidebar -->