<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

<div class="container">
    <div class="text-center">
        <button class="btn btn-warning text-white" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            AJOUTER UN OPENING
        </button>
    </div>
    <form class="collapse" id="collapseExample" action="/new" method="post">
        <h2 id="your_opening" class="my-4 font-weight-bold"><i class="far fa-grin-hearts"></i> Votre opening</h2>

        <!-- *************Nom anime**************** -->
        <div class="form-group">
            <label for="Nom de l'anime">Nom de l'anime</label>
            <input type="text" class="form-control" id="exampleFormControlSelect1" name="anime" placeholder="Ex : Naruto shippuden">
        </div>

        <!-- *****************Titre de la chanson**************** -->
        <div class="form-group">
            <label for="Titre de la chanson">Titre de la chanson</label>
            <input type="text" class="form-control" id="exampleFormControlSelect2" name="song" name="song" placeholder="Ex : Hero's comeback">
        </div>

        <!-- ***********Nom du groupe******************** -->
        <div class="form-group">
            <label for="Nom de l'anime">Nom du groupe</label>
            <input type="text" class="form-control" id="exampleFormControlSelect3" name="group" placeholder="Nobodyknows">
        </div>
        <!-- ***********description******************** -->

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
        </div>

        <!-- ****************url opening************** -->

        <div class="form-group">
            <label for="Lien youtube de l'opening">Lien youtube de l'opening</label>
            <input type="url" class="form-control" id="exampleFormControlSelect4" name="url_song" placeholder="Ex : https://www.youtube.com/watch?v=wZ1_C80MPEQ">
        </div>
        <!-- ****************url image************** -->

        <div class="form-group">
            <label for="Lien de l'image">Lien de l'image</label>
            <input type="url" class="form-control" name="picture" placeholder="Ex : https://i.ytimg.com/vi/HrSZluJitcc/maxresdefault.jpg" id="exampleFormControlSelect5">
        </div>
        <!-- ****************ADD opening************** -->
        <button type="submit" class="btn btn-primary">AJOUTER L'OPENING</button>
    </form>
</div>