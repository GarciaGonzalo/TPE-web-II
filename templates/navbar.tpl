<nav class=" navbar navbar-light bg-danger">
    <div class="container position-relative">
        <ul class=" flex-row navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home">Home</a>
            </li>
            <li class=" position-relative mx-4 nav-item dropdown drop-down-seasons ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Seasons
                </a>
                <div class=" position-absolute dropdown-menu bg-danger" aria-labelledby="navbarDropdown">

                    {foreach from=$seasons item=season}
                        <a class="dropdown-item" href="season/{$season->season}">season {$season->season}</a>
                    {/foreach}

                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="season/all">Todos Los capitulos</a>
            </li>
            <li class="nav-item  mx-4">
                <a class="nav-link" href="#">some other</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">other some other</a>
            </li>
            {if $logged eq true}
                <li class="nav-item ml-4 ">
                    <a class="nav-link" href="edit">Editar datos</a>
                </li>
                <li class="nav-item ml-4">
                    <a class="nav-link" href="logout">Logout</a>
                </li>
            {else}
                <li class="nav-item ml-4">
                    <a class="nav-link" href="login">Login</a>
                </li>
            {/if}
        </ul>
    </div>
</nav>