<div class="row">
    <nav class="navbar navbar-default" role="navigation">
        <a class="navbar-brand" href="/">My Static Site</a>
        <ul class="nav navbar-nav">
            <li <?php if($routeInfos['page'] == "index"): echo 'class="active"'; endif ?>><a href="/">Home</a></li>
            <li <?php if($routeInfos['page'] == "list"): echo 'class="active"'; endif ?>><a href="/liste-des-contacts">Liste</a></li>
            <li <?php if($routeInfos['page'] == "contact"): echo 'class="active"'; endif ?>><a href="/contactez-nous">Contact</a></li>
        </ul>
    </nav>
</div>