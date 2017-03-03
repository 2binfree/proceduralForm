<div class="row">
    <nav class="navbar navbar-default" role="navigation">
        <a class="navbar-brand" href="/">My Static Site</a>
        <ul class="nav navbar-nav">
            <li <?php if($page == "index"): echo 'class="active"'; endif ?>><a href="/">Home</a></li>
            <li <?php if($page == "list"): echo 'class="active"'; endif ?>><a href="/liste-des-contacts">Liste</a></li>
            <li <?php if($page == "contact"): echo 'class="active"'; endif ?>><a href="/contactez-nous">Contact</a></li>
        </ul>
    </nav>
</div>