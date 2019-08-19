<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Merienda|Nanum+Myeongjo&display=swap" rel="stylesheet">   

<style>
    .in::placeholder{
        color:aquamarine;
    }
    .poin{cursor:pointer;display:none;}
    .hid{
        display:none;
    }
    /** Styling some buttons */
    .navbar{
        height: 64px;
        background-color:#77C0B1;
    }
    .dashi{
        line-height: 10px;
    }
</style>

<nav class="navbar narvbar-expand-lg ">
            <a href="#" class="navbar-brand dashi">Mantenimientos</a>
            <img src='img/backArrow.png' class='ml-4 poin' width="40"></img>
            
            <ul class="navbar-nav ml-auto hid">
                <form action="" class="form-inline my-lg-0 lookForm">
                    <input  autocomplete="off" type="search" id='lookIt' class='form-control in' placeholder="Filtrar">
                    <button type='submit' class='btn btn-secondary busca'>Busca</button>
                </form>
            </ul>
</nav>
