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
                        <a class="dropdown-item" href="season/{$season->season}">Season {$season->season}</a>
                    {/foreach}

                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="season/all">Todos Los capitulos</a>
            </li>
            <li class="nav-item  mx-4">
                <a class="nav-link" href="#">Some other</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">Other some other</a>
            </li>
            {if $logged eq true}
                <li class=" position-relative ml-4 nav-item dropdown drop-down-seasons ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                    </a>
                    <div class=" position-absolute dropdown-menu bg-danger active" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="upload modo">Agregar capitulo</a>
                        <a class="dropdown-item" href="upload season modo">Agregar season</a>
                        <a class="dropdown-item" href="seasons">Editar seasons</a>
                    </div>
                </li>
                <li class="nav-item active ml-4">
                    <a class="nav-link" href="logout">Logout</a>
                </li>
            {else}
                <li class="nav-item active ml-4">
                    <a class="nav-link " href="login">Login</a>
                </li>
            {/if}
        </ul>
    </div>
</nav>